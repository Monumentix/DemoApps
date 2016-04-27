<?php
use mdm\admin\components\MenuHelper;

use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use kartik\icons\Icon;



NavBar::begin([
    'brandLabel' => Yii::t('app', Yii::$app->name),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-default navbar-fixed-top',
    ],
]);

$menuItems[] = ['label' => Icon::show('home').' '.Yii::t('app', 'Home'), 'url' => Url::to(['/','#'=>''])];
$menuItems[] = ['label' => Icon::show('info-circle').' '.Yii::t('app', 'About'), 'url' => ['/#about']];
$menuItems[] = ['label' => Icon::show('envelope').' '.Yii::t('app', 'Contact'), 'url' => ['/#contact']];
$menuItems[] = ['label' => Icon::show('rss-square').' '.Yii::t('app', 'Blog'), 'url' => ['/blog/index']];

$callback = function($menu){
    $data = eval($menu['data']);

    return [
        'label' => Icon::show($data['icon']).' '.$menu['name'],
        'url' => [$menu['route']],
        'options' => $data['options'],
        'items' => $menu['children']
    ];
};


//$items  = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
$items = MenuHelper::getAssignedMenu(Yii::$app->user->id,null, $callback, true);

if (Yii::$app->user->isGuest){
  $items[] =['label' =>Icon::show('sign-in').'&nbsp;'.Yii::t('app', 'Login'), 'url' => ['/site/login']];
}else{
  $items [] = [
    'label'=>Icon::show('sign-out').'&nbsp;'.Yii::t('app', 'Logout'). ' (' . Yii::$app->user->identity->username . ')',
    'url' => ['/site/logout'],
    'linkOptions' => ['data-method' => 'post']
  ];
}


echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $items,
    'encodeLabels'=>false,
]);


NavBar::end();

?>
