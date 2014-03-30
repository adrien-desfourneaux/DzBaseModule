<?php

/**
 * Fichier source pour le plugin de contrôleur FirePhp.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzBaseModule\Controller\Plugin
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */

namespace DzBaseModule\Controller\Plugin;

use Zend\Log\Logger;
use Zend\Log\Writer\FirePhp;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

/**
 * Plugin de Contrôleur FirePhp.
 *
 * Affiche un message via FirePhp.
 *
 * @category Source
 * @package  DzBaseModule\Controller\Plugin
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class FirePhp extends AbstractPlugin
{
    /**
     * Méthode appelée lorsqu'un script tente
     * d'appeler cet objet comme une fonction.
     *
     * @param mixed $value Valeur à afficher via FirePhp.
     *
     * @return void
     */
    public function __invoke($value)
    {
        $writer = new \Zend\Log\Writer\FirePhp();
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info($value);
    }
}
