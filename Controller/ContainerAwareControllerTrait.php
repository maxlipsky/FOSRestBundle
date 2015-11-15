<?php

/*
 * This file is part of the FOSRestBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\RestBundle\Controller;

use FOS\RestBundle\View\ViewHandlerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Trait for Controllers using the View functionality of FOSRestBundle.
 *
 * @author Lukas Kahwe Smith <smith@pooteeweet.org>
 */
trait ContainerAwareControllerTrait
{
    use ControllerTrait;

    /**
     * Get the ViewHandler.
     *
     * @return ViewHandlerInterface
     */
    protected function getViewHandler()
    {
        if (!$this->viewhandler instanceof ViewHandlerInterface) {
            $this->viewhandler = $this->getContainer()->get('fos_rest.view_handler');
        }

        return $this->viewhandler;
    }

    /**
     * Gets the Container associated with this Controller.
     *
     * @return ContainerInterface
     */
    abstract protected function getContainer();
}
