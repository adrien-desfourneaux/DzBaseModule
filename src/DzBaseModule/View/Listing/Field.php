<?php

/**
 * Fichier de source du Field.
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

use Zend\Stdlib\ArrayObject;

/**
 * Champ d'un listing.
 *
 * @category Source
 * @package  DzBaseModule\View\Listing
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class Field extends ArrayObject
{
    /**
     * Constructeur d'un champ de listing.
     *
     * @param string $heading Titre du champ.
     *
     * @return void
     */
    public function __construct($heading = null)
    {
        // Traiter accès via des clés de tableau
        // comme des accès via des nom de propriétés
        parent::setFlags(parent::ARRAY_AS_PROPS);

        if ($heading !== null) {
            $this["heading"] = $heading;
        }
    }

    /**
     * Obtient une valeur du champ.
     *
     * Obtient une valeur du champ en spécifiant l'index
     * de la valeur et une valeur par défaut optionnelle.
     *
     * @param string $name    Nom de la valeur.
     * @param mixed  $index   Index de la valeur.
     * @param mixed  $default Valeur par défaut si non trouvé.
     *
     * @return null|mixed
     */
    public function get($name, $index = null, $default = null)
    {
        if ($this->offsetExists($name)) {
            $prop = $this->offsetGet($name);

            if ($index === null) {
                return $prop;
            } elseif (isset($prop[$index])) {
                return $prop[$index];
            }

        }

        return $default;
    }
}
