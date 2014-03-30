<?php

/**
 * Fichier source pour le FormFactory.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzBaseModule\Controller\Plugin\Factory
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */

namespace DzBaseModule\Controller\Plugin\Factory;

use DzBaseModule\Controller\Plugin\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Classe FormFactory.
 *
 * Classe usine pour le plugin de contrôleur Form.
 *
 * @category Source
 * @package  DzBaseModule\Controller\Plugin\Factory
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class FormFactory implements FactoryInterface
{
    /**
     * Cré et retourne un plugin de contrôleur Form.
     *
     * @param ServiceLocatorInterface $serviceLocator Localisateur de service.
     *
     * @return Form
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $plugin = new Form;

        $locator = $serviceLocator->getServiceLocator();
        $forms   = $locator->get('FormElementManager');

        $plugin->setFormElementManager($forms);

        return $plugin;
    }
}
