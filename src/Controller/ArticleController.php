<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    
    /**
     * @Route("/Article/{name}/{title}", name="article_name")
     */
    public function articleShow(Article $article, Category $category, ArticleRepository $articleRepository, CategoryRepository $categoryRepository)
    {
        // récupère les articles en fonction de la categorie en cours
        $categoryArticles = $articleRepository->findAllByType($category->getId());

        // fait correspondre les index de l'article en cours et de l'article du tableau de categorie
        $i = -1;
        foreach ($categoryArticles as $categoryArticle) {
            $i++;
            if ($categoryArticle->getId() === $article->getId()){
                $articleNumber = count($categoryArticles);
                // condition pour ne pas se retrouver avec l'article suivant introuvable
                if($i >= $articleNumber-1) {
                    // recupere l'article suivant et précédent dans le tebleau d'article de la categorie
                    $articleNext = $categoryArticles[0];
                    $articlePrevious = $categoryArticles[$i-1];
                }
                // condition pour ne pas se retrouver avec l'article précédent introuvable
                elseif($i <= 0) {
                    // recupere l'article suivant et précédent dans le tebleau d'article de la categorie
                    $articleNext = $categoryArticles[$i+1];
                    $articlePrevious = $categoryArticles[$articleNumber-1];
                }
                else {
                    $articleNext = $categoryArticles[$i+1];
                    $articlePrevious = $categoryArticles[$i-1];
                }
            }
        }


        // necessaire a l'affichage des article dans le menu menu (surement mieux en factorisant ?)
        $campagnelist = $articleRepository->findAllByType(1);
        $racelist = $articleRepository->findAllByType(2);
        $classelist = $articleRepository->findAllByType(3);
        $legendlist = $articleRepository->findAllByType(4);
        $divinitylist = $articleRepository->findAllByType(6);

        return $this->render('article/article.html.twig', [
            'controller_name' => 'ArticleController',
            'article' => $article,
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