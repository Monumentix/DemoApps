<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);


//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
$creators = $response['response']['data']['results'];

$this->title = 'Series Details'; //Yii::t('detail', 'Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['/comics/series']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('/shared/_coverView');?>

<div class="comics-comics-detail scroll">
  <div class="row">
    <div class="col-sm-8 text-left">
      <h2><?php //=$creators['firstName'];?> <?php //=$creators['lastName'];?></h2>
    </div>
    <div class="col-sm-4 text-right hidden-xs ">

    </div>
  </div>


</div>


<pre class="prettyprint">
  <?php
    // print_r($creators[1])
  ?>
</pre>
<pre class="prettyprint">
  <?php
    // print_r($response)
  ?>
</pre>
