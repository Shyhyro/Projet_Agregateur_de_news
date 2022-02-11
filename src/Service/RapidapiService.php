<?php

namespace App\Service;

class RapidapiService
{
    public function RapidapiArticles() : array
    {
        $json = 'https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/search/TrendingNewsAPI?pageNumber=1&pageSize=10&withThumbnails=false&location=us&rapidapi-key=8170f34745mshcd2eba5bd006917p1ba25bjsn95071e084059';
        $data = file_get_contents($json);
        $obj = json_decode($data);
        $array = [];

        foreach ($obj->value as $article){
            $array[] = [
                "title" => $article->title,
                "url"=>$article->url,
                "description"=>$article->description,
                "datePublished"=>$article->datePublished,
            ];
        }

        return $array;
    }
}