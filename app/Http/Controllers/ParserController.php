<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Parser;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\ParserService;
use App\Http\Requests\Parser\Store;

class ParserController extends Controller
{

    public function index(\App\Services\Contracts\Parser $parser): View
    {
        $url = "https://news.rambler.ru/rss/tech/";
        $arrParserNews = $parser->setLink($url)->saveParseData();
        $arrParserNews = array_shift($arrParserNews);

        //@dd($arrParserNews->id);
        return view('news.parser.index', [
            'parser' => $arrParserNews,
        ]);
    }

    public function edit(Request $request): RedirectResponse
    {
        $parser = $request->only(['title', 'category', 'description', 'author', 'pubDate', 'link']);
        //@dd($parser);
        $parser = Parser::create($parser);
        if ($parser !== false) {
            return redirect()->route('news.parser.index')->with('success', __('parser has been created'));
        }
        return back()->with('error', __('parser has not create'));
    }
}
