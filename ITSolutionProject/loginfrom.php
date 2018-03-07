<?php
include"DatabaseConnection.php";

session_start();



if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['pswd'];

    $sql = "select * from registration where email = '$email'";
    $result = $conn->query($sql);
    //echo $result->num_rows;

    if($result->num_rows == 1)
    {
        $pass = $result->fetch_array();
        if($pass[4]!= $password)
        {
            echo "wrong password";
        }
        else{
            $_SESSION['no'] = $pass[0];
            $_SESSION['name'] = $pass[1];
            header('Location:home.php');
        }
    }
    else
    {
        echo "wrong email";

    }






}
?>




<html lang="en">
<head>
    <link rel="stylesheet" href="boot4/boot4/bootstrap.min.css">
    <link rel="stylesheet" href="css.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="font-awesome.min.css" rel="stylesheet">

    <script src="boot4/boot4/jquery.min.js"></script>
    <script src="boot4/boot4/popper.min.js"></script>
    <script src="boot4/boot4/bootstrap.min.js"></script>

</head>
<body>

<div class="login-form col-md-4 offset-4">
    <h2 class="title">login here</h2>
    <form action=" " method="post" class="container">
        <div class="form-group" >
            <label for ="email">Email:</label>
            <input type="email" class="form-control"  id="email" placeholder="Enter email" name="email" >
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control"  id="pwd" placeholder="Enter password" name="pswd">
        </div>
        <div class="form-group">
                <input  type="checkbox"> Remember me
        </div>


                <button type="submit" class="btn btn-primary btn-block" name="login">Submit</button>

        <div class="form-group">
            <center><a href="registration.php" style="color: red">resgiter from here</a><center>
        </div>
<!--            <div class="col-sm-1">-->
<!--                <a href="registration.php" class="btn btn-primary" name="registration">Registration</a>-->
<!---->
<!--            </div>-->

    </form>

<style type="text/css">
    .login-form
    {
        margin-top: 60px;
        box-shadow: 0px 0px 10px 1px gray;
        border-radius: 5px;
        padding-bottom: 20px;
        background: white;
    }

   .title{
       background: #007bbf;
       padding: 10px;
       text-align: center;
       color: #fff;
       border-radius: 0px 0px 10px 10px;
   }

</style>

</div>

</body>
</html>
