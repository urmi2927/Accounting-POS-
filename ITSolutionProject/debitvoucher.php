<?php
/**
 * Created by PhpStorm.
 * User: Urmi Shammi
 * Date: 12/8/2017
 * Time: 2:28 AM
 */
include"DatabaseConnection.php";


session_start();
if(!isset($_SESSION['no']))
{
    header('Location:loginfrom.php');

}

if (isset($_POST['submit']))
{
    $dabitac = $_POST['dabitac'];
    $voucherno = $_POST['voucherno'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $cash = $_POST['cash'];
    $creditcardno = $_POST['creditcardno'];
    $taka = $_POST['taka'];
    $totalamount = $_POST['totalamount'];
    $takainword = $_POST['takainword'];


    //echo "monthd = $monthd"."<br>";
//echo "vouchern = $vouchern"."<br>";
//echo "particulars = $particulars"."<br>";
//echo "folio = $folio"."<br>";
//echo "amount = $amount"."<br>";
//echo "total = $total"."<br>";
//echo "month = $month"."<br>";

    $sql = "insert into debitvoucher( dabitac, voucherno, address, date, cash, creditcardno, taka,totalamount,takainword)
                            VALUES ('$dabitac','$voucherno', '$address','$date','$cash','$creditcardno','$taka','$totalamount','$takainword')";
    $conn->query($sql);
}


//if(isset($_GET['delete']))
//{
//    $uniqueno = $_GET['uniqueno'];
//    $sql2 ="delete from cashbook WHERE no = $uniqueno";
//    $conn->query($sql2);
//}


//EDIT SURU
$dabitac = "";
$voucherno = "";
$address = "";
$date = "";
$cash = "";
$creditcardno = "";
$taka = "";
$totalamount = "";
$takainword = "";





if(isset($_POST['check']))
{


    $checkid = $_POST['check'];


    foreach($checkid as $valuid)
    {

        $sql = "DELETE FROM debitvoucher WHERE no ='$valuid'";
        $conn->query($sql);
    }

}


//if(isset($_POST['editsub']))
//{
//
//
//
//
//
//    foreach($checkid as $valuid)
//    {
//
//        $sql = "DELETE FROM cashbook WHERE no ='$valuid'";
//        $conn->query($sql);
//    }
//
//}

if(isset($_POST['edit']))
{


    $unique = $_POST['unique'];
    $dabitac = $_POST['dabitac'];
    $voucherno = $_POST['voucherno'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $cash = $_POST['cash'];
    $creditcardno = $_POST['creditcardno'];
    $taka = $_POST['taka'];
    $totalamount = $_POST['totalamount'];
    $takainword = $_POST['takainword'];

    $sql = "update debitvoucher set dabitac='$dabitac',voucherno='$voucherno',address='$address',date='$date',cash='$cash',
                          creditcardno='$creditcardno',taka='$taka' ,totalamount = '$totalamount',takainword='$takainword'
                           WHERE no ='$unique'";
    $conn->query($sql);

}



?>





<html>
<head>

    <link rel="stylesheet" href="boot4/boot4/bootstrap.min.css">
    <link rel="stylesheet" href="css.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="font-awesome.min.css" rel="stylesheet">

    <script src="boot4/boot4/jquery.min.js"></script>
    <script src="boot4/boot4/popper.min.js"></script>
    <script src="boot4/boot4/bootstrap.min.js"></script>

    <script>
        //            function validateForm() {
        //                //var x = document.forms["input"]["monthd"].value;
        //                var x = document.getElementById("monthd").value;
        //                if (x == "") {
        //                    document.getElementById("monthd_error").innerHTML = "invalid";
        //                    alert("Name must be filled out");
        //                    return false;
        //                }
        //                alert("Name must be filled out");
        //            }
        var msg = "* please fill the field !"
        function onfocusOutmonthd() {

            //var monthd = document.getElementById("monthd").value;
            if (document.getElementById("dabitac").value == "") {
                document.getElementById("dabitac_error").innerHTML = msg;
                //alert("Name must be filled out");
                //return false;
            }
            else
            {
                document.getElementById("dabitac_error").innerHTML = "";
            }
        }
        function onfocusOutvouchern() {

            if (document.getElementById("voucherno").value == "") {
                document.getElementById("voucherno_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("voucherno_error").innerHTML = "";
            }
        }
        function onfocusOutparticulars() {

            if (document.getElementById("address").value == "") {
                document.getElementById("address_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("address_error").innerHTML = "";
            }
        }

        function onfocusOutfolio() {

            if (document.getElementById("date").value == "") {
                document.getElementById("date_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("date_error").innerHTML = "";
            }
        }
        function onfocusOutamount() {

            if (document.getElementById("cash").value == "") {
                document.getElementById("cash_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("cash_error").innerHTML = "";
            }
        }
        function onfocusOutmonth() {

            if (document.getElementById("creditcardno").value == "") {
                document.getElementById("creditcardno_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("creditcardno_error").innerHTML = "";
            }
        }


        function onfocusOutmonth() {

            if (document.getElementById("taka").value == "") {
                document.getElementById("taka_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("taka_error").innerHTML = "";
            }
        }
//        function onfocusOutmonth() {
//
//            if (document.getElementById("totalamount").value == "") {
//                document.getElementById("totalamount_error").innerHTML = msg;
//            }
//            else
//            {
//                document.getElementById("totalamount_error").innerHTML = "";
//            }
//        }

        function onfocusOutmonth() {

            if (document.getElementById("takainword").value == "") {
                document.getElementById("takainword_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("takainword_error").innerHTML = "";
            }
        }

        function submitOnclick()
        {
            if  (


//                $dabitac = $_POST['dabitac'];
//            $voucherno = $_POST['voucherno'];
//            $address = $_POST['address'];
//            $date = $_POST['date'];
//            $cash = $_POST['cash'];
//            $creditcardno = $_POST['creditcardno'];
//            $taka = $_POST['taka'];
//            $totalamount = $_POST['totalamount'];
//            $takainword = $_POST['takainword'];


                document.getElementById("dabitac").value == "" ||
                document.getElementById("voucherno").value == "" ||
                document.getElementById("address").value == "" ||
                document.getElementById("date").value == "" ||
                document.getElementById("cash").value == "" ||
                document.getElementById("creditcardno").value == "" ||
                document.getElementById("taka").value == "" ||
                document.getElementById("takainword").value == ""

            ) {
                alert("Fill all the fields !!!");
                return false;
            }
            else{
                return true;

            }


        }







    </script>

</head>
<body class=" container-fluid">
<?php include"sessiondesign.php"?>
<form method="post" action="" >
    <div class="row">
        <div class="col-sm-3">
            <?php include"Sidebar.php"?>
        </div>


        <div class="col-sm-9" id="tablebody">

            <!--                <a href="#" class="x"><h1>X</h1></a>-->
            <a href="#" class="x"><i class="fa fa-bars fa-3x" aria-hidden="true" ></i></a>

            <div class="row">

                <div class="container "style="margin-top: 5%" >

                    <!-- Button to Open the Modal -->

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Insert
                    </button>
                    <button onclick="myFunction()" class="btn btn-primary">Print</button>


                    <input type="submit" name="deletecheck" value="delete" class="btn btn-primary">
                    <form action="" method="post">
                        <div class="pull-right">
                            <input type="date" name="search1" id="search1" placeholder=" Search" >
                            <input type="date" name="search2" id="search2" placeholder=" Search" >
                            <input type="submit" name="searchsubmit">
                        </div>
                    </form>



                    <!-- The Modal -->
                    <!--                        Incert value-->




                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <!--                                we can use color-->

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">DEBIT VOUCHER</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                    <form  method="post" action=" " >

                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name = "dabitac" placeholder="Dabit A\C" id ="dabitac" onfocusout="onfocusOutmonthd()">
                                                <div id="dabitac_error" class="var_error alert-danger"></div>
                                            </div>


                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="voucherno" id="voucherno" placeholder="Voucher Number" onfocusout="onfocusOutvouchern()">
                                                <div id="voucherno_error" class="var_error alert-danger"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="address"  id="address" placeholder="Address" onfocusout="onfocusOutparticulars()">
                                                <div id="address_error" class="var_error alert-danger"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" name="date"  id="date" placeholder="Date" onfocusout="onfocusOutfolio()">
                                                <div id="folio_error" class="var_error alert-danger"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="cash" id="cash" placeholder="Cash" onfocusout="onfocusOutamount()">
                                                <div id="cash_error" class="var_error alert-danger"></div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="creditcardno" id="creditcardno" placeholder="Credit Card No">
                                                <div id="creditcardno_error" class="var_error alert-danger"></div>



                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="taka" id="taka" placeholder="Taka" onfocusout="onfocusOutmonth()">
                                                <div id="taka_error" class="var_error alert-danger"></div>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="hidden" class="form-control" name="totalamount" id="totalamount" placeholder="Total Amount" onfocusout="onfocusOutmonth()">
                                                <div id="totalamount_error" class="var_error alert-danger"></div>

                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="takainword" id="takainword" placeholder="Taka in word" onfocusout="onfocusOutmonth()">
                                                <div id="takainword_error" class="var_error alert-danger"></div>

                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <div class="col-sm-12 " >
                                                <input type="submit" class="form-control btn btn-primary" name="submit"  onclick="return submitOnclick()">
                                            </div>
                                        </div>
                                    </form>
                                </div>



                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>




                    <div class="modal fade" id="myModaledit">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <!--                                we can use color-->

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">DEBIT VOUCHER</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <label class="idhere"></label>

                                    <form method="post" action=" ">

                                        <div class="form-group row">

                                            <input type="hidden" class="unique" name="unique">

                                            <div class="col-sm-12">
                                                <input type="text"  class="form-control dabitac" name="dabitac" value="<?php echo $dabitac?>"  placeholder="Dabitac">
                                            </div>


                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control voucherno" name="voucherno" value="<?php echo $voucherno?>" placeholder="Voucher Number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control address" name="address" value="<?php echo $address?>"placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control date" name="date" placeholder="Date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control cash" name="cash" value="<?php echo $cash?>" placeholder="Cash">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control creditcardno" name="creditcardno" value="<?php echo $creditcardno?>" placeholder="Credit Card No">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control taka" name="taka" value="<?php echo $taka?>" placeholder="Taka">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control totalamount" name="totalamount" value="<?php echo $totalamount?>" placeholder="Total Amount">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control takainword" name="takainword" value="<?php echo $takainword?>" placeholder="Taka In Word">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-12 " >
                                                <input type="submit" class="form-control btn btn-primary" name="edit" value="save" >
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!--

                                                                    <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>





                </div>
            </div>

            <br>


            <div class="row" id="printTable">


                <table class=" table-hover table table-striped table-bordered">
                    <thead class="thcolor">
                    <tr>
                        <th> </th>
                        <th>Serial No. </th>
                        <th>Debit A\C</th>
                        <th>Voucher No</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Cash</th>
                        <th>Credit  Card No</th>
                        <th>Taka</th>
                        <th>Total Amount</th>
                        <th>Taka In Word</th>
                        <th>Edit</th>

                    </tr>

                    </thead>

                    <tbody>
                    <?php
                    $sql1 = "select * from debitvoucher";
                    if(isset($_POST['searchsubmit']))
                    {
                        $date1 = $_POST['search1'];
                        $date2 = $_POST['search2'];
                        $sql1 = "select * from debitvoucher where date BETWEEN '".$date1."' AND '".$date2."' ";
                    }
                    $result = $conn->query($sql1);
                    $i =1;
                    $previous = 0 ;
                    while($row = $result->fetch_array() )
                    {
                        ?>

                        <tr >

                            <td class="btn badge-info"><input type="checkbox" name="check[]" value="<?php echo $row[0]?>" ></td>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row[1]?></td>
                            <td><?php echo $row[2]?></td>
                            <td><?php echo $row[3]?></td>
                            <td><?php echo $row[4]?></td>
                            <td><?php echo $row[5]?></td>
                            <td><?php echo $row[6]?></td>
                            <td><?php echo $row[7]?></td>
                            <td><?php
                                $previous = $previous + $row[7];
                                echo $previous ?>
                            </td>
                            <td><?php echo $row[9]?></td>



                            <td>
                                <a class="btn btn-primary" data-toggle="modal"  data-target="#myModaledit" data-id ="
                                    <?php
                                $test = "";
                                $test = $test.",".$row[0];
                                $test = $test.",".$row[1];
                                $test = $test.",".$row[2];
                                $test = $test.",".$row[3];
                                $test = $test.",".$row[4];
                                $test = $test.",".$row[5];
                                $test = $test.",".$row[6];
                                $test = $test.",".$row[7];
                                $test = $test.",".$row[8];
                                $test = $test.",".$row[9];
                                echo $test ;
                                ?>" style="color: #ffffff">edit</a>
                                <!--                                        <button type="submit" name="editsub" class="btn btn-primary" data-toggle="modal" data-target="#myModaledit">-->
                                <!--                                            Edit-->
                                <!--                                        </button>-->
                            </td>


                        </tr>

                        <?php
                        $i++;
                    }
                    ?>


                    </tbody>

                </table>






            </div>



        </div>

    </div>

</form>
<script>

    function myFunction() {

        // document.getElementById('hybrid').type = 'hidden';
        var divToPrint=document.getElementById("printTable");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.document.write("<style> td:nth-child(1){display:none;} </style>");
        newWin.document.write("<style> td:nth-child(8){display:none;} </style>");
        newWin.document.write("<style> td:nth-child(10){display:none;} </style>");
        newWin.document.write("<style> td:nth-child(11){display:none;} </style>");
        newWin.document.write("<style> td:nth-child(12){display:none;} </style>");
        newWin.document.write("<style> th:nth-child(1){display:none;} </style>");
        newWin.document.write("<style> th:nth-child(8){display:none;} </style>");
        newWin.document.write("<style> th:nth-child(10){display:none;} </style>");
        newWin.document.write("<style> th:nth-child(11){display:none;} </style>");
        newWin.document.write("<style> th:nth-child(12){display:none;} </style>");
        newWin.print();
        newWin.close();
    }

    $(document).ready(function() {
        $('#myModaledit').on('show.bs.modal', function(e) {
            var id = $(e.relatedTarget).data('id');
            //alert(id);
            //$(".idhere").html(id);

            /*
             * The split method will create an array. So you need to access the third element in your case..

             (arrays are 0-indexed) You need to access result[2] to get the url

             var result = $(row).text().split('|');
             alert( result[2] );
             You do not give us enough information to know what row is, exactly.. So depending on how you acquire the variable row you might need to do one of the following.

             if row is a string then row.split('|');
             if it is a DOM element then $(row).text().split('|');
             if it is an input element then $(row).val().split('|');
             */


//            $dabitac = $_POST['dabitac'];
//            $voucherno = $_POST['voucherno'];
//            $address = $_POST['address'];
//            $date = $_POST['date'];
//            $cash = $_POST['cash'];
//            $creditcardno = $_POST['creditcardno'];
//            $taka = $_POST['taka'];
//            $totalamount = $_POST['totalamount'];
//            $takainword = $_POST['takainword'];

            var row = id.split(",");

            $(".unique").val(row[1]);

            $(".dabitac").val(row[2]);
            $(".voucherno").val(row[3]);
            $(".address").val(row[4]);
            $(".date").val(row[5]);
            $(".cash").val(row[6]);
            $(".creditcardno").val(row[7]);
            $(".taka").val(row[8]);
            $(".totalamount").val(row[9]);
            $(".takainword").val(row[10]);

        });


//             Now for clicking Fade in out of menu
        var i = 0;
        $(".x").click(
            function()
            {

                //$(".col-sm-3").fadeToggle("slow");
                if(i==0)
                {
                    $(".fa").removeClass("fa-bars");
                    $(".fa").addClass("fa-times");
                    $(".col-sm-3").fadeOut(10);
                    $("#tablebody").removeClass("col-sm-9");
                    $("#tablebody").addClass("col-sm-12");
                    //$("body").css("background-color","#000");
                    // $("body").addClass("bg-dark");
                    // $("body").addClass("text-danger");
                    i = 1;
                }
                else
                {
                    $(".fa").removeClass("fa-times");
                    $(".fa").addClass("fa-bars");
                    $(".col-sm-3").fadeIn(10);
                    $("#tablebody").removeClass("col-sm-12");
                    $("#tablebody").addClass("col-sm-9");
                    //$("body").removeClass("bg-dark");
                    //$("body").removeClass("text-danger");
                    i = 0;
                }

            }
        );

    });
</script>
</body>
</html>
