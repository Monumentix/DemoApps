<div class="row">
  <ul>
    <?php
      foreach($cats->category as $category){        
          echo "<li><h2>".$category->attributes()->id." - ".$category->name."</h2></li>";
          if(isset($category->categories)){
            echo "<ul>";
            foreach($category->categories->category as $childCategory){
              echo "<li><h3>".$childCategory->attributes()->id." - ".$childCategory->name. "</h3></li>";
            }
            echo "</ul>";
          }
      }
    ?>
  </ul>
</div>
