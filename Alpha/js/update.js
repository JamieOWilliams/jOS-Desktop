function updateIcons() {
  $('.icon-container').html("");
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "../api.php",
    success: function(data) {
      $.each(data, function(i, item) {
        var header = data[i].header;
        var link = data[i].icon_link;
        if (!header || !link) { //Checks to see if either the header or link is empty
          return;             //If so break this iteration and begin the next
        } else {
          // getNewColour();
          // var rnd = Math.floor(Math.random() * 4);
          // console.log(rnd);
          // console.log(palette);
          var iconHTML = '<a target="_blank" href="' + link + '" class="icon-anchor">';
          iconHTML += '<div class="icon" style="background-color: ' + "" + '">';
          iconHTML += '<svg class="icon-svg" height="90px" preserveaspectratio="none" viewbox="0 0 100 100" width="80px">';
          iconHTML += '<polygon fill="rbg(240,240,240)" fill-opacity="0.3" points="100,0 100,0 100,100 0,100"></polygon>'
          iconHTML += '</svg>'
          iconHTML += '<div class="icon-symbol-container">';
          iconHTML += '<h1 class="icon-symbol lead display-1">' + header.substring(0, 2) + '</h1>';
          iconHTML += '</div>';
          iconHTML += '<div class="icon-heading-container">';
          iconHTML += '<p class="icon-heading lead">' + header.substring(0, 10) + '</p>';
          iconHTML += '</div>';
          iconHTML += '</div></a>';
          $('.icon-container').append(iconHTML);
        }
      });
    }
  });
}


$(document).ready(function () {
  updateIcons();
  $('.icon-container').hide().fadeIn(1000);
});


$('#add-icon-modal').on('hidden.bs.modal', function() {
  updateIcons();
});
