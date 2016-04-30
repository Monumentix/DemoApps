<?php

namespace app\modules\apidemo\controllers;

use yii;
use yii\web\Controller;

use yii\data\ActiveDataProvider;

use app\models\Products;
use app\models\ProductsSearch;
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




    private function loadProducts($shopping_cat_id, $pageNumber = null){
      $products = $this->module->shopCurl->getProducts($shopping_cat_id, $pageNumber);

      try{
        foreach($products->categories->category->items->children() as $item){
          $productModel = new Products();
          $productModel->name = $item->name;
          $productModel->shopping_cat_id = $shopping_cat_id;
          $productModel->description = $item->description;

          if(isset($item->manufacturer)){
            $productModel->manufacturer = $item->manufacturer;
          }



          $images = $item->imageList->children();
          if(isset($images[0]->sourceURL)){
            $productModel->image_small = $images[0]->sourceURL;
          }
          if(isset($images[(count($images)-1)]->sourceURL)){
            $productModel->image_large =  $images[(count($images)-1)]->sourceURL  ;
          }



          if($productModel->save(false)){
            Yii::$app->getSession()->addFlash('success', 'Record Saved');
            return true;
          }else{
            Yii::$app->getSession()->addFlash('error', 'Record Not Saved');
            return false;
          }
        }

        return false;

      }//end try
      catch(CDbException $e)
      {
        Yii::$app->getSession()->addFlash('error', $e->getMessage());
        return false;
      }//end catch

    }


    private function loadTopCatProducts($shopping_cat_id, $pgNumb = null){
      $products = $this->module->shopCurl->getProducts($shopping_cat_id, $pgNumb);
      $children = $products->categories->category->items->xpath('child::node()');

      try{

        foreach($children as $product){
          $productModel = new Products();
          $productModel->name =  $product->name;
          $productModel->base_price =  $product->basePrice;
          $productModel->shopping_cat_id = $shopping_cat_id;
          $productModel->description = $product->description;

          $images = $product->imageList->children();
            $productModel->image_small = $images[0]->sourceURL;
            $productModel->image_large =  $images[count($images)-1]->sourceURL ;

          if($productModel->save(false)){
            Yii::$app->getSession()->addFlash('success', 'Record Saved');
            return true;
          }else{
            Yii::$app->getSession()->addFlash('error', 'Record Not Saved');
            return false;
          }
        }
      }
      catch(CDbException $e)
      {
        Yii::$app->getSession()->addFlash('error', $e->getMessage());
        return false;
      }//end catch


    }


    public function actionLoadProducts($blnTop = null, $shopping_cat_id, $pgNumb = null, $pgStart = null, $pgEnd = null){

      $products = $this->module->shopCurl->getProducts($shopping_cat_id);

      if(!is_null($pgStart) && !is_null($pgEnd)){
        for($curPage = $pgStart; $curPage<=$pgEnd; $curPage++){

          if(!is_null($blnTop)){
            if($this->loadTopCatProducts($shopping_cat_id, $curPage) == true){
              $this->redirect('/crud/products/products');
            }else{
              echo 'Not returning true on multipage save';
            }
          }else{
            if($this->loadProducts($shopping_cat_id, $curPage) == true){
              $this->redirect('/crud/products/products');
            }else{
              echo 'Not returning true on multipage save';
            }
          }


        }
      }else{
        if(!is_null($blnTop)){
          if($this->loadTopCatProducts($shopping_cat_id)){
            $this->redirect('/crud/products/products');
          }
        }else{          
          if($this->loadProducts($shopping_cat_id)){
            $this->redirect('/crud/products/products');
          }
        }

      }



    }//end actionLoadProducts




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
