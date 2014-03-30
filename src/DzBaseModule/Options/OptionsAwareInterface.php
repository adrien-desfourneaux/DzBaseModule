<?php

/**
 * Fichier de source pour l'interface OptionsAwareInterface.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzBaseModule\Options
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */

namespace DzBaseModule\Options;

use Zend\Stdlib\ParameterObjectInterface;

/**
 * Interface OptionsAwareInterface.
 *
 * Interface pour les classes ayant des options.
 *
 * @category Source
 * @package  DzBaseModule\Mapper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
interface OptionsAwareInterface
{
    /**
     * Définit les options.
     *
     * @param ParameterObjectInterface $options Nouvelles options.
     *
     * @return OptionsAwareInterface
     */
    public function setOptions(ParameterObjectInterface $options);

    /**
     * Obtient les options.
     *
     * @return ParameterObjectInterface
     */
    public function getOptions();
}
