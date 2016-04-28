<?php

namespace app\modules\cruddemo\controllers;

use yii;
use yii\web\Controller;

use yii\data\ActiveDataProvider;

use app\models\ProductCategories;
use app\models\ProductCategoriesSearch;



/**
 * Default controller for the `cruddemo` module
 */
class CategoriesController extends Controller
{
    public $defaultAction = 'categories';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }




    public function actionCategories(){
      $model = new ProductCategoriesSearch();
      $dataProvider = $model->search(Yii::$app->request->queryParams);

      return $this->render(
        'categories',[
          'dataProvider'=>$dataProvider,
          'model'=>$model,
        ]);
    }
      

}
