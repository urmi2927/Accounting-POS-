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
//    $monthd = $_POST['monthd'];
//    $vouchern = $_POST['vouchern'];
//    $particulars = $_POST['particulars'];
//    $folio = $_POST['folio'];
//    $amount = $_POST['amount'];
//    $total = $_POST['total'];
//    $month = $_POST['month'];



    $month	= $_POST['month'];
    $grossincome = $_POST['grossincome'];
    $tyer	=$_POST['tyer'];
    $allworks	=$_POST['allworks'];
    $kisti	= $_POST['kisti'];
    $document	=$_POST['document'];
    $netincome	=$_POST['netincome'];
    $pl = $_POST['pl'];


    //echo "monthd = $monthd"."<br>";
//echo "vouchern = $vouchern"."<br>";
//echo "particulars = $particulars"."<br>";
//echo "folio = $folio"."<br>";
//echo "amount = $amount"."<br>";
//echo "total = $total"."<br>";
//echo "month = $month"."<br>";

    $sql = "insert into coverdvan( month, grossincome, tyer, allworks, kisti, document, netincome,pl )
                            VALUES ('$month','$grossincome', '$tyer','$allworks','$kisti','$document','$netincome','$pl')";
    $conn->query($sql);
}


//if(isset($_GET['delete']))
//{
//    $uniqueno = $_GET['uniqueno'];
//    $sql2 ="delete from cashbook WHERE no = $uniqueno";
//    $conn->query($sql2);
//}


//EDIT SURU
$month = "";
$grossincome = "";
$tyer = "";
$allworks = "";
$kisti	= "";
$document = "";
$netincome	= "";
$pl = "";





if(isset($_POST['check']))
{


    $checkid = $_POST['check'];


    foreach($checkid as $valuid)
    {

        $sql = "DELETE FROM coverdvan WHERE no ='$valuid'";
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
    $month	= $_POST['month'];
    $grossincome = $_POST['grossincome'];
    $tyer	=$_POST['tyer'];
    $allworks	=$_POST['allworks'];
    $kisti	= $_POST['kisti'];
    $document	=$_POST['document'];
    $netincome	=$_POST['netincome'];
    $pl = $_POST['pl'];

    $sql = "update coverdvan set month ='$month',grossincome='$grossincome',tyer='$tyer',allworks='$allworks',kisti='$kisti',
               document='$document',netincome='$netincome', pl ='$pl'  WHERE no ='$unique'";
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
            if (document.getElementById("month").value == "") {
                document.getElementById("month_error").innerHTML = msg;
                //alert("Name must be filled out");
                //return false;
            }
            else
            {
                document.getElementById("month_error").innerHTML = "";
            }
        }
        function onfocusOutvouchern() {

            if (document.getElementById("grossincome").value == "") {
                document.getElementById("grossincome_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("grossincome_error").innerHTML = "";
            }
        }
        function onfocusOutparticulars() {

            if (document.getElementById("tyer").value == "") {
                document.getElementById("tyer_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("tyer_error").innerHTML = "";
            }
        }
        function onfocusOutfolio() {

            if (document.getElementById("allworks").value == "") {
                document.getElementById("allworks_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("allworks_error").innerHTML = "";
            }
        }
        function onfocusOutamount() {

            if (document.getElementById("kisti").value == "") {
                document.getElementById("kisti_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("kisti_error").innerHTML = "";
            }
        }
        function onfocusOutmonth() {

            if (document.getElementById("document").value == "") {
                document.getElementById("document_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("document_error").innerHTML = "";
            }
        }


        function onfocusOutmonth() {

            if (document.getElementById("document").value == "") {
                document.getElementById("document_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("document_error").innerHTML = "";
            }
        }

        function onfocusOutmonth() {

            if (document.getElementById("netincome").value == "") {
                document.getElementById("netincome_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("netincome_error").innerHTML = "";
            }
        }

        function onfocusOutmonth() {

            if (document.getElementById("pl").value == "") {
                document.getElementById("pl_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("pl_error").innerHTML = "";
            }
        }



        function submitOnclick()
        {
            if  (


//                $unique = $_POST['unique'];
//            $month	= $_POST['month'];
//            $grossincome = $_POST['grossincome'];
//            $tyer	=$_POST['tyer'];
//            $allworks	=$_POST['allworks'];
//            $kisti	= $_POST['kisti'];
//            $document	=$_POST['document'];
//            $netincome	=$_POST['netincome'];
//            $pl = $_POST['pl'];



                document.getElementById("month").value == "" ||
                document.getElementById("grossincome").value == "" ||
                document.getElementById("tyer").value == "" ||
                document.getElementById("allworks").value == "" ||
                document.getElementById("kisti").value == "" ||
                document.getElementById("document").value == "" ||
                document.getElementById("netincome").value == ""

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
                                    <h4 class="modal-title">COVERED VAN</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                    <form  method="post" action=" " >

                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" name = "month" placeholder="0/00/0012" id ="month" onfocusout="onfocusOutmonthd()">
                                                <div id="month_error" class="var_error alert-danger"></div>
                                            </div>


                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="grossincome" id="grossincome" placeholder="Gross Income" onfocusout="onfocusOutvouchern()">
                                                <div id="grossincome_error" class="var_error alert-danger"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="tyer"  id="tyer" placeholder="Tyer" onfocusout="onfocusOutparticulars()">
                                                <div id="tyer_error" class="var_error alert-danger"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="allworks"  id="allworks" placeholder="All Works" onfocusout="onfocusOutfolio()">
                                                <div id="allworks_error" class="var_error alert-danger"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="kisti" id="kisti" placeholder="Kisti" onfocusout="onfocusOutamount()">
                                                <div id="kisti_error" class="var_error alert-danger"></div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="document" id="document" placeholder="Document">
                                                <div id="document_error" class="var_error alert-danger"></div>



                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="netincome" id="netincome" placeholder="Net income" onfocusout="onfocusOutmonth()">
                                                <div id="netincome_error" class="var_error alert-danger"></div>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="pl" id="pl" placeholder="P/L" onfocusout="onfocusOutmonth()">
                                                <div id="pl_error" class="var_error alert-danger"></div>

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
                                    <h4 class="modal-title">COVERED VAN</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <label class="idhere"></label>

                                    <form method="post" action=" ">

                                        <div class="form-group row">

                                            <input type="hidden" class="unique" name="unique">

                                            <div class="col-sm-12">
                                                <input type="text"  class="form-control month" name="month"   placeholder="Month & Date">
                                            </div>


                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control grossincome" name="grossincome" value="<?php echo $grossincome?>" placeholder="Grossincome">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control tyer" name="tyer" value="<?php echo $tyer?>"placeholder="Tyer">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control allworks" name="allworks" value="<?php echo $allworks?>"placeholder="All Works">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control kisti" name="kisti" value="<?php echo $kisti?>" placeholder="Kisti">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control document" name="document" value="<?php echo $document?>" placeholder="Document">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control netincome" name="netincome" value="<?php echo $netincome?>" placeholder="Net income">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control pl" name="pl" value="<?php echo $pl?>" placeholder="P/L">
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

               <h5 style="margin-left: 35%">Covered van # D.M.TA 13-0732<br>YEAR-2017</h5>

                <table class=" table-hover table table-striped table-bordered">
                    <thead class="thcolor">

                    <tr>
                        <th> </th>
                        <th>Serial No. </th>
                        <th>Month & Date</th>
                        <th>Gross income</th>
                        <th>Tyer</th>
                        <th>All Works</th>
                        <th>Kisti</th>
                        <th>Document</th>
                        <th>Net Income</th>
                        <th>P/L</th>
                        <th>Edit</th>

                    </tr>

                    </thead>

                    <tbody>
                    <?php
                    $sql1 = "select * from coverdvan";
                    if(isset($_POST['searchsubmit']))
                    {
                        $date1 = $_POST['search1'];
                        $date2 = $_POST['search2'];
                        $sql1 = "select * from coverdvan where month BETWEEN '".$date1."' AND '".$date2."' ";
                    }
                    $result = $conn->query($sql1);
                    $i =1;
                   // $previous = 0 ;
                    while($row = $result->fetch_array() )
                    {
                        ?>

                        <tr>

                            <td class="btn badge-info"><input type="checkbox" id="hybrid" name="check[]" value="<?php echo $row[0]?>" ></td>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row[1]?></td>
                            <td><?php echo $row[2]?></td>
                            <td><?php echo $row[3]?></td>
                            <td><?php echo $row[4]?></td>
                            <td><?php echo $row[5]?></td>
                            <td><?php echo $row[6]?></td>

                            <td><?php echo $row[7]?></td>
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
                                $test = $test.",".$row[8];
                                echo $test ;
                                ?>" style="color: #ffffff">edit</a>
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
        newWin.document.write("<style> td:nth-child(11){display:none;} </style>");
        newWin.document.write("<style> th:nth-child(1){display:none;} </style>");
        newWin.document.write("<style> th:nth-child(11){display:none;} </style>");
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


//            $unique = $_POST['unique'];
//            $month	= $_POST['month'];
//            $grossincome = $_POST['grossincome'];
//            $tyer	=$_POST['tyer'];
//            $allworks	=$_POST['allworks'];
//            $kisti	= $_POST['kisti'];
//            $document	=$_POST['document'];
//            $netincome	=$_POST['netincome'];
//            $pl = $_POST['pl'];


            var row = id.split(",");

            $(".unique").val(row[1]);

            $(".month").val(row[2]);
            $(".grossincome").val(row[3]);
            $(".tyer").val(row[4]);
            $(".allworks").val(row[5]);
            $(".kisti").val(row[6]);
            $(".document").val(row[7]);
            $(".netincome").val(row[8]);
            $(".pl").val(row[9]);
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
