<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SuiteUserRepository")
 */
class SuiteUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Suite", inversedBy="suiteUsers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $suite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="suiteUsers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuite(): ?Suite
    {
        return $this->suite;
    }

    public function setSuite(?Suite $suite): self
    {
        $this->suite = $suite;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
