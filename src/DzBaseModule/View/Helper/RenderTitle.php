<?php

/**
 * Fichier de source pour l'aide de vue RenderTitle.
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

use Zend\View\Helper\AbstractHelper;

/**
 * Classe d'aide de vue RenderTitle.
 *
 * Effectue le rendu d'un titre <h1>,<h2>, ...
 *
 * @category Source
 * @package  DzBaseModule\View\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class RenderTitle extends AbstractHelper
{
    /**
     * Méthode appelée lorsqu'un script tente d'appeler cet objet comme une fonction.
     *
     * @param string $title Titre à afficher.
     * @param string $level Niveau du titre.
     *
     * @return string
     */
    public function __invoke($title, $level = 1)
    {
        $view = $this->getView();

        $beginTag = '<h' . $level . '>';
        $endTag   = '</h' . $level . '>';
        $title    = $beginTag . $title . $endTag;

        // L'option hasTitle peut être fournie
        // par un widget. Elle permet d'activer
        // ou non l'affichage du titre.
        if (isset($view->hasTitle)) {
            if ($view->hasTitle) {
                return $title;
            } else {
                return '';
            }
        } else {
            return $title;
        }
    }
}
