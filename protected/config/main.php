<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'ext.YiiMongoDbSuite.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'yucel',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                        'generatorPaths'=>array(
                            'ext.YiiMongoDbSuite.gii'
                        ),
		),
	
	),

	// application components
	'components'=>array(
                 'clientScript'=>array(
                    'packages'=>array(
                        'jquery'=>array(
                            'baseUrl'=>'/eticaret/js/',
                            'js'=>array('jquery.js'),
                        )
                    )
                ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        'class'=>'WebUser',
		),
                'mongodb' => array(
                    'class'            => 'EMongoDB',
                    'connectionString' => 'mongodb://127.0.0.1',
                    'dbName'           => 'eTicaretDatabase',
                    'fsyncFlag'        => true,
                    'safeFlag'         => true,
                    'useCursor'        => false
                  ),
		// uncomment the following to enable URLs in path-format
		
                'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName'=>false,
			'rules'=>array(
                            'gii' => 'gii',
                            'gii/<controller:\w+>' => 'gii/<controller>',
                            'gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',
                            'gii/<controller:\w+>/<id:\d+>' => 'gii/<controller>/view',
                            'gii/<controller:\w+>/<action:\w+>/<id:\d+>' => 'gii/<controller>/<action>',
                            
                           
                            '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                            '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                            '<controller:\w+>/<action:\w+>/<pn:[^\/]*>/*' => '<controller>/<action>/',
			),  
		),
            
                'widgetFactory' => array(
                    'widgets' => array(
                        'CLinkPager' => array(
                            'header' => '<div class="pagination pagination-centered">',
                            'footer' => '</div>',
                            'maxButtonCount' => 5,
                            'nextPageLabel' => '>',
                            'prevPageLabel' => '<',
                            'selectedPageCssClass' => 'active',
                            'hiddenPageCssClass' => 'disabled',
                            'htmlOptions' => array(
                                'class' => '',
                            )
                    ))),
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'system/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);