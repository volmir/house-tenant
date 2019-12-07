<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\Access;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(Access $access)
    {      
        $accessData = $access->get();
        
        $response = new JsonResponse();
        $response->setData($accessData);
        $response->send();
    }
}
