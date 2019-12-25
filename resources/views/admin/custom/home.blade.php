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

    @foreach($charts as $key => $value)
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ $key }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-9 col-sm-8">
                            <div id="main1" style="width: 800px;">
                                @if(array_depth($value) > 1)
                                    @foreach($value as $title1 => $value1)
                                        <h4>
                                            {{ $title1 }}
                                        </h4>
                                        @if( array_depth($value1) > 1)
                                            @foreach($value1 as $title2  => $value2)
                                                <h5>
                                                    {{ $title2 }}
                                                </h5>
                                                @if( array_depth($value2) > 1)
                                                    @foreach($value2 as $title3  => $value3)
                                                        <h6>
                                                            {{ $title3 }}
                                                        </h6>
                                                        @if(array_depth($value3) > 1)
                                                            @foreach($value3 as $title4 => $value4)
                                                                <h6>
                                                                    {{ $title4 }}
                                                                </h6>
                                                                @foreach($value4 as $item)
                                                                    @include('admin.custom.parts.chart-show')
                                                                @endforeach
                                                            @endforeach
                                                        @else
                                                            @foreach($value3 as $item)
                                                                @include('admin.custom.parts.chart-show')
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach($value2 as $item)
                                                        @include('admin.custom.parts.chart-show')
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($value1 as $item)
                                                @include('admin.custom.parts.chart-show')
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </div>
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
    @endforeach
</section>
<link rel="stylesheet" href="/vendor/laravel-admin/AdminLTE/plugins/daterangepicker/daterangepicker-bs3.css">
<script src="/js/echarts.min.js"></script>
<script src="/js/moment.min.js"></script>
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
                data: ['微风振动', '风偏', '舞动', '次档距振荡']
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