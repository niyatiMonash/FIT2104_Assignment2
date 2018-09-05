<html>

   <head>
      <title>Login Page</title>

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body>

      <div align = "center" >
         <div style = "border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:10px;" align="center"><b>Login</b></div>

            <div style="margin:30px" align="center">

               <form action = "" method = "post">
                  <label>Username  : </label><input type = "text" name = "uname" class = "box"/><br /><br />
                  <label>Password  : </label><input type = "password" name = "pword" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>

                <?php
                /**
                 * Created by PhpStorm.
                 * User: niyatisrinivasan
                 * Date: 31/8/18
                 * Time: 7:21 PM
                 */

                include("connection.php");
                session_start();

                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    // username and password sent from form
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    $myusername = mysqli_real_escape_string($conn,$_POST['uname']);
                    $mypassword = mysqli_real_escape_string($conn,$_POST['pword']);

                    $sql = "SELECT id FROM authenticate WHERE uname = '$myusername' and pword = '$mypassword'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $active = $row['active'];

                    $count = mysqli_num_rows($result);

                    // If result matched $myusername and $mypassword, table row must be 1 row

                    if($count == 1) {
                        $_SESSION['login_user'] = $myusername;

                        header("location: welcome.php"); //TODO: change location to be the place they previously clicked.
                    }else {
                        $error = "Your Login Name or Password is invalid";
                    }
                }
                ?>


                <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?> </div>
                <input type="button" value="Go Back"/>
            </div>

         </div>

      </div>

   </body>


</html>
