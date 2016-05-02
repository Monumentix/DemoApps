<?php

namespace app\modules\comics\components;



use Yii;
use yii\base\Exception;
use yii\base\Component;
use yii\base\InvalidConfiguration;
use yii\helpers\Json;
use yii\web\HttpException;

class MarvelComponent extends Component{

  private $base = "http://gateway.marvel.com:80/v1/public/";
  private $publicKey = "d17809da6bca9abbbe0eaceee5ef8eff";
  private $privateKey;
  private $ts;
  private $hash;

  public function init(){
    //Set up our auth stuff
    $this->privateKey = Yii::$app->params['comicsPrivateKey'];
    $this->ts = time();
    $this->hash = md5($this->ts.$this->privateKey.$this->publicKey);
  }

  /*
  * endpoint - the endpoint we want to access
  * params - array of filterBy conditions, and
  * (pager, limits, offsets)
  *
  *
  *
  */
  public function search($endpoint, $params = null){

    $fullUrl = $this->base.$endpoint.
      "?ts=".$this->ts .
      "&apikey=".$this->publicKey .
      "&hash=".$this->hash;

      if(isset($params['filterBy'])){
        foreach($params['filterBy'] as $filter){
          $key = key($filter);
          if($filter[$key] <> ''){
            $fullUrl = $fullUrl ."&".$key."=".$filter[$key];
          }
        }
      }

      if(isset($params['pager'])){
        foreach($params['pager'] as $key => $value){
            $fullUrl = $fullUrl ."&".$key."=".$value;
        }
      }

    $response = Yii::$app->httpclient->get($fullUrl);
    $pager = $this->buildPager($response, $params);

    $results = [
        'urlCalled'=>$fullUrl,
        'response'=> $response,
        'pager' => $pager,
      ];

    return $results;
  }


  private function buildPager($response, $params =null){

    $total = $response['data']['total'];
    $offset = $response['data']['offset'];
    $limit = $response['data']['limit'];


    $pager['firstPage'] =  0 ;
    $pager['prevPage'] = ($offset - $limit);
    $pager['curPage'] = (($offset/$limit) + 1);
    $pager['nextPage'] = ($offset + $limit);
    $pager['lastPage'] = ceil(($total / $limit));
    $pager['pageSize'] = $limit;
    $pager['offset'] = $offset;
    $pager['total'] = $total;


    $pager['nextPageLink'] = "";

    if(isset($params['filterBy'])){
      foreach($params['filterBy'] as $filter){
        $key = key($filter);
        if($filter[$key] <> ''){
          if($pager['nextPageLink'] == ''){
              //first time through
              $pager['nextPageLink'] = "?".$key."=".$filter[$key];
          }else{
            $pager['nextPageLink'] = $pager['nextPageLink'] ."&".$key."=".$filter[$key];
          }
        }
      }
    }

    return $pager;
  }


}
