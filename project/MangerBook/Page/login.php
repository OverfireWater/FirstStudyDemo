<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html {
            height: 100%;
        }
        body {
            height: 100%;
        }
        .container {
            height: 100%;
            background-image: linear-gradient(to right, #fbc2eb, #a6c1ee);
        }
        .login-wrapper {
            background-color: #fff;
            width: 358px;
            height: 588px;
            border-radius: 15px;
            padding: 0 50px;
            position: relative;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        .header {
            font-size: 38px;
            font-weight: bold;
            text-align: center;
            line-height: 200px;
        }
        .input-item {
            display: block;
            width: 100%;
            margin-bottom: 20px;
            border: 0;
            padding: 10px;
            border-bottom: 1px solid rgb(128, 125, 125);
            font-size: 15px;
            outline: none;
        }
        .input-item-captcha{
            display: block;
            width: 45%;
            margin-bottom: 20px;
            border: 0;
            padding: 10px;
            border-bottom: 1px solid rgb(128, 125, 125);
            font-size: 15px;
            outline: none;
            float: left;
        }

        .input-item::placeholder {
            text-transform: uppercase;
        }
        .btn input{
            text-align: center;
            padding: 10px;
            width: 100%;
            margin-top: 40px;
            background-image: linear-gradient(to right, #a6c1ee, #fbc2eb);
            color: #fff;
            border: 0;
        }
        .msg {
            text-align: center;
            line-height: 88px;
        }
        a {
            color: #abc1ee;
        }
        .img-float{
           padding-top: 10px;
            float: left;

        }
        .captcha{
            position: absolute;
            margin-top: 20px;
        }
        #success,#error{
            display: none;
        }
    </style>
    <script src="../JS/jquery-1.8.3.min.js"></script>
    <script>
        function submit(){
            document.getElementById('f').submit();

        }
        function captcha(){
            document.getElementById('image').src='../Services/Captcha.php?r='+Math.random();
        }
        $(function (){
            $("#captcha").keyup(function (){
                $.ajax({
                    type:"get",
                    async:true,
                    url:"../Services/CaptchaAjax.php",
                    data:{"captcha":$("#captcha").val()},
                    dataType:"json",
                    success:function (data,result){
                        if (result=="success"){
                            $("#success").css("display","block");
                        }else if (result=="error"){
                            $("#error").css("display","block");
                        }
                    },
                    error:function (){
                        alert('??????????????????');
                    }
                });
            });
        });
    </script>
</head>
<body>
<div class="container">
    <div class="login-wrapper">
        <div class="header">??????</div>
        <div class="form-wrapper">
            <form id="f" action="../Services/loginServices.php" method="post" >
                <label>
                    <input type="text" name="username" placeholder="?????????" class="input-item">
                </label>
                <label>
                    <input type="password" name="password" placeholder="??????" class="input-item">
                </label>
                <label>
                    <input type="text"  id="captcha" name="captcha" placeholder="?????????" class="input-item-captcha">
                    <div class="img-float">
                        <img alt="??????" id="success" width="20px" height="20px" src="pic/1.png">
                        <img alt="??????" id="error" width="20px" height="20px" src="pic/2.png">
                    </div>
                </label>
                    <img class="image" id="image" alt="?????????"  src="../Services/Captcha.php" width="100px" height="30px">
                <a class="captcha" href="#" onclick="captcha()">????????????</a>
            <div class="btn"><input id="but" type="button" value="??????" onclick="submit()"></div>
            </form>
        </div>
        <div class="msg">
            ??????????????????
            <a href="#">??????</a>
        </div>
    </div>
</div>
</body>
</html>
