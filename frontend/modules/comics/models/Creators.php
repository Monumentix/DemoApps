<?php

namespace app\modules\comics\models;

use yii\base\Model;

class Creators extends Model
{
    public $seriesId;
    public $eventId;
    public $storyId;

    public $firstName;
    public $middleName;
    public $lastName;
    public $suffix;

    public $nameStartsWith;
    public $firstNameStartsWith;
    public $middleNameStartsWith;
    public $lastNameStartsWith;
    public $modifiedSince;
    public $comics;
    public $events;
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
      'lastName'=>'Last Name - ASC',
      'firstName'=>'First Name - ASC',
      'middleName'=>'Middle Name - ASC',
      'modified'=>'Modified - ASC',
      '-lastName'=>'Last Name - DESC',
      '-firstName'=>'First Name - DESC',
      '-middleName'=>'Middle Name - DESC',
      '-modified'=>'Modified - DESC',
    ];

    public function rules(){
      return[
        [['seriesId','firstName','middleName','lastName','suffix'],'safe'],
        [['nameStartsWith','firstNameStartsWith','middleNameStartsWith','lastNameStartsWith'],'safe'],
        [['modifiedSince','comics','events','stories'],'safe'],
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
