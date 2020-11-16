<?php

namespace App\Controller;

use App\Handler\ListHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class WelcomeController extends AbstractController
{
    public function __invoke(ListHandler $listing): Response
    {
        return $this->render('index.html.twig', [
            'name' => $this->getParameter('username'),
            'liste' => $listing->list()
        ]);
    }
}
