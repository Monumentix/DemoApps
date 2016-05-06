<div class="row">
  <div class="col-sm-3 text-center ">
    <?php if(!empty($comic['thumbnail'])) : ?>
      <img class="img img-responsive img-series-cover center-block" src="<?=$comic['thumbnail']['path']."/detail.".$comic['thumbnail']['extension']; ?>">
    <?php endif ?>
  </div>

  <div class="col-sm-9 text-left">
    <div class="row">
      <div class="col-sm-8 text-left">
        <h1 class="comicsTitle">Comic:</h1>
        <h3><?=$comic['title'];?></h3>
        <h4>Issue #: <?=$comic['issueNumber'];?></h4>
      </div>
      <div class="col-sm-4 text-left hidden-xs ">
        <h3>UPC: <?=$comic['upc'];?></h3>
        <h3>Diamond Code: <?=$comic['diamondCode'];?></h3>
        <h4>Format: <?=(($comic['format'] == null) ? 'na' : $comic['format']);?></h4>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 text-left long-description">
        <h5 class="">Description:</h5>
        <p class=""><?=(($comic['description'] == null) ? 'No description listed.' : $comic['description'] );?></p>
      </div>
    </div>
  </div>
</div>
