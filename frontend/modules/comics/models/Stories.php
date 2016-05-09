<?php

namespace app\modules\comics\models;

use yii\base\Model;

class Stories extends Model
{
    public $seriesId;
    public $comicsId;
    public $characterId;
    public $eventsId;

    public $modifiedSince;

    public $comics;
    public $events;
    public $creators;
    public $characters;

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
      'id'=>'Id - ASC',
      'modified'=>'Modified - ASC',
      '-id'=>'Id - DESC',
      '-modified'=>'Modified - DESC',
    ];

    public function rules(){
      return[
        [['seriesId','modifiedSince'],'safe'],
        [['comics','events','characters','creators'],'safe'],
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
