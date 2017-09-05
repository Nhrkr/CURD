<?php
    session_start();
    error_reporting(E_ALL);
    $fname=$lname = $email = $gender = $password = $password1 = $dob= $mob= "";
    $_SESSION['fname']=$_POST['firstname'];
    $_SESSION['lname']=$_POST['lastname'];
    $_SESSION["email"]=$_POST['email'];
    $_SESSION['password']=$_POST['pass'];
    if(isset($_POST['id']))
    {
      $_SESSION['id']=$_POST['id'];
      $id1=$_SESSION['id'];
    }
    else
    {
        $id1="";
    }
 
    $_SESSION['num']=$_POST['num'];
    $_SESSION['dob']=$_POST['dob'];
    if(isset($_POST['Edit']))
    {
       $_SESSION['Edit']=$_POST['Edit'];
       unset($_POST['Edit']);
    }
     if(isset($_POST['Add']))
    {
       $_SESSION['Add']=$_POST['Add'];
       unset($_POST['Add']);
    }
        
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        $fname = test_input($_POST["firstname"]);
        $lname = test_input($_POST["lastname"]);
        $email = test_input($_POST["email"]);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(isset($_POST['gen']))
        {
            $gen = test_input($_POST["gen"]);
        }
        else 
        {
            $gen="";
        }
        $password = test_input($_POST["pass"]);
        $password1 = test_input($_POST["pass1"]);
        $dob = test_input($_POST["dob"]);
        $mob = test_input($_POST["num"]);

        db_connect($fname,$lname,$email,$password,$password1,$gen,$dob,$mob,$id1);
    }

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function db_connect($fname,$lname,$email,$password,$password1,$gen,$dob,$mob,$id1)
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
        if(!$tableExists>0)
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
        else
        {         
            
        }
        $query = "SELECT * FROM MyData WHERE email='$email' ";
        $result = mysqli_query($conn,$query) or die(mysql_error());

        if (!mysqli_num_rows($result) ) 
        {
            if(isset($_SESSION['ADD']))
            {
                $data = "INSERT INTO MyData (firstname, lastname, email,password,gender,dob,mob)
                VALUES ('$fname','$lname','$email','$password','$gen','$dob','$mob') ";                
                if ($conn->query($data) === TRUE) 
                {
                     header('Location: http://localhost:8080/PhpProject1/crud.php');
                } 
                else 
                {
                    echo "Error: " . $data . "<br>" . mysqli_error($conn);
                }
            }
            else
                if(isset($_SESSION['Edit']))
            {
                echo"in edit";
                $data = "UPDATE  MyData SET firstname='$fname', lastname='$lname', email='$email',password='$password',gender='$gen',dob='$dob',mob='$mob'           
                WHERE id='$id1'";
                if ($conn->query($data) === TRUE) 
                {
                     //header('Location: http://localhost:8080/PhpProject1/crud.php');
                } 
                else 
                {
                    echo "Error: " . $data . "<br>" . mysqli_error($conn);
                }
                
            }
       
        
            
        }
          
       
        mysqli_close($conn);      
    }
           
?>