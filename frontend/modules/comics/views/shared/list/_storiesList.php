<?php
  use yii\helpers\Html;
?>

<?php if(!empty($stories['items'])) : ?>
  <div class="panel panel-monumentix panel-stories">
    <div class='panel-heading'>
      <h3 class="panel-title">Stories: <span class="pull-right">(<?=$stories['available']?>)</span></h3>
    </div>
    <div class='panel-body'>
      <?php if(!empty($listOptions['columnClass'])) : ?>
        <div class="stories">
          <?php foreach($stories['items'] as $story) : ?>
            <div class="<?=$listOptions['columnClass']?>"><?= (!empty($story['name']) ? $story['name'] : 'stories/'. array_pop(explode("/",$story['resourceURI']))); ?></div>
          <?php endforeach ?>
        </div>
      <?php else : ?>
        <ul class="stories">
          <?php foreach($stories['items'] as $story) : ?>
            <li><?= (!empty($story['name']) ? $story['name'] : 'stories/'. array_pop(explode("/",$story['resourceURI']))); ?></li>
          <?php endforeach ?>
        </ul>

      <?php endif ?>


    </div>
    <div class='panel-footer'>
      <p class="text-center limited-to">Showing <b><?=$stories['returned']?></b> out of <b><?=$stories['available']?></b> results. &nbsp;

          <?php
            if(!(empty($id))){
              echo Html::a('View More',
                ['stories','id'=>$id]);
            }
          ?>

      </p>
    </div>
  </div>
<?php endif ?>
