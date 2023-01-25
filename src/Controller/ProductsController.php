<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;

class ProductsController extends AbstractController
{

    use TimestampableEntity;
    
    #[Route('/products', name: 'app_products')]
    public function list(ProductRepository $productRepository): Response
    {
        return $this->render('products/product.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

    #[Route('/product/{id}', name: 'app_product/{id}')]
    public function show(ProductRepository $productRepository, string $id, Request $request, EntityManagerInterface $manager): Response
    {

        $product = $productRepository->find($id);
        $review = new Review;
        $reviewForm = $this->createForm(ReviewType::class, $review);
        $reviewForm->handleRequest($request);


        if($reviewForm->isSubmitted() && $reviewForm->isValid()){
            // $review->setCreatedAt(new DateTime());
            $review->setProduct($product);
            $manager->persist($review);
            $manager->flush();
            $this->addFlash('message', 'Votre com a été envoyé');
            return $this->redirectToRoute('app_products');

        }
        return $this->render('products/show.html.twig', [
            'product' => $productRepository->findAll($id),
            'reviewForm' => $reviewForm->createView()
        ]);

    }
}
