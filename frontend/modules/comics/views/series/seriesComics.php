<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

$this->title = 'Series Comics - PUT VALUE FROM LOOKUP OF ID HERE'; //Yii::t('detail', 'Details');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['/comics/series']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('/shared/_coverView');?>

<?php $comics = $response['response']['data']['results'][0]; ?>

<div class="comics-series-comics scroll">

</div>
<hr>
<h3 class="text-center">DEBUG</h3>
<pre class="prettyprint">
  <?php
  //print_r($series);
  print_r($response);
  ?>
</pre>
