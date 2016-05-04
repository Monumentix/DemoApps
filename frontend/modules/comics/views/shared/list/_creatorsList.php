<?php
  use yii\helpers\Html;
?>

<?php if(!empty($creators['items'])) : ?>
  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Creators: <span class="pull-right">(<?=$creators['available']?>)</span></h3>
    </div>
    <div class='panel-body'>

      <?php if($creators['returned'] > 0 ) : ?>
        <?php if(!empty($listOptions['columnClass'])) : ?>
          <div class="creators">
            <?php foreach($creators['items'] as $creator) : ?>
              <div class="<?=$listOptions['columnClass']?>"><?=$creator['name']; ?></div>
            <?php endforeach ?>
          </div>
        <?php else : ?>
          <ul class="creators">
            <?php foreach($creators['items'] as $creator) : ?>
              <li><?=$creator['name']; ?></li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      <?php else :?>
        <h3>No results returned.</h3>
      <?php endif ?>



    </div>
    <div class='panel-footer'>
      <p class="text-center limited-to">Showing <b><?=$creators['returned']?></b> out of <b><?=$creators['available'] ?></b> results. &nbsp;
        <?php
          if(!(empty($id))){
            echo Html::a('View More',
              ['creators','id'=>$id]);
          }
        ?>
      </p>

    </div>
  </div>
<?php endif ?>
