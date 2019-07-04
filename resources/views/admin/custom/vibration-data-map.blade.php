<section class="content">

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">风振数据分布图</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-9 col-sm-8">
                            <div id="main" style="width: 800px;height:600px;"></div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->

    </div>
    <!-- /.row -->
</section>

<script src="/js/echarts.min.js"></script>
<script>

    var chart = echarts.init(document.getElementById('main'));
    var data = {!! $data !!};

    $.get('map/json/china.json', function (chinaJson) {
        echarts.registerMap('china', chinaJson);

        option = {
            tooltip : {
                trigger: 'item'
            },
            visualMap: {
                min: 0,
                max: 2500,
                left: 'left',
                top: 'bottom',
                text:['高','低'],           // 文本，默认为数值文本
                calculable : true
            },
            series : [
                {
                    name: 'wind data',
                    type: 'map',
                    mapType: 'china',
                    roam: true,
                    label: {
                        normal: {
                            show: false
                        },
                        emphasis: {
                            show: true
                        }
                    },
                    data: data
                }
            ]
        };
        chart.setOption(option);
    });
</script>