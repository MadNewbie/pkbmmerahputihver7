<?php
namespace App\Http\Controllers\Backyard;

use App\Models\News;
use App\Models\User;
use App\Base\BaseController;
use App\Libraries\Mad\Helper;
use App\Lookups\Backyard\NewsLookup;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use DB;

Class NewsController extends BaseController
{
    protected static $modelName = 'news';

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
        $newsTableName = News::getTableName();
        $userTableName = User::getTableName();
        $search = $request->get('search')['value'];
        $q = News::query()
            ->select([
                "{$newsTableName}.title",
                "{$userTableName}.name as creator_name",
                "{$newsTableName}.isPublic",
                "{$newsTableName}.created_at",
                "{$newsTableName}.id",
            ])
            ->leftJoin($userTableName,"{$newsTableName}.created_by","=","{$userTableName}.id");
        
        Helper::fluentMultiSearch($q,$search,[
            "{$newsTableName}.title",
            "{$userTableName}.name",
        ]);

        $res = DataTables::of($q)
            ->editColumn('title', function(News $v){
                return '<a href="' . route(self::getRoutePrefix('show'), $v->id) .'">' . $v->title . '</a>';
            })
            ->editColumn('isPublic', function(News $v){
                return $v->getIsPublicBadge();
            })
            ->editColumn('created_at', function(News $v){
                return date_format($v->created_at,'j-m-Y H:i:s');
            })
            ->editColumn('_menu', function(News $model){
                return self::makeView('index-menu', compact('model'))->render();
            })
            ->rawColumns(['title','isPublic','_menu'])
            ->make(true);

        return $res;
    }

    private function _save(Request $request, $id = null)
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

        $model = $id ? News::find($id) : new News();
        $model->fill($input);
        $model->thumb_img = "/uploads/thumbs/".$filename;
        $model->content = $dom->saveHTML();
        if(isset($input['isPublic']) || !$input['isPublic']){
            $model->isPublic = NewsLookup::IS_PUBLIC_NO;
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
        $isPublicSelect = collect(News::getIsPublicList());
        return self::makeView('create', compact('isPublicSelect'));
    }

    public function store(Request $request)
    {
        return $this->_save($request);
    }

    public function edit($id)
    {
        $news = News::find($id);
        $isPublicSelect = collect(News::getIsPublicList());
        return self::makeView('edit',compact('news', 'isPublicSelect'));
    }

    public function update(Request $request, $id)
    {
        return $this->_save($request, $id);
    }

    public function show($id)
    {
        $news = News::find($id);
        return self::makeView('show', compact('news'));
    }

    public function destroy($id)
    {
        $model = News::find($id);
        return $model->delete() ? '1' : 'Data tidak bisa dihapus';
    }

    public function makeIsPublicYes($id)
    {
        $res = true;
        $error = '';
        $model = News::find($id);
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
            $model->isPublic = NewsLookup::IS_PUBLIC_YES;
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
        $model = News::find($id);
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
            $model->isPublic = NewsLookup::IS_PUBLIC_NO;
            $res &= $model->save();
            if(!$res){
                $error = 'Data gagal tidak dipublikasi';
            }
        }
        $res ? DB::commit():DB::rollback();
        return $res ? redirect()->route(self::getRoutePrefix('index'))->with('success','Data berhasil tidak dipublikasi') : redirect()->route(self::getRoutePrefix('index'))->with('error',$error);
    }
}