<?php

/**
 * Fichier de source pour l'aide de vue RouteParams
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzBaseModule\View\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */

namespace DzBaseModule\View\Helper;

use Zend\Mvc\Router\RouteMatch;
use Zend\View\Helper\AbstractHelper;

/**
 * Classe d'aide de vue RouteParams.
 *
 * Renvoi les paramètres de la route courante.
 *
 * @category Source
 * @package  DzBaseModule\View\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class RouteParams extends AbstractHelper
{
    /**
     * Route qui a répondu à la requête HTTP.
     *
     * @var RouteMatch
     */
    protected $routeMatch;

    /**
     * Constructeur de l'aide de vue RouteName.
     *
     * @param RouteMatch $routeMatch Route qui a répondu à la requête HTTP.
     *
     * @return void
     */
    public function __construct($routeMatch)
    {
        $this->routeMatch = $routeMatch;
    }

    /**
     * Méthode appelée lorsqu'un script tente d'appeler cet objet comme une fonction.
     *
     * @return string Nom de la route courante.
     */
    public function __invoke()
    {
        if ($this->routeMatch) {
            $routeParams = $this->routeMatch->getParams();

            return $routeParams;
        }
    }
}
