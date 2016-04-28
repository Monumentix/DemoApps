<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_categories".
 *
 * @property integer $id
 * @property integer $shopping_cat_id
 * @property string $name
 * @property string $catgeoryURL
 * @property integer $parent_shopping_cat_id
 *
 * @property ProductCategories $parentShoppingCat
 * @property ProductCategories[] $productCategories
 */
class ProductCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shopping_cat_id', 'parent_shopping_cat_id'], 'integer'],
            ['shopping_cat_id','unique','message'=>'{attribute}:{value} already exists!'],
            [['name', 'catgeoryURL'], 'string', 'max' => 255],
            [['parent_shopping_cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategories::className(), 'targetAttribute' => ['parent_shopping_cat_id' => 'shopping_cat_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shopping_cat_id' => 'Shopping Cat ID',
            'name' => 'Name',
            'catgeoryURL' => 'Catgeory Url',
            'parent_shopping_cat_id' => 'Parent Shopping Cat ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentShoppingCat()
    {
        return $this->hasOne(ProductCategories::className(), ['shopping_cat_id' => 'parent_shopping_cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategories::className(), ['parent_shopping_cat_id' => 'shopping_cat_id']);
    }



}
