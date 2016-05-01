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
  $path = "comics?characters=";
  $charId = "1009268";

  if(isset($params['offset'])){
    $offset = $params['offset'];
  }




  $fullUrl = $base . $path . $charId
    ."&limit=10"
    ."&offset=". $offset
    ."&ts=" . $ts
    ."&apikey=d17809da6bca9abbbe0eaceee5ef8eff"
    ."&hash=" . $hash;


  $response = Yii::$app->httpclient->get($fullUrl);

  return $response;
  */


  /*
  * endpoint - the endpoint we want to access
  * params - array of filterBy conditions, and
  * (pager, limits, offsets)
  *
  *
  *
  */
  public function search($endpoint, $params){

    $fullUrl = $this->base.$endpoint.
      "?ts=".$this->ts .
      "&apikey=".$this->publicKey .
      "&hash=".$this->hash;

      if(isset($params['filterBy'])){
        foreach($params['filterBy'] as $key => $value){
          $fullUrl = $fullUrl ."&".$key."=".$value;
        }
      }

      if(isset($params['pager'])){
        foreach($params['pager'] as $key => $value){
          $fullUrl = $fullUrl ."&".$key."=".$value;
        }
      }

    $response = Yii::$app->httpclient->get($fullUrl);
    $pager = $this->buildPager($response);

    $results = [
        'response'=> $response,
        'pager' => $pager,
      ];

    return $results;
  }


  private function buildPager($response){

    $total = $response['data']['total'];
    $offset = $response['data']['offset'];
    $limit = $response['data']['limit'];

    $pager['firstPage'] =  0 ;
    $pager['prevPage'] = ($offset - $limit);
    $pager['curPage'] = (($offset/$limit) + 1);
    $pager['nextPage'] = ($offset + $limit);
    $pager['lastPage'] = ceil(($total / $limit));

    return $pager;
  }


}