<?php

require './_bootstrap.php';

use Alipay\AlipayRequestFactory;
use Alipay\AlipayHelper;

/**
 * 根据文件名剥离请求名
 */
$apiName = basename(__FILE__, '.php');

/**
 * 构建请求类
 */
$request = AlipayRequestFactory::createByApi($apiName, [
    'grant_type' => 'authorization_code',
    'code' => $_GET['authcode']
]);

/**
 * 发起请求并调试输出结果
 */
try {
    $data = AlipayHelper::execute($request, $aop);
    print_r($data);
} catch (\Exception $ex) {
    print_r($ex);
    http_response_code(500);
}