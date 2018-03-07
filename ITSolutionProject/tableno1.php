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

 //echo "jkjjkjkkjkk".$_SESSION["name"] ;
if (isset($_POST['submit']))
{
   // $unique = $_POST['unique'];
    $monthd =$_POST['monthd'];
    $particulars = $_POST['particulars'];
    $vouchertype = $_POST['vouchertype'];
    $vouchernumber = $_POST['vouchernumber'];
    $debit=0;
    $credit=0;
    if($_POST['debitCredit']==0){
        $debit = $_POST['credit'];
    }else{
        $credit = $_POST['credit'];
    }
    $dtotal = $_POST['dtotal'];

    $total = $_POST['total'];
    $month = $_POST['month'];




    $sql = "insert into cashbook( monthdate, particulars, vouchertype, vouchernumber, debit,dtotal,credit, total, month)
                            VALUES ('$monthd','$particulars', '$vouchertype','$vouchernumber','$debit','$dtotal','$credit','$total','$month')";
    $conn->query($sql);
}


//if(isset($_GET['delete']))
//{
//    $uniqueno = $_GET['uniqueno'];
//    $sql2 ="delete from cashbook WHERE no = $uniqueno";
//    $conn->query($sql2);
//}


//EDIT SURU
$unique = " ";
$monthd =" ";
$particulars = " ";
$vouchertype = " ";
$vouchernumber = " ";
$debit = " ";
$dtotal = " ";
$credit = " ";
$total = " ";
$month = " ";





if(isset($_POST['check']))
{


    $checkid = $_POST['check'];


    foreach($checkid as $valuid)
    {

         $sql = "DELETE FROM cashbook WHERE no ='$valuid'";
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
    $monthd =$_POST['monthd'];
    $particulars = $_POST['particulars'];
    $vouchertype = $_POST['vouchertype'];
    $vouchernumber = $_POST['vouchernumber'];
    $debit = $_POST['debit'];
    $dtotal = $_POST['dtotal'];
    $credit = $_POST['credit'];
    $total = $_POST['total'];
    $month = $_POST['month'];

    $sql = "update cashbook set monthdate='$monthd',particulars='$particulars',vouchertype='$vouchertype',vouchernumber='$vouchernumber',
             debit='$debit',dtotal='$dtotal',credit='$credit',total='$total',month='$month'   WHERE no ='$unique'";
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




            var msg = "* please fill the field !";
            function onfocusOutmonthd() {

                //var monthd = document.getElementById("monthd").value;
                if (document.getElementById("monthd").value == "") {
                    document.getElementById("monthd_error").innerHTML = msg;
                    //alert("Name must be filled out");
                    //return false;
                }
                else
                {
                    document.getElementById("monthd_error").innerHTML = "";
                }
            }
            function onfocusOutvouchern() {

                if (document.getElementById("particulars").value == "") {
                    document.getElementById("particulars_error").innerHTML = msg;
                }
                else
                {
                    document.getElementById("particulars_error").innerHTML = "";
                }
            }
            function onfocusOutparticulars() {

                if (document.getElementById("vouchertype").value == "") {
                    document.getElementById("vouchertype_error").innerHTML = msg;
                }
                else
                {
                    document.getElementById("vouchertype_error").innerHTML = "";
                }
            }
            function onfocusOutfolio() {

                if (document.getElementById("vouchernumber").value == "") {
                    document.getElementById("vouchernumber_error").innerHTML = msg;
                }
                else
                {
                    document.getElementById("vouchernumber_error").innerHTML = "";
                }
            }
//            function onfocusOutamount() {
//
//                if (document.getElementById("debit").value == "") {
//                    document.getElementById("debit_error").innerHTML = msg;
//                }
//                else
//                {
//                    document.getElementById("debit_error").innerHTML = "";
//                }
//            }
//
            function onfocusOutmonth() {

                if (document.getElementById("credit").value == "") {
                    document.getElementById("credit_error").innerHTML = msg;
                }
                else
                {
                    document.getElementById("credit_error").innerHTML = "";
                }
            }

            function onfocusOutmonth() {

                if (document.getElementById("month").value == "") {
                    document.getElementById("month_error").innerHTML = msg;
                }
                else
                {
                    document.getElementById("month_error").innerHTML = "";
                }
            }

            function submitOnclick()
            {
                if  (
                        document.getElementById("monthd").value == "" ||
                        document.getElementById("particulars").value == "" ||
                        document.getElementById("vouchertype").value == "" ||
                        document.getElementById("vouchernumber").value == "" ||
                        document.getElementById("debit").value == "" ||
                        document.getElementById("credit").value == "" ||
                        document.getElementById("month").value == ""

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
     <?php include "sessiondesign.php"?>
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
                                        <h4 class="modal-title">CASH BOOK</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">

                                        <form  method="post" action=" " >

                                            <div class="form-group row">

                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" name = "monthd" placeholder="0/00/0012" id ="monthd" onfocusout="onfocusOutmonthd()">
                                                    <div id="monthd_error" class="var_error alert-danger"></div>
                                                </div>


                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="particulars" id="particulars" placeholder="Particulars" onfocusout="onfocusOutvouchern()">
                                                    <div id="particulars_error" class="var_error alert-danger"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="vouchertype"  id="vouchertype" placeholder="Voucher Type" onfocusout="onfocusOutparticulars()">
                                                    <div id="vouchertype_error" class="var_error alert-danger"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="vouchernumber"  id="vouchernumber" placeholder="Voucher Number" onfocusout="onfocusOutfolio()">
                                                    <div id="vouchernumber_error" class="var_error alert-danger"></div>
                                                </div>
                                            </div>


<!--                                            <div class="form-group row">-->
<!--                                                <div class="col-sm-12">-->
<!--                                                    <input type="text" class="form-control" name="debit" id="debit" placeholder="Debit" onfocusout="onfocusOutamount()">-->
<!--                                                    <div id="debit_error" class="var_error alert-danger"></div>-->
<!---->
<!--                                                </div>-->
<!--                                            </div>-->

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <select name="debitCredit" class="form-control btn badge-info" >
                                                        <option value="2">Debit/Credit</option>
                                                        <option value="0">Debit</option>
                                                        <option value="1">Credit</option>

                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" name="dtotal" id="dtotal" placeholder="Debit Total">


                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="credit" id="credit" placeholder="Insert Debit/Credit value" onfocusout="onfocusOutamount()">
                                                    <div id="credit_error" class="var_error alert-danger"></div>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" name="total" id="total" placeholder="Total">


                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="month" id="month" placeholder="Month" onfocusout="onfocusOutmonth()">
                                                    <div id="month_error" class="var_error alert-danger"></div>

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
                                        <h4 class="modal-title">CASH BOOK</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <label class="idhere"></label>

                                        <form method="post" action="tableno1.php">

                                            <div class="form-group row">

                                                <input type="hidden" class="unique" name="unique">

                                                <div class="col-sm-12">
                                                    <input type="date"  class="form-control monthd" name="monthd"   placeholder="Month & Date">
                                                </div>


                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control particulars" name="particulars" value="<?php echo $particulars?>" placeholder="Particulars">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control vouchertype" name="vouchertype" value="<?php echo $vouchertype?>"placeholder="Voucher Type">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control vouchernumber" name="vouchernumber" value="<?php echo $vouchernumber ?>"placeholder="Voucher Number">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control debit" name="debit" value="<?php echo $debit?>" placeholder="Debit">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control dtotal" name="dtotal" value="<?php echo $dtotal?>" placeholder="Debit Total">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control credit" name="credit" value="<?php echo $credit?>" placeholder="Credit">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control total" name="total" value="<?php echo $total?>" placeholder="Total">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control month" name="month" value="<?php echo $month?>" placeholder="Month">
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

                        <h1 style="margin-left: 35%">Cash Book</h1>
                        <table class=" table-hover table table-striped table-bordered">
                            <thead class="thcolor">
                            <tr>
                                <th> </th>
                                <th>Serial No. </th>
                                <th>Month & Date</th>
                                <th>Particulars</th>
                                <th>Voucher Type</th>
                                <th>Voucher Number</th>
                                <th>Debit</th>
                                <th>Debit Total</th>
                                <th>Credit</th>
                                <th>Total</th>
                                <th>Month</th>
                                <th>Edit</th>

                            </tr>

                            </thead>

                            <tbody>
                            <?php
                            $sql1 = "select * from cashbook";
                            if(isset($_POST['searchsubmit']))
                            {
                                $date1 = $_POST['search1'];
                                $date2 = $_POST['search2'];
                                $sql1 = "select * from cashbook where monthdate BETWEEN '".$date1."' AND '".$date2."' ";
                            }
                            $result = $conn->query($sql1);
                            $i =1;
                            $previous = 0 ;
                            $dprevious = 0 ;
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
                                    <td><?php
                                        $dprevious = $dprevious + $row[5];
                                        echo $dprevious ?>
                                    </td>
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


                  <h6>Total Debit = <?php echo "$dprevious"?><br>
                      Total Credit = <?php echo "$previous"?><br>
                      Closing Balance = <?php
                                        $amount = $dprevious - $previous;
                                        echo"$amount";
                                      ?>
                  </h6>




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
//         function validateForm() {
//             var x = document.forms["input"]["monthd"].value;
//             if (x == "") {
//                 document.getElementById("monthd_error").innerHTML="invalid";
//                 return false;
//             }
//         }

//         var monthd = document.forms["input"]["monthd"];
//         var vouchern = document.forms["input"]["vouchern"];
//         var particulars = document.forms["input"]["particulars"];
//         var folio = document.forms["input"]["folio"];
//         var amount = document.forms["input"]["amount"];
//         var month = document.forms["input"]["month"];
//
//         var monthd_error = document.getElementById("monthd_error");
//         var vouchern_error = document.getElementById("vouchern_error");
//         var particulars_error = document.getElementById("particulars_error");
//         var folio_error = document.getElementById("folio_error");
//         var amount_error = document.getElementById("amount_error");
//         var month_error = document.getElementById("month_error");


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

//                 $unique = $_POST['unique'];
//                 $monthd =$_POST['monthdate'];
//                 $particulars = $_POST['particulars'];
//                 $vouchertype = $_POST['vouchertype'];
//                 $vouchernumber = $_POST['vouchernumber'];
//                 $debit = $_POST['debit'];
//                 $dtotal = $_POST['dtotal'];
//                 $credit = $_POST['credit'];
//                 $total = $_POST['total'];
//                 $month = $_POST['month'];


                 var row = id.split(",");

                 $(".unique").val(row[1]);

                 $(".monthd").val(row[2]);
                 $(".particulars").val(row[3]);
                 $(".vouchertype").val(row[4]);
                 $(".vouchernumber").val(row[5]);
                 $(".debit").val(row[6]);
                 $(".dtotal").val(row[7]);
                 $(".credit").val(row[8]);
                 $(".total").val(row[9]);
                 $(".month").val(row[10]);
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
