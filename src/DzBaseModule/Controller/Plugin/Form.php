<?php

/**
 * Fichier source pour le plugin de contrôleur Form.
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

use Zend\Form\FormElementManager;
use Zend\Form\ElementInterface;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

/**
 * Plugin de Contrôleur Form.
 *
 * Obtient un Form auprès du gestionnaire de FormElement.
 *
 * @category Source
 * @package  DzBaseModule\Controller\Plugin
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class Form extends AbstractPlugin
{
    /**
     * Gestionnaire de Form.
     *
     * @var FormElementManager
     */
    protected $forms;

    /**
     * Méthode appelée lorsqu'un script tente
     * d'appeler cet objet comme une fonction.
     *
     * @param string $name Nom du Form à récupérer.
     *
     * @return Form|ElementInterface
     */
    public function __invoke($name = null)
    {
        if ($name === null) {
            return $this;
        }

        $forms = $this->getFormElementManager();
        $form  = $forms->get($name);

        return $form;
    }

    /**
     * Définit le gestionnaire de FormElement.
     *
     * @param FormElementManager $forms Nouveau gestionnaire.
     *
     * @return Form
     */
    public function setFormElementManager($forms)
    {
        $this->forms = $forms;

        return $this;
    }

    /**
     * Obtient le gestionnaire de FormElement.
     *
     * @return FormElementManager
     */
    public function getFormElementManager()
    {
        return $this->forms;
    }
}
