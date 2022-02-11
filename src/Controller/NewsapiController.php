<?php

namespace App\Controller;

use App\Service\CurrentsapiService;
use App\Service\NewsapiService;
use App\Service\RapidapiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsapiController extends AbstractController
{
    /**
     * List available articles.
     * @return Response
     * @throws \jcobhams\NewsApi\NewsApiException
     */
    #[Route('/', name: 'articles')]
    public function listResponse() :Response
    {
        $newsapi = (new NewsapiService())->NewsapiArticles();
        $rapidapi = (new RapidapiService())->RapidapiArticles();
        $currentsapi = (new CurrentsapiService())->CurrentsapiArticles();

        $view = $this->renderView("article/list.html.twig", ["newsapi" => $newsapi, "rapidapi"=>$rapidapi, "currentsapi"=>$currentsapi]);

        return (new Response())->setContent($view);
    }

    /**
     * List od news Api articles
     * @return Response
     */
    #[Route("/newsapi", name: "newsapi_articles")]
    public function newsapiResponse() : Response
    {
        $newsapi = (new NewsapiService())->NewsapiArticles();

        $view = $this->renderView("article/newsapi.html.twig", ['newsapi'=>$newsapi]);

        return (new Response())->setContent($view);
    }

}