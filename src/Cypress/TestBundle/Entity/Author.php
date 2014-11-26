<?php

namespace Cypress\TestBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Author
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column
     */
    private $lastName;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Cypress\TestBundle\Entity\Book", mappedBy="author")
     */
    private $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
}
