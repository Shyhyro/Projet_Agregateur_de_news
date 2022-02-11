<?php

namespace App\Service;


class NewsapiService
{
    public function NewsapiArticles() : array
    {
        $json = 'https://newsapi.org/v2/top-headlines?q=entertainment&apiKey=e4497f15dc6349dc91006f4a337f9bff';
        $data = file_get_contents($json);
        $obj = json_decode($data);
        $array = [];

        foreach ($obj->articles as $article){
            $array[] = [
                "title" => $article->title,
                "url"=>$article->url,
                "description"=>$article->description,
                "publishedAt"=>$article->publishedAt,
                "urlToImage"=>$article->urlToImage,
                "author"=>$article->author,
            ];
        }

        return $array;
    }
}