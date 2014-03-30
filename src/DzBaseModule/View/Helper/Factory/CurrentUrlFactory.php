<?php

/**
 * Fichier source pour le CurrentUrlFactory.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzBaseModule\View\Helper\Factory
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */

namespace DzBaseModule\View\Helper\Factory;

use DzBaseModule\View\Helper\CurrentUrl;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Classe CurrentUrlFactory.
 *
 * Classe usine pour l'aide de vue CurrentUrl.
 * L'aide de vue CurrentUrl permet d'obtenir
 * l'url courante.
 *
 * @category Source
 * @package  DzBaseModule\View\Helper\Factory
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class CurrentUrlFactory implements FactoryInterface
{
    /**
     * Cré et retourne une aide de vue CurrentUrl.
     *
     * @param ServiceLocatorInterface $serviceLocator Locateur de service.
     *
     * @return RouteParam
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $request = $serviceLocator->getServiceLocator()->get('request');
        $viewHelper = new CurrentUrl($request);

        return $viewHelper;
    }
}
