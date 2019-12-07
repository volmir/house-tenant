<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Status", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SuiteUser", mappedBy="user", orphanRemoval=true)
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

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
            $suiteUser->setUser($this);
        }

        return $this;
    }

    public function removeSuiteUser(SuiteUser $suiteUser): self
    {
        if ($this->suiteUsers->contains($suiteUser)) {
            $this->suiteUsers->removeElement($suiteUser);
            // set the owning side to null (unless already changed)
            if ($suiteUser->getUser() === $this) {
                $suiteUser->setUser(null);
            }
        }

        return $this;
    }

}
