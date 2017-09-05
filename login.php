<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <style>
                body
                {
                    background: url('White-Abstract-Backgrounds-for-Desktop.jpg');
                 // background:-webkit-radial-gradient(circle, rgba(100, 100, 100, 0.2), rgba(0, 0, 0, 0.9));  
                  /*background-color: white;*/
                  // background-image: url("http://fc03.deviantart.net/fs71/i/2010/258/e/9/starry_sky_background_by_tweedpawn-d2ys58e.png");
                   background-size: 100% ,100%;
                   margin: 0px;
                   padding:0px;
                  
                }
                #form
                {
                    display: block;
                    height:48%;
                    width: 48%;
                    position:fixed;
                    top:23%;
                    text-align: left;
                    left:25%;
                    border-radius: 5px;
                    border-color:#21A2CA;
                    /*background: #EFEAF0;*/
                    //opacity:0.2;
                }
                #form-layout
                {
                    display: block;
                    height:48%;
                    width: 48%;
                    position:fixed;
                    top:23%;
                    text-align: left;
                    left:25%;
                    border-radius: 5px;
                    border-color:#21A2CA;
                    background: #efefef;
                    opacity: 1;
                    border: 1px solid #cfcfcf;
                    box-shadow: 0px 1px 1px #333;
                    //opacity:0.2;
                }
                .input
                {
                    border-radius:5px;
                    padding-left:5px; 
                    height: 35px;
                    
                }
                #button
                {
                    cursor: pointer;
                    margin: 0px;
                    width: 99%;
                    border-radius: 5px;
                    text-decoration: none;
                    padding-left: 5px;
                    font-size: 18px;
                    transition: .3s;
                    -webkit-transition: .3s;
                    -moz-transition: .3s;
                    -o-transition: .3s;
                    display: inline-block;
                    color: #fff;
                    outline: none;
                    background: #261161;
                    //border:none;
                  }

                
                .line
                {
                    border-bottom-style: solid;
                    border-bottom-color: #666666;
                    border-bottom-width: 2px;
                    width: 70px;
                    height: 10px;
                }
                #regi
                {
                    position: fixed;
                    left:53.3%;
                    top:25%;
                }
                #login
                {
                    float: left;
                    position: fixed;
                    left:30%;
                }
                #line
                {
                    border-right-width: 2px;
                    border-right-style: solid;
                    border-right-color: #999999;
                    height: 40%;
                    position:fixed;
                    left:50%;
                    top: 27%;
                }
                #bckgnd
                {
                    position: fixed;
                    width: 50%;
                    height: 50%;
                    top: 21.3%;
                    left: 24%;
                    opacity: 0.2%;
                    border: 1px solid #fff;
                    border-radius: 6px;
                    background: transparent;
                }
        </style>
        </head>
    <body>
       
        <div id="form-layout"></div>
        <div id="form">
           
            <div id="ip">
                <div id="regi" >
                    <br><br>
                    <p style="font:sans-serif;font-size:21px;">Don't have an account?</p><br><br>
                    <form  action="signUp.php" role="form">
                        <button type="submit" id="button" class="input" style=" width:90%;">Sign Up</button>
                    </form>
                </div>
                <br>                
                <div id="line"><p></p></div>             
                <br>                
                <div id="login" style="">                  
                    <p style="font:serif;font-size: 20px;">WELCOME BACK!</p>
                    <br>
                        <?php 
                            if(isset($_SESSION['message']))
                            {
                                $msg=$_SESSION['message'];
                                echo $msg;
                                unset($_SESSION['message']);
                            }
                        ?>
                <form id="form1" class="input" method="post" role="form" action="validate.php" onsubmit="return main.passCheck()">
                    <input id="email"  style="width:96%;border: 1px solid #999999;" type="email" name="email" class="input" placeholder="Email" required="" maxlength="150" autocomplete="on" >
                    <br>
                    <br>
                    <input id="pass" type="password"  style="width:96%; border: 1px solid #999999;" name="pass" class="input" placeholder="Password" maxlength="50"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" > <br>
                    <br>
                    <button type="submit" id="button" class="input"   style="width:96%;" value="Login" >Login</button>
                </form>
            </div>
        </div>
    </div>
        
        <script>
            
            var main= new function()
            {
                this.localStorage1=function()
                {
                    var email,pass;
                    email=document.getElementById('email').value;
                    pass=document.getElementById('pass').value;
                    localStorage.setItem("email",email);
                    localStorage.setItem("pass",pass);
                    return true;
                };
                this.ssnStorage=function()
                {
                    var email,pass;
                    email=document.getElementById('email').value;
                    pass=document.getElementById('pass').value;
                   sessionStorage.setItem("email",email);
                    sessionStorage.setItem("pass",pass);
                    return true;
                };
                return main.localStorage1();
            };
            
        </script>
    </body>
</html>    