
<head>
    <title>My first chart using FusionCharts Suite XT</title>
    <script type="text/javascript"  src="<?php echo base_url('assest/'); ?>fusioncharts/js/fusioncharts.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assest/'); ?>fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assest/'); ?>fusioncharts/js/themes/fusioncharts.theme.ocean"></script>
    <script type="text/javascript">
        FusionCharts.ready(function () {
            var ageGroupChart = new FusionCharts({
                type: 'pie3d',
                renderAt: 'chart-container',
                width: '500',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "Leave Summary",
                        "subCaption": "For last years",
                        "paletteColors": "#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000",
                        "bgColor": "#ffffff",
                        "showBorder": "0",
                        "use3DLighting": "0",
                        "showShadow": "0",
                        "enableSmartLabels": "0",
                        "startingAngle": "0",
                        "showPercentValues": "1",
                        "showPercentInTooltip": "0",
                        "decimals": "1",
                        "captionFontSize": "14",
                        "subcaptionFontSize": "14",
                        "subcaptionFontBold": "0",
                        "toolTipColor": "#ffffff",
                        "toolTipBorderThickness": "0",
                        "toolTipBgColor": "#000000",
                        "toolTipBgAlpha": "80",
                        "toolTipBorderRadius": "2",
                        "toolTipPadding": "5",
                        "showHoverEffect":"1",
                        "showLegend": "1",
                        "legendBgColor": "#ffffff",
                        "legendBorderAlpha": '0',
                        "legendShadow": '0',
                        "legendItemFontSize": '10',
                        "legendItemFontColor": '#666666'
                    },
                    "data": [
                        {
                            "label": "Half Day",
                            "value": "<?php echo $data1; ?>"

                        },
                        {
                            "label": "Full Day",
                            "value": "<?php echo $data2; ?>"
                        },
                        {
                            "label": "Short Leave",
                            "value": "<?php echo $data3; ?>"
                        }

                    ]
                }
            }).render();
        });
    </script>
    </head>
    <body>
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Doctor</a>
                    </li>
                    <li><a href="#">Leave Management</a>
                    </li>
                    <li>Leave</li>
                </ul>

            </div>
            <?php $this->load->view('Doctors/Sidebar'); ?>
                             <div class="col-md-9 text-center">
                                    <div class="box">
                                    <div id="chart-container">ID No:</div>
                                 </div>
                             </div>
    </div>
    </div>