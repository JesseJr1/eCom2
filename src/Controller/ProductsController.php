<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route('/products', name: 'app_products')]
    public function list(ProductRepository $productRepository): Response
    {
        return $this->render('products/productlist.html.twig', [
            'producs' => $productRepository->findAll(),
        ]);
    }

    #[Route('/products', name: 'app_products')]
    public function show(ProductRepository $productRepository): Response
    {
        return $this->render('product/showProduct.html.twig', [
            'product' => $productRepository->findAll(),
        ]);
    }
}
