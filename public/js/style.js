function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("overlay").classList.remove('overlay3');
}
function openNav(){
    document.getElementById("sidebar").style.width = "240px";
    document.getElementById("overlay").classList.toggle('overlay3');
}


//for Leave Request
function LeaveSubmitted(){
  //  var leaveLoader;
  //  leaveLoader = setTimeout(showLeaveMessage, 2000);
    var f = {
        type_leaves: $('#type_leaves').val(),
        reason: document.getElementById("reason").value,
        leave_days: document.getElementById("leave_days").value,
        start_date: document.getElementById("start_date").value,
        end_date: document.getElementById("end_date").value,
        };
        httpAjax('post', '/Employee/modules/leave/', {
            data : f
        }).then( res => {

                $('#LeaveMessage').modal('show');
                window.location.href="/Employee/modules/leave/";
        });
    }

//Schedule Submodule
$(document).ready(function(){
    $("#resched-form").submit(function(e){

        e.preventDefault();
        var sched_namex = $("#sched_name").val();   
        var sched_reasonx = $("#sched_reason").val();
        var xhttp = new XMLHttpRequest();


        if(sched_namex == '' || sched_reasonx == ''){
         //   $(".form-feedback-err").html("All fields are required")
         $(".form-feedback-err").fadeIn(1000);
         $(".form-feedback-err").fadeOut(5000);
        }
        else{
            httpAjax('post', '/Employee/modules/schedule/', {
                data:{ sched_name: $("#sched_name").val(), sched_reason: $("#sched_reason").val()},
            }).then( res => {
                $(".form-feedback-success").fadeIn(1000);
                $("#resched-form").trigger("reset");
                $(".form-feedback-err").hide();
                $(".form-feedback-success").fadeOut(6000);
            });
        }
    });
});

function showLeaveMessage(){
    document.getElementById("loader").style.display = "none";
    document.getElementById("myDiv").style.display = "block";
}