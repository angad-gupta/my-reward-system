  // Pie arc with legend
  var _pieArcWithLegend = function(element, size) {
    if (typeof d3 == 'undefined') {
      console.warn('Warning - d3.min.js is not loaded.');
      return;
    }

        // Initialize chart only if element exsists in the DOM
        if(element) {


          var total_bb = $('input[name=total_bb]').val();
          var total_pbg = $('input[name=total_pbg]').val();
          var total_apg = $('input[name=total_apg]').val();
          var total_loc = $('input[name=total_loc]').val();
          var total_lc = $('input[name=total_lc]').val();

            // Basic setup
            // ------------------------------

            // Add data set
            var data = [
            {
              "status": "BB Limit",
              "icon": "<i class='badge badge-mark border-blue-300 mr-2'></i>",
              "value": total_bb,
              "color": "#29B6F6"
            }, {
              "status": "PBG Limit",
              "icon": "<i class='badge badge-mark border-success-300 mr-2'></i>",
              "value": total_pbg,
              "color": "#66BB6A"
            }, {
              "status": "APG Limit",
              "icon": "<i class='badge badge-mark border-danger-300 mr-2'></i>",
              "value": total_apg,
              "color": "#EF5350"
            }, {
              "status": "LOC Limit",
              "icon": "<i class='badge badge-mark border-pink-300 mr-2'></i>",
              "value": total_loc,
              "color": "#d06a1f"
            }, {
              "status": "LC Limit",
              "icon": "<i class='badge badge-mark border-teal-300 mr-2'></i>",
              "value": total_lc,
              "color": "#d9346a"
            }
            ];

            // Main variables
            var d3Container = d3.select(element),
                distance = 2, // reserve 2px space for mouseover arc moving
                radius = (size/2) - distance,
                sum = d3.sum(data, function(d) { return d.value; });



            // Tooltip
            // ------------------------------

            var tip = d3.tip()
            .attr('class', 'd3-tip')
            .offset([-10, 0])
            .direction('e')
            .html(function (d) {
              return "<ul class='list-unstyled mb-1'>" +
              "<li>" + "<div class='font-size-base my-1'>" + d.data.icon + d.data.status + "</div>" + "</li>" +
              "<li>" + "Total: &nbsp;" + "<span class='font-weight-semibold float-right'>" + d.value + "</span>" + "</li>" +
              "<li>" + "Share: &nbsp;" + "<span class='font-weight-semibold float-right'>" + (100 / (sum / d.value)).toFixed(2) + "%" + "</span>" + "</li>" +
              "</ul>";
            });



            // Create chart
            // ------------------------------

            // Add svg element
            var container = d3Container.append("svg").call(tip);
            
            // Add SVG group
            var svg = container
            .attr("width", size)
            .attr("height", size / 2)
            .append("g")
            .attr("transform", "translate(" + (size / 2) + "," + (size / 2) + ")");  



            // Construct chart layout
            // ------------------------------

            // Pie
            var pie = d3.layout.pie()
            .sort(null)
            .startAngle(-Math.PI / 2)
            .endAngle(Math.PI / 2)
            .value(function (d) { 
              return d.value;
            }); 

            // Arc
            var arc = d3.svg.arc()
            .outerRadius(radius)
            .innerRadius(radius / 1.3);



            //
            // Append chart elements
            //

            // Group chart elements
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
            
            // Append path
            var arcPath = arcGroup
            .append("path")
            .style("fill", function (d) {
              return d.data.color;
            });


            //
            // Interactions
            //

            // Mouse
            arcPath
            .on('mouseover', function(d, i) {

                    // Transition on mouseover
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

                    $(element + ' [data-slice]').css({
                      'opacity': 0.3,
                      'transition': 'all ease-in-out 0.15s'
                    });
                    $(element + ' [data-slice=' + i + ']').css({'opacity': 1});
                  })
            .on('mouseout', function(d, i) {

                    // Mouseout transition
                    d3.select(this)
                    .transition()
                    .duration(500)
                    .ease('bounce')
                    .attr('transform', 'translate(0,0)');

                    $(element + ' [data-slice]').css('opacity', 1);
                  });

            // Animate chart on load
            arcPath
            .transition()
            .delay(function(d, i) {
              return i * 500;
            })
            .duration(500)
            .attrTween("d", function(d) {
              var interpolate = d3.interpolate(d.startAngle,d.endAngle);
              return function(t) {
                d.endAngle = interpolate(t);
                return arc(d);  
              }; 
            });


            //
            // Append total text
            //

            svg.append('text')
            .attr('class', 'text-muted')
            .attr({
              'class': 'half-donut-total',
              'text-anchor': 'middle',
              'dy': -33
            })
            .style({
              'font-size': '12px',
              'fill': '#999'
            })
            .text('Total');


            //
            // Append count
            //

            // Text
            svg
            .append('text')
            .attr('class', 'half-conut-count')
            .attr('text-anchor', 'middle')
            .attr('dy', -5)
            .style({
              'font-size': '21px',
              'font-weight': 500
            });

            // Animation
            svg.select('.half-conut-count')
            .transition()
            .duration(1500)
            .ease('linear')
            .tween("text", function(d) {
              var i = d3.interpolate(this.textContent, sum);

              return function(t) {
                this.textContent = d3.format(",d")(Math.round(i(t)));
              };
            });


            //
            // Legend
            //

            // Add legend list
            var legend = d3.select(element)
            .append('ul')
            .attr('class', 'chart-widget-legend')
            .selectAll('li')
            .data(pie(data))
            .enter()
            .append('li')
            .attr('data-slice', function(d, i) {
              return i;
            })
            .attr('style', function(d, i) {
              return 'border-bottom: solid 2px ' + d.data.color;
            })
            .text(function(d, i) {
              return d.data.status + ': ';
            });

            // Legend text
            legend.append('span')
            .text(function(d, i) {
              return d.data.value;
            });
          }
        };



        $(document).ready( function () {
         _pieArcWithLegend("#funded_chart_pie_basic", 170);
       });
