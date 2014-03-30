<?php

/**
 * Fichier de source pour l'AbstractActionController.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzBaseModule\Controller
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */

namespace DzBaseModule\Controller;

use DzBaseModule\Options\OptionsAwareInterface;

use Zend\Mvc\Controller\AbstractActionController as ZendAbstractActionController;
use Zend\Stdlib\ParameterObjectInterface;

/**
 * Classe AbstractActionController.
 *
 * Etend \Zend\Mvc\Controller\AbstractActionController.
 * Permet de récupérer les options du contrôleur.
 * Ajoute un service d'entité par défaut pour les actions d'ajout/modification/suppression.
 *
 * @category Source
 * @package  DzBaseModule\Controller
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
abstract class AbstractActionController extends ZendAbstractActionController implements
    OptionsAwareInterface
{
    /**
     * Options du contrôleur.
     *
     * @var ParameterObjectInterface
     */
    protected $options;

    /**
     * {@inheritdoc}
     */
    public function setOptions(ParameterObjectInterface $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions()
    {
        return $this->options;
    }
}
