<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/products', name: 'admin_')]
class ProductController extends AbstractController
{
    #[Route('/', name: 'index_products')]
    public function index(): Response
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        
        return $this->render('admin/product/index.html.twig', compact('products'));
    }

    #[Route('/create', name: 'create_products')]
    public function create() 
    {
        
    }

    #[Route('/store', name: 'store_products')]
    public function store() 
    {
        $product = new Product();   
        $product->setName('Produto Teste');
        $product->setDescription('Descrição');
        $product->setBody('Info Produto');
        $product->setPrice(3990);
        $product->setSlug('product-test');
        $product->setCreatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));
        $product->setUpdateAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($product);
        $manager->flush();
    }

    #[Route('/edit/{product}', name: 'edit_products')]
    public function edit($product) 
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find(2);
    }

    #[Route('/update/{product}', name: 'update_products', methods:"POST")]
    public function update($product) 
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find(2);

        $product->setDescription('Descrição Main');
        
        $product->setUpdateAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

        $manager = $this->getDoctrine()->getManager();
        $manager->flush();
    }

    #[Route('/remove/{product}', name: 'remove_products', methods:"POST")]
    public function remove($product) 
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find(4);

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($product);
        $manager->flush();
    }
}
