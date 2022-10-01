<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function homepage(Environment $environment): Response
    {
//        $html = $environment->render('home/homepage.html.twig');
//        return new Response($html);

        return $this->render('home/homepage.html.twig' , []);
    }

}