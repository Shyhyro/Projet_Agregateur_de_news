<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/newsapi', name: 'articles_')]
class NewsapiController
{
    /**
     * List available articles.
     * NewsAPI e4497f15dc6349dc91006f4a337f9bff
     * @return Response
     * @throws \jcobhams\NewsApi\NewsApiException
     */
    #[Route('/', name: 'list')]
    public function listResponse() :Response
    {
        $json = 'https://newsapi.org/v2/top-headlines?q=general&apiKey=e4497f15dc6349dc91006f4a337f9bff';
        $data = file_get_contents($json);
        $obj = json_decode($data);

        $response2 = $obj->articles[0]->author;


        return new Response($response2);
    }
}