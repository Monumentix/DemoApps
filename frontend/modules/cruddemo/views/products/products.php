<?php

use yii\data\ActiveDataProvider;

use yii\helpers\Html;
use yii\helpers\HtmlPrifier;

use kartik\grid\GridView;

?>

<div class="row">
  <div class="col-sm-12">
    <h1 class="title">Products
      <span class="lead">
        Product data we pulled from shopping.com
      <span>
    </h1>
  </div>
</div>

<hr class="blog-devider">

  <?php

  echo GridView::widget([
      'bootstrap'=>true,
      'condensed'=>true,
      'dataProvider'=> $dataProvider,
      'filterModel' => $model,
      'columns' => [
          'id',
          'shopping_cat_id',
          'name',
          'description',
          'image_small',
          'base_price'
        ],
      'pjax'=>true,
      'export'=>false,
      /*'pjaxSettings'=>[
          'neverTimeout'=>true,
          //'beforeGrid'=>'My fancy content before.',
          //'afterGrid'=>'My fancy content after.',
        ],
      */
      ]);


    ?>
