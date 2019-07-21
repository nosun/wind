<section class="content">

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Visitors Report</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-9 col-sm-8">
                            <div id="main" style="width: 600px;height:400px;"></div>
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

<script src="https://echarts.baidu.com/examples/vendors/echarts/echarts.min.js?_v_=1553896255267"></script>
<script>

    var chart = echarts.init(document.getElementById('main'));

    $.get('map/json/china.json', function (chinaJson) {
        echarts.registerMap('china', chinaJson);

        option = {
            title : {
                text: 'iphone销量',
                subtext: '纯属虚构',
                left: 'center'
            },
            tooltip : {
                trigger: 'item'
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                data:['iphone3']
            },
            visualMap: {
                min: 0,
                max: 2500,
                left: 'left',
                top: 'bottom',
                text:['高','低'],           // 文本，默认为数值文本
                calculable : true
            },
            toolbox: {
                show: true,
                orient : 'vertical',
                left: 'right',
                top: 'center',
                feature : {
                    mark : {show: true},
                    dataView : {show: true, readOnly: false},
                    restore : {show: true},
                    saveAsImage : {show: true}
                }
            },
            series : [
                {
                    name: 'iphone3',
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
                    data:[
                        {name: '北京',value: 1000},
                        {name: '天津',value: 1000},
                        {name: '上海',value: 1000},
                        {name: '重庆',value: 1000},
                        {name: '河北',value: 1000},
                        {name: '河南',value: 1000},
                        {name: '云南',value: 1000},
                        {name: '辽宁',value: 1000},
                        {name: '黑龙江',value: 1000},
                        {name: '湖南',value: 1000},
                        {name: '安徽',value: 1000},
                        {name: '山东',value: 1000},
                        {name: '新疆',value: 1000},
                        {name: '江苏',value: 1000},
                        {name: '浙江',value: 1000},
                        {name: '江西',value: 1000},
                        {name: '湖北',value: 1000},
                        {name: '广西',value: 1000},
                        {name: '甘肃',value: 1000},
                        {name: '山西',value: 1000},
                        {name: '内蒙古',value: 1000},
                        {name: '陕西',value: 1000},
                        {name: '吉林',value: 1000},
                        {name: '福建',value: 1000},
                        {name: '贵州',value: 1000},
                        {name: '广东',value: 1000},
                        {name: '青海',value: 1000},
                        {name: '西藏',value: 1000},
                        {name: '四川',value: 1000},
                        {name: '宁夏',value: 1000},
                        {name: '海南',value: 1000},
                        {name: '台湾',value: 1000},
                        {name: '香港',value: 1000},
                        {name: '澳门',value: 1000}
                    ]
                }
            ]
        };
        chart.setOption(option);
    });




    //        chart.setOption(option);
</script>