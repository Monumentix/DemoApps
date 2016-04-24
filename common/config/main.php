<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules'=>[
      'admin' => [
          'class' => 'mdm\admin\Module',
          'layout'=>'top-menu',
          //'mainLayout' => '@app/views/layouts/main.php',
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
    ],
    /* - COMMENTED OUT TO RUN MIGRATIONS
    'as access' => [
    'class' => 'mdm\admin\components\AccessControl',
    'allowActions' => [
        'site/*',
        'admin/*',
        // The actions listed here will be allowed to everyone including guests.
        // So, 'admin/*' should not appear here in the production, of course.
        // But in the earlier stages of your development, you may probably want to
        // add a lot of actions here until you finally completed setting up rbac,
        // otherwise you may not even take a first step.
    ]
  ],
  */
];
