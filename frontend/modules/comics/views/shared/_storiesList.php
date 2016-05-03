<?php
  use yii\helpers\Html;
?>

<?php if(!empty($series['stories'])) : ?>
  <div class="panel panel-monumentix ">
    <div class='panel-heading'>
      <h3 class="panel-title">Stories: <span class="pull-right">(<?=$series['stories']['available']?>)</span></h3>
    </div>
    <div class='panel-body'>




      <?php if(!empty($listOptions['columnClass'])) : ?>

        <div class="creators-horiz">
          <?php foreach($series['stories']['items'] as $story) : ?>
            <div class="<?=$listOptions['columnClass']?>"><?= (!empty($story['name']) ? $story['name'] : 'stories/'. array_pop(explode("/",$story['resourceURI']))); ?></div>
          <?php endforeach ?>
        </div>

      <?php else : ?>

        <ul class="creators">
          <?php foreach($series['stories']['items'] as $story) : ?>
            <li><?= (!empty($story['name']) ? $story['name'] : 'stories/'. array_pop(explode("/",$story['resourceURI']))); ?></li>
          <?php endforeach ?>
        </ul>

      <?php endif ?>


    </div>
    <div class='panel-footer'>
      <p class="text-center limited-to">Showing <b><?=$series['stories']['returned']?></b> out of <b><?=$series['stories']['available']?></b> results. &nbsp;
        <?=Html::a('View More',
          ['stories','id'=>$id]);?>
      </p>
    </div>
  </div>
<?php endif ?>
