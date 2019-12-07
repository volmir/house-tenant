<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FloorRepository")
 */
class Floor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Suite", mappedBy="floor", orphanRemoval=true)
     */
    private $suites;

    public function __construct()
    {
        $this->suites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection|Suite[]
     */
    public function getSuites(): Collection
    {
        return $this->suites;
    }

    public function addSuite(Suite $suite): self
    {
        if (!$this->suites->contains($suite)) {
            $this->suites[] = $suite;
            $suite->setFloor($this);
        }

        return $this;
    }

    public function removeSuite(Suite $suite): self
    {
        if ($this->suites->contains($suite)) {
            $this->suites->removeElement($suite);
            // set the owning side to null (unless already changed)
            if ($suite->getFloor() === $this) {
                $suite->setFloor(null);
            }
        }

        return $this;
    }
}
