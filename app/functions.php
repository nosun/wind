<?php

function array_depth($array){
    $max_deep = 1;
    foreach($array as $value){
        if(is_array($value)){
            $deep = array_depth($value) + 1;
            // 递归完毕后，判断每次递归的深度是否大于当前的最大深度
            if($deep > $max_deep){
                $max_deep = $deep;
            }
        }
    };

    return $max_deep;
}