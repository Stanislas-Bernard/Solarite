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
        $campagnelist = $articleRepository->findAllByType(1);
        $racelist = $articleRepository->findAllByType(2);
        $classelist = $articleRepository->findAllByType(3);
        $legendlist = $articleRepository->findAllByType(4);
        $divinitylist = $articleRepository->findAllByType(6);
        
        // dd($racelist);

        return $this->render('main/home.html.twig', [
            'controller_name' => 'MainController',
            'campagnelist' => $campagnelist,
            'racelist' => $racelist,
            'classelist' => $classelist,
            'legendlist' => $legendlist,
            'divinitylist' => $divinitylist,
        ]);
    }
    
}
