<?php

namespace App\Service;

class CurrentsapiService
{
    public function CurrentsapiArticles() : array
    {
        $json = 'https://api.currentsapi.services/v1/latest-news?language=fr&apiKey=vJMk8hr4ks3L5az-x0V5Z-5WsGEk_5RaPnXCIc2JyRN4kQBA';
        $data = file_get_contents($json);
        $obj = json_decode($data);
        $array = [];

        foreach ($obj->news as $article){
            $array[] = [
                "title" => $article->title,
                "author"=>$article->author,
                "url"=>$article->url,
                "image"=>$article->image,
                "description"=>$article->description,
                "published"=>$article->published,
            ];
        }

        return $array;
    }
}