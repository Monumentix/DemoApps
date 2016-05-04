<?php
  use yii\helpers\Html;
?>
  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Characters: <span class="pull-right">(<?=$characters['available']?>)</span></h3>
    </div>
    <div class='panel-body'>

      <?php if($characters['returned'] > 0 ) : ?>
        <?php if(!empty($listOptions['columnClass'])) : ?>
          <div class="characters">
            <?php foreach($characters['items'] as $character) : ?>
              <div class="<?=$listOptions['columnClass']?>"><?=$character['name']; ?></div>
            <?php endforeach ?>
          </div>
        <?php else : ?>
          <ul class="characters">
            <?php foreach($characters['items'] as $character) : ?>
              <li><?=$character['name']; ?></li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      <?php else :?>
        <h3>No results returned.</h3>
      <?php endif ?>
    </div>
    <div class='panel-footer'>
      <p class="text-center limited-to">Showing <b><?=$characters['returned']?></b> out of <b><?=$characters['available']?></b> results.
      &nbsp;
        <?php
          if(!(empty($id))){
            echo Html::a('View More',
              ['characters','id'=>$id]);
          }
        ?>
      </p>
    </div>
  </div>
