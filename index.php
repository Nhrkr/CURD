<?php
    session_start();
    error_reporting(E_ALL);
    $fname=$lname = $email = $gender = $password = $password1 = $dob= $mob= "";
    $_SESSION['fname']=$_POST['firstname'];
    $_SESSION['lname']=$_POST['lastname'];
    $_SESSION["email"]=$_POST['email'];
    $_SESSION['password']=$_POST['pass'];
    $_SESSION['gender']=$_POST['gen'];
    $_SESSION['num']=$_POST['num'];
    $_SESSION['dob']=$_POST['dob'];
            //print_r($_SESSION);
    function validateName($name)
    {
        if(empty($name))
        {
            $nameErr="Name Required";
            throw new Exception($nameErr);
        }
        elseif(!preg_match("/^[a-zA-Z ]*$/",$name)) 
        {
            $fnameErr = "Only letters and white space allowed";
            throw new Exception($fnameErr);
        }
        else
            return true;
    }
    function validate($fname,$lname,$email,$pass,$pass1,$gen,$dob,$num)
    {        
        try 
        {
            validateName($fname);
            //echo 'Validating First name';
        }
        catch(Exception $e)
        {
            header('Location: http://localhost:8080/PhpProject1/signUp.php');
            //echo 'Message: ' .$e->getMessage();
            die();
        }    
        try 
        {
            validateName($lname);
            //echo 'Validating  Last name';
        }
        catch(Exception $e) 
        {
            echo 'Message: ' .$e->getMessage();
            $_SESSION['msg'] = "Invalid last name.";
            //echo $_SESSION['msg'];
            header('Location: http://localhost:8080/PhpProject1/signUp.php');
            die();
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
        {
            $emailErr="\nNot a valid email address\n";
            //echo $emailErr;
        }
        if(!preg_match("/^[aA-zZ 0-9]*$/", $pass))
        {
            $passErr="Password format doesn't matched";
            //echo $passErr;
        }
        if($pass!=$pass1)
        {
            $passErr="Passwords donot match";
            //echo $passErr;        
        }
        if((empty($fnameErr)&&empty($lnameErr)&& empty($emailErr)&& empty($passErr)))
        {
            //echo "<p>Welcome ",$fname," ",$lname,"!!!!!!!\n";
        }            
    }
      
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        $fname = test_input($_POST["firstname"]);
        $lname = test_input($_POST["lastname"]);
        $email = test_input($_POST["email"]);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $gen = test_input($_POST["gen"]);
        $password = test_input($_POST["pass"]);
        $password1 = test_input($_POST["pass1"]);
        $dob = test_input($_POST["dob"]);
        $mob = test_input($_POST["num"]);
        validate($fname,$lname,$email,$password,$password1,$gen,$dob,$mob);
        db_connect($fname,$lname,$email,$password,$password1,$gen,$dob,$mob);
    }

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function db_connect($fname,$lname,$email,$password,$password1,$gen,$dob,$mob)
    {
        $servername = "127.0.0.1";
        $username = "root";
        $passwords = "";
        echo $servername," ",$username," ",$passwords;         
        $conn = new mysqli($servername, $username, $passwords);
        if (!$conn) 
        {
            die("Connection failed: " . $conn->connect_error);
        } 
        echo "Connected successfully";
        if ($conn->select_db('formData') === false)
        {
            $sql="CREATE DATABASE formData";
            if (mysqli_query($conn, $sql)) 
            {
                echo "Database created successfully";
            }
            else 
            {
                echo "Error creating database: " . mysqli_error($conn);
            }                
        }
        else
        {
            echo "Database already exsists";
        }
                //create a table
        $result = mysqli_query($conn,"SHOW TABLES LIKE 'myData'");
        $tableExists = mysqli_num_rows($result)>0;
        if($tableExists>0)
        {
            //echo "Table already exsists";
        }
        else
        {         
            $crt = "CREATE TABLE MyData ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            password VARCHAR(50),
            gender VARCHAR(6),
            dob VARCHAR(30),
            mob VARCHAR(30)
            )";
            if (mysqli_query($conn, $crt)) 
            {
                //echo "Table MyData created successfully";
            }
            else 
            {
                die(mysql_error());
                //echo "Error creating table: " . mysqli_error($conn);
            }
        }
        $query = "SELECT * FROM MyData WHERE email='$email' ";
        $result = mysqli_query($conn,$query) or die(mysql_error());

        if (mysqli_num_rows($result) ) 
        {
            //print 'user is already in table';
            $_SESSION['message']="Email Already Exists..Please Login";
            header('Location: http://localhost:8080/PhpProject1/login.php');
        }
        else
        {
            $data = "INSERT INTO MyData (firstname, lastname, email,password,gender,dob,mob)
            VALUES ('$fname','$lname','$email','$password','$gen','$dob','$mob') ";
                
            if ($conn->query($data) === TRUE) 
            {
                
                 header('Location: http://localhost:8080/PhpProject1/welcome.php');
            } 
            else 
            {
                echo "Error: " . $data . "<br>" . mysqli_error($conn);
            }
        }
          
       
        mysqli_close($conn);      
    }
           
?>