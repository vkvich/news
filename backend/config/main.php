<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'language' => 'ru-RU',
    'id' => 'app-backend',
    'homeUrl' => '/admin',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
		'custompages' => [
			'class' => 'andrewdanilov\custompages\backend\Module',
			// access role for module controllers, optional, default is ['@']
			'access' => ['admin'],
			// path to Views for pages and categories
			'templatesPath' => '@frontend/views/custompages',
			// optional, path to user translates
			'translatesPath' => '@common/messages/custompages',
			// file manager configuration, optional, default is:
			'fileManager' => [
				'basePath' => '@frontend/web',
				'paths' => [
					[
						'name' => 'News',
						'path' => 'upload/images/news',
					],
					[
						'name' => 'Article',
						'path' => 'upload/images/article',
					],
				],
			],
		],
	],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin',
        ],
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'andrewdanilov\adminpanel\models\User',
            'accessChecker' => 'andrewdanilov\adminpanel\AccessChecker',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => ['user/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

            ],
        ],

    ],
    'controllerMap' => [
        'user' => [
            'class' => 'andrewdanilov\adminpanel\controllers\UserController',
//            'viewPath' => '@backend/views/user', // optional, custom UserController views location
        ],
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['?'], // доступ для всех
            'root' => [
                'path' => 'images', // директория внутри web
                'name' => 'Изображения'
            ],
        ]
    ],
    'params' => $params,
];
