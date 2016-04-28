<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductCategories]].
 *
 * @see ProductCategories
 */
class ProductCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ProductCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
