<?php
function test_array($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function transBoolToStringTS($bool){
    return $bool === 0 ? 'cong' : 'phẳng';
}