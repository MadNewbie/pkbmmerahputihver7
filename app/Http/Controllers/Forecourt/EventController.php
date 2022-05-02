<?php
namespace App\Http\Controllers\Forecourt;

use App\Models\Event;
use App\Base\BaseController;
use Illuminate\Http\Request;

class EventController extends BaseController
{
    public function index()
    {
        return view('forecourt/new/event/index');
    }

    public function indexData(Request $request)
    {
        $count = Event::count();
        $page = !$request->get('page') ? 1 : $request->get('page');
        $search = $request->get('search');
        $periode = $request->get('periode');
        $dataPerPage = 2;
        $maxPage = ceil($count / $dataPerPage);

        $eventTableName = Event::getTableName();

        $q = Event::query()
            ->select([
                "{$eventTableName}.title",
                "{$eventTableName}.content",
                "{$eventTableName}.thumb_img",
                "{$eventTableName}.id",
            ])
            ->orderBy("{$eventTableName}.created_at","DESC")
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
        $event = Event::find($id);

        return view('forecourt/new/event/show', compact('event'));
    }
}