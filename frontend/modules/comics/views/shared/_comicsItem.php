
<div id="comicsItemWrapper" class="comicswrapper">
  <div class="row">
  <?php foreach($response['data']['results'] as $comic) : ?>
    <div class="row">
      <div class="col-sm-12">

      </div>
    </div>
    <div class="row">
      <div class="col-xs-2  text-center">
        <a onClick="showModal('<?=$comic['thumbnail']['path']."/detail.".$comic['thumbnail']['extension']; ?>','<?=$comic['title']?>')" >
          <img class="img img-thumbnail img-responsive" src="<?=$comic['thumbnail']['path']."/standard_medium.".$comic['thumbnail']['extension']; ?>">
        </a>
      </div>
      <div class="col-xs-10 ">
        <div class="row">
          <div class="col-xs-8">
            <h4><?=$comic['title']; ?></h4>
            <Br>
              <p><?=$comic['description']; ?></p>
          </div>
          <div class="col-xs-4 text-center">
            <p><b>Issue Number: </b><?=$comic['issueNumber']; ?><b>UPC: </b><?=$comic['upc']; ?></p>
            <p ><b>Comics id: </b><?=$comic['id']; ?></p>
            <p><b>URI: </b><?// echo $comic['resourceURI']; ?></p>
          </div>
        </div>
      </div>
    </div>
    <hr>
  <?php endforeach ?>
  </div>


</div>

<?= $this->render('/shared/_comicsPager',[
  'pager'=>$pager,
  'response'=>$response,
  ])
?>
