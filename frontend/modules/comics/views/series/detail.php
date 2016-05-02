<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

$this->title = 'Series Details'; //Yii::t('detail', 'Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['/comics/series']];
$this->params['breadcrumbs'][] = $this->title;



/*
$this->title = Yii::t('app', 'Update Article') . ': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
*/
?>

<?php echo $this->render('/shared/_coverView');?>

<?php $series =  array_pop($response['response']['data']['results']) ?>

<div class="comics-comics-detail scroll">

  <div class="row">
    <div class="col-sm-8 text-left">
      <h2><?=$series['title'];?></h2>
      <h5>Rating: <?=$series['rating'];?></h5>
    </div>
    <div class="col-sm-4 text-right hidden-xs ">
      <h3>Start Year: <?=$series['startYear'];?></h3>
      <h3>End Year:<?=$series['endYear'];?></h3>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12 text-left long-description">
      <p class=""><?=$series['description'];?></p>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-4">
        <?php echo $this->render('/shared/_creators',[
            'series'=>$series,
          ]);
        ?>
    </div>
    <div class="col-sm-4">
      <?php echo $this->render('/shared/_characters',[
          'series'=>$series,
        ]);
      ?>
    </div>
    <div class="col-sm-4">
      <?php echo $this->render('/shared/_stories',[
          'series'=>$series,
        ]);
      ?>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <h3 class="text-center">Comics</h3>
    </div>
  </div>


</div>



<pre class="prettyprint">
  <?php
    print_r($series)
  ?>
</pre>
<pre class="prettyprint">
  <?php
    print_r($response)
  ?>
</pre>
