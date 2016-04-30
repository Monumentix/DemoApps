<div class="comics-default-index">
  <div class="row">
    <div class="col-sm-12">
      <h2 class="title">Marvel Comics API -<span class="lead">Ineracting with there REST api for developers!</span></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">

          <?php foreach($results as $comic) : ?>
              <pre class="pre-scrollable">
                <?php print_r($comic); ?>
              </pre>
          <?php endforeach; ?>

    </div>
  </div>


</div>
