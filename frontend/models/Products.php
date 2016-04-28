<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property integer $shopping_cat_id
 * @property string $description
 * @property string $manufacturer
 * @property string $image_large
 * @property string $image_small
 * @property integer $base_price
 *
 * @property ProductCategories $shoppingCat
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shopping_cat_id', 'base_price'], 'integer'],
            [['description'], 'string'],
            [['name', 'manufacturer', 'image_large', 'image_small'], 'string', 'max' => 255],
            [['shopping_cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategories::className(), 'targetAttribute' => ['shopping_cat_id' => 'shopping_cat_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'shopping_cat_id' => 'Shopping Cat ID',
            'description' => 'Description',
            'manufacturer' => 'Manufacturer',
            'image_large' => 'Image Large',
            'image_small' => 'Image Small',
            'base_price' => 'Base Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShoppingCat()
    {
        return $this->hasOne(ProductCategories::className(), ['shopping_cat_id' => 'shopping_cat_id']);
    }
}
