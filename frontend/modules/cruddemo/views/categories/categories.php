<?php

use yii\data\ActiveDataProvider;

use yii\helpers\Html;
use yii\helpers\HtmlPrifier;

use kartik\grid\GridView;

?>

<div class="row">
  <div class="col-sm-12">
    <h1 class="title">Categories
      <span class="lead">
        Category data we pulled from shopping.com
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
          [
            'label'=>'Parent',
            'attribute' => 'parent_shopping_cat_id',
            'value'=>function($data, $model, $key){
              if($data->parent_shopping_cat_id == null ){
                  return '';
              }
              return $data->parentShoppingCat->name;
            },
          ],
          [
          'label'=>"Load Category",
          'format'=>'raw',
          'value'=>function ($data){
            if(is_null($data->parent_shopping_cat_id)){
              return Html::a("Load Top Level Load",["/apidemo/default/load-products","shopping_cat_id"=>$data->shopping_cat_id,"pgStart"=>1,"pgEnd"=>10]);
            }else{
              return Html::a("Try Sub Level Load",["/apidemo/default/load-products","blnTop"=>"false","shopping_cat_id"=>$data->shopping_cat_id,"pgStart"=>1,"pgEnd"=>10]);
              }
            }
          ],
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
