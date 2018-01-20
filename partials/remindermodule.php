<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="remmanagement" style="position:relative; display:none">
    <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
        Reminder
    </div>
    <span class="col-lg-12 col-md-12" style="text-align:right; padding-right:0px">
    </span>
    <hr style="border-color:#D4D4D4; border-style:dotted; margin-bottom: 40px">
    <div id="dassR">
        <label>Remind note</label>
        <input type="text" class="form-control" id="sschedule">
        <label>Remind start date</label>
        <input type="datetime-local" class="form-control" id="addvendorcp">
        <label>Remind end date</label>
        <input type="datetime-local" class="form-control" id="addvendorcp">
        <label>Target staff</label>
        <select class="form-control">
            <option value='me'>Me</option>
            <option value='all'>Everybody</option>
            <?php
            $q = mysql_query("select * from staff order by lastname asc");

            while ($w = mysql_fetch_array($q)) {
                $staffname = $w['lastname'] . " " . $w['firstname'];
                $staffid = $w['id'];
                $department = $w['department'];

                $a = mysql_query("select departmentid from departments where id='$department'");
                $s = mysql_fetch_array($a);

                $id = $s['departmentid'];

                echo "<option value='$staffid'>$staffname ( $id )</option>";
            }
            ?>
        </select>
        <input type="button" value="Save reminder" class="btn btn-purplesource" onclick="addschedule(sschedule.value, sdate.value, sstarttime.value, sendtime.value)">
    </div>
    <div style="margin-top:30px">
        <div style="font-size:20px; color:#660066; margin-bottom:10px">Reminder</div>
        <table class="table table-striped table-bordered table-hover" style="font-size:12px">
            <tr style="font-weight:600; font-size:13px; color:#790079; background-color: #EEEEEE"><td>Note</td><td>Target Staff</td><td>Start</td><td>End</td></tr>
            <?php
            $x = mysql_query("select * from staffreminder where issuer='$staffid' or recipientid='$staffid'");
            if (mysql_num_rows($x) > 0) {
                while ($v = mysql_fetch_array($x)) {
                    $remindnote = $v['remindnote'];
                    $issuer = $v['issuer'];
                    $datetimeissuer = $v['datetimeissued'];

                    echo "<tr><td>$remindnote</td><td>$issuer</td><td>$datetimeissuer</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4' style='text-align:center'>No reminders</td></tr>";
            }
            ?>

        </table>
    </div>
</div>