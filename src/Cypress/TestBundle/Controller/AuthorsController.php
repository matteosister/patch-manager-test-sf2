<?php


namespace Cypress\TestBundle\Controller;

use Cypress\TestBundle\Entity\Author;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\View;

/**
 * @View(serializerGroups={"authors"})
 */
class AuthorsController extends FOSRestController implements ClassResourceInterface
{
    public function cgetAction()
    {
        $authors = $this->get('doctrine.orm.entity_manager')->getRepository(Author::class)->findAll();
        return $authors;
    }
}
