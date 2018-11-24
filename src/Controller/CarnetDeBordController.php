<?php

namespace App\Controller;

use App\Repository\EtapeDAvancementRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\CarnetDeBord;
use App\Entity\EtapeDAvancement;
use App\Form\EtapeDAvancementType;

class CarnetDeBordController extends AbstractController
{
    /**
     * @Route("/carnetdebord/{id}", name="carnet_de_bord")
     */
    public function homecreate(CarnetDeBord $carnetDeBord, EntityManagerInterface $entityManager, Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(EtapeDAvancement::class);
        $result = $repo->findBy(
            array('carnet_de_bord' => $carnetDeBord->getId()),
            array('date_creation' => 'DESC')
        );
        $newetape = new EtapeDAvancement();
        $newetape->setCarnetDeBord($carnetDeBord);
        $form = $this->createForm(EtapeDAvancementType::class, $newetape);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('carnet_de_bord', array(
                'id' => $carnetDeBord->getId()));
        }
        return $this->render('carnet_de_bord/index.html.twig', [
            'cdb' => $carnetDeBord,
            'result' => $result,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/carnetdebord/etape/{idetape}", name="etape_edit", methods={"GET", "POST"})
     * @Entity("etape", expr="repository.find(idetape)")
     */
    public function edit(EtapeDAvancement $etape, Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(EtapeDAvancementType::class, $etape);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager->flush();
            return $this->redirectToRoute("carnet_de_bord", array('id' => $etape->getCarnetDeBord()->getId()));
        }
        return $this->render('carnet_de_bord/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/carnetdebord/etape/{idetape}", name="etape_delete", methods={"DELETE"})
     * @Entity("etape", expr="repository.find(idetape)")
     */
    public function delete($id, EtapeDAvancement $etape, EntityManagerInterface $em, Request $request)
    {
        if ($this->isCsrfTokenValid('delete'.$etape->getId(), $request->get('_token')))
        $em->remove($etape);
        $em->flush();
        return $this->redirectToRoute('carnet_de_bord', array('id' => $etape->getCarnetDeBord()->getId()));
    }
}
