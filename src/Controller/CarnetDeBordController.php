<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\CarnetDeBord;
use App\Entity\EtapeDAvancement;

class CarnetDeBordController extends AbstractController
{
    /**
     * @Route("/carnetdebord/{id}", name="carnet_de_bord")
     */
    public function index(CarnetDeBord $carnetDeBord)
    {
        $repo = $this->getDoctrine()->getRepository(EtapeDAvancement::class);
        $result = $repo->findBy(array('carnet_de_bord_id' => $carnetDeBord->getId()));
        return $this->render('carnet_de_bord/index.html.twig', [
            'cdb' => $carnetDeBord,
            'result' => $result
        ]);
    }
}
