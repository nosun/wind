<style>
    .chart-content {
        height:850px;
        overflow: auto;
    }
</style>

<section class="content chart-content">
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
                            <div class="col-md-12 col-sm-8">
                                <div id="main1">
                                    @if(is_array($value))
                                        @foreach($value as $item)
                                            @include('admin.custom.parts.chart-show')
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