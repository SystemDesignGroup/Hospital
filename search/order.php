<?php
/**
 * Created by PhpStorm.
 * User: whx
 * Date: 2015/12/5
 * Time: 15:58
 */
$province = iconv('UTF-8','gb2312',urldecode($_GET['province']));
$city = iconv('UTF-8','gb2312',urldecode($_GET['city']));
$hospital = iconv('UTF-8','gb2312',urldecode($_GET['hospital']));
$department = iconv('UTF-8','gb2312',urldecode($_GET['department']));

echo $province;
echo $city;
echo $hospital;
echo $department;
?>