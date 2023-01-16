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
        return $this->render('products/product.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

    #[Route('/product/{id}', name: 'app_products')]
    public function show(ProductRepository $productRepository, string $id): Response
    {
        return $this->render('products/showProduct.html.twig', [
            'product' => $productRepository->findAll($id),
        ]);
    }
}
