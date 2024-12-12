<?php

namespace App\Controller;

use App\DTO\ContactDTO;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(HttpFoundationRequest $request): Response
    {
        $data = new ContactDTO();
        $data->name = 'John Doe';
        $data->email = 'john.doe@example.com';
        $data->message = 'Hello, world!';
        $form = $this->createForm(ContactType::class, $data);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($form->getData());
        }
        
        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
