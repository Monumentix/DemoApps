<?php

namespace app\modules\apidemo\controllers;

use yii;
use yii\web\Controller;

use yii\data\ActiveDataProvider;

use app\models\ProductCategories;
use app\models\ProductCategoriesSearch;

/**
 * Default controller for the `apidemo` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        return $this->render(
          'index',[

          ]);
    }



    public function actionCategories(){
      $model = new ProductCategoriesSearch();
      $dataProvider = $model->search(Yii::$app->request->queryParams);

      return $this->render(
        'categories',[
          'dataProvider'=>$dataProvider,
          'model'=>$model,
        ]);
    }


    public function actionLoadProducts($shopping_cat_id){

      echo $shopping_cat_id;

    }


    private function loadProduct(){

    }





    public function actionLoadCategory($id){
      $cats = $this->module->shopCurl->getCategory($id);
      try{
        foreach($cats->category as $category){
          //This is the category we passed it
          $catModel = new ProductCategories();

          $catModel->shopping_cat_id = $category->attributes()->id;
          $catModel->name = $category->name;

              if(!$catModel->save()){
                //record didnt save add error message?
                Yii::$app->getSession()->addFlash('error',json_encode($catModel->getErrors()) );
              }else{
                Yii::$app->getSession()->addFlash('success','Category Save Completed Trying Children' );
              }
                //We saved that row to db, check for children now
                if(isset($category->categories)){
                    //we have children categories
                    foreach($category->categories->category as $childCategory){
                      $subCatModel = new ProductCategories();
                      $subCatModel->shopping_cat_id = $childCategory->attributes()->id;
                      $subCatModel->name = $childCategory->name;
                      $subCatModel->parent_shopping_cat_id = $catModel->shopping_cat_id;

                      if(!$subCatModel->save(false)){
                        Yii::$app->getSession()->addFlash('error', 'Error saving Child Category Model');
                      }//end if save

                    }//end for children
                }//end if children


            }//end for top level cat

        }//end try
        catch (CDbException $e)
        {
          Yii::$app->getSession()->addFlash('error', $e->getMessage());
        }

    $this->redirect('categories');

    }//end action




}
