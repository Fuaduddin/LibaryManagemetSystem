<?php
     session_start();
      $id = $_SESSION['userid'];
     $con = mysqli_connect("localhost","root","","ewuproject");
     $sql = "select * from register where id = $id";     
     $query = mysqli_query($con,$sql);     
     $row = mysqli_fetch_assoc($query);
      $username = $row["username"];
      $con2 = mysqli_connect("localhost","root","","ewuproject");
    $sql2 = "select * from borrow where CustomerName='".$username."' ";//ORDER BY id dess
     $result = mysqli_query($con2, $sql2);    
                    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libary Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav>
      <div class="menu-icon"></div>
      <div class="logo">Libary Management</div>
    </nav>
    <div class="container ViewRecordTable">
    <a href="cbooklist.php">
        <img
          class="arrow"
          src="image/arrow.png"
          style="width: 25px; margin-left: 3%; margin-top: 0.5%"
        />
      </a>
    <h1 style="text-align:center; margin-bottom:3%;"> Borrow Book Details   </h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Book Image</th>
                    <th>Book Name</th>
                    <th>Book Writer Name</th>
                    <th>Borrow Date</th>
                    <th>Returned</th>
                </tr>
            </thead>
            <tbody>
                <?php
          
                if(mysqli_num_rows($result)>0)
                {
                    $date = date('Y-m-d');
                    $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
                    
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    echo "<tr>";
                                    echo "<td>";
                                    ?>
                                        <img src="<?php echo 'imgs/' . $row['BookImage'] ?>" width="100" height="110" alt='Profile pic' class="border border-dark img-thumbnail">
                                    <?php
                                    echo "</td>";
                                        echo "<td>";
                                            echo $row["BookName"];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $row["WriterName"];
                                        echo "</td>";
                                    echo "<td>";
                                            echo $row["BorrowDate"];
                                        echo "</td>";
                                        echo "<td style= color:green;>";
                                        echo $row["BorrowUpdate"];
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            echo "</table>";
                        echo "</div>";
                    echo "</div>";
                }
                else
                {
                    echo "There is no book yet.";
                }
                mysqli_close($con);
            ?>                                       
            </tbody>
        </table>
        <br>
        </tr>
        </tbody>
        </table>
    </div>
<style>
* {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
    Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
  /* Change your font family */
}

nav {
  width: 100%;
  position: absolute;
  height: 85px;
  background: black;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  padding: 2px 100px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
  top: 0%;
  left: 0%;
  right: 0%;
}

nav .logo {
  font-size: 40px;
  margin-right: 38%;
  font-weight: 700;
  color: white;
}

.ViewRecordTable {
  position: relative;
  margin: 5% auto;
  margin-top: 8%;
  background-clip: content-box;
}

h1 {
  margin: 0 0 20px 0;
  font-weight: 650;
  font-size: 34px;
  padding-top: 20px;
  padding-left: 9.5em;
  padding-bottom: 7%;
  padding-right: 10em;
  text-align: center;
  background-clip: content-box;
}

h2 {
  margin: 0 0 20px 0;
  font-weight: bold;
  font-size: 18px;
  padding-top: 2em;
  text-align: center;
}

.content-table {
  border-collapse: collapse;
  margin: 0, auto;
  font-size: 0.9em;
  min-width: 700px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  margin-left: auto;
  margin-right: auto;
  margin-top: 4%;
}

.content-table thead tr {
  background-color: black;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

body {
  background: #ffffff;
  font-size: 16px;
  color: rgb(0, 0, 0);
  font-family: "Roboto", sans-serif;
  font-weight: 300;
  background: #e2e1e1;
}

.content-table th,
.content-table td {
  padding: 12px 50px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid black;
}
.ViewRecordTable a {
  color: rgb(150, 148, 148);
}

.input-data {
  position: absolute;
  top: 0.1px;
  box-sizing: border-box;
  padding: 40px;
  width: 500px;
  height: 400px;
  padding-left: 180px;
  margin-left: 19%;
}
.input-data a {
  text-decoration: none;
}

input[type="submit"] {
  width: 40%;
  height: 15%;
  background: black;
  border: none;
  border-radius: 5px;
  color: #fff;
  font-family: "Roboto", sans-serif;
  font-weight: 500;
  text-transform: uppercase;
  transition: 0.1s ease;
  cursor: pointer;
  margin-top: 31.5%;
  margin-right: 9%;
}

input[type="submit"]:hover,
input[type="submit"]:focus {
  box-shadow: 0 4px 6px rgba(48, 48, 48, 0.4);
  background: rgb(44, 44, 44);
  transition: 0.1s ease;
  font-size: 14px;
}

input[type="submit"]:active {
  opacity: 1;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}


</style>
</body>
</html>