function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("overlay").classList.remove('overlay3');
}
function openNav(){
    document.getElementById("sidebar").style.width = "240px";
    document.getElementById("overlay").classList.toggle('overlay3');
}



//Schedule Submodule
$(document).ready(function(){
    //Schedule
    //Schedule
    $("#pds_form").submit(function(e){

        e.preventDefault();
        var pds_field = $("#field_name").val();   
        var pds_change_data = $("#change_data_to").val();
        var pds_reason1 = $("#pds_reason").val();

        if(pds_field == '' || pds_change_data == '' || pds_reason == ''){
         //   $(".form-feedback-err").html("All fields are required")
         $(".form-pds-err").fadeIn(1000);
         $(".form-pds-err").fadeOut(5000);
        }
        else{
            httpAjax('post', '/Employee/modules/pds/', {
                data:{ field_name: pds_field, change_data_to: pds_change_data, pds_reason: pds_reason1},
            }).then( res => {
                $(".form-pds-success").fadeIn(1000);
                $("#pds_form").trigger("reset");
                $(".form-pds-err").hide();
                $(".form-pds-success").fadeOut(6000);
            });
        }
    });

    $("#resched-form").submit(function(e){

        e.preventDefault();
        var sched_namex = $("#sched_name").val();   
        var sched_reasonx = $("#sched_reason").val();

        if(sched_namex == '' || sched_reasonx == ''){
         //   $(".form-feedback-err").html("All fields are required")
         $(".form-feedback-err").fadeIn(1000);
         $(".form-feedback-err").fadeOut(5000);
        }
        else{
            httpAjax('post', '/Employee/modules/schedule/', {
                data:{ sched_name: sched_namex, sched_reason: sched_reasonx},
            }).then( res => {
                $(".form-feedback-success").fadeIn(1000);
                $("#resched-form").trigger("reset");
                $(".form-feedback-err").hide();
                $(".form-feedback-success").fadeOut(6000);
            });
        }
    });
    //Leave
    $("#leave-form").submit(function(e){

        e.preventDefault(); 
        var type_of_leavex = $("#type_leaves").val();   
        var reason_leavex = $("#reason").val();
        var days_of_leavex = $("#leave_days").val();
        var start_datex = $("#start_date").val();
        var end_datex = $("#end_date").val();

        if(type_of_leavex == '' || reason_leavex == '' || days_of_leavex == '' || start_datex == '' || end_datex == ''){
         //   $(".form-feedback-err").html("All fields are required")
         $(".form-leave-err").fadeIn(1000);
         $(".form-leave-err").fadeOut(5000);
        }
        else{
            httpAjax('post', '/Employee/modules/leave/', {
                data:{ type_leaves: type_of_leavex, reason: reason_leavex, 
                leave_days: days_of_leavex, start_date: start_datex, end_date:end_datex},
            }).then( res => {
                $(".form-leave-success").fadeIn(1000);
                $("#leave-form").trigger("reset");
                $(".form-leave-err").hide();
                $(".form-feedback-success").fadeOut(6000);
            });
        }
    });
    //overtime requests
    $("#overtime-req-form").submit(function(e){

        e.preventDefault(); 
        var ot_hours = $("#overtime_hours").val();   
        var ot_reason = $("#overtime_reason").val();

        if(ot_hours == '' || ot_reason == ''){
         //   $(".form-feedback-err").html("All fields are required")
         $(".form-ot-err").fadeIn(1000);
         $(".form-ot-err").fadeOut(5000);
        }
        else{
            httpAjax('post', '/Employee/modules/overtime/', {
                data:{ overtime_hours:ot_hours, overtime_reason:ot_reason},
            }).then( res => {
                $(".form-ot-success").fadeIn(1000);
                $("#overtime-req-form").trigger("reset");
                $(".form-ot-err").hide();
                $(".form-ot-success").fadeOut(6000);
            });
        }
    });

    //reimburse requests
    $("#reimbursement-form").submit(function(e){

        e.preventDefault(); 
        var f_or_no = $("#or_no").val();   
        var f_cash_received = $("#cash_received").val();
        var f_particulars = $("#particulars").val();
        var f_attachment = $("#attachment").val();
        var f_total_amount = $("#total_amount").val();
        if(f_or_no == '' || f_cash_received == '' || f_particulars == '' || f_attachment == '' || f_total_amount == ''){
         //   $(".form-feedback-err").html("All fields are required")
         $(".form-reimburse-err").fadeIn(1000);
         $(".form-reimburse-err").fadeOut(5000);
        }
        else{
            httpAjax('post', '/Employee/modules/reimbursement/', {
                data:{ or_no:f_or_no, cash_received:f_cash_received, particulars:f_particulars, attachment: f_attachment, total_amount:f_total_amount},
            }).then( res => {
                $(".form-reimburse-success").fadeIn(1000);
                $("#reimbursement-form").trigger("reset");
                $(".form-reimburse-err").hide();
                $(".form-reimburse-success").fadeOut(6000);
            });
        }
    });
});