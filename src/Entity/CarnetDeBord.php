<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarnetDeBordRepository")
 */
class CarnetDeBord
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ProjetProfessionnel", inversedBy="carnet_de_bord_id", cascade={"persist", "remove"})
     */
    private $projet_professionnel_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjetProfessionnelId(): ?ProjetProfessionnel
    {
        return $this->projet_professionnel_id;
    }

    public function setProjetProfessionnelId(?ProjetProfessionnel $projet_professionnel_id): self
    {
        $this->projet_professionnel_id = $projet_professionnel_id;

        return $this;
    }
}
