<?php

/**
 * Stratégie de conversion d'une chaine de date en timestamp
 * pour un hydrateur.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzBaseModule\Hydrator\Strategy
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */

namespace DzBaseModule\Hydrator\Strategy;

use Zend\Stdlib\Hydrator\Strategy\DefaultStrategy;

/**
 * Stratégie d'hydrateur de conversion d'une chaine de date en timestamp.
 *
 * @category Source
 * @package  DzBaseModule\Hydrator\Strategy
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class DateStrTimestampStrategy extends DefaultStrategy
{
    /**
     * Format de la date
     * @var string
     */
    protected $format = 'd/m/Y';

    /**
     * Convertit la valeur donnée pour qu'elle soit extraite par l'hydrateur.
     * "Extrait la bdd"
     * extract: $object -> array()
     *
     * @param mixed $value Attend un timestamp entier.
     *
     * @return mixed Renvoie la chaine de caractère au format date.
     */
    public function extract($value)
    {
        if (is_numeric($value)) {
            $datetime = new \DateTime();
            $datetime->setTimestamp($value);

            return $datetime->format($this->format);
        }

        return $value;
    }

    /**
     * Convertit la valeur donnée pour qu'elle soit
     * hydratée par l'hydrateur. Convertit une chaine
     * de caractères en timestamp si elle respecte un
     * format de date définit.
     * "Hydrate la bdd"
     * hydrate: array() -> $object
     *
     * @param mixed $value Attend une chaine de caractères au format date.
     *
     * @return mixed Le timestamp correspondant.
     */
    public function hydrate($value)
    {
        // Nouveau timestamp depuis la date au format UTC
        $datetime = \DateTime::createFromFormat($this->format, $value, new \DateTimeZone('Etc/UTC'));
        if ($datetime) {
            // Supprimer la partie "time"
            $datetime->setTime(0,0,0);

            // Utilise le format universel pour générer
            // un timestamp négatif si la date est antérieure
            // au 1er Janver 1970
            $value = $datetime->format('U');
        }

        return $value;
    }

    /**
     * Définit le format de date.
     *
     * @param string $format Nouveau format.
     *
     * @return DateStrTimestampStrategy
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Obtient le format de date.
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }
}
