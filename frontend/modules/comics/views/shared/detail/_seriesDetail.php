<div class="row">
  <div class="col-sm-3 text-center ">
    <?php if(!empty($series['thumbnail'])) : ?>
      <img class="img img-responsive img-series-cover center-block" src="<?=$series['thumbnail']['path']."/detail.".$series['thumbnail']['extension']; ?>">
    <?php endif ?>
  </div>

  <div class="col-sm-9 text-left">
    <div class="row">
      <div class="col-sm-8 text-left">
        <h1 class="comicsTitle">Comic Series:</h1>
        <h3><?=$series['title'];?></h3>
        <h5>Rating: <?=$series['rating'];?></h5>
      </div>
      <div class="col-sm-4 text-right hidden-xs ">
        <h3>Start Year: <?=$series['startYear'];?></h3>
        <h3>End Year:<?=$series['endYear'];?></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 text-left long-description">
        <p class=""><?//=$series['textObjects'];?></p>
        <p class=""><?=$series['description'];?></p>
      </div>
    </div>
  </div>
</div>
