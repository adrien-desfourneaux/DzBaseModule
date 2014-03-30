<?php

/**
 * Fichier de source pour l'aide de vue CurrentUrl.
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

use Zend\Http\Request;
use Zend\View\Helper\AbstractHelper;

/**
 * Classe d'aide de vue CurrentUrl.
 *
 * Renvoi l'url courante.
 *
 * @category Source
 * @package  DzBaseModule\View\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class CurrentUrl extends AbstractHelper
{
    /**
     * Requête courante.
     *
     * @var Request
     */
    protected $request;

    /**
     * Constructeur de l'aide de vue CurrentUrl.
     *
     * @param Request $request Requête courante.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Méthode appelée lorsqu'un script tente d'appeler cet objet comme une fonction.
     *
     * @return string Url courante.
     */
    public function __invoke()
    {
        if ($this->request) {
            $url = $this->request->getUriString();

            return $url;
        }
    }
}
