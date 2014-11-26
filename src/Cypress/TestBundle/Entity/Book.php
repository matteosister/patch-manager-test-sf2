<?php

namespace Cypress\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PatchManager\Patchable;

/**
 * @ORM\Entity
 */
class Book implements Patchable
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
}