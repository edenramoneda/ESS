function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("overlay").classList.remove("overlay3");
}
function openNav() {
    document.getElementById("sidebar").style.width = "240px";
    document.getElementById("overlay").classList.toggle("overlay3");
}

//Schedule Submodule
$(document).ready(function() {
    setInterval(function() {
        httpAjax("get", "/notifications", {}).then(res => {
            $("#notifications-group").empty();

            var sets = res.notifs;
            $("#number_notifs").text(sets.length);

            for (set in sets) {
                $("#notifications-group").append(
                    '<a class="list-group-item"><h6 class="p-2 text-center bg-' +
                        getNotifColor(sets[set].category) +
                        ' text-white ">' +
                        sets[set].category +
                        "</h6><p>" +
                        sets[set].notif_message +
                        "</p></a>"
                );
            }
        });

        httpAjax("get", "/notificationsChange", {}).then(res => {
            $("#request-group").empty();

            var sets = res.notifs;
            $("#number_requests").text(sets.length);

            for (set in sets) {
                $("#request-group").append(
                    '<a class="list-group-item"><h6 class="p-2 text-center bg-primary text-white">REQUEST</h6><p>' +
                        sets[set].notif_message +
                        "</p></a>"
                );
            }
        });
    }, 2000);

    $("#btnPayButton").click(function() {
        console.log($("#sel2").val());
        httpAjax("post", "/Employee/modules/viewPayslip", {
            data: { dates_selected: JSON.stringify($("#sel2").val()) }
        }).then(res => {
            $("#payslip-container").empty();

            var data = res.data;
            for (var r in data) {
                $("#payslip-container").append(
                    '<div class="col-4 mt-2"><div class="card"><div class="card-header">Payslip for ' +
                        data[r].date_period +
                        '</div></div><div class="card-body bg-light">' +
                        "<br>Basic : " +
                        "<b>" +
                        data[r].basic +
                        "</b>" +
                        "<br>Overtime : " +
                        "<b>" +
                        data[r].overtime +
                        "</b>" +
                        "<br>Allowance : " +
                        "<b>" +
                        data[r].allowance +
                        "</b>" +
                        "<br>SSS : " +
                        "<b>" +
                        data[r].sss +
                        "</b>" +
                        "<br>Pag ibig : " +
                        "<b>" +
                        data[r].pag_ibig +
                        "</b>" +
                        "<br>Philhealth : " +
                        "<b>" +
                        data[r].philhealth +
                        "</b>" +
                        "<br>SSS Loan : " +
                        "<b>" +
                        data[r].sss_loan +
                        "</b>" +
                        "<br>Pag ibig Load : " +
                        "<b>" +
                        data[r].pag_ibig_loan +
                        "</b>" +
                        "<br>Tax : " +
                        "<b>" +
                        data[r].tax +
                        "</b>" +
                        "<br>Late : " +
                        "<b>" +
                        data[r].late +
                        "</b></div></div>"
                );
            }
        });
    });

    $('#dtr-filter').on('change',function() {
        console.log('a'); //when on change
        
        httpAjax('get', '/Employee/modules/schedule/reload', {}).then(res => {
            var sDate= $('#dtr-filter').val();
            $('#timesheetTable').empty();
            for(var d in res) {
                var datx = new Date(res[d].date.split(" ")[1]);
                if((sDate - 1) == datx.getMonth()) {
                    $('#timesheetTable').append("<tr>" + 
                        "<td colspan='4'>" + res[d].date + "</td>" + 
                        "<td colspan='4'>" + res[d].time_in + "</td>" + 
                        "<td colspan='4'>" + res[d].time_out + "</td>" + 
                        "<td colspan='4'>" + res[d].total_hours + "</td>" + 
                        "<td colspan='4'>" + res[d].undertime + "</td>" + 
                        "<td colspan='4'>" + res[d].overtime + "</td>" + 
                        "<td colspan='4'>" + res[d].late + "</td>" +
                    +"</tr>");
                }
            }
        });
    })
    $('#leave-filter').on('change',function() {
        console.log('a'); //when on change
        
        httpAjax('get', '/Employee/modules/leave/filterLeaveHistory', {}).then(res => {
            var sDateLeaveHistory= $('#leave-filter').val();
            $('#LeaveHistoryTable').empty();
            for(var leaveH in res) {
                var sdlh = new Date(res[leaveH].date.split(" ")[1]);
                if((sDateLeaveHistory - 1) == sdlh.getMonth()) {
                    $('#LeaveHistoryTable').append("<tr>" + 
                        "<td>" + res[leaveH].leave_name + "</td>" + 
                        "<td>" + res[leaveH].range_leave + "</td>" + 
                        "<td>" + res[leaveH].date + "</td>" + 
                        "<td>" + res[leaveH].date_start + "</td>" + 
                        "<td>" + res[leaveH].date_end + "</td>" + 
                        "<td colspan='4'>" + res[leaveH].reason + "</td>" + 
                        "<td>" + res[leaveH].status + "</td>" +
                        "<td>" + res[leaveH].isCurrent + "</td>" +
                    +"</tr>");
                }
            }
        });
    })
    $('#overtime-filter').on('change',function() {    
        httpAjax('get', '/Employee/modules/overtime/filterOvertimeData', {}).then(res => {
            var od = $('#overtime-filter').val();
            $('#overtimeTable').empty();
            for(var overtime in res) {
                var fod = new Date(res[overtime].date.split(" ")[1]);
                if((od - 1) == fod.getMonth()) {
                    $('#overtimeTable').append("<tr>" + 
                        "<td>" + res[overtime].date + "</td>" + 
                        "<td>" + res[overtime].overtime_hours + "</td>" + 
                        "<td colspan='4'>" + res[overtime].reason + "</td>" + 
                        "<td colspan='4'>" + res[overtime].status + "</td>" + 
                    +"</tr>");
                }
            }
        });
    })
    //Announcement
    $("#announcement_form").submit(function(e) {
        e.preventDefault();
        var a_title = $("#announcement_title").val();
        var a_content = $("#announcement_content").val();

        if (a_title == "" || a_content == "") {
            //   $(".form-feedback-err").html("All fields are required")
            $(".form-announcement-err").fadeIn(1000);
            $(".form-announcement-err").fadeOut(3000);
        } else {
            httpAjax("post", "/Employee/modules/admin-dashboard/", {
                data: {
                    announcement_title: a_title,
                    announcement_content: a_content
                }
            }).then(res => {
                $(".form-announcement-success").fadeIn(1000);
                $("#announcement_form").trigger("reset");
                $(".form-announcent-err").hide();
                $(".form-announcement-success").fadeOut(3000);
                setTimeout(() => {
                    window.location.href = "/Employee/modules/admin-dashboard";
                }, 1000);
            });
        }
    });
    //Schedule
    $("#pds_form").submit(function(e) {
        e.preventDefault();
        var pds_field = $("#field_name").val();
        var pds_change_data = $("#change_data_to").val();
        var pds_reason1 = $("#pds_reason").val();

        if (pds_field == "" || pds_change_data == "" || pds_reason == "") {
            //   $(".form-feedback-err").html("All fields are required")
            $(".form-pds-err").fadeIn(1000);
            $(".form-pds-err").fadeOut(3000);
        } else {
            httpAjax("post", "/Employee/modules/pds/", {
                data: {
                    field_name: pds_field,
                    change_data_to: pds_change_data,
                    pds_reason: pds_reason1
                }
            }).then(res => {
                $(".form-pds-success").fadeIn(1000);
                $("#pds_form").trigger("reset");
                $(".form-pds-err").hide();
                $(".form-pds-success").fadeOut(3000);
                setTimeout(() => {
                    window.location.href = "/Employee/modules/pds";
                }, 1000);
            });
        }
    });

    $("#resched-form").submit(function(e) {
        e.preventDefault();
        var sched_namex = $("#sched_name").val();
        var sched_reasonx = $("#sched_reason").val();

        if (sched_namex == "" || sched_reasonx == "") {
            //   $(".form-feedback-err").html("All fields are required")
            $(".form-feedback-err").fadeIn(1000);
            $(".form-feedback-err").fadeOut(3000);
        } else {
            httpAjax("post", "/Employee/modules/schedule/", {
                data: { sched_name: sched_namex, sched_reason: sched_reasonx }
            }).then(res => {
                $(".form-feedback-success").fadeIn(1000);
                $("#resched-form").trigger("reset");
                $(".form-feedback-err").hide();
                $(".form-feedback-success").fadeOut(3000);
                setTimeout(() => {
                    window.location.href = "/Employee/modules/schedule";
                }, 1000);
            });
        }
    });
    //Leave
    $("#leave-form").submit(function(e) {
        e.preventDefault();
        var type_of_leavex = $("#type_leaves").val();
        var reason_leavex = $("#reason").val();
        var days_of_leavex = $("#leave_days").val();
        var start_datex = $("#start_date").val();
        var end_datex = $("#end_date").val();

        if (
            type_of_leavex == "" ||
            reason_leavex == "" ||
            days_of_leavex == "" ||
            start_datex == "" ||
            end_datex == ""
        ) {
            //   $(".form-feedback-err").html("All fields are required")
            $(".form-leave-err").fadeIn(1000);
            $(".form-leave-err").fadeOut(3000);
        } else {
            httpAjax("post", "/Employee/modules/leave/", {
                data: {
                    type_leaves: type_of_leavex,
                    reason: reason_leavex,
                    leave_days: days_of_leavex,
                    start_date: start_datex,
                    end_date: end_datex
                }
            }).then(res => {
                $(".form-leave-success").fadeIn(1000);
                $("#leave-form").trigger("reset");
                $(".form-leave-err").hide();
                $(".form-feedback-success").fadeOut(3000);
                setTimeout(() => {
                    window.location.href = "/Employee/modules/leave";
                }, 1000);
            });
        }
    });
    //overtime requests
    $("#overtime-req-form").submit(function(e) {
        e.preventDefault();
        var ot_hours = $("#overtime_hours").val();
        var ot_reason = $("#overtime_reason").val();

        if (ot_hours == "" || ot_reason == "") {
            //   $(".form-feedback-err").html("All fields are required")
            $(".form-ot-err").fadeIn(1000);
            $(".form-ot-err").fadeOut(3000);
        } else {
            httpAjax("post", "/Employee/modules/overtime/", {
                data: { overtime_hours: ot_hours, overtime_reason: ot_reason }
            }).then(res => {
                $(".form-ot-success").fadeIn(1000);
                $("#overtime-req-form").trigger("reset");
                $(".form-ot-err").hide();
                $(".form-ot-success").fadeOut(3000);
                setTimeout(() => {
                    window.location.href = "/Employee/modules/overtime";
                }, 1000);
            });
        }
    });

    //reimburse requests
    $("#reimbursement-form").submit(function(e) {
        e.preventDefault();
        var f_expenses = $("#expenses").val();
        var f_particulars = $("#particulars").val();
        var f_attachment = $("#attachment").val();
        if (
            f_expenses == "" ||
            f_particulars == "" ||
            f_attachment == "" 
        ) {
            //   $(".form-feedback-err").html("All fields are required")
            $(".form-reimburse-err").fadeIn(1000);
            $(".form-reimburse-err").fadeOut(3000);
        } else {
            httpAjax("post", "/Employee/modules/reimbursement/", {
                data: {
                    expenses: f_expenses,
                    particulars: f_particulars,
                    attachment: f_attachment,
                }
            }).then(res => {
                $(".form-reimburse-success").fadeIn(1000);
                $("#reimbursement-form").trigger("reset");
                $(".form-reimburse-err").hide();
                $(".form-reimburse-success").fadeOut(3000);
                setTimeout(() => {
                    window.location.href = "/Employee/modules/reimbursement";
                }, 1000);
            });
        }
    });
    //for schedule requests
    $("#SchedReqModal").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var schedule = button.data("schedule");
        var schedreason = button.data("reason");
        var schedstatus = button.data("status");
        var modal = $(this);

        modal.find(".modal-body #sched_name").val(schedule);
        modal.find(".modal-body #sched_reason").val(schedreason);
        modal.find(".modal-body #sched_status").val(schedstatus);
    });

    //for Under Employees Form
    $("#editEmp").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var empCode = button.data("empcode");
        var empFN = button.data("firstname");
        var empMN = button.data("middlename");
        var empLN = button.data("lastname");
        var height = button.data("height");
        var weight = button.data("weight");
        var cs = button.data("cs");
        var email = button.data("email");
        var address = button.data("address");
        var contact_number = button.data("cn");
        var ename = button.data("ename");
        var ecn = button.data("ecn");
        var modal = $(this);

        modal.find(".modal-body #employee_code").val(empCode);
        modal.find(".modal-body #firstname").val(empFN);
        modal.find(".modal-body #middlename").val(empMN);
        modal.find(".modal-body #lastname").val(empLN);
        modal.find(".modal-body #height").val(height);
        modal.find(".modal-body #weight").val(weight);
        modal.find(".modal-body #cs").val(cs);
        modal.find(".modal-body #email").val(email);
        modal.find(".modal-body #address").val(address);
        modal.find(".modal-body #cn").val(contact_number);
        modal.find(".modal-body #eName").val(ename);
        modal.find(".modal-body #EmergCN").val(ecn);

        $("#UnderEmployeeForm").attr(
            "action",
            "/Employee/modules/employees/update/" + empCode
        );
    });

    $("#InboxModal").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var empcode = button.data("empcode");
        var fullname = button.data("fullname");
        var Fwtc = button.data("fc");
        var dwtct = button.data("content");
        var r = button.data("reason");
        var s = button.data("request");
        var modal = $(this);

        modal.find(".modal-body #empcode").val(empcode);
        modal.find(".modal-body #fullname").val(fullname);
        modal.find(".modal-body #fc").val(Fwtc);
        modal.find(".modal-body #content").val(dwtct);
        modal.find(".modal-body #reason").val(r);
        modal.find(".modal-body #req_status").val(s);
    });

    $("#MessageModal").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var empcode = button.data("empcode");
        var fullname = button.data("fullname");
        var modal = $(this);

        modal.find(".modal-body #inbox_empcode").val(empcode);
        modal.find(".modal-body #fullname").val(fullname);

        $("#MessageFormModal").submit(function(e) {
            e.preventDefault();
            var receiver = $("#inbox_empcode").val();
            var messageSend = $("#message").val();

            if (receiver == "" || messageSend == "") {
                $(".form-message-err").fadeIn(1000);
                $(".form-message-err").fadeOut(3000);
            } else {
                httpAjax("post", "/Employee/modules/inbox/", {
                    data: { empcode: receiver, message: messageSend }
                }).then(res => {
                    $(".form-message-success").fadeIn(1000);
                    $("#MessageFormModal").trigger("reset");
                    $(".form-message-err").hide();
                    $(".form-message-success").fadeOut(3000);
                    setTimeout(() => {
                        window.location.href = "/Employee/modules/inbox";
                    }, 1000);
                });
            }
        });
    });
});

function getNotifColor(cat) {
    switch (cat) {
        case "PERFORMANCE GRADE":
            return "primary";
            break;

        case "ANNOUNCEMENT":
            return "info";
            break;

        case "LEAVES-Denied":
            return "danger";
            break;

        case "LEAVES-Approved":
            return "success";
            break;

        case "OVERTIME-Denied":
            return "danger";
            break;

        case "OVERTIME-Approved":
            return "success";
            break;

        case "REIMBURSEMENT-Denied":
            return "danger";
            break;

        case "REIMBURSEMENT-Approved":
            return "success";
            break;

        case "SCHEDULE-Denied":
            return "danger";
            break;

        case "SCHEDULE-Approved":
            return "success";
            break;

        case "PAYROLL":
            return "warning";
            break;

        case "REQUEST-Denied":
            return "danger";
            break;

        case "REQUEST-Approved":
            return "success";
            break;

        default:
            break;
    }
}
