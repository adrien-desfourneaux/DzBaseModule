<?php

/**
 * Fichier source pour le RouteParamFactory.
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

use DzBaseModule\View\Helper\RouteParam;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Classe RouteParamFactory.
 *
 * Classe usine pour l'aide de vue RouteParam.
 * L'aide de vue RouteParam permet d'obtenir
 * un paramètre de la route courante.
 *
 * @category Source
 * @package  DzBaseModule\View\Helper\Factory
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class RouteParamFactory implements FactoryInterface
{
    /**
     * Cré et retourne une aide de vue RouteParam.
     *
     * @param ServiceLocatorInterface $serviceLocator Locateur de service.
     *
     * @return RouteParam
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $match = $serviceLocator->getServiceLocator()->get('application')->getMvcEvent()->getRouteMatch();
        $viewHelper = new RouteParam($match);

        return $viewHelper;
    }
}
