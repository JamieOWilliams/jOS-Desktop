var url = "http://colormind.io/api/";
var data = {
	model : "default",
	input : [[44,43,44],[90,83,82],"N","N","N"]
}

var http = new XMLHttpRequest();
var palette;

// function getNewColour() {
//   http.onreadystatechange = function() {
//   	if(http.readyState == 4 && http.status == 200) {
//   		palette = JSON.parse(http.responseText).result;
//       // console.log(palette);
//   	}
//   }
//
//   http.open("POST", url, true);
//   http.send(JSON.stringify(data));
// };

$('.colour-icon').click(function newColour() {
  http.onreadystatechange = function() {
  	if(http.readyState == 4 && http.status == 200) {
  		palette = JSON.parse(http.responseText).result;
      // console.log(palette);
      $('#poly-1').attr('fill', 'rgb(' + palette[4] + ')')
      $('#poly-2').attr('fill', 'rgb(' + palette[2] + ')')
      $('.face').css('stroke', 'rgb(' + palette[2] + ')' )
      $('.hand').css('stroke', 'rgb(' + palette[4] + ')' )
      $('.second').css('stroke', 'rgb(' + palette[3] + ')' )
  	}
  }

  http.open("POST", url, true);
  http.send(JSON.stringify(data));
});
