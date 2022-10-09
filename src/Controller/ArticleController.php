<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    
    /**
     * @Route("/Article/{articleCategory}/{articleName}", name="article_name")
     */
    public function articleShow($articleName, $articleCategory, ArticleRepository $articleRepository)
    {
        $articleToShow = $articleRepository->findOne($articleName);

        $campagnelist = $articleRepository->findAllByType(1);
        $racelist = $articleRepository->findAllByType(2);
        $classelist = $articleRepository->findAllByType(3);
        $legendlist = $articleRepository->findAllByType(4);
        $actualitylist = $articleRepository->findAllByType(5);
        $divinitylist = $articleRepository->findAllByType(6);

        return $this->render('article/article.html.twig', [
            'controller_name' => 'ArticleController',
            'articleToShow' => $articleToShow,
            'campagnelist' => $campagnelist,
            'racelist' => $racelist,
            'classelist' => $classelist,
            'legendlist' => $legendlist,
            'actualitylist' => $actualitylist,
            'divinitylist' => $divinitylist,
        ]);
    }
}