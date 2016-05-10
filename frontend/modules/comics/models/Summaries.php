<?php
namespace app\modules\comics\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table ".
 *
 */
class Summaries extends ActiveRecord
{

    /**
     * Declares the name of the database table associated with this AR class.
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{characters_stats_table}}';
    }

    /**
     * Returns the validation rules for attributes.
     *
     * @return array
     */
    public function rules()
    {
      return [
                [['characterId', 'comicsCount', 'seriesCount', 'storiesCount', 'eventsCount', 'created_at', 'updated_at'], 'integer'],
                [['name', 'imgURI'], 'string', 'max' => 255],
             ];
    }

    /**
     * Returns a list of behaviors that this component should behave as.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Returns the attribute labels.
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
          'id' => 'ID',
          'name' => 'Name',
          'characterId' => 'Character ID',
          'imgURI' => 'Img Uri',
          'comicsCount' => 'Comics Count',
          'seriesCount' => 'Series Count',
          'storiesCount' => 'Stories Count',
          'eventsCount' => 'Events Count',
          'created_at' => 'Created At',
          'updated_at' => 'Updated At',
        ];
    }


}
