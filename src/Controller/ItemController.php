<?php

namespace App\Controller;

use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{

    private $itemRepo;

    public function __construct(ItemRepository $repo)
    {
        $this->itemRepo = $repo;
    }

    /**
     * @Route("/category/item", name="item")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ItemController.php',
        ]);
    }

    /**
     * @Route("/api/item",  methods={"GET"})
     */
    public
    function getAllItems()
    {
        $items = $this->itemRepo->findAll();

        return new JsonResponse([
            'items' => $items,
        ], 200);
    }
}
