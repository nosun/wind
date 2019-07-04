<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">填写参数</h3>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('admin.analysis.getResult') }}" method="post" accept-charset="UTF-8"
                      class="form-horizontal" pjax-container="">
                    <div class="box-body">
                        <div class="fields-group">
                            @foreach($fields as $key => $field)
                                @if($field['type'] == 'int')
                                    <div class="form-group">
                                        <label for="span" class="col-sm-2  control-label">{{ $field['label'] }}</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input style="width:100px" type="text" id="{{ $key }}" name="{{ $key }}"
                                                       value="{{ $field['default'] }}"
                                                       class="form-control {{ $key }}" placeholder="输入 Span">
                                            </div>
                                        </div>
                                    </div>
                                @elseif($field['type'] == 'float')
                                    <div class="form-group">
                                        <label for="line_angle"
                                               class="col-sm-2  control-label">{{ $field['label'] }}</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                            class="fa fa-terminal fa-fw"></i>
                                                </span>
                                                <input style="width: 130px; text-align: right;" type="text"
                                                       id="{{ $key }}" name="{{ $key }}" value="{{ $field['default'] }}"
                                                       class="form-control {{ $key }}"
                                                       placeholder="输入 {{ $field['label'] }}">
                                            </div>
                                        </div>
                                    </div>
                                @elseif($field['type'] == 'string')
                                    <div class="form-group  ">
                                        <label for="line_name"
                                               class="col-sm-2  control-label">{{ $field['label'] }}</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-pencil fa-fw"></i>
                                                </span>
                                                <input style="width:200px;" type="text" id="{{ $key }}" name="{{ $key }}"
                                                       value="{{ $field['default'] }}"
                                                       class="form-control {{ $key }}"
                                                       placeholder="输入 {{ $field['label'] }}">
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div></div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <div class="btn-group pull-right">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                            <div class="btn-group pull-left">
                                <button type="reset" class="btn btn-warning">重置</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>

        </div>
    </div>
</section>
<script data-exec-on-popstate>

    $(function () {

        $('.span:not(.initialized)')
            .addClass('initialized')
            .bootstrapNumber({
                upClass: 'success',
                downClass: 'primary',
                center: true
            });

//        $('.number:not(.initialized)')
//            .addClass('initialized')
//            .bootstrapNumber({
//                upClass: 'success',
//                downClass: 'primary',
//                center: true
//            });
//        $('.evid:not(.initialized)')
//            .addClass('initialized')
//            .bootstrapNumber({
//                upClass: 'success',
//                downClass: 'primary',
//                center: true
//            });


//        $('.clock:not(.initialized)')
//            .addClass('initialized')
//            .bootstrapNumber({
//                upClass: 'success',
//                downClass: 'primary',
//                center: true
//            });
//
//
//        $('.voltage:not(.initialized)')
//            .addClass('initialized')
//            .bootstrapNumber({
//                upClass: 'success',
//                downClass: 'primary',
//                center: true
//            });


//        $('.gt_number:not(.initialized)')
//            .addClass('initialized')
//            .bootstrapNumber({
//                upClass: 'success',
//                downClass: 'primary',
//                center: true
//            });
//
//
//        $('.voltage_type:not(.initialized)')
//            .addClass('initialized')
//            .bootstrapNumber({
//                upClass: 'success',
//                downClass: 'primary',
//                center: true
//            });


        $('.line_angle').inputmask({"alias": "decimal", "rightAlign": true});
        $('.wind_direction').inputmask({"alias": "decimal", "rightAlign": true});
        $('.wind_speed').inputmask({"alias": "decimal", "rightAlign": true});
        $('.temperature').inputmask({"alias": "decimal", "rightAlign": true});
        $('.humidity').inputmask({"alias": "decimal", "rightAlign": true});
        $('.precipitation').inputmask({"alias": "decimal", "rightAlign": true});
        $('.ice_thickness').inputmask({"alias": "decimal", "rightAlign": true});
        $('.angle').inputmask({"alias": "decimal", "rightAlign": true});
//        $('.vertical_wind_speed').inputmask({"alias": "decimal", "rightAlign": true});

    //        $('.podu:not(.initialized)')
    //            .addClass('initialized')
    //            .bootstrapNumber({
    //                upClass: 'success',
    //                downClass: 'primary',
    //                center: true
    //            });
    //
    //
    //        $('.pogao:not(.initialized)')
    //            .addClass('initialized')
    //            .bootstrapNumber({
    //                upClass: 'success',
    //                downClass: 'primary',
    //                center: true
    //            });
    //
    //
    //        $('.dimao:not(.initialized)')
    //            .addClass('initialized')
    //            .bootstrapNumber({
    //                upClass: 'success',
    //                downClass: 'primary',
    //                center: true
    //            });
    //
    //
    //        $('.wudong:not(.initialized)')
    //            .addClass('initialized')
    //            .bootstrapNumber({
    //                upClass: 'success',
    //                downClass: 'primary',
    //                center: true
    //            });
    //
    //
    //        $('.tiaoczha:not(.initialized)')
    //            .addClass('initialized')
    //            .bootstrapNumber({
    //                upClass: 'success',
    //                downClass: 'primary',
    //                center: true
    //            });
    //
    //
    //        $('.pohuai:not(.initialized)')
    //            .addClass('initialized')
    //            .bootstrapNumber({
    //                upClass: 'success',
    //                downClass: 'primary',
    //                center: true
    //            });

        $('.after-submit').iCheck({checkboxClass: 'icheckbox_minimal-blue'}).on('ifChecked', function () {
            $('.after-submit').not(this).iCheck('uncheck');
        });

        $('.container-refresh').off('click').on('click', function () {
            $.admin.reload();
            $.admin.toastr.success('刷新成功 !', '', {positionClass: "toast-top-center"});
        });

    });
</script>
<script>

    //    $form.on('click', '.btn', function () {
    //
    //        var request = $.ajax({
    //            url: '/admin/dataUsageLog/batchImport',
    //            type: 'POST',
    //            cache: false,
    //            data: fd,
    //            processData: false,
    //            contentType: false
    //        });
    //
    //        request.done(function (res) {
    //
    //        });
    //    })
</script>