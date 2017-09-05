<?php
session_start();
    error_reporting(E_ALL);
 

    echo "<form action='text.php' method='POST'><br>";
    echo "<p><input type='text'  name='firstname' placeholder='First Name'><br>";
    echo "<p><input type='text'  name='lastname' placeholder='Last Name'><br>";
    echo "<p><input type='email'  name='email'   placeholder='Emaik'><br>";
    echo "<p><input type='date'  name='dob' placeholder='Dob'><br>";
    echo "<p><input type='number'  name='num' placeholder='Mob'><br>";
   echo '<p><select id="gen" class="ip" name="gen" value= "<?php echo $_SESSION["gem"];?>"  >
                    <option value="sele_g">Select Gender</option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                    <option value="o">Other</option>
                    </select><br>
                    ';
    echo "<p><input type='password'  name='pass' placeholder='Password'><br>";
    echo "<p><input type='password'  name='pass1' placeholder='Confirm Password'><br>";
    echo '<p><input name="Add" type="SUBMIT"  value="Add" >';
    
    
         
?>

