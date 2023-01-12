<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/categories', name: 'app_categories')]
    //category -> categories
    public function list(CategoryRepository $categoryRepository): Response
    {
        // Affiche toute les catégories présente dans la bdd EX : laptop, headphone, etc...
        return $this->render('category/list.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/categories/{id}', name: 'app_category')]
    public function show(CategoryRepository $categoryRepository, string $id): Response
    {
        // Affiche la catégorie correspondant à l'id passé en paramètre
        return $this->render('category/show.html.twig', [
            'category' => $categoryRepository->find($id),
        ]);
    }
}
