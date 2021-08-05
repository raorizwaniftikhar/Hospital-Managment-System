$(document).ready(function () {
//    $(".top-menu").on("click", function () {
//        $(".selected").removeClass("selected");
//        $(this).addClass("selected");
//    });


    $("#filter_type").on("change", function () {
        var type = $(this).val();
        location.href = "view_nurses.php?type=" + type;
    });

});

function clear_form_elements(class_name) {
    $("." + class_name).find(':input').each(function () {
        switch (this.type) {
            case 'password':
            case 'text':
            case 'textarea':
            case 'file':
            case 'select-one':
            case 'select-multiple':
                $(this).val('');
                break;
            case 'checkbox':
            case 'radio':
                this.checked = false;
        }
    });
}
//Delete Department
function confirmDeptDelete(deptID)
{
    $('#okBtn').unbind('click');
    $("#myModal").show();
    bindDeptConfirm(deptID);
}
function bindDeptConfirm(deptID)
{
    $("#okBtn").bind('click', function () {
        deleteDept(deptID);
    })

}
function deleteDept(deptID) {
    $.ajax({
        type: "POST",
        url: "view_departments.php",
        data: {"deptID": deptID, "isAjax": 1},
        dataType: 'json',
        success: function (data) {
            if (data.result == 'success') {
                $("#departments_" + deptID).remove();
            }
        }
    });
}

//Delete Service
function confirmServiceDelete(serviceID)
{
    $('#okBtn').unbind('click');
    $("#myModal").show();
    bindServiceConfirm(serviceID);
}
function bindServiceConfirm(serviceID)
{
    $("#okBtn").bind('click', function () {
        deleteService(serviceID);
    })

}
function deleteService(serviceID) {
    $.ajax({
        type: "POST",
        url: "view_services.php",
        data: {"serviceID": serviceID, "isAjax": 1},
        dataType: 'json',
        success: function (data) {
            if (data.result == 'success') {
                $("#services_" + serviceID).remove();
            }
        }
    });
}

//Delete Doctor
function confirmDoctorDelete(doctorID)
{
    $('#okBtn').unbind('click');
    $("#myModal").show();
    bindDoctorConfirm(doctorID);
}
function bindDoctorConfirm(doctorID)
{
    $("#okBtn").bind('click', function () {
        deleteDoctor(doctorID);
    })

}
function deleteDoctor(doctorID) {
    $.ajax({
        type: "POST",
        url: "view_doctors.php",
        data: {"doctorsID": doctorID, "isAjax": 1},
        dataType: 'json',
        success: function (data) {
            if (data.result == 'success') {
                $("#doctors_" + doctorID).remove();
            }
        }
    });
}

//Delete Staff
function confirmNursesDelete(nursesID)
{
    $('#okBtn').unbind('click');
    $("#myModal").show();
    bindNurseConfirm(nursesID);
}
function bindNurseConfirm(nursesID)
{
    $("#okBtn").bind('click', function () {
        deleteNurse(nursesID);
    })

}
function deleteNurse(nursesID) {
    $.ajax({
        type: "POST",
        url: "view_nurses.php",
        data: {"nursesID": nursesID, "isAjax": 1},
        dataType: 'json',
        success: function (data) {
            if (data.result == 'success') {
                $("#nurses_" + nursesID).remove();
            }
        }
    });
}

//Delete Message
function confirmMessageDelete(messageID)
{
    $('#okBtn').unbind('click');
    $("#myModal").show();
    bindMessageConfirm(messageID);
}
function bindMessageConfirm(messageID)
{
    $("#okBtn").bind('click', function () {
        deleteMessage(messageID);
    })

}
function deleteMessage(messageID) {
    $.ajax({
        type: "POST",
        url: "view_messages.php",
        data: {"messageID": messageID, "isAjax": 1},
        dataType: 'json',
        success: function (data) {
            if (data.result == 'success') {
                $("#messages_" + messageID).remove();
            }
        }
    });
}

//Delete Patients
function confirmPatientsDelete(patientID)
{
    $('#okBtn').unbind('click');
    $("#myModal").show();
    bindPatientsConfirm(patientID);
}
function bindPatientsConfirm(patientID)
{
    $("#okBtn").bind('click', function () {
        deletePatients(patientID);
    })

}
function deletePatients(patientID) {
    $.ajax({
        type: "POST",
        url: "view_patients.php",
        data: {"patientsID": patientID, "isAjax": 1},
        dataType: 'json',
        success: function (data) {
            if (data.result == 'success') {
                $("#patients_" + patientID).remove();
            }
        }
    });
}
//Delete Visits
function confirmVisitsDelete(visitID)
{
    $('#okBtn').unbind('click');
    $("#myModal").show();
    bindVisitsConfirm(visitID);
}
function bindVisitsConfirm(visitID)
{
    $("#okBtn").bind('click', function () {
        deleteVisits(visitID);
    })

}
function deleteVisits(visitID) {
    $.ajax({
        type: "POST",
        url: "view_visits.php",
        data: {"visitsID": visitID, "isAjax": 1},
        dataType: 'json',
        success: function (data) {
            if (data.result == 'success') {
                $("#visits_" + visitID).remove();
            }
        }
    });
}


function addItem(val,doc_id){
    $.ajax({
        type: "POST",
        url: "assign_diseases.php",
        data: {"disease_id": val, "doctor_id":doc_id, "isAjax": 1, "add":1},
        dataType: 'json',
        success: function (data) {
            if (data.result == 'success') {
                var name = $("#option_"+val).html();
                var id = data.insert_id;
                var item = '<div class="disease_added" id="disease_'+id+'"><b>'+name+'</b><a href="javascript:removeItem('+id+');">X</a><hr style="width:100%"></div>';
                var old = $("#disease_data").html();
                $("#disease_data").html(old+item);
            }
        }
//        , asyn:false
    });
}
function removeItem(val){
    $.ajax({
        type: "POST",
        url: "assign_diseases.php",
        data: {"doc_des_id": val, "isAjax": 1, "remove":1},
        dataType: 'json',
        success: function (data) {
            if (data.result == 'success') {
                $("#disease_"+val).remove();
            }
        }
    });
}
function changeStatus(id,val){
    $.ajax({
        type: "POST",
        url: "view_visits.php",
        data: {"status": val, "isAjax": 1, "visit_id":id},
        dataType: 'json',
        success: function (data) {
            if (data.result == 'success') {
                $("#visit_status_"+id).html(val);
            }
        }
    });
}
function showEditMode(){
    $(".hide").hide();
    $(".show").show();
    
}
