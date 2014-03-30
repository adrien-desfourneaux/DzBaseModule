<?php

/**
 * Fichier source pour le RouteNameFactory.
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

use DzBaseModule\View\Helper\RouteName;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Classe RouteNameFactory.
 *
 * Classe usine pour l'aide de vue RouteName.
 * L'aide de vue RouteName permet de connaître
 * le nom de la route courante.
 *
 * @category Source
 * @package  DzBaseModule\View\Helper\Factory
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class RouteNameFactory implements FactoryInterface
{
    /**
     * Cré et retourne une aide de vue RouteName.
     *
     * @param ServiceLocatorInterface $serviceLocator Locateur de service.
     *
     * @return RouteName
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $match = $serviceLocator->getServiceLocator()->get('application')->getMvcEvent()->getRouteMatch();
        $viewHelper = new RouteName($match);

        return $viewHelper;
    }
}
