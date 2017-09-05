<?php
session_start();
//print_r($_SESSION);
    error_reporting(E_ALL);
    
    $_SESSION['search_ip']=$_POST['search_ip'];
    
    $search=$_SESSION['search_ip'];
    echo $search;
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
        $query = "SELECT * FROM employees WHERE name like'%$search%' " ;
         
        $result = mysqli_query($conn,$query) or die(mysql_error());
        echo mysqli_num_rows($result),"Num of rows";
        if(mysqli_num_rows($result))
        {
            echo "<form action='' method='POST'>"; /* SUBMIT PAGE ON ITSELF */
            echo "<table border='1'>";
            echo "<tr>";
            echo '<td>Employee Number</td>';
            echo '<td>Employee Name</td>';
            echo '<td>Phonecode</td>';
            echo '<td>Phonenumber</td>';
            echo '<td>Date</td>';
            //echo '<td>Edit</td>';
            //echo '<td>Delete</td>';
            echo '</tr>';
            while($row = $result->fetch_assoc())
            {
                echo '<tr>';
                foreach($row as $key => $val)
                {                          
                       echo "<td>".$val . "</td>";
                }
                echo '</tr>';
            }
             echo '</table>';
            }
    }
        mysqli_close($conn); 
?>