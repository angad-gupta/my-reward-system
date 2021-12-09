var _animatedPie = function(element, size) {
  var pmt_total_work_inspect = $('input[name=pmt_total_work_inspect]').val();
  var pmt_total_todo = $('input[name=pmt_total_todo]').val();
  var pmt_total_inprogress = $('input[name=pmt_total_inprogress]').val();
  var pmt_total_completed = $('input[name=pmt_total_completed]').val();
  if (typeof d3 == 'undefined') {
    console.warn('Warning - d3.min.js is not loaded.');
    return;
  }

  if(element) {
    var data = [
    {
      "status": "Todo",
      "icon": "<i class='badge badge-mark border-blue-300 mr-2'></i>",
      "value": pmt_total_todo,
      "color": "#22A7F0"
    }, {
      "status": "In Progress",
      "icon": "<i class='badge badge-mark border-success-300 mr-2'></i>",
      "value": pmt_total_inprogress,
      "color": "#FF7043"
    }, {
      "status": "Completed",
      "icon": "<i class='badge badge-mark border-blue-300 mr-2'></i>",
      "value": pmt_total_completed,
      "color": "#00B894"
    }, {
      "status": "Work Inspect",
      "icon": "<i class='badge badge-mark border-success-300 mr-2'></i>",
      "value": pmt_total_work_inspect,
      "color": "#E26D5C"
    }
    ];

    var d3Container = d3.select(element),
    distance = 2,
    radius = (size/2) - distance,
    sum = d3.sum(data, function(d) { return d.value; });
    var tip = d3.tip()
    .attr('class', 'd3-tip')
    .offset([-10, 0])
    .direction('e')
    .html(function (d) {
      return "<ul class='list-unstyled mb-1'>" +
      "<li>" + "<div class='font-size-base my-1'>" + d.data.icon + d.data.status + "</div>" + "</li>" +
      "<li>" + "Total: &nbsp;" + "<span class='font-weight-semibold float-right'>" + d.value + " <small>("+(100 / (sum / d.value)).toFixed(2)+"%)</small></span>" + "</li></ul>";
    });

    var container = d3Container.append("svg").call(tip);
    var svg = container
    .attr("width", size)
    .attr("height", size)
    .append("g")
    .attr("transform", "translate(" + (size / 2) + "," + (size / 2) + ")");
    var pie = d3.layout.pie()
    .sort(null)
    .startAngle(Math.PI)
    .endAngle(3 * Math.PI)
    .value(function (d) {
      return d.value;
    });

    var arc = d3.svg.arc()
    .outerRadius(radius);

    var arcGroup = svg.selectAll(".d3-arc")
    .data(pie(data))
    .enter()
    .append("g")
    .attr("class", "d3-arc")
    .style({
      'stroke': '#fff',
      'stroke-width': 2,
      'cursor': 'pointer'
    });

    var arcPath = arcGroup
    .append("path")
    .style("fill", function (d) {
      return d.data.color;
    });
    arcPath
    .on('mouseover', function (d, i) {
      d3.select(this)
      .transition()
      .duration(500)
      .ease('elastic')
      .attr('transform', function (d) {
        d.midAngle = ((d.endAngle - d.startAngle) / 2) + d.startAngle;
        var x = Math.sin(d.midAngle) * distance;
        var y = -Math.cos(d.midAngle) * distance;
        return 'translate(' + x + ',' + y + ')';
      });
    })
    .on("mousemove", function (d) {
      tip.show(d)
      .style("top", (d3.event.pageY - 40) + "px")
      .style("left", (d3.event.pageX + 30) + "px");
    })
    .on('mouseout', function (d, i) {
      d3.select(this)
      .transition()
      .duration(500)
      .ease('bounce')
      .attr('transform', 'translate(0,0)');
      tip.hide(d);
    });
    arcPath
    .transition()
    .delay(function(d, i) { return i * 500; })
    .duration(500)
    .attrTween("d", function(d) {
      var interpolate = d3.interpolate(d.startAngle,d.endAngle);
      return function(t) {
        d.endAngle = interpolate(t);
        return arc(d);
      };
    });
  }
}

$(document).ready( function () {
  _animatedPie("#pmt_dashboard_chart_pie_basic", 180);
});
