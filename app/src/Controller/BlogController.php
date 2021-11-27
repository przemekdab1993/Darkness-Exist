<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog')]
    public function index(): Response
    {
        return $this->render('blog/list.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/blog/show/{docId}', name: 'blog_show')]
    public function show($docId): Response
    {
        return $this->render('blog/show.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
}
