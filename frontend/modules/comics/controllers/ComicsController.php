<?php

namespace app\modules\comics\controllers;


use yii;
use yii\web\Controller;
use yii\data\ArrayDataProvider;


/**
 * Default controller for the `cruddemo` module
 */
class ComicsController extends Controller
{
  public function actionIndex($offset = 0)
  {
    $response = $this->queryEndpoint(['offset'=>$offset]);
    $pager = $this->buildPager($response['data']['total'],$response['data']['offset'],$response['data']['limit'],$response['data']['count']);

    return $this->render('index',[
        'response' => $response,
        'pager'=>$pager,
      ]
    );

  }







}//end class
