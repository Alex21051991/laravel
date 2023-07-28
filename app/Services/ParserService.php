<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade;
use Illuminate\Support\Facades\Storage;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return array
     */
    public function saveParseData(): array
    {
        $xml = Facade::load($this->link);

        return $xml->parse([
            /*'title' => [
                'uses' => 'channel.title',
            ],
            'link' => [
                'uses' => 'channel.link',
            ],
            'description' => [
                'uses' => 'channel.description',
            ],
            'image' => [
                'uses' => 'channel.image.url',
            ],*/
            //'news' =>
                ['uses' => 'channel.item[title,category,link,author,description,pubDate]'],
        ]);

        // something else


        $explode = explode("/", $this->link);
        $fileName = end($explode);

        Storage::append('parse/' . $fileName . ".txt", json_encode($data));

    }
}
