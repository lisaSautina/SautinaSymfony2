<?php

namespace App\Controller;


use App\Service\ArticleServiceInterface;
use http\Client\Curl\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{
    private const RECENT_ARTICLE_COUNT_ON_HOME = 5;
    #[Route('/', name: 'homepage')]
    public function index(ArticleServiceInterface $articleService): Response
    {

        return $this->render('home/index.html.twig', [
            'articles' => $articleService->getRecentArticles(self::RECENT_ARTICLE_COUNT_ON_HOME),
        ]);
    }
}
