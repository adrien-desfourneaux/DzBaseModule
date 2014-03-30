DzBaseModule
============

Module ZF2 qui sert de base pour les autres modules.

Le module DzBaseModule est sous licence MIT. Vous avez le droit illimité de l'utiliser, le copier, le modifier, le fusionner, le publier, le distribuer, le vendre et de changer sa licence. La seule obligation est de mettre le nom de l'auteur (*Adrien Desfourneaux*) avec la notice de copyright. 


Plugins de controller
-----------------

### FirePhp

Le plugin de controller *FirePhp* permet d'afficher facilement des messages d'information dans *Firefox* via les extensions [FirePhp](http://www.firephp.org/) et [FireBug](https://getfirebug.com/).

Dans un controller :
	
	$this->firePhp('hello world');

Affichera "hellow world" dans la console FireBug.
	
### Form

Le plugin de controller *Form* permet d'obtenir facilement un formulaire ou un élément de formulaire enregistré auprès du *FormElementManager*.

Dans le fichier *Module.php* :

	<?php
	
	namespace MyModule;
	
	use Zend\ModuleManager\Feature\FormElementProviderInterface;
	
	class Module implements
		FormElementProviderInterface
	{
		public function getFormElementConfig()
		{
			return array(
				'invokables' => array(
					'MyModule\MyForm' => 'MyModule\Form\MyForm',
				),
				'shared' => array(
					'MyModule\MyForm' => true,
				),
			);
		}
	}

*Note*: Les éléments du *FormElementManager* sont *non shared* par défaut. Il faut mettre ses formulaires en *shared* sinon on perd les modifications faites sur un Formulaire la prochaine fois qu'on le récupère via le *FormElementManager*.

Dans un controller :
	
	$form = $this->form('MyModule\MyForm');

Récupère le formulaire "MyModule\MyForm" enregistré auprès du *FormElementManager*.

Aides de vue
-------------

### AppendScripts

L'aide de vue *AppendScripts* ajoute les fichiers js à la fin des inclusions javascript du \<head\>. Le premier paramètre est soit un nom de fichier, sois un tableau des fichiers. Le deuxième paramètre est un chemin à préfixer devant le/les fichiers avec ou sans le caractère '/'.

Dans un template :
	
	// Ajoute un fichier js en fin du head
	$this->appendScripts('/js/myscript.js');
	
	// Ajoute plusieurs fichiers js en fin du head
	$this->appendScripts(
		array(
			'myscript1.js',
			'myscript2.js',
			'myscript3.js',
		), '/js'
	);

### CurrentUrl

L'aide de vue *CurrentUrl* renvoie l'url de la page courante.

Dans un template :
	
	$url = $this->currentUrl();
	
### PrependStylesheets

L'aide de vue *PrependStylesheets* ajoute des fichiers css en début des inclusions de style du \<head\>.

Dans un template :

	// Ajoute un fichier css en début du head
	$this->prependStylesheets('/css/mystyle.css');
	
	// Ajoute plusieurs fichiers css en début du head
	$this->prependStylesheets(
		array(
			'mystyle1.css',
			'mystyle2.css',
			'mystyle3.css',
		), '/css'
	);
	
### RenderTitle

L'aide de vue *RenderTitle* effectue le rendu d'un titre \<h1\>, \<h2\>.... Le premier paramètre est la valeur du titre. Un second paramètre optionnel permet de spécifier le niveau du titre.

Dans un template :
	
	// Affiche un titre de niveau 1
	echo $this->renderTitle('1 title');
	
	// Affiche un titre de niveau 2
	echo $this->renderTitle('2 title', 2);

### RouteName

L'aide de vue *RouteName* permet d'obtenir le nom de la route courante.

Dans un template :
	
	$routeName = $this->routeName();
	
### RouteParam

L'aide de vue *RouteParam* permet d'obtenir un paramètre précis de la route courante.

Dans un template :

	// On suppose qu'il existe un paramètre de route "id".
	$param = $this->routeParam('id');
	
### RouteParams

L'aide de vue *RouteParams* permet d'obtenir un tableau des arguments de la route courante.

Dans un template :

	$params = $this->routeParams();

Autres
------------

### DateStrTimestampStrategy

La stratégie d'hydrateur *DzBaseModule\Hydrator\Strategy\DateStrTimestampStrategy* gère la conversion d'un timestamp en chaîne de date lors de l'extraction, et la conversion d'une chaîne de caractères en timestamp lors de l'hydratation.

### QueryParameters

La classe *DzBaseModule\Uri\QueryParameters* permet de récupérer des paramètres de requêtes nommés depuis un objet *Query* définit.

Exemple d'utilisation dans un controller :

	$queryParams = new QueryParameters();

	// Utilisation de la Query courante
    $queryParams->setQuery($this->getRequest()->getQuery());
	
	// QueryParameters::fetch($name, $default)
    $queryParams->fetch('param1', true);
    $queryParams->fetch('param2', 3);
    
    // 3ème paramètre : autoriser la valeur null
    // comme valeur par défaut.
    // Si param3 n'existe pas, on ne lui donne pas
    // la valeur par défaut null.
    $queryParams->fetch('param3', null, false);

	// Obtient les paramètres "fetchés"
	// sous la forme d'une chaîne GET
    $queryString = $queryParams->encode();

    // Obtient les paramètres "fetchés"
    // dans un tableau
    $params = $queryParams->toArray();

Scripts
-----------

###qa.sh

Le script DzBaseModule/bin/qa.sh est un script d'assurance qualité du code. Il permet de gérer la qualité du code et la documentation.

Vérifier la conformité du code avec les standards :

    bin/qa.sh code check

Modifier le code source pour qu'il soit conforme aux standards :

    bin/qa.sh code fix

Générer la documentation (la documentation se situera dans /doc)

    bin/qa.sh doc gen

Pour un aperçu complet des fonctionnalités de qa.sh :

    bin/qa.sh help

Licence
-----------

The MIT License (MIT)

Copyright (c) 2014 Adrien Desfourneaux

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
