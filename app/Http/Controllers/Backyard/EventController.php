<?php
namespace App\Http\Controllers\Backyard;

use App\Base\BaseController;
use App\Libraries\Mad\Helper;
use App\Lookups\Backyard\EventLookup;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Intervention\Image\ImageManagerStatic as Image;
use DOMDocument;
use Auth;
use DB;

Class EventController extends BaseController
{
    protected static $modelName = 'event';

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
        $eventTableName = Event::getTableName();
        $userTableName = User::getTableName();

        $search = $request->get('search')['value'];

        $q = Event::query()
            ->select([
                "{$eventTableName}.title",
                "{$userTableName}.name as creator_name",
                "{$eventTableName}.isPublic",
                "{$eventTableName}.created_at",
                "{$eventTableName}.id",
            ])
            ->leftJoin($userTableName,"{$eventTableName}.created_by","=","{$userTableName}.id");
        
        Helper::fluentMultiSearch($q, $search, [
            "{$eventTableName}.title",
            "{$userTableName}.name",
        ]);

        $res = DataTables::of($q)
            ->editColumn('title', function(Event $v){
                return '<a href="'. route(self::getRoutePrefix('show'),$v->id) .'">' . $v->title . '</a>';
            })
            ->editColumn('isPublic', function(Event $v){
                return $v->getIsPublicBadge();
            })
            ->editColumn('created_at', function(Event $v){
                return date_format($v->created_at, 'j-m-Y H:i:s');
            })
            ->editColumn('_menu', function(Event $model){
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
            'content' => 'required',
        ];

        $this->validate($request, $rules);

        $res = true;
        $input = $request->all();

        // Proses input thumbnail image
        $rawThumbImg = $request->file('thumb_img');
        $filename[] = str_replace(" ","-",trim($input['title']));
        $filename[] = "thumbs-".time();
        $filename = implode("-",$filename);
        $filename = $filename.".".$rawThumbImg->getClientOriginalExtension();
        $rawThumbImg->move(public_path("/uploads/thumbs"),$filename);

        // Proses pindah image dalam konten
        $storage_path = "/uploads/content_imgs";
        $dom = New \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($input['content'],LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach($images as $image){
            $src = $image->getAttribute('src');
            if(preg_match('/data:image/',$src)){
                preg_match('/data:image\/(?<mime>.*?)\;/',$src,$groups);
                $mimetype=$groups['mime'];
                $fileNameContent = uniqid();
                $fileNameContentRand = str_replace(" ","-",trim($input['title'])). "-" .substr(md5($fileNameContent),6,6).'_'.time();
                $filepath = ("$storage_path/$fileNameContentRand.$mimetype");
                $img = Image::make($src)
                ->resize(800,600)
                ->encode($mimetype,100)
                ->save(public_path($filepath));
                $new_src=asset($filepath);
                $image->removeAttribute('src');
                $image->setAttribute('src',$new_src);
                $image->setAttribute('class','img-responsive');
            }
        }

        $model = $id ? Event::find($id) : new Event();
        $model->fill($input);
        $model->thumb_img = "/uploads/thumbs/".$filename;
        $model->content = $dom->saveHTML();
        if(!isset($input['isPublic']) || !$input['isPublic'])
        {
            $model->isPublic = EventLookup::IS_PUBLIC_NO;
        }
        if(!$id){
            $model->created_by = Auth::user()->id;
        }
        $model->updated_by = Auth::user()->id;
        DB::beginTransaction();
        $res&=$model->save();
        $res ? DB::commit() : DB::rollback();
        return $res ? redirect()->route(self::getRoutePrefix('index'))->with('success','Data berhasil tersimpan') : redirect()->route(self::getRoutePrefix('index'))->with('error','Data gagal tersimpan');
    }

    public function create()
    {
        $isPublicSelect = collect(Event::getIsPublicList());
        return self::makeView('create', compact('isPublicSelect'));
    }

    public function store(Request $request)
    {
        return $this->_save($request);
    }

    public function edit($id)
    {
        $event = Event::find($id);
        $isPublicSelect = collect(Event::getIsPublicList());
        return self::makeView('edit', compact('event','isPublicSelect'));
    }

    public function update(Request $request, $id)
    {
        return $this->_save($request,$id);
    }

    public function show($id)
    {
        $model = Event::find($id);
        return self::makeView('show', compact('model'));
    }

    public function destroy($id)
    {
        $model = Event::find($id);
        return $model->delete() ? '1' : 'Data tidak bisa dihapus';
    }

    public function makeIsPublicYes($id)
    {
        $res = true;
        $error = '';
        $model = Event::find($id);
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
            $model->isPublic = EventLookup::IS_PUBLIC_YES;
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
        $model = Event::find($id);
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
            $model->isPublic = EventLookup::IS_PUBLIC_NO;
            $res &= $model->save();
            if(!$res){
                $error = 'Data gagal dipublikasi';
            }
        }
        $res ? DB::commit():DB::rollback();
        return $res ? redirect()->route(self::getRoutePrefix('index'))->with('success','Data berhasil dipublikasi') : redirect()->route(self::getRoutePrefix('index'))->with('error',$error);
    }
}