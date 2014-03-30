<?php

/**
 * Fichier source pour le RouteParamsFactory.
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

use DzBaseModule\View\Helper\RouteParams;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Classe RouteParamsFactory.
 *
 * Classe usine pour l'aide de vue RouteParams.
 * L'aide de vue RouteParams permet d'obtenir
 * un paramètre de la route courante.
 *
 * @category Source
 * @package  DzBaseModule\View\Helper\Factory
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class RouteParamsFactory implements FactoryInterface
{
    /**
     * Cré et retourne une aide de vue RouteParams.
     *
     * @param ServiceLocatorInterface $serviceLocator Locateur de service.
     *
     * @return RouteParams
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $match = $serviceLocator->getServiceLocator()->get('application')->getMvcEvent()->getRouteMatch();
        $viewHelper = new RouteParams($match);

        return $viewHelper;
    }
}
