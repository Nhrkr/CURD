<?php
session_start();
    error_reporting(E_ALL);
    $email = $password ="";
    $_SESSION["email"]=$_POST['email'];
    $_SESSION['password']=$_POST['pass'];
    print_r($_SESSION);

    
    function validate($email,$password)
    {
     
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
        {
            header('Location: http://localhost:8080/PhpProject1/login.php');
            $emailErr="\nNot a valid email address\n";
            //echo $emailErr;
            die($emailErr);
        }
         if(!preg_match("/^[aA-zZ 0-9]*$/", $password))
        {
            $passErr="Password format doesn't matched";
            //echo $passErr;
            die($passErr);
        }
    }
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
     
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        $email = test_input($_POST["email"]);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = test_input($_POST["pass"]);
        validate($email,$password);
        db_connect($email,$password);
    }
    function db_connect($email,$password)
    {
        $servername = "127.0.0.1";
        $username = "root";
        $passwords = "";
        //echo $servername," ",$username," ",$passwords;         
        $conn = new mysqli($servername, $username, $passwords);
        if (!$conn) 
        {
            die("Connection failed: " . $conn->connect_error);
        } 
        //echo "Connected successfully";
        if($conn->select_db('formData') === false)
        {   
             //header('Location: http://localhost:8080/PhpProject1/signUp.php');
        }
        else
        {
            $query = "SELECT * FROM MyData WHERE email='$email' " ;
            $result = mysqli_query($conn,$query) or die(mysql_error());

            if (!mysqli_num_rows($result) ) 
            {
                $_SESSION['message']="Email Doesnt Exsits";
                header('Location: http://localhost:8080/PhpProject1/signUp.php');
                
            }
            else
            {
                $query = "SELECT * FROM MyData WHERE email='$email' AND password='$password' ";
                //$names="SELECT firstname lastname FROM MyData";
                //$resultN= mysqli_query($conn,$names) or die(mysql_error());
                $result = mysqli_query($conn,$query) or die(mysql_error());

                if(mysqli_num_rows($result))
                {
                    $row=  mysqli_fetch_object($result);
                    //extract($row);
                    print_r($row);
                    echo $row->firstname;
                    echo $row->lastname;
                    echo "printing names";
                }
                
                if (mysqli_num_rows($result) ) 
                {
                    $_SESSION['message']=$row->firstname;
                    //header('Location: http://localhost:8080/PhpProject1/welcome.php');
                }
                else
                {
                    $_SESSION['message']="wrong password";
                    header('Location: http://localhost:8080/PhpProject1/login.php');
                }
            }
            
        }
          
        mysqli_close($conn); 
    }

?>

