<?php

namespace App\Controller;

use App\Form\CarType;
use App\Entity\Voiture;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarController extends AbstractController
{
    /**
     * @Route("/car", name="car")
     */
    public function index(): Response
    {
        $car = new Voiture();
        $form = $this->createForm(CarType::class, $car);

        return $this->render('car/index.html.twig',
            ['form' => $form->createView()]
        );
    }
}
