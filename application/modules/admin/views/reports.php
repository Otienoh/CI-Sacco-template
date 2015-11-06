<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
		<!-- start: PAGE CONTENT -->
		<div class="row">
			<div class="col-md-12">
				<!-- start: BASIC CHART PANEL -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-external-link-square"></i>
						Monthly Loan Chart
						<div class="panel-tools">
							<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
							</a>
							<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
								<i class="fa fa-wrench"></i>
							</a>
							<a class="btn btn-xs btn-link panel-refresh" href="#">
								<i class="fa fa-refresh"></i>
							</a>
							<a class="btn btn-xs btn-link panel-expand" href="#">
								<i class="fa fa-resize-full"></i>
							</a>
							<a class="btn btn-xs btn-link panel-close" href="#">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="flot-container">
							<div id="div3"></div>
						</div>
					</div>
				</div>
				<!-- end: BASIC CHART PANEL -->
			</div>
		</div>
		
		
		
		<div class="row">
			<div class="col-md-6">
				<!-- start: CATEGORIES PANEL -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-external-link-square"></i>
						Categories
						<div class="panel-tools">
							<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
							</a>
							<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
								<i class="fa fa-wrench"></i>
							</a>
							<a class="btn btn-xs btn-link panel-refresh" href="#">
								<i class="fa fa-refresh"></i>
							</a>
							<a class="btn btn-xs btn-link panel-expand" href="#">
								<i class="fa fa-resize-full"></i>
							</a>
							<a class="btn btn-xs btn-link panel-close" href="#">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="flot-container">
							<div id="cont"></div>
						</div>
					</div>
				</div>
				<!-- end: CATEGORIES PANEL -->
			</div>
			<div class="col-md-6">
				<!-- start: ANNOTATIONS PANEL -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-external-link-square"></i>
						Annotations
						<div class="panel-tools">
							<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
							</a>
							<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
								<i class="fa fa-wrench"></i>
							</a>
							<a class="btn btn-xs btn-link panel-refresh" href="#">
								<i class="fa fa-refresh"></i>
							</a>
							<a class="btn btn-xs btn-link panel-expand" href="#">
								<i class="fa fa-resize-full"></i>
							</a>
							<a class="btn btn-xs btn-link panel-close" href="#">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="flot-container">
							<div id="pieData"></div>
						</div>
					</div>
				</div>
				<!-- end: ANNOTATIONS PANEL -->
			</div>
		</div>
		
		
		
		<!-- end: PAGE CONTENT-->

    <script src="<?php echo base_url();?>assets/plugins/Highcharts/js/highcharts.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/Highcharts/js/modules/exporting.js"></script>
	<script type="text/javascript">
    $(function () {
    $('#div3').highcharts({
          chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Loan Amount Borrowed For The Year (<?php echo $year;?>)'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Loan Amount (Ksh)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Ksh.</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: <?php echo json_encode($chart);?>
    });
});
    
$(function () {
        $('#cont').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Loan Data'
            },
            subtitle: {
                text: 'Source: Wikipedia.org'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May','Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Population (millions)',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' millions'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Year 1800',
                data: [107, 31, 635, 203, 2, 107, 31, 635, 203, 2]
            }, {
                name: 'Year 1900',
                data: [133, 156, 947, 408, 6, 133, 156, 947, 408, 6]
            }, {
                name: 'Year 2008',
                data: [973, 914, 4054, 732, 34, 973, 914, 4054, 732, 34]
            }]
        });
    });

$(function () {
        $('#con').highcharts({
                       chart: {
                type: 'column'
            },
            title: {
                text: 'World\'s largest cities per 2014'
            },
            subtitle: {
                text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Population (millions)'
                }
            },
            legend: {
                enabled: true
            },
            tooltip: {
                pointFormat: 'Population in 2008: <b>{point.y:.1f} millions</b>',
            },
            series: [{
                name: 'Population',
                data: [
                    ["Jan", 123.7],
                    ["Feb", 16,1],
                    ["Mar", 14.2],
                    ["April", 14.0],
                    ["May", 12.5],
                    ["June", 12.1],
                    ["July", 11.8],
                    ["Aug", 11.7],
                    ["Sept", 11.1],
                    ["Oct", 11.1],
                    ["Nov", 10.5],
                    ["Dec", 10.4]
                ],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: (Highcharts.theme && Highcharts.theme.legendBackgroundColor || '#FFFFFF'),
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif',
                        textShadow: '0 0 3px black'
                    }
                }
            }]
        });
    });

$(function () {
    $('#pieData').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Just Data'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Firefox',   46.0],
                ['IE',       26.8],
                {
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true,
                    selected: false
                },
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]
            ]
        }]
    });
});
    

</script>