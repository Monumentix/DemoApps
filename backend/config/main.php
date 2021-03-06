<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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

    /* - COMMENTED OUT TO RUN MIGRATIONS */
    'as access' => [
      'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
          'site/*',          
          // The actions listed here will be allowed to everyone including guests.
          // So, 'admin/*' should not appear here in the production, of course.
          // But in the earlier stages of your development, you may probably want to
          // add a lot of actions here until you finally completed setting up rbac,
          // otherwise you may not even take a first step.
        ]
      ],
    /* */

    'params' => $params,
];
