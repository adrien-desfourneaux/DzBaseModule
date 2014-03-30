<?php

/**
 * Fichier de source du EntityListing.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzBaseModule\View\Listing
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */

namespace DzBaseModule\View\Listing;

use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\Stdlib\InitializableInterface;

/**
 * Listing d'une entité.
 *
 * @category Source
 * @package  DzBaseModule\View\Listing
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class EntityListing implements
    InitializableInterface,
    EventManagerAwareInterface
{
    /**
     * Etiquette pour les entitées.
     *
     * C'est cette étiquette qui est envoyée en
     * nom de paramètre lors des événements init.pre
     * et init.post. Un getter et un setter est
     * aussi automatiquement autorisé via __call
     * pour l'étiquette de l'entité qui proxient
     * vers les méthodes getEntities() et setEntities().
     */
    const ENTITIES_LABEL = 'entities';

    /**
     * Champs à afficher dans le listing.
     *
     * @var Field[]
     */
    protected $fields;

    /**
     * Entités à afficher dans le listing.
     *
     * @var array
     */
    protected $entities;

    /**
     * Gestionnaire d'événements.
     *
     * @var EventManagerInterface
     */
    protected $events;

    /**
     * Actions d'initialisations pré et post.
     *
     * @param string $stage Etape "pre" ou "post" de l'initialisation.
     *
     * @return void
     */
    protected function __init($stage = 'pre')
    {
        $events   = $this->getEventManager();
        $entities = $this->getEntities();
        $label    = static::ENTITIES_LABEL;

        if ($stage == 'pre') {
            $this->fields = array();

            $events->trigger(
                'init.pre', $this,
                array(
                    $label => $entities,
                )
            );
        }

        if ($stage == 'post') {
            $events->trigger(
                'init.post', $this,
                array(
                    $label => $entities,
                )
            );
        }
    }

    /**
     * Initialisation du listing.
     *
     * @return void
     */
    public function init()
    {
        $this->__init('pre');

        // Do something

        $this->__init('post');
    }

    /**
     * Méthode magique __call.
     *
     * Autorise un getter et un setter
     * pour la valeur de constante ENTITIES_LABEL.
     *
     * @param string $method    Nom de la méthode appelée.
     * @param array  $arguments Arguments de la méthode.
     *
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        $label = static::ENTITIES_LABEL;

        $getter = 'get' . ucfirst($label);
        $setter = 'set' . ucfirst($label);

        if ($method == $getter) {
            return $this->getEntities();
        } elseif ($method == $setter) {
            return $this->setEntities($arguments[0]);
        }
    }

    /**
     * Définit les champs du listing.
     *
     * @param array $fields Nouveaux champs.
     *
     * @return EntityListing
     */
    public function setFields($fields)
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * Obtient les champs du listing.
     *
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Définit les entités à afficher dans le listing.
     *
     * @param array $entities Nouvelles entités.
     *
     * @return EntityListing
     */
    public function setEntities($entities)
    {
        $this->entities = $entities;

        return $this;
    }

    /**
     * Obtient les entités qui sont affichés dans le listing.
     *
     * @return array
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * Définit le gestionnaire d'événements.
     *
     * @param EventManagerInterface $events Nouveau gestionnaire.
     *
     * @return ListViewModel
     */
    public function setEventManager(EventManagerInterface $events)
    {
        $identifiers = array(__CLASS__, get_class($this));
        if (isset($this->eventIdentifier)) {
            if ((is_string($this->eventIdentifier))
                || (is_array($this->eventIdentifier))
                || ($this->eventIdentifier instanceof Traversable)
            ) {
                $identifiers = array_unique(array_merge($identifiers, (array) $this->eventIdentifier));
            } elseif (is_object($this->eventIdentifier)) {
                $identifiers[] = $this->eventIdentifier;
            }
            // silently ignore invalid eventIdentifier types
        }
        $events->setIdentifiers($identifiers);
        $this->events = $events;

        return $this;
    }

    /**
     * Obtient le gestionnaire d'événements.
     *
     * Charge automatiquement un nouveau gestionnaire
     * d'événement si aucun n'a été définit.
     *
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        if (!$this->events instanceof EventManagerInterface) {
            $this->setEventManager(new EventManager());
        }

        return $this->events;
    }
}
