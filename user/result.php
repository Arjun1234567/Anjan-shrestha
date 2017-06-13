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

            <div class="header"> <img src="image/in.png" height="120px" width="1350px">



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
            <center><u>Search</u></center><br>
           <center>
            <table>
                  <tr>
                              <form action="result.php" method="POST">
                        <td></td>
                        <td>
                              <input type="text" name="search" placeholder="Enter Name/ID no of Criminal...">
                        </td>
                        <td><input type="submit" name="btn" class="btn" value="Search"></td>
                  </form>
                  </tr>
            </table>
            
                  
            </center>
                  
                  
                  <?php
                  extract($_POST);
                  if (isset($btn)&&!empty($search)) {
                        require '../connect.php';
                        $query=mysql_query("SELECT * FROM `criminal` WHERE `name` LIKE '%$search%' ||  `id` LIKE '$search' ");
                        $row=mysql_num_rows($query);
                        if ($row==0) {
                              echo "Result not found";
                        }
                        else
                        {
                              echo "<table class='search'><tr style='background-color: #999999;'><th>IDno</th>
                                                <th>name</th>
                                                <th>nickname</th>
                                                <th>sex</th>
                                                <th>age</th>
                                                <th>occupation</th>
                                                <th>crimetype</th>
                                                <th>address</th>
                                            </tr>";
                              while ($fetch=mysql_fetch_array($query)) {
                                    $name=$fetch['name'];
                                    $criminalIDno=$fetch['criminalIDno'];
                                    $nickname=$fetch['nickname'];
                                    $age=$fetch['age'];
                                    $sex=$fetch['sex'];
                                    $occupation=$fetch['occupation'];
                                    $address=$fetch['address'];
                                    $type=$fetch['crimetype'];
                                    echo "
                                          <tr style='background-color:#CFCFCF'>
                                                <td>$criminalIDno</td>
                                                <td>$name</td>
                                                <td>$nickname</td>
                                                <td>$sex</td>
                                                <td>$age</td>
                                                <td>$occupation</td>
                                                <td>$type</td>
                                                <td>$address</td>
                                          </tr>
                                    ";

                              }
                              echo "</table>";
                              
                        }
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