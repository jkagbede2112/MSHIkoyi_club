<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

session_start();

if (isset($_SESSION['staffid'])){
    $_SESSION['department'];
    $_SESSION['siteid'];
    $_SESSION['jobdetail'];
    $_SESSION['name'];
    session_destroy();
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PurpleSource Application</title>
        <link href="CSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/pagedefinition.css" rel="stylesheet" type="text/css"/>
        <script src="JavFol/jquery-1.11.3.js" type="text/javascript"></script>
        <script src="JavFol/purplesource.js" type="text/javascript"></script>
    </head>
    <body>
        <div style="position:absolute; width:100%; position:fixed; z-index:5; top: 60px">
            <center>
                <span id="popUpcu" style="display:none; max-width:250px; width:auto; font-family:raleway; font-size:14px; min-height:10px; top:0px; background-color:rgba(70,70,70,0.6); color:#fff; border-style:dotted; border-width:thin; border-color:#000; padding:8px">
                    <div id="messagehere" style="margin-bottom:10px; margin-top:8px"></div>
                    <span id="buttonshere"></span>
                </span>
            </center>
        </div>
        <div class="header">
            <span id="onlinestatus" class="btn btn-success">
                O
            </span>
        </div>
        <div style='padding:10px' >
            <img src='images/purplesourcelogo.png' width='200px'>
        </div>
        <div class="content">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div style="background-color:rgba(0,0,0,0.5); color:#fff; padding:20px; border-radius:4px; margin-top:80px">
                    <span>
                        <label class="login">Username</label>
                        <input type="text" class="form-control" placeholder="email address" style="margin-bottom:20px" id='uUsername'>
                        <label class="login">Password</label>
                        <input type="password" class="form-control" placeholder="password" style="margin-bottom:20px" id='uPassword'>
                        <input type="button" class="btn btn-success" value="Login" onclick='login(uUsername.value, uPassword.value)'>
                        <input type="button" class="btn btn-warning" value="Reset">
                    </span>
                </div>
                <div style="text-align:right; color:#797979">
                    Forgot your username/password details? Click <a href="#">here</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>

        </div>
        <div class="footer">

        </div>
    </body>
</html>
