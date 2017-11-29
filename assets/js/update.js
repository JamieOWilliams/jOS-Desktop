function update() {
  //Code to initialise page
  var hasRun = false;
  var pageNum = 1;
  var pageHTML = '<div class="item active">';
  pageHTML += '<div class="jOSicon-container-wrapper active" id="contWrapperID' + pageNum + '">';
  pageHTML += '<div class="jOSicon-container" id="contID' + pageNum + '">';
  pageHTML += '</div></div></div>';
  $('.carousel-inner').html("");
  $('.carousel-inner').append(pageHTML);
  $('.jOSicon-container').html("");
  var contWidth = $('.jOSicon-container-wrapper').width();
  var contHeight = $('.jOSicon-container-wrapper').height();
//  console.log(contHeight);
//  console.log(contWidth);
  var xMax =  Math.floor(contWidth / 140); //$('.jOSicon').width());
  var yMax =  Math.floor(contHeight / (120 + 20)); //Math.floor(contHeight / $('.jOSicon').height());
//  console.log('xMax: ' + xMax);
//  console.log('yMax: ' + yMax);
  var xNum = 0;
  var iconNum = 0;
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "../../getIcon.php",
    success: function(data) {
      $.each(data, function(i, item) {
        //console.log(iconNum);
        xNum = Math.floor(iconNum / yMax) + 1;
        //console.log('xNum: ' + xNum);
        if (xNum > xMax) {
        //  console.log('Has run');
          //Code to add new page
          pageNum++;
          pageHTML = '<div class="item">';
          pageHTML += '<div class="jOSicon-container-wrapper" id="contWrapperID' + pageNum + '">';
          pageHTML += '<div class="jOSicon-container" id="contID' + pageNum + '">';
          pageHTML += '</div></div></div>';
          $('.carousel-inner').append(pageHTML);
          iconNum = 0;
          //Add the corrent number of pagination navs
          if (!hasRun) {
            $('.carousel-indicators').append('<li data-target="#iconCarousel" data-slide-to="0" class="active"></li>'); //The initial one
            hasRun = true;
          }
          $('.carousel-indicators').append('<li data-target="#iconCarousel" data-slide-to="' + (pageNum - 1) + '"></li>'); //Any extra ones
        }
        iconNum++;
        var header = data[i].header;
        var link = data[i].icon_link;
        var id = data[i].id;
        if (!header || !link) { //Checks to see if either the header or link is empty
          iconNum--;
        //  console.log('Has broken loop')
          return;             //If so break this iteration and begin the next
        } else {
          //Code to run on with each set of data
          var iconHTML = '<div class="jOSicon" id="' + id + '"><i href="#" class="material-icons delete-icon" id="0' + id + '">delete_forever</i>';
          iconHTML += '<i class="material-icons edit-icon" id="00' + id + '">edit</i>'
          iconHTML += '<a target="_blank" class="icon-link" href="' + link + '">';
          iconHTML += '<div class="jOSicon-squared-container">';
          iconHTML += '<img src="//logo.clearbit.com/' + link.substring(8) + '?size=80">'; //'<h1 class="jOSicon-squared">' + header.substring(0,2) + '</h1>';
          iconHTML += '</div>';
          iconHTML += '<div class="jOSicon-header-container">';
          iconHTML += '<p class="jOSicon-header">' + header.substring(0,10) + '</p>';
          iconHTML += '</div></div></a>'
      //    console.log(pageNum);
          $('#contID' + pageNum).append(iconHTML);
          $('.jOSicon').hide();
          $('.delete-icon').hide();
          $('.edit-icon').hide();
        }
      });
      $('.jOSicon').fadeIn(600);
    }
  });
  editIcons();
};


$(document).ready(function () {
  update();
  $('#addIconModal').on('hidden.bs.modal', function () {
    update();
  });
  $('#editIconModal').on('hidden.bs.modal', function () {
    update();
  });
});

function editIcons() {
  //Code to delete icons
  $('#edit-icons').click(function() {
    $('.delete-icon').fadeIn(600);
    $('.edit-icon').fadeIn(600);
  });
  $('#iconCarousel').on('click', '.delete-icon', function(e) {
    var id = this.id.substring(1)
  //  console.log(id);
    $('#' + id).fadeOut(1000);
    $.ajax({
      type: "POST",
      url: "../../deleteIcon.php",
      data: {'id': id},
      success: function() {}
    });
    e.preventDefault();
    $('.delete-icon').fadeOut(600);
    $('.edit-icon').fadeOut(600);
  });

  $('#iconCarousel').on('click', '.edit-icon', function(e) {
    var id = this.id.substring(2)
    var data;
//    console.log(id)
    $('#editIconModal').modal('show');
    $('body').on('click', '.editSave-icon', function(e) {
      var header = $('#editHeader').val()
      var link = $('#editIcon_link').val()
      $('#'+ id + ' .jOSicon-header').text(header);
      $('#'+ id + ' .jOSicon-squared').text(header.substring(0,2));
      $('#'+ id + ' .icon-link').attr('href', link);
      data = {'id': id, 'header': header, 'link': link};
//      console.log(data);
      $.ajax({
        type: "POST",
        url: "../../editIcon.php",
        data: data,
        success: function() {
          // console.log("deleted");
        }
      });
    });
    e.preventDefault();
    $('.delete-icon').fadeOut(600);
    $('.edit-icon').fadeOut(600);
  });
};
