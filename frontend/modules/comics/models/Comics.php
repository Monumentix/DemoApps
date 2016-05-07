<?php

namespace app\modules\comics\models;

use yii\base\Model;

class Comics extends Model
{
    public $seriesId;

    public $format;
    public $formatType;

    public $noVariants;
    public $dateDescriptor;
    public $dateRange;

    public $title;
    public $titleStartsWith;
    public $startYear;
    public $issueNumber;

    public $diamondCode;
    public $digitalId;
    public $upc;
    public $isbn;
    public $issn;

    public $hadDigitalIssue;
    public $modifiedSince;

    public $creators;
    public $characters;
    public $events;
    public $stories;
    public $sharedApperances;
    public $collaborators;

    public $orderBy;
    public $limit;
    public $offset;


    public static $NO_VARIANTS_TYPES = [
      ''=>'Include Variants...',
      'true'=>'True',
      'false'=>'False',
    ];

    public static $LIMIT_BY_TYPES = [
      '5'=>'5 rows per page',
      '10'=>'10 rows per page',
      '20'=>'20 rows per page',
      '50'=>'50 rows per page'
    ];

    public static $COMIC_FORMATS = [
      ''=>'Select Format...',
      'comic'=>'comic',
      'magazine'=>'magazine',
      'trade paperback'=>'trade papberback'
    ];

    public static $COMIC_FORMAT_TYPE = [
      ''=>'Select Format Type...',
      'comic'=>'comic',
      'collection'=>'collection'
    ];

    public static $ORDER_BY_TYPES = [
      ''=>'Order By...',
      'focDate'=>'focDate - ASC',
      'onsaleDate'=>'On Sale Date - ASC',
      'title'=>'Title - ASC',
      'issueNumber'=>'Issue Number - ASC',
      '-focDate'=>'focDate - DESC',
      '-onsaleDate'=>'On Sale Date - DESC',
      '-title'=>'Title - DESC',
      '-issueNumber'=>'Issue Number - DESC',
    ];

    public function rules(){
      return[
        [['seriesId', 'format', 'formatType', 'noVariants', 'dateDescriptor', 'dateRange'],'safe'],
        [['title', 'titleStartsWith', 'startYear', 'issueNumber', 'diamondCode', 'digitalId'],'safe'],
        [['upc', 'isbn', 'issn', 'hadDigitalIssue', 'modifiedSince'],'safe'],
        [['creators', 'characters', 'events', 'stories', 'sharedApperances', 'collaborators'],'safe'],
        [['orderBy', 'limit', 'offset'],'safe'],
      ];
    }


    public function attributeLabels()
    {
        return [

        ];
    }

    public function getNoVariantsTypes(){
      return self::$NO_VARIANTS_TYPES;
    }

    public function getFormatTypes(){
      return self::$COMIC_FORMAT_TYPE;
    }

    public function getFormats(){
      return self::$COMIC_FORMATS;
    }

    public function getOrderByTypes(){
      return self::$ORDER_BY_TYPES;
    }

    public function getLimitByTypes(){
      return self::$LIMIT_BY_TYPES;
    }


}
