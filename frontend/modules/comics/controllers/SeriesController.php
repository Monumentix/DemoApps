<?php

namespace app\modules\comics\controllers;


use yii;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use app\modules\comics\models\Comics;

/**
 * Default controller for the `cruddemo` module
 */
class SeriesController extends Controller
{

  public $defaultAction = 'search';

  public function actionSearch(){

    return $this->render('search',[
      //
      ]
    );
  }


  public function actionDetail($id){
    //GET OUR DATA
    $response = $this->module->marvel->search('series/'.$id,null);

    return $this->render('detail',[
    //  'series'=>array_pop($response['response']['data']['results']),
      'response'=>$response,
      ]
    );

  }

}//end class
