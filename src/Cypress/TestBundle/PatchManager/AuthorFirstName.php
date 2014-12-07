<?php

namespace Cypress\TestBundle\PatchManager;

use Cypress\TestBundle\Entity\Book;
use PatchManager\OperationData;
use PatchManager\PatchOperationHandler;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuthorFirstName implements PatchOperationHandler
{
    /**
     * @param mixed $subject
     * @param OperationData $operationData
     */
    public function handle($subject, OperationData $operationData)
    {
        /** @var Book $subject */
        $subject->getAuthor()->setFirstName($operationData->get('first_name')->get());
    }

    /**
     * the operation name
     *
     * @return string
     */
    public function getName()
    {
        return 'author_first_name';
    }

    /**
     * use the OptionResolver instance to configure the required and optional fields that needs to be passed
     * with the request body. See http://symfony.com/doc/current/components/options_resolver.html to check all
     * possible options
     *
     * @param OptionsResolver $optionsResolver
     */
    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setRequired(['first_name']);
    }
}