
function getcategorylist() {
    $.post("dumbphp/addservice.php", {servicekind: 'pullcategorylist'}).done(function (data) {
        document.getElementById("servicecatlisting").innerHTML = data;
    });
}

function pullservicecharge(a) {
    if (a === '0') {
        alert('Plan does not exist');
    } else {
        alert(a);
    }
}

function pullplans(a) {
    $.post("dumbphp/pullplans.php", {client: a}).done(function (data) {
        document.getElementById("scplan").innerHTML = data;
    });
}

function addserviceelement(a, b) {
    $.post("dumbphp/addservice.php", {servicekind: 'serviceelement', servicecategory: a, serviceelement: b}).done(function (data) {
        alert(data);
    });
}

function addservicecategory(a, b) {
    $.post("dumbphp/addservice.php", {servicekind: 'category', servicevalue: a, servicedescription: b}).done(function (data) {
        document.getElementById("msscresponse").innerHTML = data;
        getcategorylist();
    });
}

function catmsge(a, b) {
    $(".xxcat").removeClass("actbreed");
    $(a).addClass("actbreed");

    $("#servicecattrisection").hide();
    $("#serviceeltrisection").hide();

    $(b).show();
}

function addbillingclientplan() {
    var clientname = document.getElementById("cpclient").value;
    var clientplan = document.getElementById("cpplan").value;
    $.post("dumbphp/addbillingcategory.php", {billingjob: 'savebillingplan', clientname: clientname, clientplan: clientplan}).done(function (data) {
        document.getElementById("addnewcpresponse").innerHTML = data;
    });
}

function pullcategory(a, b) {
    //alert(a);
    if (b === 1) {
        $.post("dumbphp/addbillingcategory.php", {billingjob: 'pullclient', categoryname: a}).done(function (data) {
            document.getElementById("cpclient").innerHTML = data;
        });
    }

    if (b === 2) {
        $.post("dumbphp/addbillingcategory.php", {billingjob: 'pullclient', categoryname: a}).done(function (data) {
            document.getElementById("scclient").innerHTML = data;
        });
    }

}

function addbillingclientcategory() {
    var planname = document.getElementById("pnclient").value;
    var clientname = document.getElementById("cnclient").value;
    var clientaddress = document.getElementById("caclient").value;
    var anchorname = document.getElementById("anclient").value;
    var anchorphone = document.getElementById("apclient").value;

    alert(planname + " " + clientname + " " + anchorphone);

    $.post("dumbphp/addnewclient.php", {planname: planname, clientname: clientname, clientaddress: clientaddress, anchorname: anchorname, anchorphone: anchorphone}).done(function (data) {
        alert(data);
    });
}

function addbillingcategory() {
    var planname = document.getElementById('acpn').value;
    var description = document.getElementById('acdescription').value;
    var billingjob = 'addnewcategory';

    $.post("dumbphp/addbillingcategory.php", {planname: planname, description: description, billingjob: billingjob}).done(function (data) {
        document.getElementById("addnewcatresponse").innerHTML = data;
    });
}

function refreshclientcategory() {
    var billingjob = 'refreshclientcategory';
    $.post("dumbphp/addbillingcategory.php", {billingjob: billingjob}).done(function (data) {
        document.getElementById('billingcategorypipu').innerHTML = data;
    });
}

function pullcheckinlogforinvoicing(a) {
    $.post("dumbphp/checkinlogforinvoicing.php", {selectdate: a}).done(function (data) {
        document.getElementById("checkinlogforinvoicing").innerHTML = data;
    });
}

setInterval(function () {
    pulltodaycheckin();
}, 30000);

function addclientnext(a) {

    $("#personalinformation").hide();
    $("#contactinformation").hide();
    $("#emergencyinformation").hide();
    $("#employerinformation").hide();
    $("#identificationinformation").hide();
    $("#insuranceinformation").hide();
    $("#markettingcommunication").hide();
    $("#socioeconomicstatus").hide();

    $(".cdcd").removeClass("actbreed");
    if (a === "personalinformation") {
        $("#pipatient").addClass("actbreed");
    }
    if (a === "contactinformation") {
        $("#cipatient").addClass("actbreed");
    }
    if (a === "emergencyinformation") {
        $("#epatient").addClass("actbreed");
    }
    if (a === "employerinformation") {
        $("#emppatient").addClass("actbreed");
    }
    if (a === "identificationinformation") {
        $("#ipatient").addClass("actbreed");
    }
    if (a === "insuranceinformation") {
        $("#inpatient").addClass("actbreed");
    }
    if (a === "socioeconomicstatus") {
        $("#sespatient").addClass("actbreed");
    }
    if (a === "markettingcommunication") {
        $("#mcpatient").addClass("actbreed");
    }

    $("#" + a).show();

}

function getcheckinclients(a, b) {
    $.post("dumbphp/getclientdata.php", {searchcriteria: a, searchvalue: b}).done(function (data) {
        document.getElementById("returnedfromdatabase").innerHTML = data;
    });
}

function pulltodaycheckin() {
    $.post("dumbphp/checkinsummary.php").done(function (data) {
        document.getElementById("checkinsummary").innerHTML = data;
    });
}

function getcurrentTime() {
    //alert(Date.now());
    todaysDate = new Date;
    thisHour = todaysDate.getHours();
    thisMinute = todaysDate.getMinutes();
    thisSecond = todaysDate.getSeconds();

    if (thisSecond < 10) {
        thisSecond = "0" + thisSecond;
    }

    if (thisMinute < 10) {
        thisMinute = "0" + thisMinute;
    }

    if (thisHour < 10) {
        thisHour = "0" + thisHour;
    }

    document.getElementById("nownowdate").innerHTML = thisHour + ":" + thisMinute + ":" + thisSecond;
}

function checkinpatient(a) {
    $.post("dumbphp/checkinpatient.php", {patientid: a}).done(function (data) {
        document.getElementById("checkinstat").innerHTML = data;
    });
}

function checkpatient(a) {

    document.getElementById("checkinstat").innerHTML = "";
    if (a.length < 1) {
        customNotification("Enter patient ID", "", 6000);
        return;
    }
    $.post("dumbphp/pullclientinformation.php", {patientid: a}).done(function (data) {

        document.getElementById("patienttocheckin").innerHTML = data;
    });
}

function msgeillnesscats(a) {
    var chronicill = "ci" + a;
    var chroniccontent = document.getElementById(chronicill).value;

    $.post('dumbphp/messagechronicillness.php', {content: chroniccontent, illnesscategory: a}).done(function (data) {
        console.log(data);
    });
}

function fetchid(a) {
    $.post("dumbphp/pullpatientinfo.php", {patientid: a}).done(function (data) {
        document.getElementById("clientinfot").innerHTML = data;
    });
}

function fetchdrugss(a) {
    document.getElementById("initialgragra").innerHTML = "Processing request.. Please wait..";
    $.post("dumbphp/getdrugsnotinstore.php", {drugcat: a}).done(function (data) {
        document.getElementById("drugstoaddhere").innerHTML = data;
        document.getElementById("initialgragra").innerHTML = "";
    });
}

function addtotable(a) {
    alert(a);
    $.post("dumbphp/adddrugtostore.php", {drugid: a}).done(function (data) {
        alert(data);
    });
}

function refreshdrugusage() {
    $.post('dumbphp/pulldrugusage.php').done(function (data) {
        document.getElementById('unitdrugslist').innerHTML = data;
    });
}

function resetancform() {
    document.getElementById('patname').value = "";
    document.getElementById('patdob').value = "";
    document.getElementById('patemail').value = "";
    document.getElementById('patphone').value = "";
    document.getElementById('patlmp').value = "";
    document.getElementById('patha').value = "";
}

function getancwomen() {
    $.post("dumbphp/getpregnantwomen.php").done(function (data) {
        document.getElementById("ancsmstable").innerHTML = data;
    });
}

function csreport(q, w) {
    $(".ccra").removeClass("ssmactive");
    $(q).addClass("ssmactive");

    $("#ccreportx").hide();
    $("#clientsurveytx").hide();

    $(w).show();
}

function manageclient(a, b) {
    $(".cdc").removeClass("actbreed");
    $(a).addClass("actbreed");

    $("#regsurveyclient").hide();
    $("#mansurveyclientS").hide();

    $(b).show();
}

function surveyclient(a, s, d, f, g) {
//    alert (a + " " + s + " " + d + " " + f + " " + g);
    $.post("dumbphp/addpatientsurvey.php", {clientname: a, clientdob: s, clientphone: d, clientservicerating: f, clientreason: g}).done(function (data) {

        if (data === "1") {
            alert("Saved");
            document.getElementById("cltname").value = "";
            document.getElementById("cltdob").value = "";
            document.getElementById("cltphone").value = "";
            document.getElementById("cltlos").value = "";
            document.getElementById("cltrr").value = "";
        } else {
            alert("Not Saved.. One or more fields have not been properly filled");
        }
    });
}

/*
 function addillclient(a, s, d, f, g, h, i, j) {
 $.post("dumbphp/addillclient.php", {clientname: a, clientphone: s, clientemail: d, clientgender: f, clientdob: g, clientillcategory: h, clienttype: i, clientaddress: j}).done(function (data) {
 alert(data);
 });
 }
 */

function addclient(a, b, c, d, e, f, g, h, i) {
    alert(a + " " + b + " " + c + " " + d + " " + e + " " + f + " " + g + " " + h + " " + i);
    if (a.length < 2) {
        alert("Hospital ID is mandatory");
        return;
    }
    $.post("dumbphp/addclient.php", {hospitalid: a, clientfirstname: b, clientothername: c, clientlastname: d, clientdob: e, clientgender: f, clientphone: g, clientemailaddress: h, clientaddress: i}).done(function (data) {
        alert(data);
    });
}

function addillnesscategory(a, b) {
    $.post("dumbphp/addillnesscategory.php", {catname: a, catdesc: b}).done(function (data) {
        if (data === "saved") {
            alert("Saved");
            document.getElementById("adcatname").value = "";
            document.getElementById("adcatdesc").value = "";
        } else {
            alert("Not Saved");
        }
    });
}

function deactivatepreg(a) {
    $.post("dumbphp/actdeact.php", {type: "0", pregid: a}).done(function (data) {
        alert(data);
    });
}

function activatepreg(a) {
    $.post("dumbphp/actdeact.php", {type: "1", pregid: a}).done(function (data) {
        alert(data);
    });
}

function addSMS(a, b) {

}

function delpregrequest(a) {
    document.getElementById("myModeLabel").innerHTML = "Delete client";
    document.getElementById("myModebody").innerHTML = "<label>Patient name</label><div id='delatname' style='font-size:20px'>Joseph Kayode Agbede</div><br><label>Date Of Birth</label><div id='delatdob' style='font-size:20px'>20th December 2016</div><br><label>Last Menstrual Period</label><div id='delatlmp' style='font-size:20px'>10/09/2016</div><br><label>Phone Number</label><div id='delatpn' style='font-size:20px'>07055518205</div><br>" +
            "<input type='button' value='Delete Client' class='btn btn-warning' onclick='deletePat(" + a + ")'>";
    deletethis(a, "pregnantwomen");
}

function deletethis(a, b) {
    $.post("dumbphp/getdetailsforupdate.php", {clientid: a, dbtable: b}).done(function (data) {
        var div = document.createElement("DIV");
        var content = data;
        div.innerHTML = content;

        var name = div.getElementsByTagName('a')[0].innerText;
        var dateofbirth = div.getElementsByTagName('b')[0].innerText;
        var emailaddress = div.getElementsByTagName('c')[0].innerText;
        var phonenumber = div.getElementsByTagName('d')[0].innerText;
        var lastmenstrualperiod = div.getElementsByTagName('e')[0].innerText;
        var homeaddress = div.getElementsByTagName('f')[0].innerText;
        var status = div.getElementsByTagName('g')[0].innerText;

        document.getElementById("delatname").value = name;
        document.getElementById("delatdob").value = dateofbirth;
        document.getElementById("delatlmp").value = lastmenstrualperiod;
        document.getElementById("delatpn").value = phonenumber;
    });
}

function getpregdets(a) {
    document.getElementById("myModeLabel").innerHTML = "Update client information";
    document.getElementById("myModebody").innerHTML = "<label>Patient name</label><input type='text' class='form-control' id='upatname'><label>Date Of Birth</label><input type='date' class='form-control' id='upatdob'><label>Email Address</label><input type='email' class='form-control' id='upatemail'><label>Phone Number</label><input type='number' class='form-control' id='upatphone'><label>Last Menstrual Period</label><input type='date' class='form-control' id='upatlmp'><label>Home address</label><input type='text' class='form-control' id='upatha'><label>Status</label><select class='form-control' id='upatstatus'>" +
            "<option>--Select--</option>" +
            "<option value='1'>Activate</option>" +
            "<option value='0'>De-Activate</option>" +
            "</select><input type='button' value='Update details' class='btn btn-success' onclick='updatePat(upatname.value, upatdob.value, upatemail.value, upatphone.value, upatlmp.value, upatha.value, upatstatus.value," + a + ")'>";
    loadupdatedetails(a, "pregnantwomen");
}

function deliverclient(a) {
    document.getElementById("myModeLabel").innerHTML = "Update ANC status";
    document.getElementById("myModebody").innerHTML = "<label>Patient name</label><input type='text' class='form-control' id='upatname'><label>Date Of Birth</label><input type='date' class='form-control' id='upatdob'><label>Email Address</label><input type='email' class='form-control' id='upatemail'><label>Phone Number</label><input type='number' class='form-control' id='upatphone'><label>Delivery date</label>" +
            "<input type='date' class='form-control' id='deliverydd'><input type='button' value='Update status' class='btn btn-success' onclick='updateANCPat(deliverydd.value, " + a + ")'>";
    loadupdatedetails(a, "pregnantwomen");
}

function updateANCPat(a, b) {
    $.post("dumbphp/updateancstatus.php", {deliverydate: a, clientid: b}).done(function (data) {
        alert(data);
    });
}

function updatePat(a, b, c, d, e, f, g, h) {

    $.post("dumbphp/updateancinfo.php", {patname: a, patdob: b, patemail: c, patphonenumber: d, patlmp: e, pathomeaddress: f, patstatus: g, patpregid: h}).done(function (data) {
        alert(data);
    });
}

function loadupdatedetails(a, b) {
    $.post("dumbphp/getdetailsforupdate.php", {clientid: a, dbtable: b}).done(function (data) {
        var div = document.createElement("DIV");
        var content = data;
        div.innerHTML = content;

        var name = div.getElementsByTagName('a')[0].innerText;
        var dateofbirth = div.getElementsByTagName('b')[0].innerText;
        var emailaddress = div.getElementsByTagName('c')[0].innerText;
        var phonenumber = div.getElementsByTagName('d')[0].innerText;
        var lastmenstrualperiod = div.getElementsByTagName('e')[0].innerText;
        var homeaddress = div.getElementsByTagName('f')[0].innerText;
        var status = div.getElementsByTagName('g')[0].innerText;

        document.getElementById("upatname").value = name;
        document.getElementById("upatdob").value = dateofbirth;
        document.getElementById("upatemail").value = emailaddress;
        document.getElementById("upatphone").value = phonenumber;
        document.getElementById("upatlmp").value = lastmenstrualperiod;
        document.getElementById("upatha").value = homeaddress;
        document.getElementById("upatstatus").value = status;
    });
}

function changecardate(a) {
    //alert(a);
    $.post("dumbphp/pullcarschedules.php", {searchdate: a}).done(function (data) {
        document.getElementById("carpooldets").innerHTML = data;
        document.getElementById("querydate").innerHTML = a + " result";
    });
}

function requestcaruse(a, b, c, d, e) {

    $.post("dumbphp/requestcaruse.php", {cardestination: a, carpurposeoftravel: b, cardateWtime: c, carduration: d, carfreight: e}).done(function (data) {
        console.log(data);
    });
}

function pregmsges(a, b) {
    $(".xx").removeClass("actbreed");
    $(a).addClass("actbreed");

    $("#pregnancysection").hide();
    $("#postpregnancysection").hide();

    $(b).show();

}

function catmsges(a, b) {
    $(".xxc").removeClass("actbreed");
    $(a).addClass("actbreed");

    $("#firsttrisection").hide();
    $("#secondtrisection").hide();
    $("#thirdtrisection").hide();
    $("#fourthtrisection").hide();

    $(b).show();
}

function manageancclient(a, b) {
    $(".cdcd").removeClass("actbreed");
    $(a).addClass("actbreed");

    $("#regancclient").hide();
    $("#manancclient").hide();

    $(b).show();
}

function msgclient(a) {

    $.post("dumbphp/msgclient.php", {clientid: a}).done(function (data) {
        console.log(data);
    });
}

function regPat(a, b, c, d, e, f, g) {
    var patname = a;
    var patdob = b;
    var patemail = c;
    var patphone = d;
    var patlmp = e;
    var pathomeaddress = f;
    var patstatus = g;

    $.post("dumbphp/addpregnantclient.php", {patname: patname, patdob: patdob, patemail: patemail, patphone: patphone, patlmp: patlmp, pathomeaddress: pathomeaddress, patstatus: patstatus}).done(function (data) {
        alert(data);
    });

}

function updatemodal(a, b, c) {
    var smstoupdate = a;
    var weekgone = b;

    document.getElementById("myModeLabel").innerHTML = c;
    document.getElementById("myModebody").innerHTML = "<div style='margin-bottom:20px; font-size:30px; text-align:center' id='smsweek'>" + weekgone + "</div><label>SMS</label><textarea class='form-control' maxlength='320' rows='3' onkeypress='countcontent()' id='weeklysmsbox'>" + smstoupdate + "</textarea><input type='button' value='Update SMS' class='btn btn-success' onclick='updatesms()'><span id='textcount' style='font-size:13px; margin-left:10px'></span>";
}

function updatesms(a, f) {
    var smstype = document.getElementById("myModeLabel").innerHTML;
    var smsweek = document.getElementById("smsweek").innerHTML;
    var sms = document.getElementById("weeklysmsbox").value;

    $.post("dumbphp/updatesms.php", {smstype: smstype, smsweek: smsweek, sms: sms}).done(function (data) {
        alert(data);
    });
}

function countcontent() {
    var count = document.getElementById("weeklysmsbox").value;
    var countt = count.length;
    if (countt > 140) {
        document.getElementById("textcount").innerHTML = "<span style='color:#ff0000'>" + countt + "</span>";
    } else {
        document.getElementById("textcount").innerHTML = countt;
    }

}

function ccreport(q, w) {
    $(".ccr").removeClass("ssmactive");
    $(q).addClass("ssmactive");

    $("#ancregister").hide();
    $("#anccategorization").hide();
    $("#smsregister").hide();

    $(w).show();
}

function ancpreg(q, w) {
    $(".ssm").removeClass("ssmactive");
    $(q).addClass("ssmactive");

    $("#ancregister").hide();
    $("#anccategorization").hide();
    $("#smsregister").hide();

    $(w).show();
}

function logoff() {

}

function getfields(q, w, e) {
    document.getElementById("searchedvalues").innerHTML = "<i class='fa fa-spinner fa-pulse'></i> Please wait..";
    $.post("dumbphp/frontdeskdetails.php", {searchcriteria: q, searchvalue: w, companyname: e}).done(function (data) {
        $("#allclients").hide();
        document.getElementById("searchedvalues").innerHTML = data;
    });
}

function dispenseitem() {
    var druggyrequiredqty = document.getElementById("druggyrequiredqty").value;
    var patientname = document.getElementById("patnamedrug").value;
    var drugsincatt = document.getElementById("drugsincatt").value;
    var patientid = document.getElementById("patnamedrug").value;

    if (patientid.length < 1) {
        alert("Patient ID not entered");
        return;
    }

    if (patientname.length < 1) {
        alert("Patient name not entered");
        return;
    }
    if (drugsincatt.length < 1) {
        alert("Drug not selected");
        return;
    }
    if (druggyrequiredqty.length < 1) {
        alert("Dispense quantity missing");
        return;
    }

    var itemcount = document.getElementById("itemcount").innerHTML;

    if (parseInt(druggyrequiredqty) > parseInt(itemcount)) {
        document.getElementById("serverreplieshere").innerHTML = "Item left cannot support this request";
        return;
    }

    var drugcategory = document.getElementById("drugcattt").value;
    var drugsincatt = document.getElementById("drugsincatt").value;
    var quantityrequested = document.getElementById("druggyrequiredqty").value;

    $.post("dumbphp/itemdispensary.php", {drugcategory: drugcategory, patientid: patientid, patientname: patientname, drugsincatt: drugsincatt, quantityrequested: quantityrequested}).done(function (data) {
        document.getElementById("serverreplieshere").innerHTML = data;
    });
    refreshdrugusage();
}

function checkexergerration() {
    var itemcount = document.getElementById("itemcount").innerHTML;
    var druggyrequiredqty = document.getElementById("druggyrequiredqty").value;

    if (parseInt(druggyrequiredqty) > parseInt(itemcount)) {
        document.getElementById("serverreplieshere").innerHTML = "Item left cannot support this request";
        return;
    }
}

function selectDrugname() {
    var categoryvalue = document.getElementById("drugcattt").value;
    var drugnamevalue = document.getElementById("drugsincatt").value;
    var category = document.getElementById("drugcattt").options[document.getElementById("drugcattt").selectedIndex ].text;
    var drugname = document.getElementById("drugsincatt").options[document.getElementById("drugsincatt").selectedIndex ].text;

    document.getElementById("drugnamej").innerHTML = "<div style='font-size:40px; color:#3D003D'>" + drugname + "<span style='font-size:18px; color:#E10E6C'> ( " + category + " )</span></div><div style='font-size:55px; text-align:center' id='itemcount'></div>";

    $.post("dumbphp/pullleftovers.php", {drugname: drugnamevalue}).done(function (data) {
        document.getElementById("itemcount").innerHTML = data;
    });
}

function selforunit() {
    var a = document.getElementById("drugcattt").value;

    $.post("dumbphp/pulldrugsincat.php", {drugcategory: a}).done(function (data) {
        document.getElementById("drugsincatt").innerHTML = data;
    });
}

function isNumeric(num) {
    return !isNaN(num);
}

function ResDinC(a, s, d, f, g) {
    var unitname = _v("unitname").innerHTML;
    document.getElementById("myModalLabel").innerHTML = "<span style='color:#3D003D'>Restock item</span>";
    document.getElementById("myModalbody").innerHTML = "<div style='position:relative'><img src='images/pills.png' style='position:absolute; right:0px; bottom:0px; z-index:1; width:200px'><div style='color:#9B009B; font-weight:500'>Drug name</div><span class='stylerestock' id='drugnameT'>Paracetamol 600mg</span>" +
            "&nbsp; ( <span style='font-weight:500' id='drugcatT'>Tablet</span> )" +
            "<div style='color:#9B009B; font-weight:500; margin-top:15px; display:block'>Unit</div><div class='stylerestock' id='drugUnitT'>Borno-Way</div>" +
            "<span style='color:#9B009B; font-weight:500'>Required Quantity</span><div class='stylerestock' id='reqqtyT'>Borno-Way</div>" +
            "<span style='color:#9B009B; font-weight:500'>Restock Quantity</span><input type='text' class='form-control' style='z-index:2' id='addValuesT' onchange='checkthings()'>" +
            "<input type='button' value='Re-stock item' class='btn btn-success' id='purchaseditems' onclick='logthings(\"" + d + '\",\"' + unitname + "\")'><span id='serverresponse' style='margin-left:5px; color:#9B009B; font-size:12px'></span></div>";

    setTimeout(function () {
        placeelements(a, s, unitname, f, g);
    }, 200);
}

function logthings(d, unitname) {
    var reqqtyT = _v("reqqtyT").innerHTML;
    var addValuesT = _v("addValuesT").value;

    if (addValuesT.length < 1) {
        _v("serverresponse").innerHTML = "You have not entered value";
        return;
    }

    if (isNumeric(addValuesT)) {
        _v("serverresponse").innerHTML = "";
        var drugid = d;
        if (parseInt(addValuesT) < parseInt(reqqtyT)) {
            _v("serverresponse").innerHTML = "<span style='color:red'>Value is lower than required.</span>";
        } else {
            _v("serverresponse").innerHTML = "<span></span>"; //Why is this script misbehaving??
        }

        $.post("dumbphp/restockdrugs.php", {drugid: drugid, qty: addValuesT, database: unitname}).done(function (data) {
            _v("serverresponse").innerHTML = data;
        });

    } else {
        _v("serverresponse").innerHTML = "<span style='color:red'>Restock quantity entered is not a number</span>";
        _v("addValuesT").value = "";
        return;
    }


    var enteredval = _v("purchaseditems").value;
}

function checkthings() {
    var addValuesT = _v("addValuesT").value;
    var reqqtyT = _v("reqqtyT").innerHTML;

    if (isNumeric(addValuesT)) {
        _v("serverresponse").innerHTML = "";

        if (addValuesT < reqqtyT) {
            _v("serverresponse").innerHTML = "<span style='color:red'>Value is lower than required.</span>";
        } else {
            _v("serverresponse").innerHTML = "<span></span>"; //Why is this script misbehaving??
        }
    } else {
        _v("serverresponse").innerHTML = "<span style='color:red'>Restock quantity entered is not a number</span>";
        return;
    }
}

function placeelements(a, s, d, f, g) {
    _v("drugnameT").innerHTML = a;
    _v("drugcatT").innerHTML = s;
    _v("drugUnitT").innerHTML = d;
    _v("reqqtyT").innerHTML = g;
}


function printDiv(divName) {
    var unitname = _v("unitname").innerHTML;
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = "<br/><div style='font-size:25px; margin-bottom:20px; margin-top:20px'>Drugs at " + unitname + " unit</div>" + printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

function loadsiteinfo(d) {
    _v("unitnamea").innerHTML = d;
    $.post("dumbphp/loadsiteinfo.php", {siteid: d}).done(function (data) {
        document.getElementById("tablehodingvalues").innerHTML = data;
    });
    if (d === "") {
        $("#dadada").hide();
    } else {
        $("#dadada").show();
    }
}

function addnewdrugs() {
    var unitname = _v("unitname").innerHTML;
    document.getElementById("myModalLabel").innerHTML = "<span style='color:#3D003D'>Add new drugs (" + unitname + ")</span>";
    document.getElementById("myModalbody").innerHTML = "<span>Drug category</span><select class='form-control' style='margin-top:5px; margin-bottom:20px' id='ADdrugcategoryq'></select>" +
            "<span>Drug name</span><input type='text' class='form-control' placeholder='Drug name' style='margin-top:5px' id='ADdrugnameq'>" +
            "<span>Required Qty</span><input type='text' class='form-control' placeholder='Required Quantity' style='margin-top:5px' id='ADrequiredqtyq'>" +
            "<span>Minimum Re-Order Level</span><input type='text' class='form-control' placeholder='M.R.O' style='margin-top:5px' id='ADmroq'>" +
            "<input type='button' value='Add new drug' class='btn btn-success' onclick='addDrug(ADdrugcategoryq.value, ADdrugnameq.value, ADrequiredqtyq.value, ADmroq.value)'>" +
            "<input type='button' value='Reset' class='btn btn-danger' style='margin-left:5px'>";
}

function deldrug(g) {
    var unitname = _v("unitname").innerHTML;
    var drugid = g;

    $.post("dumbphp/deletedrug.php", {unitname: unitname, drugid: drugid}).done(function (data) {
        hidebar();
        customNotification(data, "", 5000);
    });
}

function updatedrugqtyinfo(a, b, c) {
    $.post("dumbphp/updatedrugspersite.php", {reqQty: a, mro: b, qtyleft: c}).done(function (data) {
        _v("serverReturnString").innerHTML = data;
    });
}

function updatedruginfo(a, b, c, d) {

    var unity = document.getElementById("unitname").innerHTML;
    $("#myModalLabel").html("<span style='color:#6A006A'>Update " + a + " " + b + " in " + unity + "</span>");
    $("#myModalbody").html("" +
            "<i id='dbnameq' style='display:nonE'></i>" +
            "<label class='mten'>Drug name</label>" +
            "<input type='text' value='' class='form-control' id='druggyname' disabled>" +
            "<label class='mten'>Required Qty</label>" +
            "<input type='text' class='form-control m10'  id='druggyrequiredqty'>" +
            "<label class='mten'>Quantity in store</label>" +
            "<input type='text' class='form-control m10'  id='druggyqtyleft'>" +
            "<label class='mten'>Minimum Re-Order Level</label>" +
            "<input type='text' class='form-control m10' id='druggyminimumreorderlevel'>" +
            "<input type='button' value='Update Drug Info' class='btn btn-purplesource mten' onclick='updatedrugqtyinfo(druggyrequiredqty.value,druggyminimumreorderlevel.value,druggyqtyleft.value)'>" +
            "<input type='button' value='Reset' class='btn btn-warning mten' style='margin-left:10px; margin-right:10px'><span id='serverReturnString'></span>");
    $.post("dumbphp/getdrugstoupdate.php", {drugid: c, tabletocheck: d}).done(function (data) {
        var div = document.createElement("div");
        div.innerHTML = data;

        var requiredqty = div.getElementsByTagName("a")[0].innerText;
        var minimumreorderlevel = div.getElementsByTagName("s")[0].innerText;
        var drugname = div.getElementsByTagName("d")[0].innerText;
        var dbname = div.getElementsByTagName("f")[0].innerText;
        var qtyleft = div.getElementsByTagName("g")[0].innerText;

        setTimeout(function () {
            populatefields(requiredqty, minimumreorderlevel, drugname, dbname, qtyleft);
        }, 500);

    });
}

function populatefields(qty, mro, dn, dbname, qtyleft) {
    console.log(qty + " - " + mro + " - " + dn);
    document.getElementById("druggyname").value = dn;
    document.getElementById("druggyrequiredqty").value = qty;
    document.getElementById("druggyminimumreorderlevel").value = mro;
    document.getElementById("dbnameq").innerHTML = dbname;
    document.getElementById("druggyqtyleft").value = qtyleft;
}

function DelDinC(d, c, g) {
    var unitname = _v("unitname").innerHTML;
    customNotification("You want to delete <b>" + d + "</b> in <b>" + c + "</b> category for " + unitname + " ?", "<span class='btn btn-success' style='margin-right:5px' onclick='deldrug(\"" + g + "\")'>Yes</span><span class='btn btn-warning' onclick='hidebar()'>No</span>", 10000);
}

function checkvalidity(a) {
    $.post("dumbphp/verifypassword.php", {password: a}).done(function (data) {
        if (data === "1") {
            $("#oldpass").removeClass("thumbsup");
            $("#oldpass").removeClass("thumbsdown");
            $("#oldpass").addClass("thumbsup");
        } else {
            $("#oldpass").removeClass("thumbsup");
            $("#oldpass").removeClass("thumbsdown");
            $("#oldpass").addClass("thumbsdown");
        }
    });
}

function newpassword(a) {
    if (a.length >= 5) {
        $("#newpass").removeClass("thumbsup");
        $("#newpass").removeClass("thumbsdown");
        $("#newpass").addClass("thumbsup");
    } else {
        $("#newpass").removeClass("thumbsup");
        $("#newpass").removeClass("thumbsdown");
        $("#newpass").addClass("thumbsdown");
    }
    var newtwo = document.getElementById("newpass2").value;
    verifypass(newtwo);
}

function verifypass(a) {
    if (newpass.value === a) {
        $("#newpass2").removeClass("thumbsup");
        $("#newpass2").removeClass("thumbsdown");
        $("#newpass2").addClass("thumbsup");
    } else {
        $("#newpass2").removeClass("thumbsup");
        $("#newpass2").removeClass("thumbsdown");
        $("#newpass2").addClass("thumbsdown");
    }
}

function changepassword(a, s, d) {
    if (s.length < 5) {
        customNotification("Password too short", "", 6000);
        return;
    }
    if (s !== d) {
        customNotification("Passwords dont match", "", 6000);
        return;
    }
    $.post("dumbphp/changepassword.php", {oldpass: a, newpass: s, newpass2: d}).done(function (data) {
        customNotification(data, "", 6000);
    });
}

function mailvendor(a, b) {
    $.post("dumbphp/mailvendors.php", {vendorid: a, sitename: b}).done(function (data) {
        customNotification(data, "", 10000);
    });
}

function login(a, d) {
    $.post("dumbphp/loginuser.php", {username: a, password: d}).done(function (data) {
        if (data === "1") {
            customNotification("This user does not exist", "", 5000);

        } else {
            gotoURL(data);
        }
    });
}

function gotoURL(a) {
    location.href = "../PurpleSourceHMS/" + a;
}

function refreshdrugcat() {
    $.post("dumbphp/refreshdrugcat.php").done(function (data) {
        document.getElementById("catgrouping").innerHTML = data;
    });
}

function addCat(a) {
    $.post("dumbphp/addcategory.php", {catname: a}).done(function (data) {
        customNotification(data, "", 5000);
        refreshdrugcat();
    });
}

function deletecategory(s, a) {
    hidebar();
    customNotification("Are you sure you want to delete drug category <b>" + a + "?</b>", "<span class='btn btn-success' onclick=\"delcat('" + s + "')\">Yes</span><span class='btn btn-warning' style='margin-left:5px' onclick='hidebar()'>No</span>", 5000);
}

function delcat(s) {
    $.post("dumbphp/deletecategory.php", {sn: s}).done(function (data) {
        refreshdrugcat();
        hidebar();
    });
}

function addschedule(q, w, e, r) {
    alert(q + " " + w + " " + e + " " + r);
    if (q.length < 1 || w.length < 1 || e.length < 1 || r.length < 1) {
        customNotification("One or more fields empty for schedules", "", 10000);
        return;
    }

    if (e > r) {
        customNotification("Start time cadnnot be after end time", "", 5000);
    } else {
        $.post("dumbphp/doschedule.php", {schedule: q, datte: w, starttime: e, endtime: r}).done(function (data) {
            customNotification(data, "", 5000);
        });
    }
}

function dispensedate(s) {
    $.post("dumbphp/pulldispensedatelog.php", {selectdate: s}).done(function (data) {
        document.getElementById("unitdrugslist").innerHTML = data;
        console.log(data);
    });
}

function updatecategoryrecord(f) {

}

function showopt(a, s) {
    $(".sicopt").removeClass("ssmactive");
    $(s).addClass("ssmactive");

    $("#overview").hide();
    $("#dispensary").hide();
    $(a).show();

}

function pullUnit(a, s) {
    document.getElementById("unitname").innerHTML = a;
    document.getElementById("unitdrugslist").innerHTML = "<tr style='font-size:25px; text-align:center'><td colspan='8'>Loading drugs for " + a + ", Please wait...</td></tr>";

    $(".spm").removeClass("ssmactive");
    $(s).addClass("ssmactive");

    $.post("dumbphp/pullunit.php", {unitname: a}).done(function (data) {
        document.getElementById("unitdrugslist").innerHTML = data;
    });

    $(s).show();
}

function deleteadmin() {
    customNotification("This category has more than 0 items.", "<b style='color:#D900D9; font-size:11px'>Contact Admin!</b>", 5000);
}

function addDrug(w, q, v, b) {
    if (w.length < 1 || q.length < 1 || v.length < 1 || b.length < 1) {
        customNotification("Fill all fields", "", 2000);
        return;
    } else {
        $.post("dumbphp/adddrugs.php", {category: w, name: q, ADrequiredqty: v, mro: b}).done(function (data) {
            customNotification(data, "", 9000);
            refreshdrugs();
        });
    }
}

function refreshdrugs() {
    $.post("dumbphp/refreshdrugs.php").done(function (data) {
        document.getElementById("drugslist").innerHTML = data;

    });
}

function refreshvendordropdown() {
    $.post("dumbphp/pullvendorcombo.php").done(function (data) {
        document.getElementById("coydropdown").innerHTML = data;
    });
}

function getVenValues() {
    $.post("dumbphp/getVen.php").done(function (data) {
        document.getElementById("clientdets").innerHTML = data;
    });
}

function customNotification(msg, btn, timemilli) {
    $("#popUpcu").show(100);
    _v("messagehere").innerHTML = msg;
    _v("buttonshere").innerHTML = btn;
    timeoutNotification(timemilli);
}

function timeoutNotification(timeinmilli) {
    var we = setTimeout("hidebar()", timeinmilli);
}

function hidebar() {
    $("#popUpcu").hide(100);
}

function updatevendorinfo() {
    var venname = document.getElementById("venName").value;
    var vencontactName = document.getElementById("vencontactName").value;
    var venContactPhone = document.getElementById("venContactPhone").value;
    var venEmailAddress = document.getElementById("venEmailAddress").value;
    var venOfficeAddress = document.getElementById("venOfficeAddress").value;
    var clientsn = document.getElementById("clientID").innerHTML;

    $.post("dumbphp/updatevendor.php", {venname: venname, venClientType: vencontactName, venContactPhone: venContactPhone, venEmailAddress: venEmailAddress, venOfficeAddress: venOfficeAddress, clientsn: clientsn}).done(function (data) {
        if (data === "0") {
            customNotification("Complete fields", "", 5000);
        } else {
            refreshvendordropdown();
            getVenValues();
            customNotification(data, "", 5000);
        }
    });
}

function updateclientinfo() {
    var coyname = document.getElementById("coyName").value;
    var coyClientType = document.getElementById("coyClientType").value;
    var coyContactPhone = document.getElementById("coyContactPhone").value;
    var coyEmailAddress = document.getElementById("coyEmailAddress").value;
    var coyOfficeAddress = document.getElementById("coyOfficeAddress").value;
    var clientsn = document.getElementById("clientID").innerHTML;

    $.post("dumbphp/updateclient.php", {coyname: coyname, coyClientType: coyClientType, coyContactPhone: coyContactPhone, coyEmailAddress: coyEmailAddress, coyOfficeAddress: coyOfficeAddress, clientsn: clientsn}).done(function (data) {
        console.log(data);
    });
}

function pullvendorinfo(d) {
    document.getElementById("clientID").innerHTML = d;
    $.post("dumbphp/pullvendorinfo.php", {ding: d}).done(function (data) {
        console.log(data);

        var content = data;
        var div = document.createElement("div");
        div.innerHTML = content;

        var Cname = div.getElementsByTagName('z')[0].innerText;
        var clienttype = div.getElementsByTagName("x")[0].innerText;
        var phone = div.getElementsByTagName("m")[0].innerText;
        var emailaddress = div.getElementsByTagName("n")[0].innerText;
        var officeaddress = div.getElementsByTagName("v")[0].innerText;

        console.log(clienttype);

        //document.getElementById("coyVendorType").value = clienttype;

        document.getElementById("venName").value = Cname;
        document.getElementById("vencontactName").value = clienttype
        document.getElementById("venContactPhone").value = phone;
        document.getElementById("venEmailAddress").value = emailaddress;
        document.getElementById("venOfficeAddress").value = officeaddress;

        //document.getElementById("coydropdown").innerHTML = data;
    });
}

function pullclientinfo(d) {
    document.getElementById("clientID").innerHTML = d;
    $.post("dumbphp/pullclientinfo.php", {ding: d}).done(function (data) {
        console.log(data);

        var content = data;
        var div = document.createElement("div");
        div.innerHTML = content;

        var Cname = div.getElementsByTagName('z')[0].innerText;
        var clienttype = div.getElementsByTagName("x")[0].innerText;
        var phone = div.getElementsByTagName("m")[0].innerText;
        var emailaddress = div.getElementsByTagName("n")[0].innerText;
        var officeaddress = div.getElementsByTagName("v")[0].innerText;

        console.log(clienttype);

        document.getElementById("coyClientType").value = clienttype;

        document.getElementById("coyName").value = Cname;
        document.getElementById("coyContactPhone").value = phone;
        document.getElementById("coyEmailAddress").value = emailaddress;
        document.getElementById("coyOfficeAddress").value = officeaddress;

        //document.getElementById("coydropdown").innerHTML = data;
    });
}

function refreshcoydropdown() {
    $.post("dumbphp/refreshcoy.php").done(function (data) {
        document.getElementById("coydropdown").innerHTML = data;
    });
}

function getComValues() {
    $.post("dumbphp/getCoy.php").done(function (data) {
        document.getElementById("clientdets").innerHTML = data;
    });
}

function _v(e) {
    return document.getElementById(e);
}

function addvendordetails() {
    var vendorname = document.getElementById("addvendorvn").value;
    var contactperson = document.getElementById("addvendorcp").value;
    var phonenumber = document.getElementById("addvendorcpn").value;
    var emailaddress = document.getElementById("addvendorea").value;
    var officeaddress = document.getElementById("addvendoroa").value;

    if (vendorname.length < 1 || contactperson.length < 1 || phonenumber.length < 1 || emailaddress.length < 1 || officeaddress.length < 1) {

        customNotification("All fields need to be properly filled", "", 5000);
        return;
    }

    $.post("dumbphp/newvendor.php", {vendorname: vendorname, contactperson: contactperson, phonenumber: phonenumber, emailaddress: emailaddress, officeaddress: officeaddress}).done(function (data) {
        customNotification(data, "", 5000);
        if (data === "Saved") {
            document.getElementById("addvendorvn").value = "";
            document.getElementById("addvendorcp").value = "";
            document.getElementById("addvendorcpn").value = "";
            document.getElementById("addvendorea").value = "";
            document.getElementById("addvendoroa").value = "";
        }
    });
}

function addclientdetails() {
    var clientname = addclientcn.value;
    var clienttype = addclientct.value;
    var phonenumber = addclientcpn.value;
    var emailaddress = addclientea.value;
    var officeaddress = addclientoa.value;

    if (clientname.length < 1 || clienttype.length < 1 || phonenumber.length < 1 || emailaddress.length < 1 || officeaddress.length < 1) {
        alert("All fields need to be properly filled in");
        return;
    }

    $.post("dumbphp/newclient.php", {clientname: clientname, clienttype: clienttype, phonenumber: phonenumber, emailaddress: emailaddress, officeaddress: officeaddress}).done(function (data) {
        alert(data);
    });
}

function chdmq(s, d) {
    $("#dimv").hide();
    $("#diman").hide();
    $("#dimu").hide();

    $(s).show();

    $(".z").removeClass("w");
    $(d).addClass("w");
}

function chdmq(s, d) {
    $("#dimv").hide();
    $("#diman").hide();
    $("#dimu").hide();

    $(s).show();

    $(".z").removeClass("w");
    $(d).addClass("w");
}

function chdmy(s, d) {
    $("#daspiy").hide();
    $("#dassy").hide();
    $("#dasduy").hide();
    $(s).show();

    $(".y").removeClass("w");
    $(d).addClass("w");
}


function getDk(f) {
    console.log(f);
    $.post("dumbphp/drugusagebyunit.php", {unity: f}).done(function (data) {
        document.getElementById("usagebyunit").innerHTML = data;
    });
}

function getD() {
    var month = document.getElementById("vrmonth").value;
    var year = document.getElementById("vryear").value;

    $.post("dumbphp/getDcontent.php", {month: month, year: year}).done(function (data) {
        document.getElementById("vrcurdate").innerHTML = month + ", " + year;
        document.getElementById("diseasecondition").innerHTML = data;
    });
}

function adddrugtype(category, type) {
    $.post("dumbphp/adddrugtype.php", {category: category, type: type}).done(function (data) {
        alert(data);
    });
}

function addptEntry() {
    var ptvalues = ptvalue.value;
    var ptmonths = ptmonth.value;
    var ptyears = ptyear.value;
    var ptsites = ptsite.value;
    var ptypes = ptype.value;
    $.post("dumbphp/addptentry.php", {ptvalues: ptvalues, ptmonths: ptmonths, ptyears: ptyears, ptsites: ptsites, ptypes: ptypes}).done(function (data) {
        console.log(data);
    });
}

function adduccEntry() {
    var uccvalues = uccvalue.value;
    var uccmonths = uccmonth.value;
    var uccyears = uccyear.value;
    var uccsites = uccsite.value;
    $.post("dumbphp/adduccentry.php", {uccvalues: uccvalues, uccmonths: uccmonths, uccyears: uccyears, uccsites: uccsites}).done(function (data) {
        console.log(data);
    });
}

function swabDRP(a, s) {
    $("#viewdrpreport").hide();
    $("#newdrpentry").hide();
    $(s).show();


    $(".dp").removeClass("reactive");
    $(a).addClass("reactive");
}

function swabDP(a, s) {
    $("#viewreport").hide();
    $("#newentry").hide();
    $(s).show();

    $(".rere").removeClass("reactive");
    $(a).addClass("reactive");
}

function addEntry() {
    var disease = ddisease.value;
    var month = dmonth.value;
    var year = dyear.value;
    var site = dsite.value;
    var value = dvalue.value;

    if (value.length < 1) {
        alert("Enter a value for selected disease");
        return;
    }

    $.post("dumbphp/savediseaseentry.php", {disease: disease, month: month, year: year, site: site, value: value}).done(function (data) {
        //console.log(data);
    });
}

function chdm(s, t) {
    $("#positionan").hide();
    $("#positionv").hide();

    $(s).show();

    $(".q").removeClass("w");
    $(t).addClass("w");
//    console.log(s);
}

function chdmR(s, t) {
    $("#dassR").hide();
    $("#daspiR").hide();

    $(s).show();

    $(".z").removeClass("w");
    $(t).addClass("w");
//    console.log(s);
}

function updateJD(a) {
    alert(a);
    var jt = document.getElementById("updatejt").value;
    var jd = document.getElementById("updateJD").value;
    $.post("dumbphp/updatejd.php", {sn: a, jt: jt, jd: jd}).done(function (data) {
        alert(data);
    });
}

function updaterecord(s, t) {

    document.getElementById("myModalLabel").innerHTML = "<span style='color:#3D003D'>Update Category</span>";
    document.getElementById("myModalbody").innerHTML = "<span>Category name</span><input type='text' class='form-control' style='margin-bottom:15px; margin-top:5px' placeholder='Category name' id='updatedc'>";
    document.getElementById("myModalbody").innerHTML += "<input type='button' value='Update Position' class='btn btn-success' onclick = \"updateDCs('" + updatedc.value + "','" + t + "')\">";
    document.getElementById("myModalbody").innerHTML += "<span id='responsetextD' style='margin-left:10px'></span>";

    _v("updatedc").value = s;
    console.log(updatedc.value);
}

function updateDCs(a, b) {
    var drugname = updatedc.value;
    $.post("dumbphp/updatedrugcat.php", {drugname: drugname, sn: b}).done(function (data) {
        document.getElementById("responsetextD").innerHTML = data;
    });
}

function deletejob(s) {
    var position = "wewe" + s;
    var w = document.getElementById(position).innerHTML;
    var question = "Are you sure you want to delete category <b>" + w + " ?";
    var buttons = "<span class='btn btn-success' style='padding:5px'>Yes</span> <span class='btn btn-warning' style='padding:5px'>No</span>";
    customNotification(question, buttons, 4000);
}

function alertatop(msg, buttons, duration) {
    document.getElementById("commentsatop").innerHTML = msg + "<div>" + buttons + "</div>";

}

function timeout(d) {
    $("#commensatop").fadeIn(100);
    setTimeout();
}

function addjob() {
    var s = jbtitle.value;
    var a = jbdscrptn.value;
    $.post("dumbphp/newposition.php", {title: s, description: a}).done(function (data) {
        //console.log(data);
        document.getElementById("commentsatop").innerHTML = data;
    });
}

function updatenokdets(a) {
    var staffid = a;
    var name = ubinnok.value;
    var mobilenumber = ubimnnok.value;
    var address = ubianok.value;

    $.post("dumbphp/updatenokdets.php", {staffid: staffid, mobilenumber: mobilenumber, address: address, name: name}).done(function (data) {
        console.log(data);
    });
}

function  mainMenu(a, s) {
    $("#dashboardmanager").hide(100);
    $("#staffmanager").hide(100);
    $("#portalmanager").hide(100);
    $("#requisitionmanager").hide(100);
    $("#carmanager").hide(100);
    $("#clientmanager").hide(100);
    $("#patientmanager").hide(100);
    $("#checkinmanager").hide(100);
    $("#invoicingmanager").hide(100);
    $("#settingsmanager").hide(100);

    $(s).show(100);

    $(".mainButtons").removeClass("actMButtons");
    $(a).addClass("actMButtons");
}

function  ccmainMenu(a, s) {
    $("#settingsmanager").hide(100);
    $("#ANCmanager").hide(100);
    $("#staffmanager").hide(100);
    $("#carmanager").hide(100);
    $("#auditmanager").hide(100);
    $("#clientmanager").hide(100);

    $(s).show(100);

    $(".mainButtons").removeClass("actMButtons");
    $(a).addClass("actMButtons");
}

function updatepensiondets(a) {
    var staffid = a;
    var pensionpin = ubipp.value;
    var administrator = ubia.value;

    $.post("dumbphp/updatepensiondets.php", {staffid: staffid, pensionpin: pensionpin, administrator: administrator}).done(function (data) {
        console.log(data);
    });
}

function updateBI(d) {
    var fn = ubifn.value;
    var mn = ubimn.value;
    var ln = ubiln.value;
    var ms = ubims.value;
    var ig = ubig.value;
    var ea = ubiea.value;
    var pn = ubipn.value;
    var ha = ubiha.value;
    var hq = ubihq.value;

    $.post("dumbphp/updateBI.php", {fn: fn, mn: mn, ln: ln, ms: ms, ig: ig, ea: ea, pn: pn, ha: ha, hq: hq, its: d}).done(function (data) {
        console.log(data);
    });
}

function updatebankdets() {

}

function pullifu(a) {
    $("#updatematerial").show(100);
    $("#sbasicinfo").hide(100);
    temstaffid.innerHTML = a;
    $.post("dumbphp/updateinfo.php", {a: a}).done(function (data) {
        var DIV = document.createElement("DIV");
        var content = data;
        DIV.innerHTML = content;

        var firstname = DIV.getElementsByTagName("q")[0].innerText;
        var middlename = DIV.getElementsByTagName("w")[0].innerText;
        var lastname = DIV.getElementsByTagName("e")[0].innerText;
        var maritalstatus = DIV.getElementsByTagName("r")[0].innerText;
        var gender = DIV.getElementsByTagName("t")[0].innerText;
        var emailaddress = DIV.getElementsByTagName("y")[0].innerText;
        var phonenumber = DIV.getElementsByTagName("u")[0].innerText;
        var homeaddress = DIV.getElementsByTagName("i")[0].innerText;
        var highestqualification = DIV.getElementsByTagName("o")[0].innerText;
        //console.log(phonenumber);
        ubisi.value = a;
        ubifn.value = firstname;
        ubimn.value = middlename;
        ubiln.value = lastname;
        ubims.value = maritalstatus;
        ubig.value = gender;
        ubiea.value = emailaddress;
        ubipn.value = phonenumber;
        ubiha.value = homeaddress;
        ubihq.value = highestqualification;

        if (data.length > 10) {
            pullbankInfo(a);
            pullpensionInfo(a);
            pullnokInfo(a);
            documentstoupload(a);
        }
    });
}

function uploadF(a, b, c) {
    var documents = "UD" + c;
    var dfa = documents.value;
    console.log(dfa);

    var formData = new FormData();
    var dd = document.getElementById(documents).files[0];

    formData.append("filetoupload", dd);
    formData.append("documentid", a);
    formData.append("staffid", b);
    formData.append("documentname", c);
    var request = new XMLHttpRequest();
    request.upload.addEventListener("progress", uploadprogressHandler, false);
    request.addEventListener("load", uploadcompleteHandler, false);
    request.addEventListener("error", uploaderrorHandler, false);
    request.addEventListener("abort", uploadabortHandler, false);
    request.open("POST", "dumbphp/uploadFiles.php");
    request.send(formData);
}

function uploadprogressHandler(evt) {
    var v = Math.round((evt.loaded / evt.total) * 100) + "%";
    alert(v, "", 5000);
}

function uploadcompleteHandler(evt) {
    alert(evt.target.responseText);
}

function uploaderrorHandler() {
    alert("Could not upload file");
}

function uploadabortHandler() {
    alert("Upload aborted");
}

function documentstoupload(s) {
    $.post("dumbphp/documentstoupload.php", {its: s}).done(function (data) {
        document.getElementById("documentstoupload").innerHTML = data;
    });
}

function pullnokInfo(a) {
    $.post("dumbphp/pullnokInfo.php", {its: a}).done(function (data) {
        //console.log(data);
        var DIV = document.createElement("DIV");
        var content = data;
        DIV.innerHTML = content;

        var nokname = DIV.getElementsByTagName("a")[0].innerText;
        var nokmobilenumber = DIV.getElementsByTagName("s")[0].innerText;
        var nokaddress = DIV.getElementsByTagName("d")[0].innerText;

        ubinnok.value = nokname;
        ubimnnok.value = nokmobilenumber;
        ubianok.value = nokaddress;
    });
}

function pullpensionInfo(a) {
    $.post("dumbphp/pullpensionInfo.php", {its: a}).done(function (data) {

        var DIV = document.createElement("DIV");
        var content = data;
        DIV.innerHTML = content;

        var pensionpin = DIV.getElementsByTagName("a")[0].innerText;
        var administratornumber = DIV.getElementsByTagName("s")[0].innerText;

        ubipp.value = pensionpin;
        ubia.value = administratornumber;
    });
}

function carStaff(a, b) {
    $("#emrmanagement").hide(100);
    $("#schmanagement").hide(100);
    $(a).show(100);

    $(".carstaff").removeClass("ssmactive");
    $(b).addClass("ssmactive");
}

function pmmClient(a, b) {
    $("#chkinpatient").hide(100);
    $("#chkinlog").hide(100);
    $(a).show(100);

    $(".aavv").removeClass("ssmactive");
    $(b).addClass("ssmactive");
}

function pmClient(a, b) {
    $("#clientcategory").hide(100);
    $("#clientmanagement").hide(100);
    $("#updatecategory").hide(100);
    $(a).show(100);

    $(".aavv").removeClass("ssmactive");
    $(b).addClass("ssmactive");
}

function pmStaff(a, b) {
    $("#posmanagement").hide(100);
    $("#docmanagement").hide(100);
    $("#acctmanagement").hide(100);
    $("#remmanagement").hide(100);
    $("#activitymanagement").hide(100);
    $("#dispmanagement").hide(100);
    $("#incmanagement").hide(100);
    $("#illnesscategory").hide(100);
    $("#drugmanagement").hide(100);
    $(a).show(100);

    $(".pm").removeClass("ssmactive");
    $(b).addClass("ssmactive");
}

function pullbankInfo(a) {
    $.post("dumbphp/pullbankinfo.php", {its: a}).done(function (data) {

        console.log(data);

        var DIV = document.createElement("DIV");
        var content = data;
        DIV.innerHTML = content;

        var bankname = DIV.getElementsByTagName("s")[0].innerText;
        var accountnumber = DIV.getElementsByTagName("d")[0].innerText;
        var accountname = DIV.getElementsByTagName("f")[0].innerText;

        ubibn.value = bankname;
        ubian.value = accountnumber;
        ubiana.value = accountname;


    });
}

function getstaffDet(d) {
    $.post("dumbphp/pullstaffsearch.php", {its: d}).done(function (data) {
//        console.log(data);
        document.getElementById("searchedStaff").innerHTML = data;
        $("#searchedstaff").fadeIn(100);
    });
}

function ubi(s, a) {
    $("#sbasicinfo").fadeOut(300);
    $("#sbankinfo").fadeOut(300);
    $("#snokinfo").fadeOut(300);
    $("#spensioninfo").fadeOut(300);
    $("#sdocumentuploadinfo").fadeOut(300);

    $(s).fadeIn(300);

    $(".UM").removeClass("activeUM");
    $(a).addClass("activeUM");
}

function modplacehold(a) {
    document.getElementById("searchstaffib").placeholder = "Search by " + a;
}

function pullviewstaff() {
    $.post("dumbphp/pullallstaff.php").done(function (data) {
        document.getElementById("viewstaffInfo").innerHTML = data;
    });
}

function getStaff(sd, ds) {
    console.log(sd + " " + ds);
    /*
     $.post("dumbphp/pullallstaff.php").done(function (data) {
     document.getElementById("viewstaffInfo").innerHTML = data;
     });
     */
}

function addbi() {
    document.getElementById('commentsatop').innerHTML = "Fired";
    //alert(assite.value);
    var errorcount = 0;
    var site = assite.value;
    var department = asd.value;
    var jobtitle = asjt.value;
    var firstname = asfn.value;
    var middlename = asmn.value;
    var lastname = asln.value;
    var dob = asdob.value;
    var maritalstatus = asms.value;
    var gender = asg.value;
    var stateoforigin = assoo.value;
    var phonenumber = aspn.value;
    var emailaddress = asea.value;
    var homeaddress = asha.value;
    var highestqualification = ashq.value;

    if (site === "-") {
        document.getElementById('commentsatop').innerHTML += "<span style='color:red'>Select site</span><br/>";
        errorcount++;
    }
    if (department === "-") {
        document.getElementById('commentsatop').innerHTML += "<span style='color:red'>Select department</span><br/>";
        errorcount++;
    }
    if (jobtitle === "-") {
        document.getElementById('commentsatop').innerHTML += "<span style='color:red'>Select Job title</span><br/>";
        errorcount++;
    }
    if (firstname.length < 1) {
        document.getElementById('commentsatop').innerHTML += "<span style='color:red'>Enter first name.</span><br/>";
        errorcount++;
    }
    if (middlename.length < 1) {
        document.getElementById('commentsatop').innerHTML += "<span style='color:red'>Enter second name.</span><br/>";
        errorcount++;
    }
    if (lastname.length < 1) {
        document.getElementById('commentsatop').innerHTML += "<span style='color:red'>Enter last name.</span><br/>";
        errorcount++;
    }
    if (dob.length < 10) {
        document.getElementById('commentsatop').innerHTML += "<span style='color:red'>Enter date of birth.</span><br/>";
        errorcount++;
    }
    if (gender === '-') {
        document.getElementById('commentsatop').innerHTML += "<span style='color:red'>Select gender.</span><br/>";
        errorcount++;
    }
    if (stateoforigin === '-') {
        document.getElementById('commentsatop').innerHTML += "<span style='color:red'>Select state of origin.</span><br/>";
        errorcount++;
    }
    if (phonenumber.length === 11) {

    } else {
        document.getElementById('commentsatop').innerHTML += "<span style='color:red'>Enter phone valid number </span><br/>";
        errorcount++;
    }
    if (emailaddress.length < 7) {
        document.getElementById('commentsatop').innerHTML += "<span style='color:red'>Enter valid email address</span><br/>";
        errorcount++;
    }
    if (homeaddress.length < 7) {
        document.getElementById('commentsatop').innerHTML += "<span style='color:red'>Enter valid home address</span><br/>";
        errorcount++;
    }
    if (highestqualification === '-') {
        document.getElementById('commentsatop').innerHTML += "<span style='color:red'>Select highest qualification</span><br/>";
        errorcount++;
    }

    if (errorcount > 0) {
        alert("There are one or more errors on this form");
        return;
    } else {
        $("#commentsatop").hide();
    }
    $.post("dumbphp/savebasicinfo.php", {site: site, department: department, jobtitle: jobtitle, firstname: firstname, middlename: middlename, lastname: lastname, dob: dob, maritalstatus: maritalstatus, gender: gender, stateoforigin: stateoforigin, phonenumber: phonenumber, emailaddress: emailaddress, homeaddress: homeaddress, highestqualification: highestqualification}).done(function (data) {
        alert(data);

    });
}

function addStaff() {
    console.log("Bombs away");
}

function _(x) {
    return document.getelementById(x);
}

function fStaff(wts, wtacft) {
    $("#staffnameS").hide(100);
    $("#staffidS").hide(100);
    $(wts).show(100);

    $(".ui").removeClass("ssmactive");
    $(wtacft).addClass("ssmactive");
}

function proStaff(wts, wtsn) {

    $("#addstaff").hide(200);
    $("#updatestaff").hide(200);
    $("#messagestaff").hide(200);
    $("#viewstaff").hide(200);
    $("#chequesncash").hide(200);
    $("#dailydisbursements").hide(200);
    $("#kitchenexpenses").hide(200);
    $("#attendance").hide(200);
    $("#admissions").hide(200);
    $("#cashmovement").hide(200);
    $("#centraladminoffice").hide(200);
    $(wts).show(200);

    $(".ssm").removeClass("ssmactive");
    $(wtsn).addClass("ssmactive");
}
//Google Chart test
