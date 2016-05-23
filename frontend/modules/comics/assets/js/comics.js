$(window).ajaxStart(function (){
    $('body').addClass('wait');
  })
  .ajaxComplete(function () {
    $('body').removeClass('wait');
});



$('.seriesComicsComic').on('click','.img-thumbnail',function(){
  var detailsPanel = $(this).parent().next('.seriesComicsDetails');
  $(detailsPanel).toggle();
  $('.seriesComicsRow').hide().fadeIn('fast');
});

$('.seriesComicsDetails').on('click','.details',function(){
  //$(this).parent().removeClass('bigComicPreview');
  $(this).parent().toggle();
  $('.seriesComicsRow').hide().fadeIn('fast');
});


function showModal(path, title){
    //Fix to move modal before showing it
  $("#coverImageTitle").html(title);
  $("#coverImageUrl").attr("src",path);

  $('#coverView').css("zIndex",1500);

  $('#coverView').appendTo("#wrap").modal('show');
  $('.modal-backdrop').appendTo("#wrap")

  //Show our spinner on our modal
  $('#coverImageUrl').hide();
  $('#loadingImg').show();

  $('#coverImageUrl').on('load',function(){
    $('#coverImageUrl').show();
    $('#loadingImg').hide();
  });

  //$('#coverView').modal('show');
  //But we also set some data from our rows into the form
}






function getNextPage(actionPath, dataAttrs){
  try{
    $.ajax({
        type: "POST",
        url: actionPath,
        data: dataAttrs,
        dataType : 'html',
        beforeSend: function(){
          $('.nextPageWrapper .btn').addClass('hide');
          $('.nextPageWrapper .progress').toggle();
        },
        success: function(data, status, xhr){
          pagedData = ($(data).find('.pages-wrapper').html());
          $(".pages-wrapper").append(pagedData);

          pageButton = ($(data).find('.nextPageWrapper'));
          $(".nextPageWrapper").replaceWith(pageButton);

          responseBlock = ($(data).find('.responseBlock'));
          $(".responseBlock").replaceWith(responseBlock);
        },
        error: function(xhr, status, error){
          alert("Error Fetching Next Page: " + error);
        },
        complete: function(){
          $('body').removeClass('wait');
          //alert("complete");
        }
    });
  }
  catch (ex){
    alert(ex);
  }
}
