<!DOCTYPE html>
<html>
<body>
    <style>
        * {
    margin:0;
    padding:0;
    font-family: tahoma;
}
body {
    padding: 30px;
}
div {
    width: 300px;
    height: 25px;
    background-color: white;
    box-shadow: 1px 2px 3px #ededed;
    position:relative;
    border: 1px solid #d8d8d8;
}
input[type='file'] {
    width:500px;
    height:25px;
    opacity:0
}
#val {
    width: 300px;
    height:25px;
    position: absolute;
    top: 0%;
    left: 0;
    font-size:13px;
    line-height: 25px;
    text-indent: 10px;
    pointer-events: none;
}
#button {
    cursor: pointer;
    display: block;
    width: 100px;
    background-color: purple;
    height:25px;
    color: white;
    position: absolute;
    right:0;
    top: 0%;
    font-size: 11px;
    line-height:25px;
    text-align: center;
    -webkit-transition: 500ms all;
    -moz-transition: 500ms all;
    transition: 500ms all;
}

#button:hover, #upload:hover {
    background-color: blue;
}
#upload    {
    //background: purple url(upload.png) no-repeat 10px center;
    cursor: pointer;

    cursor: pointer;
    display: block;
    width: 100px;
    background-color: purple;
    height:25px;
    color: white;
    font-size: 11px;
    //line-height:25px;
    text-align: center;
    -webkit-transition: 500ms all;
    -moz-transition: 500ms all;
    transition: 500ms all;
     padding-bottom:2px;
     padding-top:2px;
}
    </style>
    
    <p style="padding-bottom:5px;">Upload File</p>
    <div>
        
        <form action='' method="POST" id='form1' enctype="multipart/form-data">
    
            <input type="file" name="fileToUpload" id="fileToUpload" onchange="javascript:updateList()"/>
            <span id='val' name="filename"></span>
            <span id='button' onclick="document.getElementById('fileToUpload').click();">Select File</span>    
    </div>
            <br><input type="submit" value="Upload File" name="submit" id="upload">
            
    </form>
    
    
<script>
    updateList = function() {
  var input = document.getElementById('fileToUpload');
  var output = document.getElementById('val');

  for (var i = 0; i < input.files.length; ++i) {
    output.innerHTML +=  input.files.item(i).name ;
  input.innerHTML +=  input.files.item(i).name ;
        }
  document.getElementById('fileToUpload').value=input.files.item(i).name ;
}
</script>
    
    
    
    
    
    
    
    
</body>
</html>

<?php
if(isset($_POST['submit']))
{
 
    $target_dir = "C:/xampp/tmp/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
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

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
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
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). "  has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<br>

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
elseif (isset($_POST['delete']))
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
    //echo $entry;
    $del1=$files1[$entry+1];           
    //echo $del1;
    foreach ($files1 as $i=>$val)
    {
        if($del1==$val)
        {
            echo "DELETING.....";
            echo $del1;
            unlink($target_dir."/".$del1);//give correct path,
        }          
    }    
}

    

$files1 = scandir($target_dir);?>
<form action='' method='POST' id='theForm'> 
Select All <input type='checkbox' name='checkboxAll'  id='clickit' value='Check All' onclick='return CheckAll();' >
<p>
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
<p><br><table border='1' style="border-collapse:collapse;border-radius: 5px;">
    <tr style="text-align: center;padding:2px;">
        <td style="width: 60px;">Select</td>
        <td style="width: 60px;">Sr.no</td>
        <td style="padding: 10px;">Filename</td>
        <td colspan="1">Delete</td>
    </tr>
<?php
$i=0;
foreach ($files1 as $j=>$val)
{
    
    if ($val != "." && $val != "..") 
    {
        $i=$i+1;     
        echo "<td style='text-align:center;'><input type='checkbox' name='checkbox[]'  class='chk' value='$i'></td>";
        echo "<td style='text-align: center'>$i</td>";
        echo "<td style='padding-left:5px;'>$val</td>";
        echo "<td  align='center'><input name='delete_one' type='SUBMIT' action='POST' id='upload' data-no='$i' class='delete' value='Delete'  onclick='return confirmSubmit();'></td>";
        echo '</tr>';
    }
}
echo '</table>';
echo "<input name='sr_no' type='hidden' id='no' value='' action='POST' >";
echo '<p  align="left";padding-top:"5px";><input name="delete" type="SUBMIT" id="upload" value="Delete Selected" onclick="return confirm("Delete?");" action="POST"></p>';
echo '</form>';
echo"<script>function confirm2(){ return confirm('delete Entry?');};</script>";
 ?>
<script>
    function confirmSubmit()
    {
        if(confirm("Delete Entry?"))
        {
            var val= document.getElementById("no").value=event.target.getAttribute('data-no');
           
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
