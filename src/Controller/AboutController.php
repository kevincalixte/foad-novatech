<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AboutController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function index(): Response
    {
        $page = ["title" => "NovaTech - About", "subject" => "About Us"];
        $presentation = "Novatech is a dynamic web agency specializing in innovative digital solutions. Our team of passionate experts is dedicated to helping businesses grow their online presence through creative website design, robust web development, and effective digital marketing strategies. We combine cutting-edge technology with a client-focused approach to deliver tailor-made solutions that drive results. At Novatech, we are committed to excellence, reliability, and building long-term partnerships with our clients to ensure their success in the digital world.";
        $year = date("Y");
        return $this->render('about/index.html.twig', [
            'page' => $page,
            'presentation' => $presentation,
            'year' => $year,
        ]);
    }
}
