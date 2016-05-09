<div class="pages-wrapper fjalla">
  <div class="row display-table odd" >
    <div class="col-xs-4 text-center display-cell ">
      <?php if(!(empty($story['thumbnail']))) : ?>
        <img src="<?=$story['thumbnail']['path']?>/standard_medium.<?=$story['thumbnail']['extension']?>" class="img img-thumbnail img-rounded">
      <?php endif; ?>
      <h4><?= $story['title']; ?></h4>
    </div>
    <div class="col-xs-3 display-cell text-left">
      <?php if(!(empty($story['originalIssue']))) : ?>
        <?=$story['originalIssue']['name']?>
      <?php endif; ?>
    </div>
    <div class="col-xs-1 display-cell text-center">
      <?php if(!(empty($story['comics']))) : ?>
        <?=$story['comics']['available']?> <br>Comics
      <?php endif; ?>
    </div>
    <div class="col-xs-1 display-cell text-center">
      <?php if(!(empty($story['series']))) : ?>
        <?=$story['series']['available']?> <br>Series
      <?php endif; ?>
    </div>
    <div class="col-xs-1 display-cell text-center">
      <?php if(!(empty($story['characters']))) : ?>
        <?=$story['characters']['available']?> <br>Characters
      <?php endif; ?>
    </div>
    <div class="col-xs-1 display-cell text-center">
      <?php if(!(empty($story['creators']))) : ?>
        <?=$story['creators']['available']?> <br>Creators
      <?php endif; ?>
    </div>
    <div class="col-xs-1 display-cell text-center">
      <a href="/comics/stories?id=<?=$story['id']?>" class="btn btn-info btn-xs text-center shadow">Details</a>
    </div>
  </div>
</div>
<hr class="comics-divider">
