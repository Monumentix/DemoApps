<?php

namespace app\modules\comics\models;

use yii\base\Model;

class Events extends Model
{
    public $seriesId;

    public $nameStartsWith;
    public $modifiedSince;

    public $creators;
    public $characters;
    public $comics;
    public $stories;

    public $orderBy;
    public $limit;
    public $offset;

    public static $LIMIT_BY_TYPES = [
      '5'=>'5 rows per page',
      '10'=>'10 rows per page',
      '20'=>'20 rows per page',
      '50'=>'50 rows per page'
    ];

    public static $ORDER_BY_TYPES = [
      ''=>'Order By...',
      'name'=>'Name - ASC',
      'startDate'=>'Start Date - ASC',
      'modified'=>'Modified - ASC',
      '-name'=>'Name - DESC',
      '-startDate'=>'Start Date - DESC',
      '-modified'=>'Modified - DESC',
    ];

    public function rules(){
      return[
        [['seriesId','nameStartsWith','modifiedSince'],'safe'],
        [['comics','events','characters','stories'],'safe'],        
        [['orderBy', 'limit', 'offset'],'safe'],
      ];
    }


    public function attributeLabels()
    {
        return [

        ];
    }

    public function getOrderByTypes(){
      return self::$ORDER_BY_TYPES;
    }

    public function getLimitByTypes(){
      return self::$LIMIT_BY_TYPES;
    }

}
