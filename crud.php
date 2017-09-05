<?php
session_start();
print_r($_SESSION);
session_name("WebsiteID");
echo session_id();
    error_reporting(E_ALL);
    db_connect();
    function db_connect()
    {
        $servername = "127.0.0.1";
        $username = "root";
        $passwords = "";       
        $conn = new mysqli($servername, $username, $passwords);
        if (!$conn) 
        {
            die("Connection failed: " . $conn->connect_error);
        } 
        if($conn->select_db('formData') !==false)
        {   
                if (isset($_POST['delete']))
                {
                    if(isset($_POST['checkbox']));
                    {
                        //unset($_POST['checkbox']);
                        $checkbox = $_POST['checkbox'];
                        $count = count($checkbox);
                        for($i=0;$i<$count;$i++)
                        {
                            if(!empty($checkbox[$i]))
                            { 
                                $id = mysqli_real_escape_string($conn,$checkbox[$i]); 
                                mysqli_query($conn,"DELETE FROM MyData WHERE id = '$id'"); 
                            } 
                        }
                    }
                } 

            
            
            
                $query = "SELECT * FROM MyData";
                $result = mysqli_query($conn,$query) or die(mysql_error());
                echo mysqli_num_rows($result),"NUm of rows";
                if(mysqli_num_rows($result))
                {
                    echo "<form action='' method='POST'>"; /* SUBMIT PAGE ON ITSELF */
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<td>id</td>";
                    echo '<td>firstname</td>';
                    echo '<td>lastname</td>';
                    echo '<td>email</td>';
                    echo '<td>password</td>';
                    echo '<td>gender</td>';
                    echo '<td>dob</td>';
                    echo '<td>num</td>';
                    echo '<td>Edit</td>';
                    echo '<td>Delete</td>';
                    echo '</tr>';
                    while($row = $result->fetch_assoc())
                    {
                        echo '<tr>';
                        foreach($row as $key => $val)
                        {                          
                            echo "<td>".$val . "</td>";
                        }
                        $id1=$row['id'];
                        echo "<td><a href='edit.php?id={$row['id']}'>Edit row</a></td>";
                       
                        echo "<td><input type='checkbox' name='checkbox[]' value='$id1'></td>";
                        
                        echo '</tr>';
                    }
                   
                        echo '</table>';
                        echo '<td  align="center"><input name="delete" type="SUBMIT" id="delete" value="Delete" action="POST"></td>';
                       
                           echo "<td><a href='add.php'>Add</a></td>";
                        echo '</form>';
                }
                
                
            }
            mysqli_close($conn);  
        }
         
       
    

?>

