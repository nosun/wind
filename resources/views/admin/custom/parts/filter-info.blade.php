<?php
$infos =  [
    '档距' => '0 ~ 9999',
    '线路走向角' => '0 ~ 360',
    '风速' => '0 ~ 200',
    '湿度' => '0 ~ 100',
    '温度' => '-100 ~ 100',
    '降水量' => '0 ~ 200',
    '覆冰厚度' => '0 ~ 100',
    '风线夹角' => '0 ~ 100',
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

