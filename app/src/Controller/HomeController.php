<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function homepage(): Response
    {
        return new Response("hnunj");
    }

    #[Route('documentation/{slug}', name: 'doc')]
    public function show($slug): Response
    {
        $paragrafs = [
            'ervrevrever',
            'ververv',
            'ervevervev verfef rferf'
        ];

        dump($this );

        return $this->render('home/documentation.html.twig', [
            'content' => sprintf('dupa blada "%s"', $slug),
            'paragrafs' => $paragrafs
        ]);
    }
}