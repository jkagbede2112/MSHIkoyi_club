<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="drugmanagement" style="position:relative; display:none">
    <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
        Drugs management
    </div>
    <span class="col-lg-12 col-md-12" style="text-align:right; padding-right:0px">
    </span>
    <hr style="border-color:#D4D4D4; border-style:dotted; margin-bottom: 40px">
    <select class="form-control" onchange="fetchdrugss(drugadder.value)" id="drugadder">
        <option>--Select Category--</option>
        <?php
        $a = "select * from drugcategory";
        $q = mysql_query($a);
        while ($z = mysql_fetch_array($q)){
            $sn = $z['sn'];
            $categoryname = $z['categoryname'];
            echo "<option value='$sn'>$categoryname</option>";
        }
        ?>
    </select>
    <div id='initialgragra' style='font-size:30px; text-align: center'>
        
    </div>
    <table class="table table-responsive table-striped table-bordered" style='margin-top:40px'>
        <thead>
            <tr style='font-weight:bold'><td>sn</td><td>Drug name</td><td></td></tr>
        </thead>
        <tbody id="drugstoaddhere">
            
        </tbody>
    </table>
</div>