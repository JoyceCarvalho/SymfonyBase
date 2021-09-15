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

        //Inserção
        /*$product = new Product();   
        $product->setName('Produto Teste');
        $product->setDescription('Descrição');
        $product->setBody('Info Produto');
        $product->setPrice(3990);
        $product->setSlug('product-test');
        $product->setCreatedAt(new DateTime('now', new DateTimeZone('America/Sao_Paulo')));
        $product->setUpdateAt(new DateTime('now', new DateTimeZone('America/Sao_Paulo')));

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($product);
        $manager->flush();*/

        // Atualização
        /*$product = $this->getDoctrine()->getRepository(Product::class)->find(2);

        $product->setDescription('Descrição Main');
        
        $product->setUpdateAt(new DateTime('now', new DateTimeZone('America/Sao_Paulo')));

        $manager = $this->getDoctrine()->getManager();
        $manager->flush();*/

        //Remoção
        $product = $this->getDoctrine()->getRepository(Product::class)->find(4);

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($product);
        $manager->flush();

        return $this->render('index.html.twig', compact('name'));
    }

    #[Route('/product/{slug}', name: 'product_single')]
    public function product($slug): Response
    {
        return $this->render('single.html.twig', compact('slug'));
    }

}
