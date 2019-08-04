<section class="content">
    <style>
        .markdown{
            padding: 10px;
        }

        .markdown h2{
            font-size: 20px;
            line-height:36px;
            margin:20px auto 10px;
        }

        .markdown h3 {
            font-size: 18px;
            line-height:32px;
            margin:10px auto;
        }

        .markdown h4 {
            font-size:16px;
        }

        .markdown p{
            font-size:16px;
            line-height:28px;
            text-indent:2em;
        }

        .markdown li{
            font-size:16px;
            line-height:28px;
        }
    </style>
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            <div class="box box-success">
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-9 col-sm-8">
                            <div class="markdown">
                                @markdown
                                {{ $doc }}
                                @endmarkdown
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
</section>