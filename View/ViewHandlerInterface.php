<?php

/*
 * This file is part of the FOSRestBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\RestBundle\View;

use Symfony\Component\HttpFoundation\Response,
    Symfony\Component\HttpFoundation\Request;

/**
 * ViewInterface
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 * @author Lukas K. Smith <smith@pooteeweet.org>
 */
interface ViewHandlerInterface
{
    /**
     * Verifies whether the given format is supported by this view
     *
     * @param string $format format name
     *
     * @return Boolean
     */
    function supports($format);

    /**
     * Registers a custom handler
     *
     * The handler must have the following signature: handler($viewObject, $request, $response)
     * It can use the methods of this class to retrieve the needed data and return a
     * Response object ready to be sent.
     *
     * @param string $format the format that is handled
     * @param callable $callable callable that can handle the given format
     */
    function registerHandler($format, $callable);

    /**
     * If the given format uses the templating system for rendering
     *
     * @param string $format
     * 
     * @return Boolean
     */
    function isFormatTemplating($format);

    /**
     * Handles a request with the proper handler
     *
     * Decides on which handler to use based on the request format
     *
     * @param View $view
     * @param Request $request Request object
     *
     * @return Response
     */
    function handle(View $view, Request $request = null);

    /**
     * Create the Response from the view
     *
     * @param View $view
     * @param string $location
     * @param string $format
     *
     * @return Response
     */
    function createRedirectResponse(View $view, $location, $format);

    /**
     * Render the view data with the given template
     *
     * @param View $view
     * @param string $format
     *
     * @return string
     */
    function renderTemplate(View $view, $format);

    /**
     * Handles creation of a Response using either redirection or the templating/serializer service
     *
     * @param View $view
     * @param Request $request
     * @param string $format
     *
     * @return Response
     */
    function createResponse(View $view, Request $request, $format);
}
