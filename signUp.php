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
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <title>Sign Up!</title>
        <style>
                body{
                display: block;
                margin: 0%;
                padding:0%;
                background: url('White-Abstract-Backgrounds-for-Desktop.jpg');
                }
                #form
                {
                    
                    position: fixed;
                    padding-left:3%;
                    padding-right:2%;
                    text-align: left;
                    padding-bottom: 0%;
                    top:6%;
                    width:34%;
                    left:30%;
                    display: block;
                    border-radius: 5px;
                    border-color:#21A2CA;
                    background: #efefef;
                    opacity: 1;
                    border: 1px solid #cfcfcf;
                    box-shadow: 0px 1px 1px #333;
                    padding-bottom: 5px;
                }
                #form1
                {
                    text-align:left;
                    padding-left:5px;
                    
                }
                #button
                {
                    right:37.5%;
                    position: fixed;
                    cursor: pointer;
                    margin: 0px;
                    width: 10%;
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
                  }
                .ip
                {
                    border-radius:5px;
                    padding-left:5px; 
                    height: 20px;
                    font:sans-serif;
                    width: 85%;
                    border: 1px solid #999999;
                }

        </style>
        </head>
    <body>
        
        <div id="form">
        
            
        
            <form id="form1" onsubmit="return main.passCheck()" method="post" action="index.php">
            <p style="text-align: center; font:sans-serif;font-size:20px; text-align: center">Sign Up! </p>
                <p>
                    <input id="fname" type="text" class="ip" name="firstname"   value="<?php if(isset($_SESSION['fname'])){echo $_SESSION['fname'];}?>"placeholder="First Name"  maxlength="150" autocomplete="on">
        
                    <br><p><br><input id="lname" type="text" class="ip" name="lastname" placeholder="Last Name" value="<?php if(isset($_SESSION['lname'])){echo $_SESSION['lname'];}?>"required="" maxlength="150" autocomplete="on"></p>
                </p>
                <p>
                    <br><input id="email" type="email" class="ip" name="email"  value="<?php if(isset($_SESSION['email'])) {echo $_SESSION['email'];} ?> "placeholder="Email" required="" maxlength="150" autocomplete="on"><br>
                </p>
                <p>
                    <br><input id="pass" type="password" class="ip" name="pass"  placeholder="Password" maxlength="50" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" > <br>
                </p>
                <p>
                    <br><input id="pass1" type="password"  class="ip" name="pass1" placeholder="Confirm Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="6 characters minimum"><br>
                 </p>
                <p>
                    <br><input id="dob" class="ip" type="date" name="dob" value= "<?php echo $_SESSION['dob'];?>" >
                </p>
                <p>
                    <br><select id="gen" class="ip" name="gen" value= "<?php echo $_SESSION['gen'];?>" style="width:87%;" >
                    <option value="sele_g">Select Gender</option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                    <option value="o">Other</option>
                    </select>
                    <br>
                </p>
                <p>
                    <br><input id="num" type="number" name="num"  class="ip" placeholder="Mobile No"  min="7000000000" max="9999999999" title="Enter Valid Mobile No" autocomplete="on" required  value="<?php echo $_SESSION['num'];?>" ><br>            
                </p>
                <p><br>
                    <input type="checkbox"  name="agree" required="">Agree to terms and conditions
                
                
                    <button type="submit" id="button" value="Submit" >Sign Up</button>        
                </p>
            </form>
        </div>

        <script type="text/javascript">

            var main = new function() 
            {
                this.localStorage1 = function()
                {
                    var lname,fname,pass,pass1,email,mob,dob;
                    fname=document.getElementById('fname').value;
                    lname=document.getElementById('lname').value;
                    email=document.getElementById('email').value;
                    pass=document.getElementById('pass').value;
                    pass1=document.getElementById('pass1').value;
                    dob=document.getElementById('dob').value;
                    mob=document.getElementById('num').value;
                    localStorage.setItem("fname",fname);  
                    localStorage.setItem("lname",lname);
                    localStorage.setItem("email",email);
                    localStorage.setItem("pass",pass);
                    localStorage.setItem("num",mob);
                    localStorage.setItem("dob",dob);
                    return true;
                };
                this.sessionStorage1 = function()
                {
                    var lname,fname,pass,pass1,email,mob,dob;
                    fname=document.getElementById('fname').value;
                    lname=document.getElementById('lname').value;
                    email=document.getElementById('email').value;
                    pass=document.getElementById('pass').value;
                    pass1=document.getElementById('pass1').value;
                    dob=document.getElementById('dob').value;
                    mob=document.getElementById('num').value;
                    //alert(fname+'--'+lname+'--'+email+'--'+pass+'--'+dob+'--'+mob);
                    sessionStorage.setItem("fname",fname);
                    
                    sessionStorage.setItem("lname",lname);
                    sessionStorage.setItem("email",email);
                    sessionStorage.setItem("pass",pass);
                    sessionStorage.setItem("num",mob);
                    sessionStorage.setItem("dob",dob);
                    return true;
                };

                this.passCheck = function()
                {
                    var pass=document.getElementById('pass').value;
                    var pass1=document.getElementById('pass1').value;
                    var gen=document.getElementById('gen').value;
                    
                    if(pass!==pass1)
                    {
                        alert("passwords do not match!!");
                        return false;
                    }
                    else
                    {
                        var a=main.sessionStorage1();
                        return main.localStorage1();
                    }			

                };

            };
         </script>



    </body>
</html>