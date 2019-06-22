<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    private $categoryRepo;

    public function __construct(CategoryRepository $repo)
    {
        $this->categoryRepo = $repo;
    }



    /**
     * @Route("/api/category",  methods={"GET"})
     */
    public function getAllCategory()
    {
        $categories = $this->categoryRepo->findAll();

        return new JsonResponse([
            'categories' => $categories,
        ], 200);
    }

    /**
     * @Route("/api/category/{id}", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function getOneCategory($id): JsonResponse
    {
        $category = $this->categoryRepo->find($id);
        return new JsonResponse([
            'id' => $category->getId(),
            'title' => $category->getTitle(),
            'abscisse' => $category->getAbscisse(),
            'ordonnee' => $category->getOrdonnee(),
        ], 200);
    }

    /**
     * @Route("/api/category/{id}/items", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function getAllItemsByCategory($id): JsonResponse
    {
        $category = $this->categoryRepo->find($id);
        $serializer = $this->get('serializer');

        return new JsonResponse([
            'id' => $category->getId(),
            'title' => $category->getTitle(),
            'abscisse' => $category->getAbscisse(),
            'ordonnee' => $category->getOrdonnee(),
            'items' => $serializer->normalize($category->getItems())
        ], 200);
    }

}
