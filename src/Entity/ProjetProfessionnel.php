<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjetProfessionnelRepository")
 */
class ProjetProfessionnel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resume;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\CarnetDeBord", mappedBy="projet_professionnel_id", cascade={"persist", "remove"})
     */
    private $carnet_de_bord_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCarnetDeBordId(): ?CarnetDeBord
    {
        return $this->carnet_de_bord_id;
    }

    public function setCarnetDeBordId(?CarnetDeBord $carnet_de_bord_id): self
    {
        $this->carnet_de_bord_id = $carnet_de_bord_id;

        // set (or unset) the owning side of the relation if necessary
        $newProjet_professionnel_id = $carnet_de_bord_id === null ? null : $this;
        if ($newProjet_professionnel_id !== $carnet_de_bord_id->getProjetProfessionnelId()) {
            $carnet_de_bord_id->setProjetProfessionnelId($newProjet_professionnel_id);
        }

        return $this;
    }
}
