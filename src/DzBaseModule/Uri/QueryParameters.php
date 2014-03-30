<?php

/**
 * Fichier de source pour le QueryParameters.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzBaseModule\Uri
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */

namespace DzBaseModule\Uri;

use Zend\Stdlib\Parameters;
use Zend\Stdlib\ParametersInterface;

/**
 * Classe QueryParameters.
 *
 * Gère des paramètres de requête.
 *
 * @category Source
 * @package  DzBaseModule\Uri
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class QueryParameters extends Parameters
{
    /**
     * Paramètres de requête.
     *
     * @var ParametersInterface
     */
    protected $query;

    /**
     * Définit les paramètres de requête.
     *
     * @param ParametersInterface $query Nouveaux paramètres de requête.
     *
     * @return QueryParameters
     */
    public function setQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Récupère un paramètre de la requête
     * et l'ajoute dans l'instance QueryParameters.
     *
     * @param string  $name             Nom du paramètre à récupérer.
     * @param mixed   $default          Valeur par défaut si paramètre inexistant.
     * @param boolean $allowNullDefault Autoriser la valeur null comme valeur par défaut.
     *
     * @return mixed Valeur du paramètre ajouté aux QueryParameters.
     */
    public function fetch($name, $default = null, $allowNullDefault = true)
    {
        $query = $this->query;

        if (isset($query[$name])) {
            $value = $query[$name];

            // Convertir les chaînes numériques
            // en vrais nombres
            if (is_numeric($value)) {
                // attention! 45.0000 == 45
                // http://www.developpez.net/forums/d68378/php/langage/formulaires/formulaire-tester-saisie-entier/#post459465
                if ((int) $value == (float) $value) {
                    $value = (int) $value;
                } else {
                    $value = (float) $value;
                }
            }

            // Convertir les chaînes true|false
            // en vrais booléens
            if ($value === 'true') {
                $value = true;
            } elseif ($value === 'false') {
                $value = false;
            }
        } else {
            $value = $default;
        }

        if (!isset($query[$name]) && $default == null && $allowNullDefault == false) {
        } else {
            $this[$name] = $value;

            return $this[$name];
        }
    }

    /**
     * Récupère tous les paramètres de la requête
     * et les ajoute dans les QueryParameters.
     *
     * @return QueryParameters
     */
    public function fetchAll()
    {
        foreach (array_keys($this->query) as $name) {
            $this->fetch($name, null, false);
        }

        return $this;
    }

    /**
     * Réinitialise les QueryParameters.
     *
     * @return void
     */
    public function reset()
    {
        for ($i=0; $i<$this->count(); $i++) {
            $this->offsetUnset($i);
        }
    }

    /**
     * Encode la requête à partir des QueryParameters.
     *
     * @param string $prefix Le préfix de la chaîne de requête ('', '?' ou '&').
     *
     * @return string La chaîne de requête encodée
     */
    public function encode($prefix = '')
    {
        $queryString = $prefix;

        // Premier élement de l'ArrayObject
        foreach ($this as $key => $value) {
            $queryElement = $key . '=' . var_export($value, true);
            $queryString .= $queryElement;
            break;
        }

        // Autres éléments
        if (isset($key)) {
            $firstKey = $key;
            foreach ($this as $key => $value) {

                // On a déjà traité le premier élément
                if ($key == $firstKey) {
                    continue;
                }

                $queryElement = $key . '=' . var_export($value, true);
                $queryString .= '&' . $queryElement;
            }
        }

        return $queryString;
    }
}
