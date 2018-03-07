<?php
/**
 * Created by PhpStorm.
 * User: Urmi Shammi
 * Date: 12/15/2017
 * Time: 6:55 AM
 */
?>

<div class="row">
    <div class=" col-sm-11"  style='background-color: #2fbffe; font-size:1.500em; font-family:sans-serif ; color: #000'>
        <?php

        echo $_SESSION['name'];
        // echo "baaaaaaaaaaal";

        ?>
    </div>
    <div class="col-sm-1 bs-tooltip-right" style="background-color: #004085">
        <a style="color:#ffffff" href="logout.php"><h6 style="margin-top: 15%">Log Out</h6></a>
    </div>
</div>
