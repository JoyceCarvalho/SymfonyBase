<?php

namespace App\Controller;

use App\Entity\Product;
use DateTime;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'default')]
    public function index(): Response
    {
        $name = 'Joyce Carvalho';

        return $this->render('index.html.twig', compact('name'));
    }

    #[Route('/product/{slug}', name: 'product_single')]
    public function product($slug): Response
    {
        return $this->render('single.html.twig', compact('slug'));
    }

}
