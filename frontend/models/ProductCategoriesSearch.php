<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductCategories;

class ProductCategoriesSearch extends ProductCategories {


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
  public function scenarios()
  {
      // bypass scenarios() implementation in the parent class
      return Model::scenarios();
  }

  /**
   * Creates data provider instance with search query applied
   *
   * @param array $params
   *
   * @return ActiveDataProvider
   */
  public function search($params)
  {
      $query = ProductCategoriesSearch::find();

      $dataProvider = new ActiveDataProvider([
          'query' => $query,
          'sort'=>['defaultOrder'=>['shopping_cat_id'=>SORT_ASC]],
      ]);

      if (!($this->load($params) && $this->validate())) {
          return $dataProvider;
      }

      $query->andFilterWhere([
          'id' => $this->id,
          'shopping_cat_id' => $this->shopping_cat_id,
          'parent_shopping_cat_id' => $this->parent_shopping_cat_id,
      ]);

      $query->andFilterWhere(['like', 'name', $this->name]);

      return $dataProvider;
  }



}
?>
