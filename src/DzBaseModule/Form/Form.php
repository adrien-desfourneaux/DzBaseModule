<?php

/**
 * Fichier de source pour le Form.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzBaseModule\Form
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */

namespace DzBaseModule\Form;

use Zend\Form\Form as ZendForm;

/**
 * Classe Form.
 *
 * Ajoute quelques fonctionnalités au formulaire du
 * ZendFramework 2.
 *
 * @category Source
 * @package  DzBaseModule\Form
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class Form extends ZendForm
{
    /**
     * Permet de savoir si le formulaire a été préparé.
     *
     * @return boolean
     */
    public function getIsPrepared()
    {
        return $this->isPrepared;
    }
}
