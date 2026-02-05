<?php

namespace App\Controller;

use App\Entity\Service;
use App\Form\ServiceType;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServicesController extends AbstractController
{
    // FOAD 04-02 
    // #[Route('/services', name: 'services')]
    // public function index(): Response
    // {
    //     $page = ["title" => "NovaTech - Services", "subject" => "Our Services"];
    //     $services = ["Web Development","Technical Consulting","Code Audit","Application Maintenance"];
    //     return $this->render('services/index.html.twig', [
    //         'page' => $page,
    //         'services' => $services,
    //     ]);
    // }

    // FOAD 06-02
    #[Route('/services', name: 'services')]
    public function index(ServiceRepository $servicesRepository): Response
    {
        $services = $servicesRepository->findAll();
        // dd($services);
        return $this->render('services/index.html.twig', [
            'services' => $services,
        ]);
    }

    //CEREATE
    #[Route('/services/new', name: 'new_event')]
    public function new(Request $request, EntityManagerInterface $em)
    {
        $services = new Service();
        $form = $this->createForm(ServiceType::class, $services);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $services->setCreatedAt(new \DateTimeImmutable());
            $em->persist($services);
            $em->flush();
            return $this->redirectToRoute("services");
        }
        return $this->render("services/new.html.twig", [
            "formulaire" => $form,
        ]);
    }

    //READ
    #[Route('/services/{id}', name: 'show_service')]
    public function show(Service $services)
    {
        return $this->render("services/show.html.twig", [
            "services" => $services,
        ]);
    }

    //UPDATE
    #[Route('/services/edit/{id}', name: 'edit_service')]
    public function edit(Request $request, EntityManagerInterface $em, Service $services)
    {

        $form = $this->createForm(ServiceType::class, $services);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $services->setCreatedAt(new \DateTimeImmutable());
            $em->persist($services);
            $em->flush();
            return $this->redirectToRoute("services");
        }
        return $this->render("services/edit.html.twig", [
            "formulaire" => $form,
            "services" => $services,
        ]);
    }

    //DELETE
    #[Route('/services/{id}', name: 'delete_service', methods: ["POST"])]
    public function delete(Request $request,Service $service, EntityManagerInterface $em): Response
    {
         if ($this->isCsrfTokenValid('delete'.$service->getId(), $request->request->get('_token'))) {
        $em->remove($service);
        $em->flush();
         }
        return $this->redirectToRoute('services');
    }
}
