<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/dh.css"/>
    <title>我的购物车</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "微软雅黑";
            list-style: none;
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }

        body {
            background: #f5f5f5;
            height: 100%;
        }

        .header {
            font-size: 12px;
            border-bottom: 2px solid #ff6700;
            background: #fff;
            color: #b0b0b0;
            position: relative;
            z-index: 20;
            height: 100px;
        }

        .header .container {
            position: relative;
            width: 1226px;
            margin-right: auto;
            margin-left: auto;
        }

        .header .container .header-logo {
            width: 93px;
            margin-top: 26px;
        }

        .logo {
            width: 48px;
            height: 48px;
            position: relative;
            display: block;
            width: 55px;
            height: 55px;
            overflow: hidden;
            background-color: #ff6700;
        }

        .header-title {
            float: left;
            margin-top: 26px;
            font-size: 12px;
        }

        .topbar-info {
            margin-top: 30px;
            line-height: 40px;
        }

        .link {
            padding: 0 5px;
            color: #757575;
            text-decoration: none;
        }

        .hid {
            overflow: hidden;
        }

        .left {
            float: left;
        }

        .box_head {
            position: relative;
            margin: 0;
            height: 50px;
            font-size: 30px;
            font-weight: 400;
            color: #757575;
            border-top: 1px solid #e0e0e0;
        }

        .box_head span {
            position: absolute;
            top: -20px;
            left: 372px;
            height: 40px;
            width: 482px;
            line-height: 40px;
            text-align: center;
            display: block;
            background-color: #f5f5f5;
            font-size: 30px;
        }

        #box {
            width: 1240px;
            margin: 20px auto;
        }

        #box ul {
            margin-right: -14px;
            overflow: hidden;
        }

        #box li {
            width: 234px;
            float: left;
            margin-right: 14px;
            padding: 24px 0 20px;
            background: #FFF;
            text-align: center;
            position: relative;
            cursor: pointer;
            margin-bottom: 14px;
        }

        .pro_img {
            width: 150px;
            height: 150px;
            margin: 0 auto 18px;
        }

        .pro_name {
            display: block;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            font-weight: 400;
        }

        .pro_name a {
            color: #333;
        }

        .pro_price {
            color: #ff6700;
            margin: 10px;
        }

        .pro_rank {
            color: #757575;
            margin: 10px;
        }

        #box li:hover .add_btn {
            display: block;
        }

        #box li:hover .pro_rank {
            opacity: 0;
        }

        #box li .add_btn:hover {
            background-color: #f60;
            color: white;
        }


        .add_btn {
            height: 22px;
            position: absolute;
            width: 122px;
            bottom: 28px;
            left: 50%;
            margin-left: -61px;
            line-height: 22px;
            display: none;
            color: #F60;
            font-size: 12px;
            border: 1px solid #f60;
        }

        .car {
            width: 1240px;
            margin: 20px auto;
            background: #FFF;
        }

        .car .check {
            width: 50px;

        }

        .car .check i {
            color: #fff;
            display: inline-block;

            width: 18px;
            height: 18px;
            line-height: 18px;
            border: 1px solid #e0e0e0;
            margin-left: 24px;
            background-color: #fff;
            font-size: 16px;
            text-align: center;
            vertical-align: middle;
            position: relative;
            top: -1px;
            cursor: pointer;
            font-family: "iconfont";
        }

        .i_acity {

            border-color: #ff6700 !important;
            background-color: #ff6700 !important;
        }

        .car .img {
            width: 190px;
        }

        .car .img img {
            display: block;
            width: 80px;
            height: 80px;
            margin: 3px auto;
        }

        .car .name {
            width: 300px;
        }

        .car .name span {
            line-height: 1;
            margin-top: 8px;
            margin-bottom: 8px;
            font-size: 18px;
            font-weight: normal;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        .car .price {
            width: 144px;
            text-align: right;
            padding-right: 84px;
        }

        .car .price span {
            color: #ff6700;
            font-size: 16px;
        }

        .car .number {
            width: 150px;
        }

        .car .subtotal {
            width: 130px;

        }

        .car .ctrl {
            width: 105px;
            padding-right: 25px;
            text-align: center;
        }

        .car .ctrl a {
            font-size: 20px;
            cursor: pointer;
            display: block;
            width: 26px;
            height: 26px;
            margin: 30px auto;
            line-height: 26px;
        }

        .car .ctrl a:hover {
            color: #FFF;
            background: #ff6700;
            border-radius: 50%;
        }

        .head_row {
            height: 70px;
            line-height: 70px;
        }

        .head_row, .row {
            border-bottom: solid 1px #e0e0e0;
        }

        .row {
            height: 86px;
            line-height: 86px;
            padding: 15px 0;
            margin: 0px;
        }

        #sum_area {
            width: 1240px;
            height: 60px;
            background: white;
            margin: 20px auto;
        }

        #sum_area #pay {
            width: 250px;
            height: 60px;
            text-align: center;
            float: right;
            line-height: 60px;
            font-size: 19px;
            background: #FF4B00;
            color: white;
        }

        #sum_area #pay_amout {
            width: 250px;
            height: 60px;
            text-align: center;
            float: right;
            line-height: 60px;
            font-size: 16px;
            color: #FF4B00;
        }

        #sum_area #pay_amout {
            width: 100px;
            height: 60px;
            font-size: 25px;
            color: #FF4B00;
            /*	float: left;*/
        }

        .topbar-info {
            text-align: right;
            height: 100px;
            line-height: 100px;
        }
        .data{
            text-align: center;
            height: 500px;

        }
        h1{
            padding-top: 200px;
            font-size: 22px;
            padding-bottom: 20px;
        }
        .back-but-left{
            font-size: 16px;
            border: 1px solid rgba(0,0,0,0);
            border-radius: 20px;
            width: 150px;
            height: 40px;
            line-height: 40px;
            background-color: #e2495d;
            color: white;
            float: left;
        }
        .back-but-right{
            font-size: 16px;
            border: 1px solid rgba(0,0,0,0);
            border-radius: 20px;
            width: 150px;
            height: 40px;
            line-height: 40px;
            background-color: #d629ac;
            margin-left: 30px;
            color: white;
            float: left;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="container">
        <div class="header-title" id="J_miniHeaderTitle">
            <h2 id="h4" style="font-size: 30px;">我的购物车</h2>
        </div>
        <div class="topbar-info" id="J_userInfo">
            <a rel="nofollow" class="link" href="login.html">登录</a><span class="sep">|</span><a rel="nofollow" class="link" href="enroll.html">注册</a>
        </div>
    </div>
</div>
<div id="car" class="car">
    <div class="data">
        <h1>支付成功！</h1>
        <div style="display: inline-block;">
            <a href="index.php"><div class="back-but-left">返回商城</div></a>
            <a href="shopCart.php"><div class="back-but-right">返回购物车</div></a>
        </div>
    </div>
</div>
</body>
</html>
