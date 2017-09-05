<?php
session_start();
    error_reporting(E_ALL);
    
    $_SESSION['id']=$_GET['id'];
    
    $id=$_SESSION['id'];
    echo $id;
    $servername = "127.0.0.1";
    $username = "root";
    $passwords = "";
    $conn = new mysqli($servername, $username, $passwords);
    if (!$conn) 
    {
        die("Connection failed: " . $conn->connect_error);
    } 

    if($conn->select_db('formData') !== false)
    {   
        $query = "SELECT * FROM MyData WHERE id='$id' " ;
        $result = mysqli_query($conn,$query) or die(mysql_error());

            if (mysqli_num_rows($result) ) 
            {      
                $row=  mysqli_fetch_object($result);
                print_r($row);
                echo $row->firstname;
                echo $row->lastname;
                echo "printing names";
                echo "<form action='text.php' method='POST'><br>";
    echo "<p><input type='text'  name='firstname' placeholder='First Name' value ='$row->firstname'><br>";
    echo "<p><input type='text'  name='lastname' placeholder='Last Name'value ='$row->lastname'><br>";
    echo "<p><input type='email'  name='email'   placeholder='Email'value ='$row->email'><br>";
    echo "<p><input type='date'  name='dob' placeholder='Dob'value ='$row->dob'><br>";
    echo '<p><select id="gen" class="ip" name="gen" value ="$row->gender"><option value="sele_g">Select Gender</option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                    <option value="o">Other</option>
                    </select><br>
                    ';
   
    echo "<p><input type='number'  name='num' placeholder='Mob'value ='$row->mob'><br>";
    echo "<p><input type='password'  name='pass' placeholder='Password'value ='$row->password'><br>";
    echo "<p><input type='password'  name='pass1' placeholder='Confirm Password'><br>";
    echo "<p><input type='text'  name='id' placeholder='id' value='$id'><br>";
    echo '<p><input name="Edit" type="SUBMIT"  value="Edit" >';
    echo '</form>';
    echo "<form action='crud.php' method='POST'><br>";
    echo '<input name="Discard" type="SUBMIT"  value="Discard Changes" >';
    echo '</form>';
    //echo '</form>';
            }
                
        }
          
        mysqli_close($conn); 
    
    
    
   
?>

