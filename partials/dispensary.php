<div id="requisitionmanager" style="display:none">

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">

        <div class='ssm sicopt ssmactive' onclick="showopt('#dispensary', '#dispense')" id='dispense'>Dispensary</div>

        <div class='ssm sicopt' onclick="showopt('#overview', '#overfew')" id='overfew'>Dispense Log</div>

    </div>

    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; padding:20px; min-height:300px">

        <div id="dispensary">

            <div style="margin-top:10px; font-size:25px; font-weight:300; color:#3D003D; text-align:right">Dispensary</div>

            <div style="margin-top:30px">

                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'></div>

                <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>

                    <i id="dbnameq" style="display:nonE"><?php echo $sitetable ?></i>

                    <label>Patient ID (Hospital ID)</label>

                    <input type="text" class="form-control m10" id="patnamedrug" onblur="fetchid(this.value)">
                    <label>Dispense date</label>

                    <input type="date" class="form-control m10" id="patdatedrug">

                    <label>Drug Category</label>

                    <select class='form-control m10' onchange="selforunit()" id="drugcattt">

                        <option>--Select Category--</option>

                        <?php
                        $q = "select * from drugcategory order by categoryname asc";

                        $w = mysql_query($q);



                        while ($e = mysql_fetch_array($w)) {

                            $catvalue = $e['sn'];

                            echo "<option value='$catvalue'>" . $e['categoryname'] . "</option>";
                        }
                        ?>

                    </select>

                    <label class="mten">Drug name</label>

                    <select class='form-control m10' id="drugsincatt" onchange='selectDrugname()'>



                    </select>
                    <label class="mten">Required Qty</label>

                    <input type="text" class="form-control m10" id="druggyrequiredqty" onkeypress="checkexergerration()">

                    <input type="button" value="Dispense item" class="btn btn-purplesource mten" onclick="dispenseitem()">

                    <input type="button" value="Reset" class="btn btn-warning mten" style="margin-left:5px; margin-right:10px">

                    <span id="serverReturnString">



                    </span>

                </div>

                <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12' style='padding:20px'>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id='clientinfot'>



                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:#E5E5E5; border-style:solid; border-color:#DBDBDB; border-width:thin; border-radius:5px">

                        <div style='font-size:25px' id='drugnamej'> <span style='font-size:14px'></span></div>

                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="serverreplieshere" style="text-align:center; margin-top:10px; color:#8F4A94"></div>

                </div>

            </div>

        </div>



        <div id="overview" style="display:none">

            <div style="margin-top:10px; font-size:25px; font-weight:300; color:#3D003D; text-align:right">Dispense Log</div>

            <div style="margin-top:30px">

                <div style="margin-bottom:10px">

                    <i class="fa fa-refresh ptr" style="color:#A800A8; font-size:15px; font-weight:200; margin-right:10px" onclick="refreshdrugusage()"></i> Refresh

                    <div style='margin-top:10px'>

                        <label>Dispense Date</label>

                        <input type='date' class='form-control' id='dispensedatesearch'>

                        <input type='button' value='Pull Dispense log' class='btn btn-success' style='width:100%; padding:4px' onclick="dispensedate(dispensedatesearch.value)">

                    </div>

                </div>

                <table class="table table-striped">

                    <thead>

                        <tr style="background-color:#E0E0E0"><td>SN</td><td>Drug</td><td title="Initial Quantity">IQty</td><td title="Quantity Dispensed" style='color:#E44A80'>QtyD</td><td title="Quantity Left">QtyL</td><td style='color:#0066CC'>Patient ID</td><td>Date Dispensed</td><td></td></tr>

                    </thead>

                    <tbody id="unitdrugslist">

<?php
$q = "select * from drugsusage where siteid='$siteid' order by DateTime Desc LIMIT 150";

//echo $q;

$w = mysql_query($q);

if (mysql_num_rows($w) < 1) {

    echo "<tr><td colspan='7'>No records</td></tr>";
}

$count = 1;

while ($d = mysql_fetch_array($w)) {

    $drugid = $d['DrugID'];

    $initialqty = $d['InitialQty'];

    $qtydispensed = $d['QtyDispensed'];

    $qtyleft = $d['QtyLeft'];

    $userid = $d['userid'];

    $datedispensed = $d['dispensedate'];
    $datelogged = $d['DateTime'];

    $patientname = $d['patientID'];



    //Get Staff name

    $sasa = mysql_query("select * from staff where id='$userid' or userid='$userid'");

    $qqw = mysql_fetch_array($sasa);



    $staffname = $qqw['lastname'] . " " . $qqw['firstname'] . " " . $qqw['middlename'];



    //Get drug name

    $qq = mysql_query("select * from drugstore where sn='$drugid'");

    $ww = mysql_fetch_array($qq);

    $drugname = $ww['drugname'];

    $drugcategory = $ww['category'];



    $qqqq = "select * from drugcategory where sn='$drugcategory'";

    $wwww = mysql_query($qqqq);

    $ee = mysql_fetch_array($wwww);



    $categorynameq = $ee['categoryname'];



    echo "<tr style='font-size:13px'><td><b>$count</b></td>"
    . "<td>$drugname ($categorynameq)</td>"
    . "<td>$initialqty</td>"
    . "<td style='color:#E44A80'>$qtydispensed</td>"
    . "<td>$qtyleft</td>"
    . "<td style='color:#0066CC'>$patientname</td>"
    . "<td>$datedispensed</td>"
    . "<td><i class='fa fa-user' title='$staffname - $datelogged '></i></td></tr>";

    ;

    $count++;
}
?>

                    </tbody>

                </table>



            </div>

        </div>

    </div>

    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

        <div style="font-size:13px">

            <div style="font-weight:600; color:#83358A; margin-bottom:30px">Requisition setting</div>

            <label style="font-weight:500">** When qty lft reaches or falls below M.R.O</label>

            <select class="form-control" style="font-size:12px">

                <option>Email procurement officer</option>

                <option>SMS procurement officer</option>

                <option>Do nothing</option>

            </select>

            <input type="button" value="Save" style="width:100%" onclick="alert('Your name please')">

        </div>

    </div>

</div>