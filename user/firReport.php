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

		<div class="content">
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
            <center><u>Add First Information Report</u></center><br>
            	
            	<form action="firReport.php" method="POST" class="form1">
                  <center>
                       <table class="table2">
                        <tr>
                              <td>FIR No</td>
                              <td>
                                    <input type="text" name="firno" placeholder="FIR no...">
                              </td>
                        </tr>
                        <tr>
                              <td>CmtID no</td>
                              <td>
                                    <input type="text" name="cmtIDno" placeholder="CmtID no...">
                              </td>
                        </tr>
                        <tr>
                              <td>Date</td>
                              <td>
                                    <input type="text" name="date" placeholder="Date...">
                              </td>
                        </tr>
						 <tr>
                              <td>Time</td>
                              <td>
                                    <input type="text" name="time" placeholder="Time...">
                              </td>
                        </tr>
						 <tr>
                              <td>Address</td>
                              <td>
                                    <input type="text" name="address" placeholder="Address...">
                              </td>
                        </tr>
						 <tr>
                              <td>District</td>
                              <td>
                                    <input type="text" name="district" placeholder="District...">
                              </td>
                        </tr>
                        <tr>
                              <td>Choose</td>
                              <td>
                                    <select name="choose" placeholder="Choose...">
                                          <option></option>
                                          <option value="Foreign">Foreign</option>
                                          <option value="Local">Local</option>
                                    </select>
                              </td>
                        </tr>
                        <tr>
                              <td>Place</td>
                              <td>
                                    <input type="text" name="place" placeholder="Place...">
                              </td>
                        </tr>
                        <tr>
                              <td>Info Type</td>
                              <td>
                                    <input type="text" name="infotype" placeholder="Info type...">
                              </td>
                        </tr>
						<tr>
                              <td>Info</td>
                              <td>
                                    <input type="text" name="info" placeholder="Info...">
                              </td>
                        </tr>
						<tr>
                              <td>Passportno</td>
                              <td>
                                    <input type="text" name="passportno" placeholder="Passportno...">
                              </td>
                        </tr>
						<tr>
                              <td>Policename</td>
                              <td>
                                    <input type="text" name="policename" placeholder="Policename...">
                              </td>
                        </tr>
                        
                        <tr>
                              <td>Recived Time</td>
                              <td>
                                    <textarea class="textarea2" placeholder="Recived time information..." name="recivedtime"></textarea>
                                    
                              </td>
                        </tr>
                  </table> <br>
                  <input type="submit" name="btn" class="btn" value="Add"></center>
                  </center>
                  
            	</form>
            	
            	
            	<?php
            	extract($_POST);
            	if (isset($btn)) {
            		require '../connect.php';
            		$date=date('Y.m.d');
            		$query=mysql_query("INSERT INTO `fir` VALUES ('','$firno','cmtIDno','$date','$time','$address','$district','$choose','$place','$infotype','$info','$passportno','$policename','$recivedtime')");
            		if (!empty($query)) 
                        {
            			echo "FIR Succesiful Added<br>";
            		}
            		else	
            		{
            			echo mysql_error();
            		}
            	}
                   elseif (isset($btn)&&empty($firno)||empty($date)||empty($time)||empty($address)||empty($district)||empty($choose)||empty($place)||empty($infotype)||empty($info)||empty($passportno)||empty($policename)||empty($recivedtime))
                   {
                       echo "all figure required";
                  }
                  
            	else
            	{
            		echo mysql_error();
            	}
            	?>


            </div>
        </div>

		<div class="footer">
                  

		</div>



	</div>
</body>
</html>