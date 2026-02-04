<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(): Response
    {
     $page = ["title" => "NovaTech - Contact", "subject" => "Contact Us"];
     $contact = ["email" => "twig@twig.twig", "phone" => "0102030405", "adress" => "1 Twig Street, Twig City"];
        return $this->render('contact/index.html.twig', [
            "page" => $page,
            "contact" => $contact,
        ]);
    }
}
