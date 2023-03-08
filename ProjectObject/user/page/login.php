<!DOCTYPE html>
<html lang="en">
<!-- https://codepen.io/danielkvist/pen/LYNVyPL -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>个人网盘</title>
    <style>
        :root {
            /* COLORS */
            --white: #e9e9e9;
            --gray: #333;
            --blue: #0367a6;
            --lightblue: #008997;

            /* RADII */
            --button-radius: 0.7rem;

            /* SIZES */
            --max-width: 758px;
            --max-height: 420px;

            font-size: 16px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
            Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        }

        body {
            align-items: center;
            background-color: var(--white);
            /*background: url("https://res.cloudinary.com/dbhnlktrv/image/upload/v1599997626/background_oeuhe7.jpg");*/
            /* 决定背景图像的位置是在视口内固定，或者随着包含它的区块滚动。 */
            /* https://developer.mozilla.org/zh-CN/docs/Web/CSS/background-attachment */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: grid;
            height: 95vh;
            place-items: center;
        }

        .form__title {
            font-weight: 300;
            margin: 0;
            margin-top: 20px;
            margin-bottom: 1.25rem;
        }

        .link {
            color: var(--gray);
            font-size: 0.9rem;
            margin: 1.5rem 0;
            text-decoration: none;
        }

        .container {
            background-color: var(--white);
            border-radius: var(--button-radius);
            box-shadow: 0 0.9rem 1.7rem rgba(0, 0, 0, 0.25),
            0 0.7rem 0.7rem rgba(0, 0, 0, 0.22);
            height: var(--max-height);
            max-width: var(--max-width);
            overflow: hidden;
            position: relative;
            width: 100%;
        }

        .container__form {
            height: 100%;
            position: absolute;
            top: 0;
            transition: all 0.6s ease-in-out;
        }

        .container--signin {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.right-panel-active .container--signin {
            transform: translateX(100%);
        }

        .container--signup {
            left: 0;
            opacity: 0;
            width: 50%;
            z-index: 1;
        }

        .container.right-panel-active .container--signup {
            animation: show 0.6s;
            opacity: 1;
            transform: translateX(100%);
            z-index: 5;
        }

        .container__overlay {
            height: 100%;
            left: 50%;
            overflow: hidden;
            position: absolute;
            top: 0;
            transition: transform 0.6s ease-in-out;
            width: 50%;
            z-index: 100;
        }

        .container.right-panel-active .container__overlay {
            transform: translateX(-100%);
        }

        .overlay {
            background-color: var(--lightblue);
            background: url("images/bacgroud.jpg");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            left: -100%;
            position: relative;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
            width: 200%;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay__panel {
            align-items: center;
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: center;
            position: absolute;
            text-align: center;
            top: 0;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
            width: 50%;
        }

        .overlay--left {
            transform: translateX(-20%);
        }

        .container.right-panel-active .overlay--left {
            transform: translateX(0);
        }

        .overlay--right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay--right {
            transform: translateX(20%);
        }

        .btn {
            background-color: var(--blue);
            background-image: linear-gradient(90deg, var(--blue) 0%, var(--lightblue) 74%);
            border-radius: 20px;
            border: 1px solid var(--blue);
            color: var(--white);
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: bold;
            letter-spacing: 0.1rem;
            padding: 0.9rem 4rem;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        .form>.btn {
            margin-top: 1.5rem;
        }

        .btn:active {
            transform: scale(0.95);
        }

        .btn:focus {
            outline: none;
        }

        .form {
            background-color: var(--white);

            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 3rem;
            height: 100%;
            text-align: center;
        }

        .input {
            background-color: #fff;
            border: none;
            padding: 0.9rem 0.9rem;
            margin: 0.5rem 0;
            width: 100%;
            outline: none;
            border-radius: 20px;
        }
        .input:focus{
            border:2px solid #00aaee;
        }
        .input-cap {
            background-color: #fff;
            border: none;
            padding: 0.9rem 0.9rem;
            margin: 0.5rem 0;
            width: 50%;
            outline: none;
            border-radius: 20px;
            float: left;
        }
        .Captcha{
            float: right;
            margin: 0.5rem 0
        }
        .input-cap:focus{
            border:2px solid #00aaee;
        }
        @keyframes show {

            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }
        a{
            text-decoration: none;
        }

    </style>
</head>
<script src="../js/jquery-1.8.3.min.js"></script>
<script>
    $(function (){
        $("#submit").click(function (){
            $.ajax({
                type:"post",
                url:"../Services/loginServices.php",
                data:{"username":$("#username").val(),"userpwd":$("#userpwd").val(),"captcha":$("#captcha").val()},
                dataType:"text",
                success:function (result){
                    if ($("#username").val()=="" || $("#userpwd").val()==""){
                        alert('账号或密码不能为空');
                        window.location.href='login.php';
                    }
                    if (result=="success"){
                        alert('登录成功');
                        window.location.href='index.php';
                    }else if (result=="error"){
                        alert('账号或密码错误');
                        window.location.href='login.php';
                    }else if (result=="cap_error"){
                        alert('验证码错误');
                        window.location.href='login.php';
                    }else if (result=="Banned"){
                        alert('当前账号违规，已被封禁!');
                        window.location.href='login.php';
                    }
                },
                error:function (){
                    alert('错误');
                }
            });
        });
    });
</script>
<body>
<div class="container ">
    <!-- Sign Up -->
    <div class="container__form container--signup">
        <form action="../Services/EnrollServices.php" method="post" class="form" id="form1">
            <h2 class="form__title">注册</h2>
            <input type="text" name="username" placeholder="请输入账号" class="input" />
            <input type="text" name="nickname" placeholder="请输入昵称" class="input" />
            <input type="password" name="userpwd" placeholder="请输入密码" class="input" />
            <input type="password" name="renpwd" placeholder="请确认密码" class="input" />
            <input type="submit" class="btn" value="注册">
        </form>
    </div>

    <!-- Sign In -->
    <div class="container__form container--signin">
        <form  class="form" id="form2">
            <h2 class="form__title">个人网盘中心</h2>
            <input type="text" id="username" placeholder="请输入账号" class="input" />
            <input type="password" id="userpwd" placeholder="请输入密码" class="input" />
            <input type="text" id="captcha" placeholder="请输入验证码" class="input-cap" />
            <img width="100" height="44" src="../Services/CaptchaGD.php" class="Captcha" style="cursor:pointer;" onclick="this.src=this.src+'?'">
            <input type="button" id="submit" class="btn" value="登录">
            <br>
            <a href="../../admin/login.html" style="float:right;padding-top: 30px;font-size: 13px">后台管理端</a>
        </form>

    </div>

    <!-- Overlay -->
    <div class="container__overlay">
        <div class="overlay">
            <div class="overlay__panel overlay--left">
                <button class="btn" id="signIn">登录</button>
            </div>
            <div class="overlay__panel overlay--right">
                <button class="btn" id="signUp">注册</button>
            </div>
        </div>
    </div>
</div>

<script>
    const signInBtn = document.getElementById("signIn");
    const signUpBtn = document.getElementById("signUp");
    const fistForm = document.getElementById("form1");
    const secondForm = document.getElementById("form2");
    const container = document.querySelector(".container");

    signInBtn.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
    });

    signUpBtn.addEventListener("click", () => {
        container.classList.add("right-panel-active");
    });
</script>
</body>

</html>
