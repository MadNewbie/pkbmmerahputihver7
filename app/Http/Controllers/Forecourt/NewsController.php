<?php
namespace App\Http\Controllers\Forecourt;

use App\Base\BaseController;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends BaseController
{
    public function index()
    {
        return view('forecourt/new/news/index');
    }

    public function indexData(Request $request)
    {
        $count = News::count();
        $page = !$request->get('page') ? 1 : $request->get('page');
        $search = $request->get('search');
        $periode = $request->get('periode');
        $dataPerPage = 3;
        $maxPage = ceil($count / $dataPerPage);

        $newsTableName = News::getTableName();

        $q = News::query()
            ->select([
                "{$newsTableName}.title",
                "{$newsTableName}.content",
                "{$newsTableName}.thumb_img",
                "{$newsTableName}.id",
            ])
            ->orderBy("{$newsTableName}.created_at","DESC")
            ->limit($dataPerPage)
            ->offset(($page - 1) * $dataPerPage );

        $nextPage = $page == $maxPage ? $maxPage : $page + 1;
        $prevPage = $page != 1 ? $page - 1 : 1;

        $datas = $q->get();
        foreach ($datas as $data) {
            $data['content'] = wordwrap(strip_tags(str_replace("</p>"," ",$data['content'])), 150) . "...";
        }
        $res = json_encode([
            'curPage' => $page,
            'prevPage' => $prevPage,
            'nextPage' => $nextPage,
            'maxPage' => $maxPage,
            'dataCount' => $count,
            'data' => $datas,
        ]);
        return $res;
    }

    public function show($id)
    {
        $news = News::find($id);

        return view('forecourt/new/news/show', compact('news'));
    }
}