<?php
  use yii\helpers\Html;
?>

<?php if(!empty($comics['items'])) : ?>
  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Comics: <span class="pull-right">(<?=$comics['available']?>)</span></h3>
    </div>
    <div class='panel-body'>
      <?php if($comics['returned'] > 0 ) : ?>
        <?php if(!empty($listOptions['columnClass'])) : ?>
          <div class="comics">
            <?php foreach($comics['items'] as $comic) : ?>
              <div class="<?=$listOptions['columnClass']?>"><?=$comic['name']; ?></div>
            <?php endforeach ?>
          </div>
          <?php else : ?>
          <ul class="comics">
            <?php foreach($comics['items'] as $comic) : ?>
              <li><?=$comic['name']; ?></li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      <?php else :?>
        <h3>No results returned.</h3>
      <?php endif ?>
    </div>
    <div class='panel-footer'>
      <p class="text-center limited-to">Showing <b><?=$comics['returned']?></b> out of <b><?=$comics['available'] ?></b> results. &nbsp;
        <?php
          if(!(empty($id))){
            echo Html::a('View More',
              ['comics','id'=>$id]);
          }
        ?>
      </p>
    </div>
  </div>
<?php endif ?>
