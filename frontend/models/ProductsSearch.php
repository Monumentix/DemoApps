<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

class ProductsSearch extends Products {


  /**
   * @inheritdoc
   */
  public function rules()
  {
      return [
          [['shopping_cat_id', 'base_price'], 'integer'],
          [['name', 'manufacturer','image_large','image_small'], 'string', 'max' => 255],
          [['description'], 'string'],
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
      $query = ProductsSearch::find();

      $dataProvider = new ActiveDataProvider([
          'query' => $query,
          'sort'=>['defaultOrder'=>['name'=>SORT_ASC]],
      ]);

      if (!($this->load($params) && $this->validate())) {
          return $dataProvider;
      }

      $query->andFilterWhere([
          'id' => $this->id,
          'shopping_cat_id' => $this->shopping_cat_id,
          'name' => $this->name,
      ]);

      $query->andFilterWhere(['like', 'name', $this->name]);

      return $dataProvider;
  }



}
?>
