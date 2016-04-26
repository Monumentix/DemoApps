<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use kartik\icons\Icon;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
Icon::map($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link href='https://fonts.googleapis.com/css?family=Fjalla+One|Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
