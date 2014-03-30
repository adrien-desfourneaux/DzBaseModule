<?php

/**
 * Fichier de source pour l'interface PersistableInterface.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzBaseModule\Core
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */

namespace DzBaseModule\Core;

use ArrayAccess;

/**
 * Interface PersistableInterface.
 *
 * Interface pour un objet capable de persister son état dans un container
 * et de récupérer cet état même après plusieurs requêtes.
 *
 * @category Source
 * @package  DzBaseModule\Core
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
interface PersistableInterface
{
    /**
     * Persiste l'état de l'objet dans le container.
     *
     * @return void
     */
    public function persist();

    /**
     * Récupère l'état de l'objet depuis le container.
     *
     * @return void
     */
    public function retrieve();

    /**
     * Vide le container.
     *
     * @return void
     */
    public function flush();

    /**
     * Définit le container pour la persistance.
     *
     * @param ArrayAccess $container Nouveau container.
     *
     * @return PersistableInterface
     */
    public function setContainer($container);

    /**
     * Obtient le container pour la persistance.
     *
     * @return ArrayAccess
     */
    public function getContainer();
}
