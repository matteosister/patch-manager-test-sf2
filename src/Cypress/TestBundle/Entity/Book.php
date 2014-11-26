<?php

namespace Cypress\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Finite\StatefulInterface;
use PatchManager\Patchable;

/**
 * @ORM\Entity
 */
class Book implements Patchable, StatefulInterface
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
    private $title;

    /**
     * @var Author
     *
     * @ORM\ManyToOne(targetEntity="Cypress\TestBundle\Entity\Author", inversedBy="books")
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="state")
     */
    private $finiteState;

    public function __construct()
    {
        $this->finiteState = 'in_stock';
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param Author $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the object state
     *
     * @return string
     */
    public function getFiniteState()
    {
        return $this->finiteState;
    }

    /**
     * Sets the object state
     *
     * @param string $state
     */
    public function setFiniteState($state)
    {
        $this->finiteState = $state;
    }
}