<?php
  use yii\helpers\Html;
?>

<?php if(!empty($series['stories'])) : ?>
  <div class="panel panel-monumentix ">
    <div class='panel-heading'>
      <h3 class="panel-title">Stories (<?=$series['stories']['available']?>)</h3>
    </div>
    <div class='panel-body'>
      <ul class="creators">
        <?php foreach($series['stories']['items'] as $story) : ?>
          <li><?= (!empty($story['name']) ? $story['name'] : 'stories/'. array_pop(explode("/",$story['resourceURI']))); ?></li>
        <?php endforeach ?>
      </ul>
    </div>
    <div class='panel-footer'>
      <p class="text-center limited-to">Limited to <b><?=$series['stories']['returned']?></b> results. &nbsp;
        <?=Html::a('View More',
          ['stories','id'=>$id]);?>
      </p>
    </div>
  </div>
<?php endif ?>