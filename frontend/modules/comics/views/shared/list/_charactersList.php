<?php
  use yii\helpers\Html;
?>

<?php if(!empty($characters['characters'])) : ?>
  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Characters: <span class="pull-right">(<?=$characters['characters']['available']?>)</span></h3>
    </div>
    <div class='panel-body'>

      <?php if(!empty($listOptions['columnClass'])) : ?>
        <div class="characters">
          <?php foreach($characters['characters']['items'] as $character) : ?>
            <div class="<?=$listOptions['columnClass']?>"><?=$character['name']; ?></div>
          <?php endforeach ?>
        </div>
      <?php else : ?>
        <ul class="characters">
          <?php foreach($characters['characters']['items'] as $character) : ?>
            <li><?=$character['name']; ?></li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>

    </div>
    <div class='panel-footer'>
      <p class="text-center limited-to">Showing <b><?=$characters['characters']['returned']?></b> out of <b><?=$characters['characters']['available']?></b> results.
      &nbsp;
        <?=Html::a('View More',
          ['characters','id'=>$id]);?>
      </p>
    </div>
  </div>
<?php endif ?>
