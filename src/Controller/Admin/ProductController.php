<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        return $this->render('admin/product/create.html.twig');
    }

    #[Route('/store', name: 'store_products')]
    public function store(Request $request) 
    {
        try {
            
            $data = $request->request->all();
        
            $product = new Product();   
            $product->setName($data["name"]);
            $product->setDescription($data["description"]);
            $product->setBody($data["body"]);
            $product->setPrice($data["price"]);
            $product->setSlug($data["slug"]);
            $product->setCreatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));
            $product->setUpdateAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($product);
            $manager->flush();

            return $this->redirectToRoute('admin_index_products');

        } catch (\Exception $th) {
            die($th->getMessage());
        }
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
