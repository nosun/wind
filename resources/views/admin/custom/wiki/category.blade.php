<div class="row">
    <style>
        .images-ul li {
            float: left;
            width: 30%;
            margin: 10px 10px;
            list-style: none;
        }
    </style>
    <div class="col-md-12">
        <!-- The time line -->
        <ul class="timeline">
        @if(!empty($category->definition))
            <!-- timeline time label -->
                {{--<li class="time-label">--}}
                  {{--<span class="bg-green">--}}
                    {{--定义--}}
                  {{--</span>--}}
                {{--</li>--}}
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-leaf bg-blue"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header">{{ $category->name }}  定义</h3>
                        <div class="timeline-body">
                            {!! $category->definition !!}
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
        @endif

        @if(!empty($category->theory))
            <!-- timeline time label -->
                {{--<li class="time-label">--}}
                  {{--<span class="bg-green">--}}
                    {{--原理--}}
                  {{--</span>--}}
                {{--</li>--}}
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-puzzle-piece bg-yellow"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header">{{ $category->name }}  原理</h3>
                        <div class="timeline-body">
                            {!! $category->theory !!}
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
        @endif



        @if(count($images)> 0)
            <!-- timeline time label -->
                {{--<li class="time-label">--}}
                  {{--<span class="bg-green">--}}
                    {{--图片--}}
                  {{--</span>--}}
                {{--</li>--}}
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header">{{ $category->name }}  图片</h3>

                        <div class="timeline-body">
                            <ul class="images-ul clearfix">
                                @foreach($images as $image)
                                    <li class="float">
                                        <img style="width:300px;height:200px" src="{{ $image->link() }}"
                                             alt="{{ $image->title }}" class="margin">
                                        <p>{{ $image->title }}</p>
                                    </li>
                                @endforeach()
                            </ul>
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
            @endif

            @if(count($videos) > 0)
                {{--<li class="time-label">--}}
                  {{--<span class="bg-green">--}}
                    {{--视频--}}
                  {{--</span>--}}
                {{--</li>--}}
                <!-- timeline item -->
                <li>
                    <i class="fa fa-video-camera bg-maroon"></i>
                    @foreach($videos as $video)
                        <div class="timeline-item">
                            <h3 class="timeline-header">{{ $video->title }}</h3>
                            <div class="timeline-body">
                                {{--<video src="/uploads/docs/movie.mp4" controls="controls"></video>--}}
                                <video src="{{ $video->link() }}" controls="controls"></video>
                            </div>
                        </div>
                    @endforeach
                </li>
            @endif

            @if(count($docs)> 0)
                {{--<li class="time-label">--}}
                  {{--<span class="bg-green">--}}
                    {{--文档--}}
                  {{--</span>--}}
                {{--</li>--}}

                <li>
                    <i class="fa fa-file-pdf-o bg-blue"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header">{{ $category->name }} 文档</h3>

                        <div class="timeline-body">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th width="60%">标题</th>
                                        <th width="15%">作者</th>
                                        <th width="15%">推荐级别</th>
                                        <th width="10%">操作</th>
                                    </tr>
                                    @foreach($docs as $doc)
                                        <tr>
                                            <td><a href="{{ $doc->link() }}" title="查看" target="_blank">{{ $doc->title }}</a></td>
                                            <td>{{ $doc->author }}</td>
                                            <td>
                                                @for($i=0;$i<$doc->weight;$i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                            </td>
                                            <td>
                                                <a href="{{ $doc->link() }}" target="_blank" title="查看"><i
                                                            class="fa fa-eye"></i></a>
                                                <a href="{{ $doc->link() }}" target="_blank" download="{{ $doc->title }}" title="下载"><i class="fa fa-download"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach()
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </li>
        @endif
        <!-- END timeline item -->
        </ul>
    </div>
    <!-- /.col -->
</div>