<?php

declare(strict_types=1);

namespace App\Http\Controllers;

//use http\Env\Request;
//use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function Ramsey\Uuid\v1;

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

    public function learn3(Request $request, int $id = null): View
    {
        //dump(implode(';', $request->all())); //Нужна валидация данных формы
        if ($request->input('par') =='feedback' & ($request->input('name') <> null & $request->input('inform') <> null)) {
            $txt = $request->input('name') . '; ' . $request->input('inform');
            Storage::append('logs/feedback.log', $txt);
        } elseif ($request->input('par') =='uploadOrder' & ($request->input('name') <> null & $request->input('phone') <> null & $request->input('email') <> null & $request->input('inform') <> null)) {
            $txt = $request->input('name') . '; ' . $request->input('phone') . '; ' . $request->input('email') . '; ' . $request->input('inform');
            Storage::append('logs/uploadOrder.log', $txt);
        }

        $categ = DB::select('SELECT id, categories FROM categories');
        $news2 = DB::select('SELECT id, title, inform, isprivate FROM news');
        if ($id === null) {
            $listNews = '';
        } else
        {
            $listNews = DB::select('SELECT id, title, inform, isprivate FROM news WHERE id_category = :id', ['id' => $id]);
        }
        //dump($listNews);
        return view('learn3.news', ['news' => $news2, 'categ' => $categ, 'par' => 'null', 'listNews' => '']);
    }


    public function catNews($id): View
    {
        $catNewsName = DB::table('categories')
            ->where('id',$id)
            ->pluck('categories')
            ->first();
        $listNews = DB::table('news')
            ->join('users', 'news.id_users', '=', 'users.id')
            ->join( 'source', 'news.id_source', '=', 'source.id')
            ->where('news.id_category',$id)
            ->select('news.id', 'news.title', 'news.isprivate', 'users.login', 'source.source')
            ->get();
        return view('learn3.catNews', ['listNews' => $listNews, 'id' => $id, 'catNewsName' => $catNewsName]);
    }

    public function newsOne($id): View
    {
        $newsOne = DB::select('SELECT inform FROM news WHERE id = :id', ['id' => $id]);
        //dump($newsOne);
        return view('learn3.newsOne', ['newsOne' => $newsOne]);
    }

}
