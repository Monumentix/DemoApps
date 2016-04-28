<?php

namespace app\modules\cruddemo\controllers;

use yii;
use yii\web\Controller;

use yii\data\ActiveDataProvider;

use app\models\Products;
use app\models\ProductsSearch;

use app\models\ProductCategories;
use app\models\ProductCategoriesSearch;



/**
 * Default controller for the `cruddemo` module
 */
class ProductsController extends Controller
{
    public $defaultAction = 'products';

    public function actionProducts(){
      $model = new ProductsSearch();
      $dataProvider = $model->search(Yii::$app->request->queryParams);

      return $this->render(
        'products',[
          'dataProvider'=>$dataProvider,
          'model'=>$model,
        ]);
    }


}
