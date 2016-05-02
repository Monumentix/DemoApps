<?php

//use yii\grid\GridView;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);
?>

<?php echo $this->render('/shared/_coverView');?>

<div class="comics-series-search scroll">
  <div class="row">
    <div class="col-sm-12">
      <div class="well">
        <?=$this->render('_search',[
            //'seriesModel'=>$seriesModel,
            ]
          );
        ?>
      </div>
    </div>
  </div>


  <h3><?//=$readableSearchString?></h3>


  <?php /* =$this->render('/shared/_comicsItem',[
        'response' => $response,
        'pager'=>$pager,
        ]
    ); */  ?>
</div>
