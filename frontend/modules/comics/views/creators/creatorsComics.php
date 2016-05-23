<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS
$this->title = 'Comis From '.(!(empty($creatorsResponse['fullName'])) ? $creatorsResponse['fullName'] :  ' No results ' );
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comic App'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Creators'), 'url' => ['/comics/creators']];
$this->params['breadcrumbs'][] = $this->title;

//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
//GRAB just our results for easy use later
$data = $response['response']['data']['results'];

?>
<?php echo $this->render('/shared/blocks/_coverView');?>

<div class="comics-creators-comics">

<div class="row">
  <div class="col-sm-12">
    <?php if(!(empty($id))) : ?>
      <h2 class="endpoint">(/v1/public/creators/{creatorId}/comics) : <small></small></h2>
    <?php endif; ?>
    </div>
</div>




<div class="row">
  <div class="col-sm-12">
      <?php if(!empty($id)){
        echo $this->render('/shared/detail/_creatorDetail',[
          'id'=>$id,
          'creator'=>$creatorsResponse,
        ]);
      }?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?php if(!(empty($id))){
      echo $this->render('/shared/forms/_ComicsSearch.php',[
        'model'=>$model,
        ]);
      }
    ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?php
      echo $this->render('/shared/paged/_pagerCount.php',[
        'pager'=>$pager,
      ]);
    ?>
  </div>
</div>


<div class="row pagedData">
  <div class="col-sm-12">
    <?php
      echo $this->render('/shared/paged/_ComicsPaged.php',[
        'buttonParams'=>[
          'idField'=>'creatorId',
          'idValue'=>$id,
        ],
        'comicsPaged'=>$data,
        'pager'=>$pager,
        ]);
    ?>
  </div>
</div>

<hr class="comics-divider">

<div class="row">


  <div class="col-sm-4">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_storiesList',[
          'id'=>$id,
          'stories'=>$data[0]['stories'],
        ]);
      }?>
  </div>

  <div class="col-sm-4">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_charactersList',[
          'id'=>$id,
          'characters'=>$data[0]['characters'],
        ]);
      }?>
  </div>


  <div class="col-sm-4">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_eventsList',[
          'id'=>$id,
          'events'=>$data[0]['events'],
        ]);
      }?>
  </div>

  <div class="col-sm-4">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_seriesList',[
        'id'=>$id,
        'series'=>$data[0]['series'],
      ]);
    }?>
  </div>


</div>

</div>

<hr class="comics-divider">

<?= $this->render('/shared/blocks/_responseFooter.php',['fullResponse'=>$response]); ?>
<p class="text-center"><?=$response['response']['attributionHTML']?></p>

