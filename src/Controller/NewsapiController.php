<?php

namespace App\Controller;

use jcobhams\NewsApi\NewsApi;
use NewsApiTest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/newsapi', name: 'articles_')]
class NewsapiController extends AbstractController
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

        $response2 = $obj->articles;

        $newsapijson = json_decode(json_encode('https://newsapi.org/v2/top-headlines?q=general&apiKey=e4497f15dc6349dc91006f4a337f9bff'));

        $newsapi = json_decode($newsapijson);

        $response = $newsapi->status;

        return new Response($response2);
    }
}