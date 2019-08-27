<?php
$infos =  [
    '档距' => '0 ~ 3000',
    '线路走向角' => '0 ~ 360',
    '风速' => '0 ~ 200',
    '湿度' => '0 ~ 100',
    '温度' => '-80 ~ 80',
    '降水量' => '0 ~ 200',
    '覆冰厚度' => '0 ~ 100',
    '风与导线夹角' => '0 ~ 90',
    '批次' => '>=1',
];
?>

<div>
    <p>
        @foreach($infos as $key => $val)
            <span style="font-weight:bold"> {{ $key }}: {{ $val }} </span> <span style="padding:0 5px"> | </span>
        @endforeach
    </p>
</div>

