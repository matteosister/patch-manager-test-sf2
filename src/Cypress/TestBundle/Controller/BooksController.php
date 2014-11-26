<?php


namespace Cypress\TestBundle\Controller;

use Cypress\TestBundle\Entity\Book;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @View(serializerGroups={"books"})
 */
class BooksController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @return array|\Cypress\TestBundle\Entity\Book[]
     */
    public function cgetAction()
    {
        $books = $this->get('doctrine.orm.entity_manager')->getRepository(Book::class)->findAll();
        return $books;
    }

    /**
     * @ParamConverter(class="Cypress\TestBundle\Entity\Book", name="book")
     * @param Book $book
     * @return \Cypress\TestBundle\Entity\Book
     */
    public function getAction(Book $book)
    {
        return $book;
    }

    /**
     * @ParamConverter(class="Cypress\TestBundle\Entity\Book", name="book")
     * @param Book $book
     */
    public function patchAction(Book $book)
    {
        $this->get('pm')->handle($book);
    }
}
