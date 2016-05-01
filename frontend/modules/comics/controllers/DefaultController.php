<?php

namespace app\modules\comics\controllers;


use yii;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use app\modules\comics\models\Comics;


/**
 * Default controller for the `cruddemo` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($offset = 0)
    {
        //$this->module->marvel->

        $response = $this->queryEndpoint(['offset'=>$offset]);

        /*
        $comicsModel = new Comics();
        $comicsProvider = new ArrayDataProvider(
          [
            'allModels' => $this->queryEndpoint(),
            'models'=> $models['data']['results'],
          ]
        );
        */

        $pager = $this->buildPager($response['data']['total'],$response['data']['offset'],$response['data']['limit'],$response['data']['count']);

        return $this->render('index',[
            'response' => $response,
            'pager'=>$pager,
          ]
        );

        //return $this->render('index');
    }

    public function actionSearch($offset){
      $response = $this->queryEndpoint(['offset'=>$offset]);



      return $this->renderPartial('_comicsItem',[
          'response' => $response,
          'pager'=>$pager,
        ]
      );
    }






    /*
    * This may not be the best or right place for this
    *
    * [offset] => int starting point
    * [limit] => int Max 100
    * [total] => int Total
    * [count] => int ResponseCount
    * [results] = Array
    *
    */
    private function queryEndPoint($params = null){
      $base = "http://gateway.marvel.com:80/v1/public/";

      $path = "comics?characters=";
      $charId = "1009268";

      $ts = time();

      if(isset($params['offset'])){
        $offset = $params['offset'];
      }

      $privateKey = Yii::$app->params['comicsPrivateKey'];
      $publicKey = "d17809da6bca9abbbe0eaceee5ef8eff";
      $hash = md5($ts.$privateKey.$publicKey);

      $fullUrl = $base . $path . $charId
        ."&limit=10"
        ."&offset=". $offset
        ."&ts=" . $ts
        ."&apikey=d17809da6bca9abbbe0eaceee5ef8eff"
        ."&hash=" . $hash;


      $response = Yii::$app->httpclient->get($fullUrl);

      return $response;
    }




    public function buildPager($total, $offset, $limit, $count){
        $pager['firstPage'] =  0 ;
        $pager['prevPage'] = ($offset - $limit);
        $pager['curPage'] = (($offset/$limit) + 1);
        $pager['nextPage'] = ($offset + $limit);
        $pager['lastPage'] = ceil(($total / $limit));
      return $pager;

    }



}
