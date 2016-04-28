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
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect('/crud/categories');
    }

}
