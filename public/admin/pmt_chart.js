$('document').ready(function() {
    
    $('.numeric').keyup(function() {
        if (this.value.match(/[^0-9.]/g)) {
            this.value = this.value.replace(/[^0-9.]/g, '');
        }
    });
    
});




// Setup module
// ------------------------------

var Dashboard = function () {


   
    // Tickets status donut chart
    var _TicketStatusDonutChart = function(element, size) {
        if (typeof d3 == 'undefined') {
            console.warn('Warning - d3.min.js is not loaded.');
            return;
        }

        // Initialize chart only if element exsists in the DOM
        if($(element).length > 0) {
                
                var total_qa_approved = $('#total_qa_approved').val();
                var total_todo = $('#total_todo').val();
                var total_inprogress = $('#total_inprogress').val();
                var total_complete = $('#total_complete').val();

            // Basic setup
            // ------------------------------

            // Add data set
            var data = [
                 {
                    "status": "ToDo tickets",
                    "icon": "<i class='status-mark border-primary mr-2'></i>",
                    "value": total_todo,
                    "color": "#42a5f5"
                }, {
                    "status": "InProgress tickets",
                    "icon": "<i class='status-mark border-warning mr-2'></i>",
                    "value": total_inprogress,
                    "color": "#ff5722"
                }, {
                    "status": "Completed tickets",
                    "icon": "<i class='status-mark border-success mr-2'></i>",
                    "value": total_complete,
                    "color": "#66BB6A"
                },{
                    "status": "Work Inspect tickets",
                    "icon": "<i class='status-mark border-slate-800 mr-2'></i>",
                    "value": total_qa_approved,
                    "color": "#37474F"
                }
            ];

            // Main variables
            var d3Container = d3.select(element),
                distance = 2, // reserve 2px space for mouseover arc moving
                radius = (size/2) - distance,
                sum = d3.sum(data, function(d) { return d.value; })



            // Tooltip
            // ------------------------------

            var tip = d3.tip()
                .attr('class', 'd3-tip')
                .offset([-10, 0])
                .direction('e')
                .html(function (d) {
                    return '<ul class="list-unstyled mb-1">' +
                        '<li>' + '<div class="font-size-base mb-1 mt-1">' + d.data.icon + d.data.status + '</div>' + '</li>' +
                        '<li>' + 'Total: &nbsp;' + '<span class="font-weight-semibold float-right">' + d.value + '</span>' + '</li>' +
                        '<li>' + 'Share: &nbsp;' + '<span class="font-weight-semibold float-right">' + (100 / (sum / d.value)).toFixed(2) + '%' + '</span>' + '</li>' +
                    '</ul>';
                })



            // Create chart
            // ------------------------------

            // Add svg element
            var container = d3Container.append('svg').call(tip);
            
            // Add SVG group
            var svg = container
                .attr('width', size)
                .attr('height', size)
                .append('g')
                    .attr('transform', 'translate(' + (size / 2) + ',' + (size / 2) + ')');  



            // Construct chart layout
            // ------------------------------

            // Pie
            var pie = d3.layout.pie()
                .sort(null)
                .startAngle(Math.PI)
                .endAngle(3 * Math.PI)
                .value(function (d) { 
                    return d.value;
                }); 

            // Arc
            var arc = d3.svg.arc()
                .outerRadius(radius)
                .innerRadius(radius / 2);



            //
            // Append chart elements
            //

            // Group chart elements
            var arcGroup = svg.selectAll('.d3-arc')
                .data(pie(data))
                .enter()
                .append('g') 
                    .attr('class', 'd3-arc')
                    .style('stroke', '#fff')
                    .style('cursor', 'pointer');
            
            // Append path
            var arcPath = arcGroup
                .append('path')
                .style('fill', function (d) { return d.data.color; });

            // Add tooltip
            arcPath
                .on('mouseover', function (d, i) {

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
                })

                .on('mousemove', function (d) {
                    
                    // Show tooltip on mousemove
                    tip.show(d)
                        .style('top', (d3.event.pageY - 40) + 'px')
                        .style('left', (d3.event.pageX + 30) + 'px');
                })

                .on('mouseout', function (d, i) {

                    // Mouseout transition
                    d3.select(this)
                    .transition()
                        .duration(500)
                        .ease('bounce')
                        .attr('transform', 'translate(0,0)');

                    // Hide tooltip
                    tip.hide(d);
                });

            // Animate chart on load
            arcPath
                .transition()
                    .delay(function(d, i) { return i * 500; })
                    .duration(500)
                    .attrTween('d', function(d) {
                        var interpolate = d3.interpolate(d.startAngle,d.endAngle);
                        return function(t) {
                            d.endAngle = interpolate(t);
                            return arc(d);  
                        }; 
                    });
        }
    };
    
    
     // Donut with details
    var _donutWithDetails = function(element, size) {
        if (typeof d3 == 'undefined') {
            console.warn('Warning - d3.min.js is not loaded.');
            return;
        }

        // Initialize chart only if element exsists in the DOM
        if(element) {

            var total_qa_approved = $('#dash_total_qa_approved').val();
            var total_todo = $('#dash_total_todo').val();
            var total_inprogress = $('#dash_total_inprogress').val();
            var total_complete = $('#dash_total_complete').val();
            // Basic setup
            // ------------------------------

            // Add data set
            var data = [
                 {
                    "status": "In-Progress",
                    "icon": "<i class='badge badge-mark border-success-300 mr-2'></i>",
                    "value": total_inprogress,
                    "color": "#EF5350"
                }, {
                    "status": "To-Do",
                    "icon": "<i class='badge badge-mark border-danger-300 mr-2'></i>",
                    "value": total_todo,
                    "color": "#29B6F6"
                }, {
                    "status": "Resolve",
                    "icon": "<i class='badge badge-mark border-danger-300 mr-2'></i>",
                    "value": total_complete,
                    "color": "#66BB6A"
                },{
                    "status": "Work Inspect",
                    "icon": "<i class='badge badge-mark border-blue-300 mr-2'></i>",
                    "value": total_qa_approved,
                    "color": "#37474F"
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
                .attr("height", size)
                .append("g")
                    .attr("transform", "translate(" + (size / 2) + "," + (size / 2) + ")");  


            // Construct chart layout
            // ------------------------------

            // Pie
            var pie = d3.layout.pie()
                .sort(null)
                .startAngle(Math.PI)
                .endAngle(3 * Math.PI)
                .value(function (d) { 
                    return d.value;
                }); 

            // Arc
            var arc = d3.svg.arc()
                .outerRadius(radius)
                .innerRadius(radius / 1.35);


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
            // Add interactions
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
            // Add text
            //

            // Total
            svg.append('text')
                .attr('class', 'text-muted')
                .attr({
                    'class': 'half-donut-total',
                    'text-anchor': 'middle',
                    'dy': -13
                })
                .style({
                    'font-size': '12px',
                    'fill': '#999'
                })
                .text('Total');

            // Count
            svg
                .append('text')
                .attr('class', 'half-donut-count')
                .attr('text-anchor', 'middle')
                .attr('dy', 14)
                .style({
                    'font-size': '21px',
                    'font-weight': 500
                });

            // Animate count
            svg.select('.half-donut-count')
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
            // Add legend
            //

            // Append list
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

            // Append text
            legend.append('span')
                .text(function(d, i) {
                    return d.data.value;
                });
        }
    };
    
    
    var _donutWithProjectDetails = function(element, size) {
        if (typeof d3 == 'undefined') {
            console.warn('Warning - d3.min.js is not loaded.');
            return;
        }

        // Initialize chart only if element exsists in the DOM
        if(element) {

            var total_pending = $('#total_pending_leave').val();
            var total_approved = $('#total_approved_leave').val();
            var total_cancelled = $('#total_cancelled_leave').val();
            // Basic setup
            // ------------------------------

            // Add data set
            var data = [
                {
                    "status": "Pending",
                    "icon": "<i class='badge badge-mark border-blue-300 mr-2'></i>",
                    "value": total_pending,
                    "color": "#29B6F6"
                }, {
                    "status": "Approved",
                    "icon": "<i class='badge badge-mark border-success-300 mr-2'></i>",
                    "value": total_approved,
                    "color": "#66BB6A"
                }, {
                    "status": "Cancelled",
                    "icon": "<i class='badge badge-mark border-danger-300 mr-2'></i>",
                    "value": total_cancelled,
                    "color": "#EF5350"
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
                .attr("height", size)
                .append("g")
                    .attr("transform", "translate(" + (size / 2) + "," + (size / 2) + ")");  


            // Construct chart layout
            // ------------------------------

            // Pie
            var pie = d3.layout.pie()
                .sort(null)
                .startAngle(Math.PI)
                .endAngle(3 * Math.PI)
                .value(function (d) { 
                    return d.value;
                }); 

            // Arc
            var arc = d3.svg.arc()
                .outerRadius(radius)
                .innerRadius(radius / 1.35);


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
            // Add interactions
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
            // Add text
            //

            // Total
            svg.append('text')
                .attr('class', 'text-muted')
                .attr({
                    'class': 'half-donut-total',
                    'text-anchor': 'middle',
                    'dy': -13
                })
                .style({
                    'font-size': '12px',
                    'fill': '#999'
                })
                .text('Total');

            // Count
            svg
                .append('text')
                .attr('class', 'half-donut-count')
                .attr('text-anchor', 'middle')
                .attr('dy', 14)
                .style({
                    'font-size': '21px',
                    'font-weight': 500
                });

            // Animate count
            svg.select('.half-donut-count')
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
            // Add legend
            //

            // Append list
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

            // Append text
            legend.append('span')
                .text(function(d, i) {
                    return d.data.value;
                });
        }
    };

    //
    // Return objects assigned to module
    //

    return {
    
        initCharts: function() {
            // Donut charts
            _TicketStatusDonutChart('#tickets-status', 42);
            _donutWithDetails("#donut_project_tickets_details", 146);
            _donutWithProjectDetails("#donut_leave_details", 146);

        }
    }
}();


// Initialize module   
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    Dashboard.initCharts();
});