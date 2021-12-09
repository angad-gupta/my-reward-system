<section>
    <div class="card bd-card mb-0">
        <div class="bg-pink-400 card-header header-elements-inline border-bottom-0">
            <h5 class="card-title text-uppercase font-weight-semibold">Sales Report After Petty Expenses</h5>
            <div class="header-elements">
                <div class="list-icons pl-2">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="chart-container">
                <div class="chart has-fixed-height" id="line_zoom2" style="height: 400px;"></div>
                <script>
                    var EchartsLinesZoomLight = function() {

                        var _linesZoomLightExample = function() {
                            if (typeof echarts == 'undefined') {
                                console.warn('Warning - echarts.min.js is not loaded.');
                                return;
                            }

                            // Define element
                            var line_zoom_element = document.getElementById('line_zoom2');

                            //
                            // Charts configuration
                            //

                            if (line_zoom_element) {

                                // Initialize chart
                                var line_zoom = echarts.init(line_zoom_element);


                                //
                                // Chart config
                                //

                                // Options
                                line_zoom.setOption({

                                    // Define colors
                                    color: ["#ffa726", "#d74e67", '#0092ff'],

                                    // Global text styles
                                    textStyle: {
                                        fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                                        fontSize: 13
                                    },

                                    // Chart animation duration
                                    animationDuration: 750,

                                    // Setup grid
                                    grid: {
                                        left: 0,
                                        right: 40,
                                        top: 35,
                                        bottom: 60,
                                        containLabel: true
                                    },

                                    // Add legend
                                    legend: {
                                        data:<?php echo json_encode($daily_sales_list['org_list']); ?> ,
                                        itemHeight: 8,
                                        itemGap: 20
                                    },

                                    // Add tooltip
                                    tooltip: {
                                        trigger: 'axis',
                                        backgroundColor: 'rgba(0,0,0,0.75)',
                                        padding: [10, 15],
                                        textStyle: {
                                            fontSize: 13,
                                            fontFamily: 'Roboto, sans-serif'
                                        }
                                    },

                                    // Horizontal axis
                                    xAxis: [{
                                        type: 'category',
                                        boundaryGap: false,
                                        axisLabel: {
                                            color: '#333'
                                        },
                                        axisLine: {
                                            lineStyle: {
                                                color: '#999'
                                            }
                                        },
                                        data: <?php echo json_encode($daily_sales_list['datelist']); ?>
                                    }],

                                    // Vertical axis
                                    yAxis: [{
                                        type: 'value',
                                        axisLabel: {
                                            formatter: '{value} ',
                                            color: '#333'
                                        },
                                        axisLine: {
                                            lineStyle: {
                                                color: '#999'
                                            }
                                        },
                                        splitLine: {
                                            lineStyle: {
                                                color: ['#eee']
                                            }
                                        },
                                        splitArea: {
                                            show: true,
                                            areaStyle: {
                                                color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
                                            }
                                        }
                                    }],

                                    // Zoom control
                                    dataZoom: [
                                        {
                                            type: 'inside',
                                            start: 30,
                                            end: 70
                                        },
                                        {
                                            show: true,
                                            type: 'slider',
                                            start: 30,
                                            end: 70,
                                            height: 40,
                                            bottom: 0,
                                            borderColor: '#ccc',
                                            fillerColor: 'rgba(0,0,0,0.05)',
                                            handleStyle: {
                                                color: '#585f63'
                                            }
                                        }
                                    ],

                                    // Add series                                                    data: ['Modi Oil Store', 'Saliza Shopping Center', 'Coffee Shop'],
                                    series: [
                                        @foreach($daily_sales_list['datalist'] as $key=>$value)
                                        {
                                            name: '{{$daily_sales_list['org_list'][$key]}}',
                                            type: 'line',
                                            smooth: true,
                                            symbolSize: 6,
                                            itemStyle: {
                                                normal: {
                                                    borderWidth: 2
                                                }
                                            },
                                            data: <?php echo json_encode($value); ?>
                                        },
                                        @endforeach

                                    ]
                                });
                            }


                            //
                            // Resize charts
                            //

                            // Resize function
                            var triggerChartResize = function() {
                                line_zoom_element && line_zoom.resize();
                            };

                            // On sidebar width change
                            var sidebarToggle = document.querySelector('.sidebar-control');
                            sidebarToggle && sidebarToggle.addEventListener('click', triggerChartResize);

                            // On window resize
                            var resizeCharts;
                            window.addEventListener('resize', function() {
                                clearTimeout(resizeCharts);
                                resizeCharts = setTimeout(function () {
                                    triggerChartResize();
                                }, 200);
                            });
                        };


                        //
                        // Return objects assigned to module
                        //

                        return {
                            init: function() {
                                _linesZoomLightExample();
                            }
                        }
                    }();


                    // Initialize module
                    // ------------------------------

                    document.addEventListener('DOMContentLoaded', function() {
                        EchartsLinesZoomLight.init();
                    });
                </script>
            </div>
        </div>
</section>
