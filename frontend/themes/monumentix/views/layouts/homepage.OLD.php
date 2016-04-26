<?php
use frontend\assets\AppAsset;

use yii\helpers\Html;
use yii\bootstrap\NavBar;
?>

<?php include('header.php') ;?>

<?php $this->beginBody() ?>

<?php include('menu.php') ;?>
  <div id="main" class="container-fluid no-padding">
    <?= $content ?>
  </div>

<?php include('footer.php') ;?>
