<!DOCTYPE HTML>
<html>
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

<?php
include"DatabaseConnection.php";
if (isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phn = $_POST['phn'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];



    //echo "monthd = $monthd"."<br>";
//echo "vouchern = $vouchern"."<br>";
//echo "particulars = $particulars"."<br>";
//echo "folio = $folio"."<br>";
//echo "amount = $amount"."<br>";
//echo "total = $total"."<br>";
//echo "month = $month"."<br>";



    $sql = "select * from registration where email = '$email'";
    $result = $conn->query($sql);
    if($result->num_rows == 1)
    {
        echo "already use this mail";
    }
    else{

        $sql = "insert into registration( username, email, phn, password, gender  )
                            VALUES ('$username','$email', '$phn','$password','$gender')";
        $conn->query($sql);

        header('Location:loginfrom.php');
    }
//    echo "<h2>Your Input:</h2>";
//    echo $username;
//    echo "<br>";
//    echo $email;
//    echo "<br>";
//    echo $phn;
//    echo "<br>";
//    echo $password;
//    echo "<br>";
//    echo $gender;
}
?>

<div class="login-form col-md-4 offset-4">

        <h2 class="title">Registration here</h2>
        <form method="post" action=" ">
            <div class="form-group" >
                <label>Name:</label>
                <input type="text" class="form-control" placeholder="Enter name" name="username">
            </div>
            <div class="form-group" >
                <label>E-mail:</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group" >
                <label>Phone No:</label>
                <input type="text" class="form-control" name="phn">
            </div>
            <div class="form-group" >
                <label>Password:</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group">
                <label>Gender:</label>
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="male">Male

            </div>



            <button type="submit" class="btn btn-primary btn-block" name="submit" value="Submit">Submit</button>
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