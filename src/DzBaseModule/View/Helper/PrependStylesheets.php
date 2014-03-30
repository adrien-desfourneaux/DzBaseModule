<?php

/**
 * Fichier de source pour l'aide de vue PrependStylesheets.
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
 * Classe d'aide de vue PrependStylesheets.
 *
 * Ajoute les fichiers css en début de pile des
 * inclusions de style du head.
 *
 * @category Source
 * @package  DzBaseModule\View\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class PrependStylesheets extends AbstractHelper
{
    /**
     * Méthode appelée lorsqu'un script tente d'appeler cet objet comme une fonction.
     *
     * @param string|array $stylesheets Un fichier ou une liste des fichiers de style à inclure.
     * @param string       $basePath    Chemin à préfixer devant chaque fichier de style.
     *
     * @return void
     */
    public function __invoke($stylesheets, $basePath = null)
    {
        $view = $this->getView();

        if ($basePath === null) {
            $basePath = $view->basePath() . '/css';
        }

        $basePath = rtrim($basePath, '/');

        if (!is_array($stylesheets)) {
            $view->headLink()->prependStylesheet($basePath . '/' . $stylesheets);
        } else {
            foreach ($stylesheets as $stylesheet) {
                $view->headLink()->prependStylesheet($basePath . '/' . $stylesheet);
            }
        }
    }
}
