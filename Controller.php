<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function getNews(int $id = null): array
    {
        $news = [];
        if ($id === null) {
          for ($i=0; $i < 5; $i++) {
              $news[] = [
                  'id' => $i,
                  'title' => fake()->jobTitle(),
                  'author' => fake()->userName(),
                  'status' => 'draft',
                  'description' => fake()->text(100),
                  'created_at' => now(),
              ];
          }
          return $news;
        }

        return [
            'id' => $id,
            'title' => fake()->jobTitle(),
            'author' => fake()->userName(),
            'status' => 'draft',
            'description' => fake()->text(100),
            'created_at' => now(),
        ];
    }

    /*protected function getCategory(): array
    {
        $category = [];
            for ($i=1; $i < 6; $i++) {
                $category[] = [
                    'idCat' => $i,
                    'category' => fake()-> jobTitle(),
                ];
            }
        return $category;
    }

    protected function getCatNews(int $idCat): array
    {
        $catNews = [];
        for ($i=1; $i < 5; $i++) {
            $catNews[] = [
                'id' => $i,
                'idCat' => $idCat,
                'catNews' => fake()-> text(100),
            ];
        }
        //dd($catNews);
        return $catNews;
    }

    protected function getListNews(): string
    {
        $listNews = fake()-> text(400);
        return $listNews;
    }*/

}
