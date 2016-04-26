<?php
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
?>

<?php include('header.php') ;?>

<?php $this->beginBody() ?>

<div class="wrap">
  <?php include('menu.php') ;?>

  <div id="breadcrumbWrapper" class="container-fluid ">
    <div class="container">
      <?= Breadcrumbs::widget([
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
    </div>
  </div>

    <div class="container">
      <?php //= Alert::widget() ?>
      <?= $content ?>
    </div>
</div>

<?php include('footer.php') ;?>
