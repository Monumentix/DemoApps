<?php

namespace app\modules\comics\controllers;


use yii;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use app\modules\comics\models\Comics;

/**
 * Default controller for the `cruddemo` module
 */
class ComicsController extends Controller
{
  public function actionIndex($offset = 0)  {

    $comicsModel = new Comics();

    $params = [
      //'filterBy'=>['characters'=>'1009268'],
      'pager'=>[
        'offset'=>$offset,
        'limit'=>10,
        ]
    ];

    if(isset($_POST['Comics'])){
      $params['filterBy'] = [];
      //Search Criteria For Getting Started
        foreach($_POST['Comics'] as $key => $val){
          if(isset($val)){
            array_push($params['filterBy'],[$key => $val]);
          }
        }
        $params['filterBy'];
    }

    $results = $this->module->marvel->search('comics',$params);

    if($offset === 0){
      //No offset show/render whole page
      return $this->render('index',[
          'comicsModel'=>$comicsModel,
          'response' => $results['response'],
          'pager'=>$results['pager'],
        ]
      );
    }else{
      //There was an offset, partial render
      echo $this->renderPartial('/shared/_comicsItem',[
            'comicsModel'=>$comicsModel,
            'response' => $results['response'],
            'pager'=>$results['pager'],
          ]
        );
    }//end if offset

  }//end actionIndex



}//end class
