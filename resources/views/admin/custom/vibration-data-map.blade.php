<section class="content">

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title pull-left col-md-3">风振数据分布图</h3>
                    <form action="/" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
                        {{ csrf_field() }}
                        <div class="input-group pull-right col-md-1">
                            <button class="btn btn-primary" type="submit">确定</button>
                        </div>
                        <div class="pull-right col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right"
                                       name="date_range"
                                       value="{{ $date_range }}" id="date_range">
                            </div>
                        </div>

                    </form>
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

<link rel="stylesheet" href="/vendor/laravel-admin/AdminLTE/plugins/daterangepicker/daterangepicker-bs3.css">
<script src="/js/echarts.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="/vendor/laravel-admin/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<script>
    $('#date_range').daterangepicker();

    var chart = echarts.init(document.getElementById('main'));
    var data1 = {!! $data1 !!};
    var data2 = {!! $data2 !!};
    var data3 = {!! $data3 !!};
    var data4 = {!! $data4 !!};

    $.get('map/json/china.json', function (chinaJson) {
        echarts.registerMap('china', chinaJson);

        option = {
            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                data: ['舞动', '风偏', '微风振动', '次档距振荡']
            },
            visualMap: {
                min: 0,
                max: 30000,
                left: 'left',
                top: 'bottom',
                text: ['高', '低'],           // 文本，默认为数值文本
                calculable: true
            },
            toolbox: {
                show: true,
                orient: 'vertical',
                left: 'right',
                top: 'center',
                feature: {
                    mark: {show: true},
                    dataView: {show: true, readOnly: false},
                    restore: {show: true},
                    saveAsImage: {show: true}
                }
            },
            series: [
                {
                    name: '舞动',
                    type: 'map',
                    mapType: 'china',
                    roam: true,
                    label: {
                        normal: {
                            show: true
                        },
                        emphasis: {
                            show: true
                        }
                    },
                    data: data3
                },
                {
                    name: '风偏',
                    type: 'map',
                    mapType: 'china',
                    roam: false,
                    label: {
                        normal: {
                            show: true
                        },
                        emphasis: {
                            show: true
                        }
                    },
                    data: data2
                },
                {
                    name: '微风振动',
                    type: 'map',
                    mapType: 'china',
                    roam: false,
                    label: {
                        normal: {
                            show: true
                        },
                        emphasis: {
                            show: true
                        }
                    },
                    data: data1
                },
                {
                    name: '次档距振荡',
                    type: 'map',
                    mapType: 'china',
                    roam: false,
                    label: {
                        normal: {
                            show: false
                        },
                        emphasis: {
                            show: true
                        }
                    },
                    data: data4
                }
            ]
        };
        chart.setOption(option);
    });
</script>