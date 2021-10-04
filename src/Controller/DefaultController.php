<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Product;
use App\Entity\User;
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

        $manager = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setFirstName('Usuário')
            ->setLastName('Teste')
            ->setEmail('joyce@gmail.com')
            ->setPassword('123223332')
            ->setCreatedAt(new DateTime('now', new DateTimeZone('America/Sao_Paulo')))
            ->setUpdatedAt(new DateTime('now', new DateTimeZone('America/Sao_Paulo')));

        $manager->persist($user);
        $manager->flush();

        $address = new Address();
        $address->setAddress('Rua Teste')
            ->setNumber(100)
            ->setNeighborhood('Bairro')
            ->setCity('São Borja')
            ->setState('Rio Grande do Sul')
            ->setZipcode('97670-000')
            ->setUser($user);

        $manager->persist($address);
        $manager->flush();

        return $this->render('index.html.twig', compact('name'));
    }

    #[Route('/product/{slug}', name: 'product_single')]
    public function product($slug): Response
    {
        return $this->render('single.html.twig', compact('slug'));
    }

}
