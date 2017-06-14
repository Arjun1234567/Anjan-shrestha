<?php
session_start();
if (empty($_SESSION['usertypeu']))
{
       header("location: ../index.php");
}
?>
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

		<div class="content1">
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
            <center><u>Criminal Register</u></center>
            	
            	<form action="criminalform.php" method="POST" class="form1" enctype="multipart/form-data">
                  <center>
                       <table>
                        <tr><td><input type="file" name="file" value="Capture"></td>
                              <td><input type="file" name="file1" value="Capture"></td>
                              
                        
                              


            </tr></table><center>
                           <table class="table2"><tr>
                              <td>CriminalID No</td>
                              <td><input type="text" name="criminalIDno" placeholder="CriminalID No... "></td>
                              
                                    
                           </tr>
                        <tr>
                              <td>Criminal Name</td>
                              <td><input type="text" name="name" placeholder="Criminal Name... "></td>
                                    
                         </tr>
                       

                        <tr>
                              <td>Criminal Nickname</td>
                              <td>
                                    <input type="text" name="nickname" placeholder="Criminal Nickname...">
                              </td>
                        </tr>
                         <tr>
                              <td>Sex</td>
                              <td>
                                    <select name="sex">
                                          <option></option>
                                          <option>Male</option>
                                          <option>Female</option>
                                    </select>
                              </td>
                        </tr>
                        <tr>
                              <td>Age</td>
                              <td>
                                    <input type="number" name="age" placeholder="Age...">
                              </td>
                        </tr>
                        <tr>
                              <td>Occupation</td>
                              <td>
                                    <input type="text" name="occupation" placeholder="Occupation...">
                              </td>
                        </tr>
                        <tr>
                              <td>Crime type</td>
                              <td>
                                    <input type="text" name="crimetype" placeholder="Crime type...">
                              </td>
                        </tr>
                        <tr>
                              <td>Address</td>
                              <td>
                                    <input type="text" name="address" placeholder="Address...">
                              </td>
                        </tr>
                        <tr><td>Most Wanted</td>
                              <td>
                                   Yes<input type="radio" name="wanted" value="MostWanted"> 
                                    <br>
                                      No
                                     <input type="radio" name="wanted" value="NotMostWanted">
                                  </td>
                                   
                           
                        </tr>
                  </table> 
                  <input type="submit" name="btn" class="btn" value="Add"></center>

                  
            	</form>

                </center>
            	<?php


              if (isset($_POST['btn'])) 
              {
  
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
            	                                   extract($_POST);
                                                 $image1=$_FILES["file"]["name"];
                                                 $image2=$_FILES["file1"]['name'];
                                                 
            
            		require '../connect.php';
            		$query=mysql_query("INSERT INTO `criminal` VALUES ('','$criminalIDno','$name','$nickname','$sex','$age','$occupation','$crimetype','$address','$wanted','$image1','$image2')");
            		if (!empty($query)) {
            			echo "Criminal Succesiful Added<br>";
            		}
           if (file_exists("../upload" . $_FILES["file"]["name"]))
      {
     
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../upload/" . $_FILES["file"]["name"]);
       move_uploaded_file($_FILES["file1"]["tmp_name"],
      "../upload/" . $_FILES["file1"]["name"]);
        

      echo "";
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