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
     * @Route("/api/item",  methods={"GET"})
     */
    public
    function getAllItems()
    {
        $items = $this->itemRepo->findAllSorted();
        $serializer = $this->get('serializer');

        return new JsonResponse([
            'items' => $serializer->normalize($items),
        ], 200);
    }
}
