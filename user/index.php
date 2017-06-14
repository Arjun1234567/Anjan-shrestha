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
            <center><u>Add Complain Status</u></center><br>
            	
            		<form action="index.php" method="POST" class="form1">
            	<center><table class="table1">
            		<tr>
            			<td>CmtID no</td>
            			<td><input type="text" name="cmtIDno" class="input" placeholder="CmtIDno..." >
                        </td>
						</tr>
						
                        <tr>
            			<td>Full Name</td>
                         <td> <input type="text" name="name" class="input" placeholder="Full Name..." >
						  </td>
            		</tr>
					
            		<tr>
            			<td>Sex</td>   
                                   <td> <select name="sex">
                                          <option></option>
                                          <option>Male</option>
                                          <option>Female</option>

                                    </select>
                                    
			                 </td>
			          </tr>
			  
            			<td>Address</td>
                         <td> <input type="text" name="address" class="input" placeholder="Address..." >
                                    
			      </td>
            		</tr>
					
            		<tr>
            			<td>Phone No</td>
                                  <td> <input type="text" name="phone" class="input" placeholder="Phone Number...">
			            </td>
						</tr>
						
						<tr>
            			<td>Occupation</td>
                                  <td> <input type="text" name="occupation" class="input" placeholder="Occupation...">
                              </td>
							  </tr>
							
						<tr>
            			<td>Time</td>
                                  <td> <input type="text" name="time" class="input" placeholder="Time...">
                              </td>
							  </tr>
							  
						<tr>
            			<td>Date</td>
                                  <td> <input type="text" name="date" class="input" placeholder="Date...">
                              </td>
							  </tr>
							
						<tr>
            			<td>Complain</td>
                                <td>  <textarea class="textarea3" name="complain" placeholder="Complain..."></textarea>
                              </td>
							  </tr>  
							 
						<tr>
            			<td>Nationality</td>
                                  <td> <input type="text" name="nationality" class="input" placeholder="Nationality...">
                              </td>
							  </tr> 
            		
            	</table>
            
                   
			<input type="submit" name="btn" class="btn" value="Add"></center>

            	</form>
                </center>

            	
            	<?php

            	extract($_POST);
            	if (isset($btn)&&!empty($cmtIDno)&&!empty($name)&&!empty($sex)&&!empty($address)&&!empty($phone)&&!empty($occupation)&&!empty($time)&&!empty($date)&&!empty($complain)&&!empty($nationality))
                   {
            		require '../connect.php';
            		$date=date('Y.m.d');
            		$query=mysql_query("INSERT INTO `complain` VALUES ('','$cmtIDno','$name','$sex','$address','$phone','$occupation','time()','$date','complain','$nationality')");
            		if (!empty($query)) {
            			echo "Complain is Succesiful Added<br>";
            		}
            		else	
            		{
            			echo mysql_error();
            		}
            	}
                  elseif (isset($btn)&&!empty($cmtIDno)&&!empty($name)&&!empty($sex)&&!empty($address)&&!empty($phone)&&!empty($occupation)&&!empty($time)&&!empty($date)&&!empty($complain)&&!empty($nationality))
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
<center>Nepal Police Academy</center>
		</div>



	</div>
</body>
</html>