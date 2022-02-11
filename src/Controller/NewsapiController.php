<?php

namespace App\Controller;

use App\Service\NewsapiService;
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
        $response = (new NewsapiService())->NewsapiArticles();
        $view = $this->renderView("article/list.html.twig", ["articles" => $response]);

        return (new Response())->setContent($view);
    }
}