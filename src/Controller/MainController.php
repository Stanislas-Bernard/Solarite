<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(ArticleRepository $articleRepository): Response
    {
        // récupère tout les articles présent dans la catégorie accueil
        $homelist = $articleRepository->findAllByType(8);

        // trouve l'article le plus récent
        $latestHome = 0;
        foreach ($homelist as $homeArticle) {
                $date = strtotime($homeArticle->getUpdatedAt()->format('Y-m-d H:i:s'));
            if ($date >= $latestHome) {
                $latestHome = $date;
                $mainArticle = $homeArticle;
            }
        }

        // récupère tout les articles présent dans la catégorie actualité
        $actualitylist = $articleRepository->findAllByType(5);

        // trouve l'article le plus récent
        $latestActuality = 0;
        foreach ($actualitylist as $actualityArticle) {
                $date = strtotime($actualityArticle->getUpdatedAt()->format('Y-m-d H:i:s'));
            if ($date >= $latestActuality) {
                $latestActuality = $date;
                $lastArticle = $actualityArticle;
            }
        }

        // récupère tout les articles présent dans la catégorie boutique
        $shoplist = $articleRepository->findAllByType(7);

        // trouve l'article le plus récent
        $latestItem = 0;
        foreach ($shoplist as $shopArticle) {
                $date = strtotime($shopArticle->getUpdatedAt()->format('Y-m-d H:i:s'));
            if ($date >= $latestItem) {
                $latestItem = $date;
                $itemArticle = $shopArticle;
            }
        }
        

        $campagnelist = $articleRepository->findAllByType(1);
        $racelist = $articleRepository->findAllByType(2);
        $classelist = $articleRepository->findAllByType(3);
        $legendlist = $articleRepository->findAllByType(4);
        $divinitylist = $articleRepository->findAllByType(6);

        return $this->render('main/home.html.twig', [
            'controller_name' => 'MainController',
            'mainArticle' => $mainArticle,
            'lastArticle' => $lastArticle,
            'itemArticle' => $itemArticle,
            'campagnelist' => $campagnelist,
            'racelist' => $racelist,
            'classelist' => $classelist,
            'legendlist' => $legendlist,
            'divinitylist' => $divinitylist,
        ]);
    }
    
}
