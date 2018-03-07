<?php

include"DatabaseConnection.php";

session_start();
if(!isset($_SESSION['no']))
{
    header('Location:loginfrom.php');

}






?>


<html>

<head>
    <link rel="stylesheet" href="boot4/boot4/bootstrap.min.css">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="buttoncss.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="font-awesome.min.css" rel="stylesheet">

    <script src="boot4/boot4/jquery.min.js"></script>
    <script src="boot4/boot4/popper.min.js"></script>
    <script src="boot4/boot4/bootstrap.min.js"></script>
</head>



<body class="container-fluid">
<?php include"sessiondesign.php"?>
         <div class="row">
             <div class="col-sm-3">
                 <?php include"Sidebar.php"?>
             </div>
             <div class="col-sm-9">
                 <div class="row" style="margin-top: 10%">
                     <div class="col-sm-4">
                         <div class="container">

                                 <a href="tableno1.php"><img src="cashbook.png" class="rounded" alt="Cinque Terre" width="100%"></a>
<!--                                 <div class="centered"> <h1>urmi</h1></div>-->

                         </div>


                     </div>
                     <div class="col-sm-4">
                         <div class="container">

                             <a href="debitvoucher.png"><img src="debitvoucher.png" class="rounded" alt="Cinque Terre" width="100%"></a>
<!--                             <div class="centered"> <h1>urmi</h1></div>-->

                         </div>
                     </div>
                     <div class="col-sm-4">
                         <div class="container">

                             <a href="renaissanceapparels.php"><img src="raltd.png" class="rounded" alt="Cinque Terre" width="100%"></a>
<!--                             <div class="centered"> <h1>urmi</h1></div>-->

                         </div>
                     </div>
                 </div>
                 <div class="row" style="margin-top: 10%">

                     <div class="col-sm-4">
                         <div class="container">

                             <a href="coveredvan.php"><img src="vandetail.png" class="rounded" alt="Cinque Terre" width="100%"></a>
<!--                             <div class="centered"> <h1>urmi</h1></div>-->

                         </div>
                     </div>
                     <div class="col-sm-4">
                         <div class="container">

                             <a href="importbill.php"><img src="importbill.png" class="rounded" alt="Cinque Terre" width="100%"></a>
<!--                             <div class="centered"> <h1>urmi</h1></div>-->

                         </div>
                     </div>
                 </div>
             </div>
         </div>



</body>
</html>

