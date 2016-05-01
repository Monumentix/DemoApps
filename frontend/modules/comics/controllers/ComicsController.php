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
  public function actionIndex($offset = 0)  {

    $params = [
      'filterBy'=>['characters'=>'1009268'],
      'pager'=>[
        'offset'=>$offset,
        'limit'=>10,
        ]
    ];

    $results = $this->module->marvel->search('comics',$params);

    if($offset == 0){
      //No offset show/render whole page
      return $this->render('index',[
          'response' => $results['response'],
          'pager'=>$results['pager'],
        ]
      );
    }else{
      //There was an offset, partial render
        return $this->render('/shared/_comicsItem',[
            'response' => $results['response'],
            'pager'=>$results['pager'],
          ]
        );
    }//end if offset

  }//end actionIndex



}//end class
