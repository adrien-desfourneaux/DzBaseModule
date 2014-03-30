<?php

/**
 * Fichier de source pour l'aide de vue RouteParam.
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
 * Classe d'aide de vue RouteParam.
 *
 * Renvoi le paramètre demandé de la route courante.
 *
 * @category Source
 * @package  DzBaseModule\View\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class RouteParam extends AbstractHelper
{
    /**
     * Route qui a répondu à la requête HTTP.
     *
     * @var RouteMatch
     */
    protected $routeMatch;

    /**
     * Constructeur de l'aide de vue RouteParam.
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
     * @param string $name Nom du paramètre à récupérer.
     *
     * @return mixed
     */
    public function __invoke($name)
    {
        if ($this->routeMatch) {
            $routeParam = $this->routeMatch->getParam($name);

            return $routeParam;
        }
    }
}
