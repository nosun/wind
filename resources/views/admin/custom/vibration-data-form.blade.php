<div class="col-md-12">
    <div class="row uploadArea p-script js-data-upload">
        <div class="box box-success action-notice">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">注意事项</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ol>
                    <li> 上传的文档需要是 Csv 文档，CSV 文件第一行为数据标题。</li>
                    <li> 上传的文档有两种类型，一种是客户的属性更新，一种是邀约记录添加,具体格式如下，请严格按照格式进行填写数据。</li>
                    <li>上传之前，请务必对数据的格式进行检查，保证数据格式的准确性，以避免上传过程中出错。</li>
                    <li> 邀约记录样例表格：<a href="/demo_sheets/data_usage_log.csv" target="_blank">下载</a></li>
                    <li> 客户属性样例表格：<a href="/demo_sheets/customer_update_attr.csv" target="_blank">下载</a></li>
                </ol>
            </div>
            <!-- /.box-body -->
        </div>
        <div class="col-sm-4">
            <form action="#" enctype="multipart/form-data" class="js-data-upload-form js-file-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group clearfix">
                        <div class="input-title">文件选择</div>
                        <div class="col-xs-10 file-upload">
                            <input type="file" name="file" class="file-input"
                                   data-validation="required mime size extension"
                                   data-validation-allowing="jpg, png, gif"
                                   data-validation-max-size="3M"
                                   data-validation-error-msg-size="You can not upload images larger than 512kb"
                                   data-validation-error-msg-mime="You can only upload images"
                                   data-validation-error-msg-length="You have to upload at least two images"
                                   data-validation-error-msg-required="No image selected"
                            />
                            <span class="sp_file sm-error-message2"></span>
                        </div>
                        <button class="btn btn-info btn-sm js-file-submit-btn" type="button">
                            上传
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="showLog col-sm-6">
            @include('admin.custom.parts.logArea')
        </div>
    </div>
</div>
<script>
    var adminJs = window.adminJs || {};
    adminJs.logger = {
        init: function () {

        },

        write: function (message, type) {
            var log_area = $("#log_area");
            log_area.append(format(message, type));

            function format(message, type) {
                return '<p class="log ' + type + '" >' + message + '</p>';
            }
        },

        info: function (message) {
            this.write(message, 'info');
        },

        warning: function (message) {
            this.write(message, 'warning');
        },

        error: function (message) {
            this.write(message, 'error');
        },

        success: function (message) {
            this.write(message, 'success');
        },

        clear: function () {
            var log_area = $("#log_area");
            log_area.html('');
        }
    };
    adminJs.common = {
        ajaxSetup: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
    };


    var $fileForm = $('.js-file-form');
    $fileForm.on('click', '.js-file-submit-btn', function () {
        adminJs.logger.clear();
        var fd = new FormData($fileForm[0]);

        var request = $.ajax({
            url: '/admin/dataUsageLog/batchImport',
            type: 'POST',
            cache: false,
            data: fd,
            processData: false,
            contentType: false
        });

        request.done(function (res) {
            if (res.code === 200) {
                adminJs.logger.info('data import success!');
            } else if (res.code === 601) {
                adminJs.logger.warning('request data error');
                adminJs.logger.warning(res.message);
            } else if (res.code = 602) {
                adminJs.logger.warning('file is empty, please check!');
                adminJs.logger.warning(res.errors);
            }
        });

        request.fail(function (msg) {
            console.log(msg);
        });
    })
</script>