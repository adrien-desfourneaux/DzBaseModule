<?php

/**
 * Fichier de module de DzBaseModule.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzBaseModule
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */

namespace DzBaseModule;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ControllerPluginProviderInterface;
use Zend\ModuleManager\Feature\DependencyIndicatorInterface;
use Zend\ModuleManager\Feature\FormElementProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

/**
 * Classe module de DzBaseModule.
 *
 * @category Source
 * @package  DzBaseModule
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzBaseModule
 */
class Module implements
    AutoloaderProviderInterface,
    DependencyIndicatorInterface,
    ControllerPluginProviderInterface,
    ViewHelperProviderInterface,
    FormElementProviderInterface,
    ServiceProviderInterface
{
    /**
     * Retourne un tableau à parser par Zend\Loader\AutoloaderFactory.
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/../../autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    /**
     * Doit retourner un tableau des dépendances du module.
     *
     * @return array
     */
    public function getModuleDependencies()
    {
        return array(
            // Pour pouvoir gérer les exceptions
            // de type \DzMessageModule\Exception\MessageException
            // lors de l'initialisation du ViewModel dans le widget
            // DzBaseModule\View\Helper\AbstractWidget.
            'DzMessageModule', // OUTDATED
        );
    }

    /**
     * Doit retourner un objet de type \Zend\ServiceManager\Config
     * ou un tableau pour créer un tel objet.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getControllerPluginConfig()
    {
        return array(
            'invokables' => array(
                'DzBaseModule\FirePhp' => 'DzBaseModule\Controller\Plugin\FirePhp',
            ),
            'factories' => array(
                'DzBaseModule\Form' => 'DzBaseModule\Controller\Plugin\Factory\FormFactory',
            ),
            'aliases' => array(
                'firePhp'     => 'DzBaseModule\FirePhp',
                'form'        => 'DzBaseModule\Form',
                'formPlugin'  => 'form',
            ),
        );
    }

    /**
     * Doit retourner un objet de type \Zend\ServiceManager\Config
     * ou un tableau pour créer un tel objet.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getViewHelperConfig()
    {
        return array(
            'invokables' => array(
                'DzBaseModule\AppendScriptsHelper'      => 'DzBaseModule\View\Helper\AppendScripts',
                'DzBaseModule\PrependStylesheetsHelper' => 'DzBaseModule\View\Helper\PrependStylesheets',
                'DzBaseModule\RenderTitle'              => 'DzBaseModule\View\Helper\RenderTitle',
            ),
            'factories' => array(
                'DzBaseModule\CurrentUrlHelper'  => 'DzBaseModule\View\Helper\Factory\CurrentUrlFactory',
                'DzBaseModule\RouteNameHelper'   => 'DzBaseModule\View\Helper\Factory\RouteNameFactory',
                'DzBaseModule\RouteParamHelper'  => 'DzBaseModule\View\Helper\Factory\RouteParamFactory',
                'DzBaseModule\RouteParamsHelper' => 'DzBaseModule\View\Helper\Factory\RouteParamsFactory',
            ),
            'aliases' => array(
                'appendScripts'      => 'DzBaseModule\AppendScriptsHelper',
                'currentUrl'         => 'DzBaseModule\CurrentUrlHelper',
                'prependStylesheets' => 'DzBaseModule\PrependStylesheetsHelper',
                'renderTitle'        => 'DzBaseModule\RenderTitle',
                'routeName'          => 'DzBaseModule\RouteNameHelper',
                'routeParam'         => 'DzBaseModule\RouteParamHelper',
                'routeParams'        => 'DzBaseModule\RouteParamsHelper',
            ),
        );
    }

    /**
     * Doit retourner un objet de type \Zend\ServiceManager\Config
     * ou un tableau pour créer un tel objet.
     *
     * @return array|\Zend\ServiceManager\Config
     *
     * @see FormElementProviderInterface
     */
    public function getFormElementConfig()
    {
        return array(
            'invokables' => array(
                'DzBaseModule\Form'            => 'DzBaseModule\Form\Form',
                'DzBaseModule\PersistableForm' => 'DzBaseModule\Form\PersistableForm',
            ),
            'shared' => array(
                'DzBaseModule\Form'            => false,
                'DzBaseModule\PersistableForm' => false,
            ),
        );
    }

    /**
     * Doit retourner un objet de type \Zend\ServiceManager\Config
     * ou un tableau pour créer un tel objet.
     *
     * @return array|\Zend\ServiceManager\Config
     *
     * @see ServiceProviderInterface
     */
    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'DzBaseModule\DateStrTimestampStrategy' => 'DzBaseModule\Hydrator\Strategy\DateStrTimestampStrategy',
            ),
        );
    }
}
