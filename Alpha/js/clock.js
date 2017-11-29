var showD3Clock = function() {

  var w = 320             // Width of SVG element
  var h = 320             // Height of SVG element

  var cx = w / 2          // Center x
  var cy = h / 2          // Center y
  var margin = 4
  var r = w / 2 - margin  // Radius of clock face

  var svg = d3.select("body").append("svg")
    .attr("class", "clock")
    .attr("width", w)
    .attr("height", h)

  makeClockFace()

  // Create hands from dataset
  svg.selectAll("line.hand")
    .data(getTimeOfDay())
    .enter()
    .append("line")
    .attr("class", function (d) { return d[0] + " hand"})
    .attr("x1", cx)
    .attr("y1", function (d) { return cy + handBackLength(d) })
    .attr("x2", cx)
    .attr("y2", function (d) { return r - handLength(d)})
    .attr("transform", rotationTransform)

  // Update hand positions once per second
  setInterval(updateHands, 1000)

  function makeClockFace() {
    var hourTickLength = Math.round(r * 0.2)
    var minuteTickLength = Math.round(r * 0.075)
    for (var i = 0; i < 60; ++i) {
      var tickLength, tickClass
      if ((i % 5) == 0) {
        tickLength = hourTickLength
        tickClass = "hourtick"
      }
      else {
        tickLength = minuteTickLength
        tickClass = "minutetick"
      }
      svg.append("line")
        .attr("class", tickClass + " face")
        .attr("x1", cx)
        .attr("y1", margin)
        .attr("x2", cx)
        .attr("y2", margin + tickLength)
        .attr("transform", "rotate(" + i * 6 + "," + cx + "," + cy + ")")
    }
  }

  function getTimeOfDay() {
    var now = new Date()
    var hr = now.getHours()
    var min = now.getMinutes()
    var sec = now.getSeconds()
    return [
      [ "hour",   hr + (min / 60) + (sec / 3600) ],
      [ "minute", min + (sec / 60) ],
      [ "second", sec ]
    ]
  }

  function handLength(d) {
    if (d[0] == "hour")
      return Math.round(0.45 * r)
    else
      return Math.round(0.90 * r)
  }

  function handBackLength(d) {
    if (d[0] == "second")
      return Math.round(0.25 * r)
    else
      return Math.round(0.10 * r)
  }

  function rotationTransform(d) {
    var angle
    if (d[0] == "hour")
      angle = (d[1] % 12) * 30
    else
      angle = d[1] * 6
    return "rotate(" + angle + "," + cx + "," + cy + ")"
  }

  function updateHands() {
    svg.selectAll("line.hand")
      .data(getTimeOfDay())
      // .transition().ease("bounce")
      .attr("transform", rotationTransform)
  }
}

showD3Clock()
