<?php

declare(strict_types=1);

namespace App\Http\Controllers;

//use http\Env\Request;
//use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

final class NewsController extends Controller
{


    public function index(): View
    {
        $news = $this->getNews();
        return view('news.index', ['news' => $news]);
    }

    public function show(int $id): View
    {
        return view('news.show', ['newsItem' => $this->getNews($id)]);
    }

    public function category(): View
    {
        $category = $this->getCategory();
        return view('news.category', ['category' => $category]);
    }

    public function catShow(int $idCat): View
    {
        return view('news.catShow', ['catNews' => $this->getCatNews($idCat), 'idCat' => $idCat]);
    }

    public function listNews(): View
    {
        return view('news.listNews', ['listNews' => $this->getListNews()]);
    }

    public function authentication(): View
    {
        return view('auth.authentication');
    }

    public function addNews(): View
    {
        return view('news.addNews');
    }

    private $news = [
        [
            'id' => 1,
            'title' => 'Новость 1',
            'inform'=> 'Новость № 1',
            'isPrivate' => true,
        ],
        [
            'id' => 2,
            'title' => 'Новость 2',
            'inform'=> 'Новость № 2',
            'isPrivate' => false,
        ]
    ];

    public function learn3(Request $request)
    {
        $categ = $this->getCategory();

        //dump(implode(';', $request->all())); //Нужна валидация данных формы
        if ($request->input('par') =='feedback' & ($request->input('name') <> null & $request->input('inform') <> null)) {
            $txt = $request->input('name') . '; ' . $request->input('inform');
            Storage::append('logs/feedback.log', $txt);
        } elseif ($request->input('par') =='uploadOrder' & ($request->input('name') <> null & $request->input('phone') <> null & $request->input('email') <> null & $request->input('inform') <> null)) {
            $txt = $request->input('name') . '; ' . $request->input('phone') . '; ' . $request->input('email') . '; ' . $request->input('inform');
            Storage::append('logs/uploadOrder.log', $txt);
        }

        return view('learn3.news', ['news' => $this->news, 'categ' => $categ, 'par' => 'null', 'listNews' => $this->getListNews()]);
    }

}
