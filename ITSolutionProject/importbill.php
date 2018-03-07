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

//    no	date	cvanno	refbillno	particulars	valueintaka	total	remarks

    $monthd = $_POST['monthd'];
    $cvanno = $_POST['cvanno'];
    $refbillno = $_POST['refbillno'];
    $particulars = $_POST['particulars'];
    $valueintaka = $_POST['valueintaka'];
    $taka = $_POST['taka'];
    $total = $_POST['total'];
    $remarks = $_POST['remarks'];


    //echo "monthd = $monthd"."<br>";
//echo "vouchern = $vouchern"."<br>";
//echo "particulars = $particulars"."<br>";
//echo "folio = $folio"."<br>";
//echo "amount = $amount"."<br>";
//echo "total = $total"."<br>";
//echo "month = $month"."<br>";

    $sql = "insert into importbill( date, cvanno, refbillno, particulars, valueintaka,taka, total, remarks)
                            VALUES ('$monthd','$cvanno', '$refbillno','$particulars','$valueintaka','$taka','$total','$remarks')";
    $conn->query($sql);
}


//if(isset($_GET['delete']))
//{
//    $uniqueno = $_GET['uniqueno'];
//    $sql2 ="delete from cashbook WHERE no = $uniqueno";
//    $conn->query($sql2);
//}


//EDIT SURU
$monthd = "";
$cvanno = "";
$refbillno = "";
$particulars = "";
$valueintaka = "";
$total = "";
$remarks = "";






if(isset($_POST['check']))
{

    $checkid = $_POST['check'];

    foreach($checkid as $valuid)
    {

        $sql = "DELETE FROM importbill WHERE no ='$valuid'";
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
    $monthd = $_POST['monthd'];
    $cvanno = $_POST['cvanno'];
    $refbillno = $_POST['refbillno'];
    $particulars = $_POST['particulars'];
    $valueintaka = $_POST['valueintaka'];
    $total = $_POST['total'];
    $remarks = $_POST['remarks'];

    //    no	date	cvanno	refbillno	particulars	valueintaka	total	remarks


    $sql = "update importbill set date='$monthd',cvanno='$cvanno',refbillno='$refbillno',particulars='$particulars',valueintaka='$valueintaka'
                        ,total='$total',remarks='$remarks'   WHERE no ='$unique'";
    $conn->query($sql);

}



?>





<html>
<head>

    <link rel="stylesheet" href="boot4/boot4/bootstrap.min.css">
    <link rel="stylesheet" href="css.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="font-awesome.min.css" rel="stylesheet">

    <script src="digittoword.js"></script>
    <script src="boot4/boot4/jquery.min.js"></script>
    <script src="boot4/boot4/popper.min.js"></script>
    <script src="boot4/boot4/bootstrap.min.js"></script>
    <script src="boot4/boot4/jquery.num2words.js"></script>

    <script>


        //    no	date	cvanno	refbillno	particulars	valueintaka	total	remarks

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

            if (document.getElementById("cvanno").value == "") {
                document.getElementById("cvanno_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("cvanno_error").innerHTML = "";
            }
        }
        function onfocusOutparticulars() {

            if (document.getElementById("refbillno").value == "") {
                document.getElementById("refbillno_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("refbillno_error").innerHTML = "";
            }
        }
        function onfocusOutfolio() {

            if (document.getElementById("particulars").value == "") {
                document.getElementById("particulars_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("particulars_error").innerHTML = "";
            }
        }
        function onfocusOutamount() {

            if (document.getElementById("valueintaka").value == "") {
                document.getElementById("valueintaka_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("valueintaka_error").innerHTML = "";
            }
        }
        function onfocusOutmonth() {

            if (document.getElementById("remarks").value == "") {
                document.getElementById("remarks_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("remarks_error").innerHTML = "";
            }
        }

        function submitOnclick()
        {
            if  (
                document.getElementById("monthd").value == "" ||
                document.getElementById("cvanno").value == "" ||
                document.getElementById("refbillno").value == "" ||
                document.getElementById("particulars").value == "" ||
                document.getElementById("valueintaka").value == "" ||
                document.getElementById("remarks").value == ""

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


                    <div id="demo">
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content" style="width: 215%">
                                <!--                                we can use color-->

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">IMPORT BILL</h4>
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
                                                <input type="text" class="form-control" name="cvanno" id="cvanno" placeholder="C.VanNo" onfocusout="onfocusOutvouchern()">
                                                <div id="cvanno_error" class="var_error alert-danger"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="refbillno"  id="refbillno" placeholder="Ref.BillNo" onfocusout="onfocusOutparticulars()">
                                                <div id="refbillno_error" class="var_error alert-danger"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="particulars"  id="particulars" placeholder="Particulars" onfocusout="onfocusOutfolio()">
                                                <div id="particulars_error" class="var_error alert-danger"></div>
                                            </div>
                                        </div>

<!--                                        <div class="form-group row">-->
<!--                                            <div class="col-sm-12">-->
<!--                                                <input id="trans" type="button" value="Convert to words">-->
<!--                                                <div></div>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" onkeyup="digitToWord(this.value)" class="form-control" name="taka"  id="taka" placeholder="taka" onfocusout="onfocusOutfolio()">
                                                <div id="taka_error" class="var_error alert-danger"></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="valueintaka" id="valueintaka" placeholder="Value in Taka" onfocusout="onfocusOutamount()">
                                                <div id="valueintaka_error" class="var_error alert-danger"></div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="hidden" class="form-control" name="total" id="total" placeholder="Total">


                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Remarks" onfocusout="onfocusOutmonth()">
                                                <div id="remarks_error" class="var_error alert-danger"></div>

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
                    </div>




                    <div class="modal fade" id="myModaledit">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <!--                                we can use color-->

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">IMPORT BILL</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <label class="idhere"></label>

                                    <form method="post" action=" ">

                                        <div class="form-group row">

                                            <input type="hidden" class="unique" name="unique">

                                            <div class="col-sm-12">
                                                <input type="date"  class="form-control monthdate" name="monthdate"   placeholder="Month & Date">
                                            </div>


                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control cvanno" name="cvanno" value="<?php echo $cvanno?>" placeholder="C.VanNo">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control refbillno" name="refbillno" value="<?php echo $refbillno?>"placeholder="Ref.BillNo">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control particulars" name="particulars" value="<?php echo $particulars?>"placeholder="Particulars">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control valueintaka" name="valueintaka" value="<?php echo $valueintaka?>" placeholder="Value in Taka">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="hidden" class="form-control total" name="total" value="<?php echo $total?>" placeholder="Total">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control remarks" name="remarks" value="<?php echo $remarks?>" placeholder="Remarks">
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
                        <th>Month & Date</th>
                        <th>C.VanNo</th>
                        <th>Ref.BillNo</th>
                        <th>Particulars</th>
                        <th>Value in Taka</th>
                        <th>taka</th>
                        <th>Total</th>
                        <th>Remarks</th>
                        <th>Edit</th>

                    </tr>

                    </thead>

                    <tbody>
                    <?php
                    $sql1 = "select * from importbill";
                    if(isset($_POST['searchsubmit']))
                    {
                        $date1 = $_POST['search1'];
                        $date2 = $_POST['search2'];
                        $sql1 = "select * from importbill where date BETWEEN '".$date1."' AND '".$date2."' ";
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
                            <td><?php
                                $previous = $previous + $row[6];
                                echo $previous ?>
                            </td>
                            <td><?php echo $row[8]?></td>

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

            //    no	date	cvanno	refbillno	particulars	valueintaka	total	remarks


//            $unique = $_POST['unique'];
//            $monthd = $_POST['monthd'];
//            $cvanno = $_POST['cvanno'];
//            $refbillno = $_POST['refbillno'];
//            $particulars = $_POST['particulars'];
//            $valueintaka = $_POST['valueintaka'];
//            $total = $_POST['total'];
//            $remarks = $_POST['remarks'];



            var row = id.split(",");

            $(".unique").val(row[1]);

            $(".monthd").val(row[2]);
            $(".cvanno").val(row[3]);
            $(".refbillno").val(row[4]);
            $(".particulars").val(row[5]);
            $(".valueintaka").val(row[6]);
            $(".total").val(row[7]);
            $(".remarks").val(row[8]);
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
<script>
    $(document).ready(function() {
        $('#particulars').focus();
        $('#demo').num2words();
    });
</script>
</body>
</html>
