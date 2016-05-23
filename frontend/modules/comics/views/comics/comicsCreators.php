<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS

$this->title = 'Creators In '.(!(empty($comicsResponse['title'])) ? $comicsResponse['title'] :  ' No results ' );

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comic App'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics/comics']];
$this->params['breadcrumbs'][] = $this->title;

//Tell our view which section of the response data has our results
$data = $response['response']['data']['results'];
?>

<?php echo $this->render('/shared/blocks/_coverView');?>

<div class="comics-comics-creators">

<div class="row">
  <div class="col-sm-12">
    <?php if(!(empty($id))) : ?>
      <h2 class="endpoint">(/v1/public/comics/{comicsId}/creators) : <small>Fetches lists of comic creators whose work appears in a specific comic, with optional filters.   </small></h2>
    <?php endif; ?>
    </div>
</div>

<div class="row">
  <div class="col-sm-12">
      <?php if(!empty($id)){
        echo $this->render('/shared/detail/_comicDetail',[
          'id'=>$id,
          'comic'=>$comicsResponse,
        ]);
      }?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?php /*
      echo $this->render('/shared/forms/_CharacterSearch.php',[
        'model'=>$model,
        ]);  */
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
      echo $this->render('/shared/paged/_CreatorsPaged.php',[
        'seriesId'=>$id,
        'creatorsPaged'=>$data,
        'pager'=>$pager,
      ]);
    ?>
  </div>
</div>

<hr class="comics-divider">
<div class="row">
  <div class="col-sm-12">
    <h3 class="text-center">Additional Comic Information:</h3>
  </div>
</div>


<div class="row">
  <div class="col-sm-12">
    <?php
    if(!empty($comicsResponse['comics'])){

      echo $this->render('/shared/list/_comicsList',[
          'listOptions'=>[
            'columnClass'=>'col-xs-6',
          ],
          'id'=>$id,
          'comics'=>$comicsResponse['comics'],
        ]);
    }
  ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_storiesList',[
          'id'=>$id,
          'stories'=>$comicsResponse['stories'],
        ]);
      }?>
  </div>

  <div class="col-sm-6">
    <?php if(!empty($id)){

      echo $this->render('/shared/list/_eventsList',[
        'id'=>$id,
        'events'=>$comicsResponse['events'],
      ]);

    }?>
  </div>


</div>
<div class="row">

  <div class="col-sm-6">
    <?php if(!empty($id)){

      echo $this->render('/shared/list/_charactersList',[
        'id'=>$id,
        'characters'=>$comicsResponse['characters'],
      ]);

    }?>
  </div>






</div>


</div>
<hr class="comics-divider">
<?= $this->render('/shared/blocks/_responseFooter.php',['fullResponse'=>$response]); ?>
<p class="text-center"><?=$response['response']['attributionHTML']?></p>
