<div id="invoicingmanager" style="display:none">
    <div class="col-md-2 col-sm-12 col-xs-12" style="margin-top:50px; padding-right:0px">
        <div style="font-size:20px; font-weight:500; margin-bottom:40px">
            INVOICING
        </div>
        <span style="max-width:200px">
            <div class="pm aavv ssmactive" onclick="pmClient('#clientcategory', '#addclient')" id="addclient">Invoicing</div>
        </span>
    </div>
    <div class="col-md-10 col-sm-12 col-xs-12" style="margin-top:20px; background-color:rgba(255,255,255,0.3); min-height:500px; margin-bottom:20px">
        <div class="col-md-4" style="min-height:400px; margin-top:10px; padding-left:0px">
            <div style="min-height:200px; margin-top:20px">
                <div style="font-size:20px; margin-bottom:15px">Checked In</div>
                <div style="font-size:20px; margin-bottom:15px">
                    <label style="font-size:13px; font-weight:600">Check In Date</label>
                    <input type="date" class="form-control" style="font-size:13px" id="checkindate">
                    <input type="button" class="btn btn-success" value="Pull log" style="padding:4px; border-radius:1px; font-size:12px; font-weight:400; width:100%" onclick="pullcheckinlogforinvoicing(checkindate.value)">
                </div>
                <hr style="border-style:dashed; border-color:#B700B7">
                <table class="table table-striped table-condensed">
                    <tr style="font-weight: bold"><td></td><td>Name</td><td>Contract</td><td>Plan</td><td></td></tr>
                    <tbody style="font-size:12px; max-height:100px; overflow-y:scroll" id="checkinlogforinvoicing">
                        <?php
                        $q = 'select * from checkinlog';
                        $w = mysql_query($q);
                        $count = 1;
                        while ($e = mysql_fetch_array($w)) {
                            $hospitalid = $e['hospitalid'];
                            echo "<tr><td>$count</td><td>$hospitalid</td><td>Hygeia</td><td>Gold</td><td><input type='button' class='btn btn-success' value='Select' style='padding:2px; font-size:11px'></td></tr>";
                            $count++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4" style="min-height:400px; margin-top:10px; padding-left:0px">
            <div style="background-color:#EBEBEB; min-height:400px; padding:10px">
                <div style="font-size:25px; font-weight:bold">Kayode Agbede</div>
                <div style="font-size:20px;">Hygeia - <span style="font-size:20px">Gold</span></div><hr style="border-color:#fff; border-style:dashed; border-width:thin">

                <div style="text-align: center">
                    <span style="color:#B700B7">New Visit <input type="radio" name="visittype" value ="New Visit" style="width:30px; padding:0px; margin:0px"></span> &nbsp; &nbsp; 
                    <span style="color:#B700B7">Follow-Up Visit &nbsp; <input type="radio" name="visittype" value ="follow-up"></span>
                </div>
                <?php
                $q = "Select * from billingservicecategory";
                $w = mysql_query($q);

                while ($e = mysql_fetch_array($w)) {
                    $servicename = $e['servicename'];

                    echo "<details class='detailsdropdown' style='margin-top:5px'>
                    <summary style='background-color:#B700B7; padding:5px; font-weight:500; color:#fff; cursor:pointer'>$servicename</summary>
                    <div style='padding:10px'>
                        <input type='checkbox' value='MP Widal'> MP Widal<br>
                        <input type='checkbox' value='FBG'> FBG<br>
                        <input type='checkbox' value='Hepatitis B'> Hepatitis B<br>
                    </div>
                </details>";
                }
                ?>
            </div>
        </div>
        <div class="col-md-4" style="min-height:400px; margin-top:10px">
            <div style="text-align:right"><i class="fa fa-print ptr" title="Print Receipt" style="font-size:14px; margin-bottom:10px"></i></div>
            <div style="border-style:dotted; border-color:#fff; border-width:thin; padding:20px; background-color:rgba(255,255,255,0.5)">
                <span style="font-size:25px">Kayode Agbede</span><br>
                <span>HMO - Hygeia</span><span>Plan - Gold</span>
                <hr>

                <table>
                    <tr><td></td><td></td><td></td></tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <span style="font-size:10px">InvoiceManagerModuleVersion ID:110816</span>
    </div>
</div>