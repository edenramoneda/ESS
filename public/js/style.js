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

function showLeaveMessage(){
    document.getElementById("loader").style.display = "none";
    document.getElementById("myDiv").style.display = "block";
}