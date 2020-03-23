<?php
// 方式二
@$bvid = $_GET["BV"]; // index.php?BV=BV号
if ($bvid != null && $bvid != '') {
    // 通过 API 获取内容
    $api_stat = file_get_contents('https://api.bilibili.com/x/web-interface/archive/stat?bvid=' . $bvid . '&jsonp=jsonp');
    // 解析 JSON
    $api_stat_data = json_decode($api_stat, true);
    if ($api_stat_data['code'] == 0) {
        // 解析 JSON，获取 aid
        echo 'AV' . $api_stat_data['data']['aid'];
    } else {
        echo '错误';
    }
} else {
    echo ''; // 参数 BV 不存在或为空
}
