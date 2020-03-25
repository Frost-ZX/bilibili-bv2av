<?php
// 限制频率
$limit_interval = 30; // 两次查询的时间间隔（秒）
$time_now = time();   // 当前时间

// ?type=查询方式mode=模式&id=BV号
@$g_type = $_GET['type']; // a, b
@$c_mode = $_GET['mode']; // getav, getbv
@$v_id = $_GET['id'];     // BV号, AV号

// API
$api_a = 'https://api.bilibili.com/x/web-interface/archive/stat';
$api_b = 'https://api.bilibili.com/x/player/pagelist';
$api_c = 'https://api.bilibili.com/x/web-interface/view';

if (!empty($v_id)) {
    $pattern = '/^[A-Za-z0-9]+$/';
    if (preg_match($pattern, $v_id)) {
        // 读取上一次执行的时间
        $read_record = fopen('time_record.txt', 'r') or die('Unable to open file!');
        $time_record = fgets($read_record);
        fclose($read_record);

        if ($time_now - $time_record > $limit_interval) {
            // 记录本次执行的时间
            $write_record = fopen('time_record.txt', 'w') or die('Unable to open file!');
            fwrite($write_record, $time_now);
            fclose($write_record);

            if ($c_mode == 'getav') {
                if ($g_type == 'a') {
                    // 通过 API 获取内容
                    $api_stat = file_get_contents($api_a . '?bvid=' . $v_id);
                    // 解析 JSON
                    $api_stat_data = json_decode($api_stat, true);
                    if ($api_stat_data['code'] == 0) {
                        // 解析 JSON，获取 aid
                        echo 'AV' . $api_stat_data['data']['aid'];
                    } else {
                        echo '出错，可能是 BVID 无效';
                    }
                } elseif ($g_type == 'b') {
                    // 通过 API 获取内容
                    $api_pagelist = file_get_contents($api_b . '?bvid=BV' . $v_id);
                    // 解析 JSON
                    $api_pagelist_data = json_decode($api_pagelist, true);
                    if ($api_pagelist_data['code'] == 0) {
                        // 解析 JSON，获取 cid
                        $cid = $api_pagelist_data['data'][0]['cid'];
                        // 通过 API 获取内容
                        $api_info = file_get_contents($api_c . '?cid=' . $cid . '&bvid=BV' . $v_id);
                        // 解析 JSON
                        $api_info_data = json_decode($api_info, true);
                        if ($api_info_data['code'] == 0) {
                            // 解析 JSON，获取 aid
                            echo 'AV' . $api_info_data['data']['aid'];
                        } else {
                            echo '出错，可能是 CID 无效';
                        }
                    } else {
                        echo '出错，可能是 BVID 无效';
                    }
                }

            } elseif ($c_mode == 'getbv') {
                // 通过 API 获取内容
                $api_stat = file_get_contents($api_a . '?aid=' . $v_id);
                // 解析 JSON
                $api_stat_data = json_decode($api_stat, true);
                if ($api_stat_data['code'] == 0) {
                    // 解析 JSON，获取 aid
                    echo $api_stat_data['data']['bvid'];
                } else {
                    echo '出错，可能是 AVID 无效';
                }
            }
        } else {
            echo '查询冷却剩余 ' . ($limit_interval - $time_now + $time_record) . ' 秒';
        }
    } else {
        echo '不是正确的 ID';
    }
} else {
    echo '';
}
