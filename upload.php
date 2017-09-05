<!DOCTYPE html>
<html>
<body>
    <style>
        div.fileinputs {
	position: relative;
}

div.fakefile {
	position: absolute;
	top: 0px;
	left: 0px;
	z-index: 1;
}

input.file {
	position: relative;
	text-align: right;
	-moz-opacity:0 ;
	filter:alpha(opacity: 0);
	opacity: 0;
	z-index: 2;
}
    </style>
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <!--<a href="" onclick="document.getElementById('fileToUpload').click(); return false;" />-->
    <!--<input type="button" value="Browse" style="height:25px;width:100px; "/></a>-->
    <!--<input type="file" name="fileToUpload" id="fileToUpload" style="visibility: hidden;" />-->
    
    <input type="file" name="fileToUpload" id="fileToUpload" />
    
    <p><input type="submit" value="Upload Image" name="Upload" onclick="alert(document.getElementById('fileToUpload').value);">
</form>

</body>
</html>

<?php
if(isset($_POST['Upload']))
{
    $target_dir = "C:/xampp/tmp/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    echo $_FILES["fileToUpload"]["tmp_name"];
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            $uploadOk = 1;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    //if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    //&& $imageFileType != "gif" ) {
      //  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        //$uploadOk = 0;
   // }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). "  has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<?php
$target_dir = "C:/xampp/tmp/";
$files1 = scandir($target_dir);
if (isset($_POST['checkboxAll']))
{
    echo "<script>alert('Deleting all files')</script>";
    foreach ($files1 as $i=>$val)
    {
        
            echo "Deleting File........";
            //unlink($target_dir."/".$val);//give correct path,
                  
    }    
}
if (isset($_POST['delete']))
{
    if(isset($_POST['checkbox']));
    {
        $checkbox = $_POST['checkbox'];
        $count = count($checkbox);
        //echo $count;
        print_r($checkbox);
        
        for($i=0;$i<$count;$i++)
        {
            //if(!empty($checkbox[$i]))
            { 
                //print_r($checkbox);
                $entry=$checkbox[$i]+1;
                echo $entry;
                $del=$files1[$entry];
                echo $del;
                foreach ($files1 as $j=>$val)
                {
                    if($del==$val)
                    {
                        echo "file found";
                        unlink($target_dir."/".$del);//give correct path,
                    }
                }
            }  
        } 
    }
}
elseif (isset($_POST['delete_one']))
{ 
    $val=$_POST['delete_one'];
    $entry=$_POST['sr_no'];
    echo $entry;
    $del1=$files1[$entry+1];           
    echo $del1;
    foreach ($files1 as $i=>$val)
    {
        if($del1==$val)
        {
            echo $del1;
        }          
    }    
}

    

$files1 = scandir($target_dir);?>
<form action='' method='POST' id='theForm'> 
Select All<input type='checkbox' name='checkboxAll'  id='clickit' value='Check All' onclick='return CheckAll();' >
<script>function CheckAll() {
  var check =     document.getElementsByClassName('chk');
  for(i=0; i<check.length; i++) {
    if(check[i].checked ==true)
    {   
        check[i].checked=false;
    }
    else
    {
        check[i].checked=true;
    }
  }
}</script>
<table border='1'>
<tr>
<td>Select</td>
<td>Sr.no</td>
<td>Filename</td>
<td colspan="1">Delete</td>
</tr>
<?php
$i=0;
foreach ($files1 as $j=>$val)
{
    
    if ($val != "." && $val != "..") 
    {
        $i=$i+1;     
        echo "<td><input type='checkbox' name='checkbox[]'  class='chk' value='$i'></td>";
        echo "<td>$i</td>";
        echo "<td>$val</td>";
        echo "<td  align='center'><input name='delete_one' type='button' action='POST' id='Dele' data-no='$i' class='delete' value='Delete'  onclick='return confirmSubmit();'></td>";
        echo '</tr>';
    }
}
echo '</table>';
echo "<input name='sr_no' type='hidden' id='no' value='' action='POST' >";
echo '<td  align="center"><input name="delete" type="SUBMIT" id="delete" value="Delete" onclick="return confirm("Delete?");" action="POST"></td>';
echo '</form>';
echo"<script>function confirm2(){ return confirm('delete Entry?');};</script>";
 ?>
<script>
    function confirmSubmit()
    {
        if(confirm("Delete Entry?"))
        {
            var val= document.getElementById("no").value=event.target.getAttribute('data-no');
            alert(val);
            document.getElementById("theForm").submit;
        }
        else
        {
            return false;
        }
    }
    </script>
<?php
      
?>
