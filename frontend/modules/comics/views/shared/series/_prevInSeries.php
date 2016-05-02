<?php
  use yii\helpers\Html;
?>

<?php if(!empty($series)) : ?>
  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Previous Series</h3>
    </div>
    <div class='panel-body'>
      <?="<img src=".Yii::$app->controller->module->marvel->getImage('series/'.$id,null,"portrait_fantastic")." class='img img-thumbnail center-block' >";?>
      <h5 class="text-center"><?=$series['previous']['name']?></h5>
    </div>
  </div>
<?php endif ?>
