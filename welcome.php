<?php
    session_start();
  
    if(isset($_SESSION['message']))
    {
        $msg=$_SESSION['message'];
        echo $msg;
        unset($_SESSION['message']);
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <style>
                #form {
                display: block;
                margin-top: 0em;
                }
                body
                {
                    background: url('White-Abstract-Backgrounds-for-Desktop.jpg');
            
                   background-size: 100% ,100%;
                   margin: 0px;
                   padding:0px;
                }
                 #button
                {
                    cursor: pointer;
                    margin: 0px;
                    width: 15%;
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
        </style>
        </head>
    <body>
       WELCOME!!
        <form id="form1"  method="post" action="logout.php">
            <p><button type="submit" id="button" value="Logout">Logout</button></p>
        </form>
    </body>
</html>
        