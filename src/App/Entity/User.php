<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Cart;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
     /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", unique=true)
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $username;

    /**
    * @ORM\Column(type="string", nullable=false)
    */
    protected $password;

   /**
    * @ORM\Column(type="string", nullable=false)
    */
    protected $role;

    /**
     * @ORM\OneToMany(targetEntity="Cart", mappedBy="user")
     */
    protected $cart;

    // public function __construct()
    // {
    //     $this->cart = new ArrayCollection();
    // }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUserName(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

     /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    // /**
    //  * @return Collection|Cart[]
    //  */
    // public function getCart(): Cart
    // {
    //     return $this->cart;
    // }

}