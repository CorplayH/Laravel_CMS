<?php
/**
 * Created by PhpStorm.
 * User: Will
 * Date: 7/09/18
 * Time: 21:40
 */
function hd_randomCode($len = 4){
    $str = '';
//    for ($i=0;$i<$len;$i++){
//        //substr字符串截取
//        //mt_rand (1,99999)从1-99999 随机一个数
//        $str .= substr (mt_rand (1000,9999),0,1);
//    }
    $str = rand (1000,9999);
    return $str;
}
