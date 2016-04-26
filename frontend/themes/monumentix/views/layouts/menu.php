<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use kartik\icons\Icon;
?>

<?php
    NavBar::begin([
        'brandLabel' => Yii::t('app', Yii::$app->name),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);

    // everyone can see Home page
    $menuItems[] = ['label' => Icon::show('home').' '.Yii::t('app', 'Home'), 'url' => Url::to(['/','#'=>''])];
    $menuItems[] = ['label' => Icon::show('info-circle').' '.Yii::t('app', 'About'), 'url' => ['/#about']];
    $menuItems[] = ['label' => Icon::show('envelope').' '.Yii::t('app', 'Contact'), 'url' => ['/#contact']];
    $menuItems[] = ['label' => Icon::show('rss-square').' '.Yii::t('app', 'Blog'), 'url' => ['/blog/index']];


    /*

    // we do not need to display Article/index, About and Contact pages to editor+ roles
    if (!Yii::$app->user->can('editor'))
    {
        $menuItems[] = ['label' => Yii::t('app', 'Blog'), 'url' => ['/article/index']];
        $menuItems[] = ['label' => Yii::t('app', 'About'), 'url' => ['/#aboutme']];
        $menuItems[] = ['label' => Yii::t('app', 'Contact'), 'url' => ['/#contactme']];
    }


    // display Article admin page to editor+ roles
    if (Yii::$app->user->can('editor'))
    {
        $menuItems[] = ['label' => Yii::t('app', 'Articles'), 'url' => ['/article/admin']];
    }
    */


    // display Signup and Login pages to guests of the site
    if (Yii::$app->user->isGuest)
    {
         $menuItems[] =['label' =>Icon::show('sign-in').'&nbsp;'.Yii::t('app', 'Login'), 'url' => ['/site/login']];


    }
    // display Logout to all logged in users
    else
    {
 /*        $menuItems[] = [
                'label' => Icon::show('sign-out').'&nbsp;'.Yii::t('app', 'Logout'). ' (' . Yii::$app->user->identity->username . ')',
                'items'=>[
                    ['label'=>'test','url'=>'#'],
                  ],
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ];  */

        $menuItems[] = [
                'label' => Icon::show('user').'My Account',
                'items'=>[
                    [
                      'label' => Icon::show('tasks').Yii::t('app', 'Admin Blog'),
                      'url' => ['/blog/admin'],
                    ],
                    '<li class="divider"></li>',
                    [
                      'label'=>Icon::show('sign-out').'&nbsp;'.Yii::t('app', 'Logout'). ' (' . Yii::$app->user->identity->username . ')',
                      'url' => ['/site/logout'],
                      'linkOptions' => ['data-method' => 'post']
                    ],

                  ],
                'url' => ['#'],
            ];




    }





    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels'=>false,
    ]);
    NavBar::end();
?>
