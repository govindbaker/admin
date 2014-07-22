<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.



function _joinpath($dir1, $dir2) {
    return realpath($dir1 . '/' . $dir2);
}
 
$homePath      = dirname(__FILE__) . '/../..';
$protectedPath = _joinpath($homePath, 'protected');
$webrootPath   = _joinpath($homePath, 'webroot');
$runtimePath   = _joinpath($homePath, 'runtime');


return array(
	'basePath'    => $protectedPath,
	'runtimePath' => $runtimePath,
	'name'=>'Monster Boost',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*',
		),
	
	'defaultController'=>'dashboard',

    'modules'=>array(
        'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',

            # send activation email
            'sendActivationMail' => true,

            # allow access for non-activated users
            'loginNotActiv' => false,

            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,

            # automatically login from registration
            'autoLogin' => true,

            # registration path
            'registrationUrl' => array('/user/registration'),

            # recovery password path
            'recoveryUrl' => array('/user/recovery'),

            # login form path
            'loginUrl' => array('/user/login'),

            # page after login
            'returnUrl' => array('/user/profile'),

            # page after logout
            'returnLogoutUrl' => array('/user/login'),

            'layoutPath' => Yii::getPathOfAlias('application.views.layouts'),
        ),

        /*
		'webshell'=>array(
            'class'=>'application.modules.webshell.WebShellModule',
            // when typing 'exit', user will be redirected to this URL
            'exitUrl' => '/',
            // custom wterm options
            'wtermOptions' => array(
                // linux-like command prompt
                'PS1' => '%',
            ),
            // additional commands (see below)
            'commands' => array(
                'test' => array('js:function(){return "Hello, world!";}', 'Just a test.'),
            ),
            // uncomment to disable yiic
            // 'useYiic' => false,

            // adding custom yiic commands not from protected/commands dir
            'yiicCommandMap' => array(
                'email'=>array(
                    'class'=>'ext.mailer.MailerCommand',
                    'from'=>'admin@monsterboost.com',
                ),
                'migrate' => array(
                    'class' => 'system.cli.commands.MigrateCommand',
                    'interactive'=>false,
                ),
            ),
        ),
		*/
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'f0ur4m1g0s',
			'ipFilters'=>array('86.12.188.19','127.0.0.1'),
        ),
    ),	
	
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
            'class' => 'WebUser',
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:protected/data/blog.db',
			'tablePrefix' => 'tbl_',
		),
		*/

		
        'db'=>array(
            'connectionString' => 'mysql:host=mysql.pipeten.co.uk;dbname=risotto_monsterboost',
            'emulatePrepare' => true,
            'username' => 'risotto_monDBA',
            'password' => 'f0ur4m1g0s',
            'charset' => 'utf8',
            'tablePrefix' => 'tbl_',
        ),		

		/*
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		*/
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
                        	'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                        	'<controller:\w+>'=>'<controller>',
			),
		),

        'request' => array(
            'baseUrl' => 'http://admin.monsterboost.local',
        ),

        /*
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				array(
					'class'=>'CWebLogRoute',
				),
			),
		),
        */
        'clientScript' => array(
            'coreScriptPosition' => CClientScript::POS_END,
            'packages' => array(
                //'baseUrl' => '/assets/',
                'jquery' => array(
                    'baseUrl' => '/assets/',
                    'js' => array(
                        'js/jquery.js',
                    ),
                ),
                'bootstrap' => array(
                    'baseUrl' => '/assets/',
                    'js' => array(
                        'js/bootstrap.js',
                    ),
                    'css' => array(
                        'css/bootstrap.min.css'
                    ),
                    'depends' => array(
                        'jquery',
                    )
                ),
                'admin-specific' => array(
                    'baseUrl' => '/assets/',
                    'js' => array(
                        'js/lanceng.js',
                    ),
                    'css' => array(
                        'css/style.css',
                        'css/style-responsive.css',
                        'css/animate.css',
                        'third/font-awesome/css/font-awesome.min.css',
                        'third/weather-icon/css/weather-icons.min.css',
                    ),
                    'depends' => array(
                        'jquery',
                        'bootstrap',
                    )
                ),
                'slimscroll' => array(
                    'baseUrl' => '/assets/third/slimscroll/',
                    'js' => array(
                        'jquery.slimscroll.min.js',
                    ),
                    'depends' => array(
                        'jquery',
                    )
                ),
                'summernote' => array(
                    'baseUrl' => '/assets/third/summernote/',
                    'js' => array(
                        'summernote.js',
                    ),
                     'css' => array(
                        'summernote.css',
                    ),
                   'depends' => array(
                        'jquery',
                    )
                ),
                'selectpicker' => array(
                    'baseUrl' => '/assets/third/select/',
                    'js' => array(
                        'bootstrap-select.min.js',
                    ),
                     'css' => array(
                        'bootstrap-select.min.css',
                    ),
                   'depends' => array(
                        'bootstrap',
                    )
                ),
                'fileinput' => array(
                    'baseUrl' => '/assets/third/input/',
                    'js' => array(
                        'bootstrap.file-input.js',
                    ),
                   'depends' => array(
                        'bootstrap',
                    )
                ),
                'datepicker' => array(
                    'baseUrl' => '/assets/third/datepicker/',
                    'js' => array(
                        'js/bootstrap-datepicker.js',
                    ),
                    'css' => array(
                        'css/datepicker.css',
                    ),
                   'depends' => array(
                        'bootstrap',
                    )
                ),


                'morris' => array(
                    'baseUrl' => '/assets/third/morris/',
                    'js' => array(
                        'morris.js',
                        'raphael-min.js',
                    ),
                    'css' => array(
                        'morris.css',
                    ),
                   'depends' => array(
                        'bootstrap',
                    )
                ),
                'nifty-modal' => array(
                    'baseUrl' => '/assets/third/nifty-modal/',
                    'js' => array(
                        'js/classie.js',
                        'js/modalEffects.js',
                    ),
                    'css' => array(
                        'css/component.css',
                    ),
                   'depends' => array(
                        'bootstrap',
                    )
                ),
                'sortable' => array(
                    'baseUrl' => '/assets/third/sortable/',
                    'js' => array(
                        'sortable.min.js',
                    ),
                    'css' => array(
                        'sortable-theme-bootstrap.css',
                    ),
                   'depends' => array(
                        'bootstrap',
                    )
                ),
                'magnific-popup' => array(
                    'baseUrl' => '/assets/third/magnific-popup/',
                    'js' => array(
                        'jquery.magnific-popup.min.js',
                    ),
                    'css' => array(
                        'magnific-popup.css',
                    ),
                   'depends' => array(
                        'bootstrap',
                    )
                ),
                'icheck' => array(
                    'baseUrl' => '/assets/third/icheck/',
                    'js' => array(
                        'icheck.min.js',
                    ),
                    'css' => array(
                        'skins/minimal/grey.css',
                    ),
                   'depends' => array(
                        'bootstrap',
                    )
                ),
                'form-wizard' => array(
                    'baseUrl' => '/assets/third/wizard/',
                    'js' => array(
                        'jquery.snippet.js',
                        'jquery.easyWizard.js',
                        'scripts.js',
                    ),
                    'css' => array(
                        
                    ),
                   'depends' => array(
                        'bootstrap',
                    )
                ),
                'quicksand' => array(
                    'baseUrl' => '/assets/third/quicksand/',
                    'js' => array(
                        'jquery.quicksand.js',
                    ),
                    'css' => array(
                        
                    ),
                   'depends' => array(
                        'jquery',
                    )
                ),
                'minicolors' => array(
                    'baseUrl' => '/assets/third/minicolors/',
                    'js' => array(
                        'jquery.minicolors.min.js',
                    ),
                    'css' => array(
                        'jquery.minicolors.css',
                    ),
                   'depends' => array(
                        'jquery',
                        'bootstrap',
                    )
                ),
                'bootstrap-lightbox' => array(
                    'baseUrl' => '/assets/third/bootstrap-lightbox/',
                    'js' => array(
                        'bootstrap-lightbox.min.js',
                    ),
                    'css' => array(
                        'bootstrap-lightbox.min.css',
                    ),
                   'depends' => array(
                        'bootstrap',
                    )
                ),
           )
        ),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);