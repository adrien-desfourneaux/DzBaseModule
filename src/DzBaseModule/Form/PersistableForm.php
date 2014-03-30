<?php

/**
 * Fichier de source pour le PersistableForm.
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

use ArrayAccess;
use DzBaseModule\Core\PersistableInterface;

/**
 * Classe PersistableForm.
 *
 * Formulaire capable de persister son état dans un container
 * et de récupérer cet état même après plusieurs requêtes.
 *
 * @category Source
 * @package  DzBaseModule\Form
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class PersistableForm extends Form implements PersistableInterface
{
    /**
     * Container dans lequel on va
     * persister l'état du formulaire.
     *
     * @var ArrayAccess
     */
    protected $container;

    /**
     * {@inheritDoc}
     */
    public function persist()
    {
        $container = $this->getContainer();

        // Les données sont remplis uniquement
        // si le formulaire a été validé isValid()
        if ($this->hasValidated) {
            $container['data']     = $this->getData();
        }

        $container['messages'] = $this->getMessages();
    }

    /**
     * {@inheritDoc}
     */
    public function retrieve()
    {
        $container = $this->getContainer();

        if ($container['data']) {
            $this->setData($container['data']);
        }

        if ($container['messages']) {
            $this->setMessages($container['messages']);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function flush()
    {
        $container = $this->getContainer();

        unset($container['data']);
        unset($container['messages']);
    }

    /**
     * {@inheritdoc}
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function getContainer()
    {
        return $this->container;
    }
}
