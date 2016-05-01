<?php

//use yii\grid\GridView;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);
?>

<?php echo $this->render('/shared/_coverView');?>

<div class="comics-default-index scroll">
  <div class="row">
    <div class="col-sm-12">
      <h2 class="title">Marvel Comics API : <span class="lead">Ineracting with there REST api for developers!</span></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="well">
        <?=$this->render('_search',[
            'comicsModel'=>$comicsModel,
            ]
          );
        ?>
      </div>
    </div>
  </div>

  <?=$this->render('/shared/_comicsItem',[
        'response' => $response,
        'pager'=>$pager,
        ]
    );
  ?>
</div>
