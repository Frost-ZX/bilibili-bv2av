<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>通过 BVID 获取 AVID</title>
    <link rel="stylesheet" href="style.css" />
    <!-- 作者：Frost-ZX -->
</head>
<body>
    <div class="query-box">
        <div class="input">
            <label for="query-box-input">BVID（不带“BV”）：</label>
            <input type="text" id="query-box-input" />
        </div>
        <div class="btn-submit">
            <div>查询</div>
        </div>
        <div class="result">
            <span class="avid">
                <!-- 在此修改调用的 PHP -->
                结果：<?php include 'getavid_a.php'?>
            </span>
        </div>
        <div class="warning">
            <p>注意：禁止滥用。</p>
        </div>
    </div>
    <script type="text/javascript" src="script.js" charset="UTF-8"></script>
</body>
</html>
