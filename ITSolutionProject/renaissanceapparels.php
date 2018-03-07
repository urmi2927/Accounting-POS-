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
    $monthd = $_POST['monthd'];
    $billno = $_POST['billno'];
    $coveredno = $_POST['coveredno'];
    $qty = $_POST['qty'];
    $export = $_POST['export'];
    $import = $_POST['import'];
    $local = $_POST['local'];
    $remarks = $_POST['remarks'];


//    echo "monthd = $monthd"."<br>";
//echo "billno = $billno"."<br>";
//echo "coveredno = $coveredno"."<br>";
//echo "qty = $qty"."<br>";
//echo "export = $export"."<br>";
//echo "import = $import"."<br>";
//echo "local = $local"."<br>";

    $sql = "insert into renaissanceapparels( date, billno, coveredno, qty, export, import, local,remarks)
                    VALUES ('$monthd','$billno','$coveredno','$qty','$export','$import','$local','$remarks')";
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
$billno = "";
$coveredno = "";
$qty = "";
$export = "";
$import = "";
$local = "";
$remarks ="";





if(isset($_POST['check']))
{


    $checkid = $_POST['check'];


    foreach($checkid as $valuid)
    {

        $sql = "DELETE FROM renaissanceapparels WHERE no ='$valuid'";
        $conn->query($sql);
    }

}



if(isset($_POST['edit']))
{


    $unique = $_POST['unique'];
    $monthd = $_POST['monthd'];
    $billno = $_POST['billno'];
    $coveredno = $_POST['coveredno'];
    $qty = $_POST['qty'];
    $export = $_POST['export'];
    $import = $_POST['import'];
    $local = $_POST['local'];
    $remarks = $_POST['remarks'];

    $sql = "update renaissanceapparels set date ='$monthd',billno='$billno',coveredno='$coveredno',qty='$qty'
                ,export='$export',import='$import',local='$local',remarks='$remarks'   WHERE no ='$unique'";
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

        var msg = "* please fill the field !"
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

            if (document.getElementById("billno").value == "") {
                document.getElementById("billno_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("billno_error").innerHTML = "";
            }
        }
        function onfocusOutparticulars() {

            if (document.getElementById("coveredno").value == "") {
                document.getElementById("coveredno_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("coveredno_error").innerHTML = "";
            }
        }
        function onfocusOutfolio() {

            if (document.getElementById("qty").value == "") {
                document.getElementById("qty_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("qty_error").innerHTML = "";
            }
        }
        function onfocusOutamount() {

            if (document.getElementById("export").value == "") {
                document.getElementById("export_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("export_error").innerHTML = "";
            }
        }
        function onfocusOutmonth() {

            if (document.getElementById("import").value == "") {
                document.getElementById("import_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("import_error").innerHTML = "";
            }
        }
        function onfocusOutmonth() {

            if (document.getElementById("local").value == "") {
                document.getElementById("local_error").innerHTML = msg;
            }
            else
            {
                document.getElementById("local_error").innerHTML = "";
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
                document.getElementById("billno").value == "" ||
                document.getElementById("coveredno").value == "" ||
                document.getElementById("qty").value == "" ||
                document.getElementById("export").value == "" ||
                document.getElementById("import").value == "" ||
                document.getElementById("local").value == "" ||
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




                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <!--we can use color-->

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">RENAISSANCE APPARELS LIMITED</h4>
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
                                                <input type="text" class="form-control" name="billno" id="billno" placeholder="Bill No" onfocusout="onfocusOutvouchern()">
                                                <div id="billno_error" class="var_error alert-danger"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="coveredno"  id="coveredno" placeholder="Covered No" onfocusout="onfocusOutparticulars()">
                                                <div id="coveredno_error" class="var_error alert-danger"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="qty"  id="qty" placeholder="Qty:" onfocusout="onfocusOutfolio()">
                                                <div id="qty_error" class="var_error alert-danger"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="export" id="export" placeholder="Export" onfocusout="onfocusOutamount()">
                                                <div id="export_error" class="var_error alert-danger"></div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="import" id="import" placeholder="Import">
                                                <div id="import_error" class="var_error alert-danger"></div>



                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="local" id="local" placeholder="Local" onfocusout="onfocusOutmonth()">
                                                <div id="local_error" class="var_error alert-danger"></div>

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




                    <div class="modal fade" id="myModaledit">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <!--                                we can use color-->

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">RENAISSANCE APPARELS LIMITED</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <label class="idhere"></label>

                                    <form method="post" action=" ">

                                        <div class="form-group row">

                                            <input type="hidden" class="unique" name="unique">

                                            <div class="col-sm-12">
                                                <input type="text"  class="form-control monthd" name="monthd"   placeholder="Month & Date">
                                            </div>


                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control billno" name="billno" value="<?php echo $billno?>" placeholder="Bill No">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control coveredno" name="coveredno" value="<?php echo $coveredno?>"placeholder="Covered No">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control qty" name="qty" value="<?php echo $qty?>"placeholder="Qty:">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control export" name="export" value="<?php echo $export?>" placeholder="Export .(Tk)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="hidden" class="form-control import" name="import" value="<?php echo $import?>" placeholder="Import .(Tk)">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control local" name="local" value="<?php echo $local?>" placeholder="Local .(Tk)">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control remarks" name="remarks" value="<?php echo $remarks?>" placeholder="Remarks .(Tk)">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12 " >
                                                <input type="submit" class="form-control btn btn-primary" name="edit" value="save" >
                                            </div>
                                        </div>
                                    </form>
                                </div>


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
                        <th>Bill No</th>
                        <th>Covered No</th>
                        <th>Qty:</th>
                        <th>Export (Tk).</th>
                        <th>Import (Tk).</th>
                        <th>Local (Tk).</th>
                        <th>Remarks</th>
                        <th>Edit</th>

                    </tr>

                    </thead>

                    <tbody>
                    <?php
                    $sql1 = "select * from renaissanceapparels";
                    if(isset($_POST['searchsubmit']))
                    {
                        $date1 = $_POST['search1'];
                        $date2 = $_POST['search2'];
                        $sql1 = "select * from renaissanceapparels where date BETWEEN '".$date1."' AND '".$date2."' ";
                    }
                    $result = $conn->query($sql1);
                    $i =1;
                    //$previous = 0 ;
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

            var row = id.split(",");

            $(".unique").val(row[1]);

            $(".monthd").val(row[2]);
            $(".billno").val(row[3]);
            $(".coveredno").val(row[4]);
            $(".qty").val(row[5]);
            $(".export").val(row[6]);
            $(".import").val(row[7]);
            $(".local").val(row[8]);
            $(".remarks").val(row[9]);
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
