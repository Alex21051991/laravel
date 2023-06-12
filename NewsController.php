<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

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


}
