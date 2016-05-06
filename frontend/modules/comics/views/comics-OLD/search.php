<?php

//use yii\grid\GridView;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);


$this->title = 'Search Comics '; //Yii::t('detail', 'Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('/shared/_coverView');?>

<div class="comics-comics-search scroll">
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


  <h3><?=$readableSearchString?></h3>


  <?=$this->render('/shared/_comicsItem',[
        'response' => $response,
        'pager'=>$pager,
        ]
    );
  ?>
</div>
