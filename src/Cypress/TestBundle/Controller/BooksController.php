<?php


namespace Cypress\TestBundle\Controller;

use Cypress\TestBundle\Entity\Book;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Rest\View(serializerGroups={"books"})
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
     * @return \Cypress\TestBundle\Entity\Book
     */
    public function patchAction(Book $book)
    {
        $this->get('patch_manager')->handle($book);
        $this->get('doctrine.orm.entity_manager')->flush();
        return $book;
    }

    /**
     * @Rest\Route("/books")
     */
    public function patchBooksAction()
    {
        $books = $this->get('doctrine.orm.entity_manager')->getRepository(Book::class)->findAll();
        $this->get('patch_manager')->handle($books);
        $this->get('doctrine.orm.entity_manager')->flush();
    }
}
