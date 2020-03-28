<?php

require_once('./Response.php');

$arr = array(
    'id' => 1,
    'name' => 'shaukon',
    'type' => [1,2,3],
    'test' => [1,45,67=>[123,'xxk']],
);

//Response::json(200,'数据返回成功',$arr);

//Response::xmlEncode(200,'数据返回成功',$arr);

//Response::show(200,'数据返回成功',$arr,'json');
//Response::show(200,'数据返回成功',$arr,'xml');
//Response::show(200,'数据返回成功',$arr,'array');

Response::show(200,'数据返回成功',$arr);