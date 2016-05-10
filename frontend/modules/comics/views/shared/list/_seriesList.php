<?php
  use yii\helpers\Html;
?>


  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Series: <span class="pull-right">(<?=(!(empty($series['available'])) ? $series['available'] : 0 )?>)</span></h3>
    </div>
    <div class='panel-body'>

      <?php if(!empty($listOptions['columnClass'])) : ?>
        <div class="characters">
          <?php if(!empty($series['items'])) : ?>
            <?php foreach($series['items'] as $characters) : ?>
              <div class="<?=$listOptions['columnClass']?>"><?=$characters['name']; ?></div>
            <?php endforeach ?>
          <?php else : ?>
            <h3>No results returned!</h3>
          <?php endif ?>
        </div>
      <?php else : ?>
        <ul class="characters">
          <?php if(!empty($series['items'])) : ?>
            <?php foreach($series['items'] as $item) : ?>
              <li>
                <a href="/comics/series?id=<?=array_pop(explode("/",$item['resourceURI'])); ?>">  <?=$item['name']; ?> </a>
              </li>

            <?php endforeach ?>
          <?php else : ?>
            <h3>No results returned!</h3>
        <?php endif ?>
        </ul>
      <?php endif ?>

    </div>
    <div class='panel-footer'>
      <p class="text-center limited-to">Showing <b><?=(!(empty($series['returned'])) ? $series['returned'] : 0 ) ?>     </b> out of <b><?=(!(empty($series['available'])) ? $series['available'] : 0 ) ?>   </b> results.
      &nbsp;
          <?php
            if(!(empty($id))){
              echo Html::a('View More',
                ['series','id'=>$id]);
            }
          ?>

      </p>
    </div>
  </div>
