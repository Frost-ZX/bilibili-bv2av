<?php
// 方式二
$limit_interval = 30; // 两次查询的时间间隔（秒）
$time_now = time();   // 当前时间
@$bvid = $_GET["BV"]; // index.php?BV=BV号
if ($bvid != null && $bvid != '') {
    // 读取上一次执行的时间
    $read_record = fopen("time_record.txt", "r") or die("Unable to open file!");
    $time_record = fgets($read_record);
    fclose($read_record);

    if ($time_now - $time_record > $limit_interval) {
        // 记录本次执行的时间
        $write_record = fopen('time_record.txt', 'w') or die('Unable to open file!');
        fwrite($write_record, $time_now);
        fclose($write_record);

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
        echo '查询冷却剩余 ' . ($limit_interval - $time_now + $time_record) . ' 秒';
    }
} else {
    echo ''; // 参数 BV 不存在或为空
}
