<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AV号与BV号互转</title>
    <link rel="stylesheet" href="style.css" />
    <!-- 作者：Frost-ZX -->
    <!-- API 来源：bilibili -->
</head>
<body>
    <div class="query-box">
        <div class="input">
            <label for="query-box-input">ID：</label>
            <input type="text" id="query-box-input" placeholder="不带“AV”或“BV”" />
        </div>
        <div class="btn-submit">
            <h4>方式一</h4>
            <div class="btn" name="a_getav">查询 AV 号</div>    
            <div class="btn" name="a_getbv">查询 BV 号</div>
            <h4>方式二</h4>
            <div class="btn" name="b_getav">查询 AV 号</div>
        </div>
        <div class="result">
            <span class="avid">
                结果：<?php include 'getid.php'?>
            </span>
        </div>
        <div class="warning">
            <p>注意：禁止滥用。</p>
        </div>
    </div>
    <script type="text/javascript" src="script.js" charset="UTF-8"></script>
</body>
</html>
