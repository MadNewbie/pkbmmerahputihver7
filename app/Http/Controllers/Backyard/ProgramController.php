<?php
namespace App\Http\Controllers\Backyard;

use App\Models\User;
use App\Models\Program;
use App\Base\BaseController;
use App\Libraries\Mad\Helper;
use App\Lookups\Backyard\ProgramLookup;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Auth;

class ProgramController extends BaseController
{
    protected static $modelName = 'program';

    public function __construct()
    {
        $this->middleware('permission:' . self::getRoutePrefix('index'), ['only' => ['index','indexData']]);
        $this->middleware('permission:' . self::getRoutePrefix('show'), ['only' => ['show']]);
        $this->middleware('permission:' . self::getRoutePrefix('create'), ['only' => ['create']]);
        $this->middleware('permission:' . self::getRoutePrefix('store'), ['only' => ['store']]);
        $this->middleware('permission:' . self::getRoutePrefix('edit'), ['only' => ['edit']]);
        $this->middleware('permission:' . self::getRoutePrefix('update'), ['only' => ['update']]);
        $this->middleware('permission:' . self::getRoutePrefix('destroy'), ['only' => ['destroy']]);
        $this->middleware('permission:' . self::getRoutePrefix('public.yes'), ['only' => ['makeIsPublicYes']]);
        $this->middleware('permission:' . self::getRoutePrefix('public.no'), ['only' => ['makeIsPublicNo']]);
    }

    public function index()
    {
        return self::makeView('index');
    }

    public function indexData(Request $request)
    {
        $programTableName = Program::getTableName();
        $userTableName = User::getTableName();

        $search = $request->get('search')['value'];

        $q = Program::query()
            ->select([
                "{$programTableName}.title",
                "{$programTableName}.isPublic",
                "{$programTableName}.created_at",
                "{$programTableName}.id"
            ])
            ->leftJoin($userTableName,"{$programTableName}.created_by","=","{$userTableName}.id");

        Helper::fluentMultiSearch($q,$search,[
            "{$programTableName}.title",
        ]);

        $res = DataTables::of($q)
            ->editColumn('title', function(Program $v) {
                return '<a href="'. route(self::getRoutePrefix('show'),$v->id) .'">' . $v->title . '</a>';
            })
            ->editColumn('isPublic', function(Program $v){
                return $v->getIsPublicBadge();
            })
            ->editColumn('created_at', function(Program $v){
                return date_format($v->created_at, 'j-m-Y H:i:s');
            })
            ->editColumn('_menu', function(Program $model){
                return self::makeView('index-menu', compact('model'))->render();
            })
            ->rawColumns(['title','isPublic','_menu'])
            ->make(true);
        
        return $res;
    }

    public function _save(Request $request, $id=null)
    {
        $rules = [
            'title' => 'required',
            'thumb_img' => 'image',
            'materi_path' => 'mimes:pdf',
            'schedule_path' => 'mimes:pdf',
            'description' => 'required',
        ];

        $this->validate($request, $rules);

        $res = true;
        $input = $request->all();

        //Proses input thumbnail image
        if(!empty($request->file('thumb_img'))){
            $rawThumbImg = $request->file('thumb_img');
            $filename[] = str_replace(" ","-",trim($input['title']));
            $filename[] = "thumbs-".time();
            $filename = implode("-",$filename);
            $filename = $filename.".".$rawThumbImg->getClientOriginalExtension();
            $rawThumbImg->move(public_path("/uploads/thumbs"),$filename);
        }

        //Proses input file contoh materi
        if(!empty($request->file('materi_path'))){
            $rawMateri = $request->file('materi_path');
            $filenameMateri[] = str_replace(" ","_",trim($input['title']));
            $filenameMater[] = "materi_".time();
            $filenameMateri = implode("_",$filenameMateri);
            $filenameMateri = $filenameMateri.".".$rawMateri->extension();
            $rawMateri->move(public_path("/uploads/materi"),$filenameMateri);
        }

        //Proses input file contoh schedule
        if(!empty($request->file('schedule_path'))){
            $rawSchedule = $request->file('schedule_path');
            $filenameSchedule[] = str_replace(" ","_",trim($input['title']));
            $filenameSchedule[] = "materi_".time();
            $filenameSchedule = implode("_",$filenameSchedule);
            $filenameSchedule = $filenameSchedule.".".$rawSchedule->extension();
            $rawSchedule->move(public_path("/uploads/schedules"),$filenameSchedule);
        }

        $model = $id ? Program::find($id) : new Program();
        $model->fill($input);
        if(isset($filename)){
            $model->thumb_img = "/uploads/thumbs/".$filename;
        }
        if(isset($filenameMateri)){
            $model->materi_path = "/uploads/materi/".$filenameMateri;
        }
        if(isset($filenameSchedule)){
            $model->schedule_path = "/uploads/schedules/".$filenameSchedule;
        }
        if(!isset($input['isPublic']) || !$input['isPublic'])
        {
            $model->isPublic = ProgramLookup::IS_PUBLIC_NO;
        }
        if(!$id){
            $model->created_by = Auth::user()->id;
        }
        $model->updated_by = Auth::user()->id;
        DB::beginTransaction();
        $res &= $model->save();
        $res ? DB::commit() : DB::rollback();
        return $res ? redirect()->route(self::getRoutePrefix('index'))->with('success','Data berhasil tersimpan') : redirect()->route(self::getRoutePrefix('index'))->with('error','Data gagal tersimpan');
    }

    public function create()
    {
        $isPublicSelect = collect(Program::getIsPublicList());
        return self::makeView('create', compact('isPublicSelect'));
    }

    public function store(Request $request)
    {
        return $this->_save($request);
    }

    public function edit($id)
    {
        $program = Program::find($id);
        $isPublicSelect = collect(Program::getIsPublicList());
        return self::makeView('edit', compact('program','isPublicSelect'));
    }

    public function update(Request $request, $id)
    {
        return $this->_save($request,$id);
    }

    public function show($id)
    {
        $model = Program::find($id);
        return self::makeView('show', compact('model'));
    }

    public function destroy($id)
    {
        $model = Program::find($id);
        return $model->delete() ? '1' : 'Data tidak bisa dihapus';
    }

    public function makeIsPublicYes($id)
    {
        $res = true;
        $error = '';
        $model = Program::find($id);
        if(!$model){
            $res = false;
            $error = 'Data tidak ditemukan';
        }
        if($model->isPublicYes())
        {
            $res = false;
            $error = 'Data sudah dipublikasi';
        }
        DB::beginTransaction();
        if($model && $model->isPublicNo()){
            $model->isPublic = ProgramLookup::IS_PUBLIC_YES;
            $res &= $model->save();
            if(!$res){
                $error = 'Data gagal dipublikasi';
            }
        }
        $res ? DB::commit():DB::rollback();
        return $res ? redirect()->route(self::getRoutePrefix('index'))->with('success','Data berhasil dipublikasi') : redirect()->route(self::getRoutePrefix('index'))->with('error',$error);
    }

    public function makeIsPublicNo($id)
    {
        $res = true;
        $error = '';
        $model = Program::find($id);
        if(!$model){
            $res = false;
            $error = 'Data tidak ditemukan';
        }
        if($model->isPublicNo())
        {
            $res = false;
            $error = 'Data sudah tidak dipublikasi';
        }
        DB::beginTransaction();
        if($model && $model->isPublicYes()){
            $model->isPublic = ProgramLookup::IS_PUBLIC_NO;
            $res &= $model->save();
            if(!$res){
                $error = 'Data gagal dipublikasi';
            }
        }
        $res ? DB::commit():DB::rollback();
        return $res ? redirect()->route(self::getRoutePrefix('index'))->with('success','Data berhasil dipublikasi') : redirect()->route(self::getRoutePrefix('index'))->with('error',$error);
    }
}