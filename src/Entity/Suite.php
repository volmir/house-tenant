<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SuiteRepository")
 */
class Suite
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
    private $suiteNumber;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Floor", inversedBy="suites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $floor;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SuiteUser", mappedBy="suite", orphanRemoval=true)
     */
    private $suiteUsers;

    public function __construct()
    {
        $this->suiteUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuiteNumber(): ?string
    {
        return $this->suiteNumber;
    }

    public function setSuiteNumber(string $suiteNumber): self
    {
        $this->suiteNumber = $suiteNumber;

        return $this;
    }

    public function getFloor(): ?Floor
    {
        return $this->floor;
    }

    public function setFloor(?Floor $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    /**
     * @return Collection|SuiteUser[]
     */
    public function getSuiteUsers(): Collection
    {
        return $this->suiteUsers;
    }

    public function addSuiteUser(SuiteUser $suiteUser): self
    {
        if (!$this->suiteUsers->contains($suiteUser)) {
            $this->suiteUsers[] = $suiteUser;
            $suiteUser->setSuite($this);
        }

        return $this;
    }

    public function removeSuiteUser(SuiteUser $suiteUser): self
    {
        if ($this->suiteUsers->contains($suiteUser)) {
            $this->suiteUsers->removeElement($suiteUser);
            // set the owning side to null (unless already changed)
            if ($suiteUser->getSuite() === $this) {
                $suiteUser->setSuite(null);
            }
        }

        return $this;
    }

}
