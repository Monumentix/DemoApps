<?php
use frontend\assets\AppAsset;
use yii\bootstrap\Alert;

use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
?>

<?php include('header.php') ;?>
<div id="wrap">
  <div id="main" class="">

    <?php $this->beginBody() ?>

      <?php include('menu.php') ;?>

        <div id="content-wrapper" class="container">
          <?= Breadcrumbs::widget([
              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
          ]) ?>
          <?php Alert::widget() ?>
          <?= $content ?>
        </div>
  </div>
</div>
<?php include('footer.php') ;?>
