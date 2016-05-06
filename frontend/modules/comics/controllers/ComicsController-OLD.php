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
  public $defaultAction = 'search';

  public function actionSearch($offset = 0)  {


    $comicsModel = new Comics();
    //Not working as intended and loading searched values into the form
    if(isset($_GET['Comics'])){
      foreach($_GET['Comics'] as $key =>$val){
        $comicsModel->$key = $val;
      }
    }

    //Handles our pager params settings
    $params = [
      'pager'=>[
        'offset'=>$offset,
        'limit'=>10,  //this will need to get moved to be dynamic
        ]
    ];


    //This is for our search results page and basically works as intended
    $readableSearchString = '';

    //CHECH IF 1st SEARCH QUERY or
    if(isset($_GET['Comics'])){
      $params['filterBy'] = [];

      //Search Criteria For Getting Started
        foreach($_GET['Comics'] as $key => $val){
          if(isset($val) && ($val <> '')){
            array_push($params['filterBy'],[$key => $val]);
            if($readableSearchString == ''){
              $readableSearchString = 'Searching On: '.$key.' = '. $val .' ';
            }else{
              $readableSearchString = $readableSearchString .', '.$key.' = '. $val .' ';  
            }
          }
        }
    }else{
    //ITS A SECOND CALL TO OUR SEACH PARAMS
      //Check to see if this a call from our next page buttons
      $readableSearchString = 'Search For: ';
      $params['filterBy'] = [];

        foreach($_GET as $key => $val){
          if(isset($val) && ($val <> '')){
            array_push($params['filterBy'],[$key => $val]);
            $readableSearchString = $readableSearchString .' '.$key.' = '. $val .' ';
          }
        }
    }

    //GET OUR DATA
    $results = $this->module->marvel->search('comics',$params);


    //DECIDE WHICH VIEW TO RENDER
    if($offset === 0){
      //No offset show/render whole page
      return $this->render('search',[
          'comicsModel'=>$comicsModel,
          'readableSearchString'=>$readableSearchString,
          'response' => $results['response'],
          'pager'=>$results['pager'],
          'urlCalled'=>$results['urlCalled'],
        ]
      );
    }else{
      //There was an offset, partial render
      echo $this->renderPartial('/shared/_comicsItem',[
            'comicsModel'=>$comicsModel,
            'response' => $results['response'],
            'pager'=>$results['pager'],
            'urlCalled'=>$results['urlCalled'],
          ]
        );
    }//end if offset

  }//end actionIndex




  public function actionDetail($id){
    $comicsModel = new Comics();

    /*
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
    */

    $results = $this->module->marvel->search('comics/'.$id,null);


    //No offset show/render whole page
    return $this->render('detail',[
        'comicsModel'=>$comicsModel,
        'response' => $results['response'],
      ]
    );

  }//end actionDetail



}//end class
