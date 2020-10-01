<?php
session_start();
error_reporting(0);
include('config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = '../Notice_board/dashboard.php'; </script>";
} else{

    echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin-login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="img/fav.png">

    <style>
         @import url('https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Lato', sans-serif;
            font-weight: 700;
            position: relative;
            color: #555;
            background: #ecf0f3;
        }
        .login-cover{
           margin-right: 10px;
            margin-left: 10px; 
        }
     .login-div {
	max-width: 450px;
	padding: 40px 50px 50px 50px;
	border-radius: 40px;
	background: #ecf0f3;
	box-shadow: 13px 13px 20px hsl(0, 0%, 82.4%), -13px -13px 20px hsl(0, 0%, 100%);
	box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #ffffff;
	margin-right: 15px;
	margin-left: 15px;
	margin: 50px auto;
}

    .logo {
	background: url(img/logo.png);
	width: 100px;
	height: 100px;
	border-radius: 14%;
	margin: 0 auto;
	box-shadow: 0px 0px 2px hsl(0, 0%, 100%), 0px 0px 0px 5px hsla(0, 19%, 91.8%, 0.2), 8px 8px 15px #9a9a9b96, -8px -8px 15px hsl(0, 0%, 100%);
	box-shadow: 0px 0px 2px #fff, 0px 0px 0px 5px #ecf0f333, 8px 8px 15px #a7aaafe6, -8px -8px 15px #fff;
	background-size: cover;
}

.title {
	text-align: center;
	font-size: 28px;
	padding-top: 32px;
	letter-spacing: 0.5px;
	max-width: 300px;
	margin: 0 auto;
}
        .sub-title {
            text-align: center;
            font-size: 15px;
            padding-top: 7px;
            letter-spacing: 3px;
        }

        .fields {
            width: 100%;
            padding: 50px 5px 5px 5px;
        }

      .fields input {
	border: none;
	outline: none;
	background: none;
	font-size: 18px;
	color: #555;
	padding: 16px 10px 16px 5px;
	width: 75%;
}

.username, .password {
	margin-bottom: 30px;
	border-radius: 25px;
	 box-shadow: inset 8px 8px 8px hsla(192, 3.9%, 74.7%, 0.44), inset -8px -8px 8px hsl(0, 0%, 100%); 
	box-shadow: inset 8px 8px 8px #cbced1a6, inset -8px -8px 8px #fff;
}

        .fields svg {
            height: 22px;
            margin: 0 6px -3px 25px;
            fill: #999;
        }

.signin-button {
	outline: none;
	border: none;
	cursor: pointer;
	width: 100%;
	height: 53px;
	border-radius: 30px;
	font-size: 20px;
	font-weight: 700;
	font-family: 'Lato', sans-serif;
	color: #fff;
	text-align: center;
	background: #24cfaa;
	box-shadow: 3px 3px 8px hsla(0, 1.2%, 68.6%, 0.98), -3px -3px 8px hsl(0, 0%, 100%);
	box-shadow: 3px 3px 8px #b1b1b1, -3px -3px 8px #fff;
	transition: 0.5s;
}
        .signin-button:hover {
            background: #2fdbb6;
        }

        .signin-button:active {
            background: #1da88a;
        }

        .link {
            padding-top: 20px;
            text-align: center;
        }

        .link a {
            text-decoration: none;
            color: #aaa;
            font-size: 15px;
            cursor: pointer;
        }
          
        .link a:hover{
            color: #8a8787;
        }
        
        
.copyrights {
	text-align: center;
	font-weight: unset;
	font-family: 'Lato', sans-serif;
	color: #919191d9;
	font-size: 13px;
	margin-bottom: 10px;
	text-transform: capitalize;
}
   @media (max-width:560px) {
            .login-div {
                padding: 40px 27px 50px 26px;
            }
            .fields svg {
                margin: 0 5px -3px 15px;
            }
.login-div {
	margin: 40px auto;
	padding: 30px 10px 40px 10px;
}
        }
    </style>
</head>

<body>
    <div class="login-cover">
    <div class="login-div">
        <div class="logo"></div>
        <div class="title">
            Tamirul Millat Kamil Madrasah, Tongi
        </div>
        <form action="#" method="post">
            <div class="fields">
                <div class="username">


                    <svg viewBox="0 0 1024 1024">
                        <path class="path1" d="M896 307.2h-819.2c-42.347 0-76.8 34.453-76.8 76.8v460.8c0 42.349 34.453 76.8 76.8 76.8h819.2c42.349 0 76.8-34.451 76.8-76.8v-460.8c0-42.347-34.451-76.8-76.8-76.8zM896 358.4c1.514 0 2.99 0.158 4.434 0.411l-385.632 257.090c-14.862 9.907-41.938 9.907-56.802 0l-385.634-257.090c1.443-0.253 2.92-0.411 4.434-0.411h819.2zM896 870.4h-819.2c-14.115 0-25.6-11.485-25.6-25.6v-438.566l378.4 252.267c15.925 10.618 36.363 15.925 56.8 15.925s40.877-5.307 56.802-15.925l378.398-252.267v438.566c0 14.115-11.485 25.6-25.6 25.6z"></path>
                    </svg>

                    <input type="username" class="user-input" placeholder="username" name="username" id="inputEmail3">

                </div>


                <div class="password">



                    <svg viewBox="0 0 1024 1024">
                        <path class="path1" d="M742.4 409.6h-25.6v-76.8c0-127.043-103.357-230.4-230.4-230.4s-230.4 103.357-230.4 230.4v76.8h-25.6c-42.347 0-76.8 34.453-76.8 76.8v409.6c0 42.347 34.453 76.8 76.8 76.8h512c42.347 0 76.8-34.453 76.8-76.8v-409.6c0-42.347-34.453-76.8-76.8-76.8zM307.2 332.8c0-98.811 80.389-179.2 179.2-179.2s179.2 80.389 179.2 179.2v76.8h-358.4v-76.8zM768 896c0 14.115-11.485 25.6-25.6 25.6h-512c-14.115 0-25.6-11.485-25.6-25.6v-409.6c0-14.115 11.485-25.6 25.6-25.6h512c14.115 0 25.6 11.485 25.6 25.6v409.6z"></path>
                    </svg>

                    <input type="password" class="pass-input" placeholder="password" name="password" id="inputPassword3"></div>
                </div>




            <button class="signin-button" type="submit" name="login">Login</button>
            <div class="link">
                <a href="#">Forgot password?</a>
            </div>
        </form>
    </div>
    </div>
    
    
    <p class="copyrights"> © Copyright 2020 Tamirul Millat Kamil Madrasah. All Rights Reserved.</p>
    
    
    
</body>

</html>
