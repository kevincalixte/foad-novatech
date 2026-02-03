<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $page = ["title" => "NovaTech - Home", "message" => "Welcome to NovaTech's homepage!", "name" => "NovaTech", "slogan" => "Innovation within your reach!",];
;        return $this->render('home/index.html.twig', [
            'page' => $page,
        ]);
    }
}
