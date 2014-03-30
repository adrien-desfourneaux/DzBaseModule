<?php

/**
 * Fichier de source pour l'aide de vue AppendScripts.
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
 * Classe d'aide de vue AppendScripts.
 *
 * Ajoute les fichiers js en fin de pile des
 * inclusions javascript du head.
 *
 * @category Source
 * @package  DzBaseModule\View\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class AppendScripts extends AbstractHelper
{
    /**
     * Méthode appelée lorsqu'un script tente d'appeler cet objet comme une fonction.
     *
     * @param string|array $scripts  Un fichier ou une liste des fichiers de script à inclure.
     * @param string       $basePath Chemin à préfixer devant chaque fichier de script.
     *
     * @return void
     */
    public function __invoke($scripts, $basePath = null)
    {
        $view = $this->getView();

        if ($basePath === null) {
            $basePath = $view->basePath() . '/js';
        }

        $basePath = rtrim($basePath, '/');

        if (!is_array($scripts)) {
            $view->headScript()->appendFile($basePath . '/' . $scripts);
        } else {
            foreach ($scripts as $script) {
                $view->headScript()->appendFile($basePath . '/' . $script);
            }
        }
    }
}
