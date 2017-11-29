iconData = [
  {
    "name": "",
    "link": "",
    "linkImg": ""
  },
];
function shakeIcon() {
  $('.icon-img').css('-webkit-animation-name', 'spaceboots');
  $('.icon-img').css('-webkit-animation-duration', '0.8s');
  $('.icon-img').css('-webkit-transform-origin', '50% 50%');
  $('.icon-img').css('-webkit-animation-iteration-count', 'infinite');
  $('.icon-img').css('-webkit-animation-timing-function', 'linear');
};
function resetIconCss() {
  $('.icon-img').css('-webkit-animation-name', '');
  $('.icon-img').css('-webkit-animation-duration', '');
  $('.icon-img').css('-webkit-transform-origin', '');
  $('.icon-img').css('-webkit-animation-iteration-count', '');
  $('.icon-img').css('-webkit-animation-timing-function', '');
};
function recordDetails() {

};
var clickMode = 2;
//Click edit icon
$('.edit-icon').click(function() {
    clickMode = 1 //1 = edit mode
    //shake icons
    shakeIcon();
    var iconId = -1;
    //Click icon to edit
});

$('.icon').click(function() {
  //Get icon id
  iconId = this.id;
  if (clickMode === 1) {
      //open input modal
      $('#edit-modal').modal('show');
      //save data as object
      $('.icon-save').click(function() {
        console.log(iconId);
        iconData[iconId].name = $('#iconName').val();
        iconData[iconId].link = $('#iconLink').val();
        iconData[iconId].linkImg = $('#iconImgLink').val();
        //make changes
        var iconHTML = '<p class="lead icon-heading text-center">' + iconData[iconId].name + '</p>';
        $('#icon-' + iconId).html(iconHTML);
        //close modal
        $('#edit-modal').modal('hide');
        resetIconCss();
        clickMode = 2;
      });
    } else if (clickMode === 2) {
      var win = window.open(iconData[iconId].link, '_blank');
      if (win) {
          //Browser has allowed it to be opened
          win.focus();
      } else {
          //Browser has blocked it
          alert('Please allow popups for this website');
      }
    };
});

$('.add-icon').click(function () {
  $('#add-icon-modal').modal('show');
  $('#btn-add-icon').click(function() {
    if ($('#iconName').val() != "" || $('#iconLink').val() != "") {
      var newId = $('div.icon').length + 1;
      console.log(newId);
      iconData[iconId].name = $('#iconName').val();
      iconData[iconId].link = $('#iconLink').val();
      iconData[iconId].linkImg = $('#iconImgLink').val();
    } else {
      alert('Please fill in all required fields.');
    };
  });
  var iconHTML = '<div class="icon mb-1" id="' +  + '">'
});

// $('.icon-close').click(resetIconCss());













// var editIconClicked = false;
//
// $('.edit-icon').click(function() {
//   editIconClicked = true;
// });
//
// $('.icon').click(function() {
//   if (editIconClicked) {
//       var iconId = this.id;
//       console.log(iconId)
//       var iconHTML = '<input type="text" class="form-control" placeholder="">'
//       $('#icon-' + iconId).html(iconHTML);
//       editIconClicked = false;
//       $(document).keypress(function(e) {
//           if(e.which == 13) {
//               var newHeading = $('.form-control').val();
//               iconHTML = '<p class="lead icon-heading text-center">' + newHeading + '</p>';
//               console.log('This has run! This is the HTML used: ' + iconHTML );
//               $('#icon-' + iconId).html(iconHTML);
//             }
//       });
//   };
// });
