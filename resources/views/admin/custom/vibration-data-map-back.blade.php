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
                            <div id="main" style="width: 1000px;height:800px;"></div>
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

    $.get('map/json/china.json', function (chinaJson) {
        echarts.registerMap('china', chinaJson);

        option = {
            title : {
                text: '',
                subtext: '',
                left: ''
            },
            tooltip : {
                trigger: 'item'
            },
            label: {
                normal: {
                    show: true, //显示省份标签
                    textStyle: {
                        color: "blue",
                        fontWeight: 'bold',
                    } //省份标签字体颜色
                },
                emphasis: { //对应的鼠标悬浮效果
                    show: false,
                    textStyle: {
                        color: "#800080"
                    }
                }
            },
            dataRange: {
                x: '-1000 px', //图例横轴位置
                y: '-1000 px', //图例纵轴位置
                splitList: [
                    { start: 1, end: 1, label: '北京', color: '#fffed7' },
                    { start: 2, end: 2, label: '天津', color: '#fffed7' },
                    { start: 3, end: 3, label: '上海', color: '#fffed7' },
                    { start: 4, end: 4, label: '重庆', color: '#fffed7' },
                    { start: 5, end: 5, label: '河北', color: '#fffed7' },
                    { start: 6, end: 6, label: '河南', color: '#fffed7' },
                    { start: 7, end: 7, label: '云南', color: '#fffed7' },
                    { start: 8, end: 8, label: '辽宁', color: '#fffed7' },
                    { start: 9, end: 9, label: '黑龙江', color: '#fffed7' },
                    { start: 10, end: 10, label: '湖南', color: '#fffed7' },
                    { start: 11, end: 11, label: '安徽', color: '#fffed7' },
                    { start: 12, end: 12, label: '山东', color: '#fffed7' },
                    { start: 13, end: 13, label: '新疆', color: '#fffed7' },
                    { start: 14, end: 14, label: '江苏', color: '#fffed7' },
                    { start: 15, end: 15, label: '浙江', color: '#fffed7' },
                    { start: 16, end: 16, label: '江西', color: '#fffed7' },
                    { start: 17, end: 17, label: '湖北', color: '#fffed7' },
                    { start: 18, end: 18, label: '广西', color: '#fffed7' },
                    { start: 19, end: 19, label: '甘肃', color: '#fffed7' },
                    { start: 20, end: 20, label: '山西', color: '#fffed7' },
                    { start: 21, end: 21, label: '内蒙古', color: '#fffed7' },
                    { start: 22, end: 22, label: '陕西', color: '#fffed7' },
                    { start: 23, end: 23, label: '吉林', color: '#fffed7' },
                    { start: 24, end: 24, label: '福建', color: '#fffed7' },
                    { start: 25, end: 25, label: '贵州', color: '#fffed7' },
                    { start: 26, end: 26, label: '广东', color: '#fffed7' },
                    { start: 27, end: 27, label: '青海', color: '#fffed7' },
                    { start: 28, end: 28, label: '西藏', color: '#fffed7' },
                    { start: 29, end: 29, label: '四川', color: '#fffed7' },
                    { start: 30, end: 30, label: '宁夏', color: '#fffed7' },
                    { start: 31, end: 31, label: '海南', color: '#fffed7' },
                    { start: 32, end: 32, label: '台湾', color: '#fffed7' },
                    { start: 33, end: 33, label: '香港', color: '#fffed7' },
                    { start: 34, end: 34, label: '澳门', color: '#fffed7' },
                ]
            },
            series : [
                {
                    name: 'data',
                    type: 'map',
                    mapType: 'china',
                    roam: false,
                    label: {
                        normal: {
                            show: true,
                            textStyle: {
                                fontSize: 12,
                            }
                        },
                        emphasis: {
                            show: false
                        }
                    },
                    data: [
                        { name: '北京', selected: false, value: 1 },
                        { name: '天津', selected: false, value: 2 },
                        { name: '上海', selected: false, value: 3 },
                        { name: '重庆', selected: false, value: 4 },
                        { name: '河北', selected: false, value: 5 },
                        { name: '河南', selected: false, value: 6 },
                        { name: '云南', selected: false, value: 7 },
                        { name: '辽宁', selected: false, value: 8 },
                        { name: '黑龙江', selected: false, value: 9 },
                        { name: '湖南', selected: false, value: 10 },
                        { name: '安徽', selected: false, value: 11 },
                        { name: '山东', selected: false, value: 12 },
                        { name: '新疆', selected: false, value: 13 },
                        { name: '江苏', selected: false, value: 14 },
                        { name: '浙江', selected: false, value: 15 },
                        { name: '江西', selected: false, value: 16 },
                        { name: '湖北', selected: false, value: 17 },
                        { name: '广西', selected: false, value: 18 },
                        { name: '甘肃', selected: false, value: 19 },
                        { name: '山西', selected: false, value: 20 },
                        { name: '内蒙古', selected: false, value: 21 },
                        { name: '陕西', selected: false, value: 22 },
                        { name: '吉林', selected: false, value: 23 },
                        { name: '福建', selected: false, value: 24 },
                        { name: '贵州', selected: false, value: 25 },
                        { name: '广东', selected: false, value: 26 },
                        { name: '青海', selected: false, value: 27 },
                        { name: '西藏', selected: false, value: 28 },
                        { name: '四川', selected: false, value: 29 },
                        { name: '宁夏', selected: false, value: 30 },
                        { name: '海南', selected: false, value: 31 },
                        { name: '台湾', selected: false, value: 32 },
                        { name: '香港', selected: false, value: 33 },
                        { name: '澳门', selected: false, value: 34 }
                    ]
                }
            ]
        };
        chart.setOption(option);
    });




    //        chart.setOption(option);
</script>