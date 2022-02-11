<?php

namespace App\Controller;

use App\Service\NewsapiService;
use App\Service\RapidapiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsapiController extends AbstractController
{
    /**
     * List available articles.
     * NewsAPI e4497f15dc6349dc91006f4a337f9bff
     * @return Response
     * @throws \jcobhams\NewsApi\NewsApiException
     */
    #[Route('/', name: 'articles')]
    public function listResponse() :Response
    {
        $newsapi = (new NewsapiService())->NewsapiArticles();
        $rapiseapi = (new RapidapiService())->RapidapiArticles();

        $view = $this->renderView("article/list.html.twig", ["newsapi" => $newsapi, "rapidapi"=>$rapiseapi]);

        return (new Response())->setContent($view);
    }

}