<?php
session_start();
if (empty($_SESSION['usertypeu']))
{
       header("location: ../index.php");
}
?>
<html>
<html>
<head>
<title>
 Crime Information Management System
</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="wrapper">

		<div class="header"><img src="image/in.png" height="120px" width="1350px">



		</div>

		<div>
			<div class="menu">
				<table class="table">
					<tr>
						<td><a href="index.php">Complaint status</a></td>
						<td><a href="firReport.php">FIR</a></td>
						<td><a href="criminalform.php">Criminal Registration</a></td>
                        <td><a href="wanted.php">Most Wanted</a></td>
                        <td><a href="prisoner.php">Prisoner</a></td>
						<td><a href="search.php">Search</a></td>
                        <td><a href="logout.php">Logout</a></td>
					</tr>
				</table>
            </div><hr>
            <div class="area1">
            <center><u>Most Wanted Criminals</u></center><br>
            	
            	<form action="prisoner.php" method="POST" enctype="multipart/form-data" class="form1" >
                  <center>
                       <table class="table2">
                        <tr>
                          <td>Upload Picture</td>
                         <td><input type="file" name="file">
                        </td>  
                        </tr>
						
                        <tr>
                              <td>PrisonerIDno</td>
                              <td>
                                    <input type="prisonerIDno" name="prisonerIDno" placeholder="PrisonerIDno...">
                              </td>
                        </tr>
						 <tr>
                              <td>Name</td>
                              <td>
                                    <input type="name" name="name" placeholder="Name...">
                              </td>
                        </tr>
						 <tr>
                              <td>NickName</td>
                              <td>
                                    <input type="nickname" name="nickname" placeholder="NickName...">
                              </td>
                        </tr>
						 <tr>
                              <td>Crimetype</td>
                              <td>
                                    <input type="crimetype" name="crimetype" placeholder="Crimetype...">
                              </td>
                        </tr>
						 <tr>
                              <td>Address</td>
                              <td>
                                    <input type="address" name="address" placeholder="Address...">
                              </td>
                        </tr>
						 <tr>
                           <td>Age</td>
                              <td>
                                    <input type="age" name="age" placeholder="Age...">
                              </td>
                        </tr>
						
                        
                        <tr>
                              <td>Height</td>
                              <td>
                                    <input type="number" name="height" placeholder="Height...">
                              </td>
                        </tr>
                        <tr>
                              <td>Weight</td>
                              <td>
                                    <input type="number" name="weight" placeholder="Weight...">
                                    
                              </td>
                        </tr>
                        <tr>
                              <td>Color</td>
                              <td>
                                    <input type="color" name="color" placeholder="Color...">
                                    
                              </td>
                        </tr>
                        <tr>
                              <td>Time</td>
                              <td>
                                    <input type="time" name="time" placeholder="Time...">
                                    
                              </td>
                        </tr>
                        <tr>
                              <td>Date</td>
                              <td>
                                 <input type="date" name="date" placeholder="Date...">  
                                    
                              </td>
                        </tr>
						 
						  <tr>
                              <td>Identimark</td>
                              <td>
                                   <input type="identimark" name="identimark" placeholder="Identimark...">
                                    
                              </td>
                        </tr>
						 
						
                        
                       
                  </table> 
                  <input type="submit" name="btn" class="btn" value="Add"></center>
                  </center>
                  
            	</form>
            	
            	              <?php
  require '../connect.php';
  if (isset($_POST['btn'])) {
  
    if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 900000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
      $name=$_POST['name'];
      $date=date("Y/m/d");
	  $prisonerIDno=$_POST['prisonerIDno'];
      $name=$_POST['name'];
      $nickname=$_POST['nickname'];
	  $crimetype=$_POST['crimetype'];
	  $address=$_POST['address'];
      $age=$_POST['age'];
      $height=$_POST['height'];
	  $weight=$_POST['weight'];
	  $color=$_POST['color'];
	  $time=$_POST['time'];
      $identimark=$_POST['identimark'];
      $upload=$_FILES["file"]["name"];
	   $query=mysql_query("INSERT INTO `prisoner` VALUES ('','$prisonerIDno','$name','$nickname','$crimetype','$address','$age','$height','$weight','$color','time()','$date','$identimark','$upload')");
      
      if (!$query) {
        echo mysql_error();
      }

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
     
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../upload" . $_FILES["file"]["name"]);
      echo "successfull inserted";
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  }

?>
            </div>
        </div>

		<div class="footer">
<center>Nepal Police Academy</center>
		</div>



	</div>
</body>
</html>