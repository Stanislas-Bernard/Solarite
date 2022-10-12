<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    
    /**
     * @Route("/Article/{articleCategory}/{articleName}", name="article_name")
     */
    public function articleShow($articleName, $articleCategory, ArticleRepository $articleRepository, CategoryRepository $categoryRepository)
    {
        // définit l'article à afficher
        $articleToShow = $articleRepository->findOne($articleName);

        // définit la base de l'Id de l'article suivant et précédent
        $articleIdNext = $articleToShow[0]->getId()+1;
        $articleIdPrevious = $articleToShow[0]->getId()-1;

        // récupère le nombre d'article en fonction de la categorie
        $categoryId = $categoryRepository->findAllByName($articleCategory);
        $articles = $articleRepository->findAllByType($categoryId);
        $articleNumber = count($articles);

        // condition pour ne pas se retrouver avec l'article suivant introuvable
        if($articleIdNext > $articleNumber) {
            $articleIdNext = 1;
        }

        // condition pour ne pas se retrouver avec l'article précédent introuvable
        if($articleIdPrevious <= 0) {
            $articleIdPrevious = $articleNumber;
        }

        // obtient les articles précédent et suivant en fonction de l'id
        $articleNext = $articleRepository->findById($articleIdNext);
        $articlePrevious = $articleRepository->findById($articleIdPrevious);


        // necessaire a l'affichage des article dans le menu menu (surement mieux en factorisant ?)
        $campagnelist = $articleRepository->findAllByType(1);
        $racelist = $articleRepository->findAllByType(2);
        $classelist = $articleRepository->findAllByType(3);
        $legendlist = $articleRepository->findAllByType(4);
        $divinitylist = $articleRepository->findAllByType(6);

        return $this->render('article/article.html.twig', [
            'controller_name' => 'ArticleController',
            'articleToShow' => $articleToShow,
            'articleNext' => $articleNext,
            'articlePrevious' => $articlePrevious,
            'campagnelist' => $campagnelist,
            'racelist' => $racelist,
            'classelist' => $classelist,
            'legendlist' => $legendlist,
            'divinitylist' => $divinitylist,
        ]);
    }
}