/*jshint esversion: 6 */

/* 
    Synapsygen
    Author: Lei <1qsau@facebook.com>, <github.com/leixdd>

    Contents:
    1. Ajax

*/

//Ajax

$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

var opts = {
    data : '',
    async: true,
};

function httpAjax(type, url = '', opts = {}) {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: type,
            data: opts.data,
            method : type,
            async: opts.async,
            url: url,
            error: (xhr, status, error) => {
              console.log(xhr)
            },
            success: (data) => {
                resolve(data);
            }
        });
    });
}

//end of ajax

function timeDifference(prev) {
    
    var current = Date.now();
    var previous = new Date(prev);
    var msPerMinute = 60 * 1000;
    var msPerHour = msPerMinute * 60;
    var msPerDay = msPerHour * 24;
    var msPerMonth = msPerDay * 30;
    var msPerYear = msPerDay * 365;
    
    var elapsed = current - previous;
    
    var word;
    if (elapsed < msPerMinute) {
        word = ' ' + ((Math.round(elapsed/1000) == 1) ? ' second ago' : ' seconds ago');
        return Math.round(elapsed/1000) + word ;   
    }
    
    else if (elapsed < msPerHour) {
        word = ' ' + ((Math.round(elapsed/msPerMinute) == 1) ?  ' minute ago' : ' minutes ago');
        return Math.round(elapsed/msPerMinute) + word;   
    }
    
    else if (elapsed < msPerDay ) {
        word = ((Math.round(elapsed/msPerHour ) == 1) ? ' hour ago' : ' hours ago'); 
        return Math.round(elapsed/msPerHour ) + word ;   
    }

    else if (elapsed < msPerMonth) {
        word = (Math.round(elapsed/msPerDay) == 1) ? ' day ago' : ' days ago';
        return 'approximately ' + Math.round(elapsed/msPerDay) + ' ' +  word + ' : ' + prev;    
    }
    
    else if (elapsed < msPerYear) {
        word = ( Math.round(elapsed/msPerMonth) == 1) ? ' month ago' : ' months ago'; 
        return 'approximately ' + Math.round(elapsed/msPerMonth) + ' ' + word + ' : ' + prev;   
    }
    
    else {
        word = ( Math.round(elapsed/msPerYear ) == 1) ? ' year ago' : ' years ago';
        return 'approximately ' + Math.round(elapsed/msPerYear ) + word + ' : ' + prev;   
    }
}


//set Operations
function setDifferenceJSON(a1, a2, l = true, trigger = 'issueID'){
    var diff = [];
    var remains = [];

    if(l){
        for (const key in a1) {
            if (!JSONSearch(a2, trigger, a1[key][trigger])) {
                diff.push(a1[key]); 
            }else{
                remains.push(a1[key]); 
            }   
        }
    }else{
        for (const key in a2) {
            if (!JSONSearch(a1, trigger, a2[key][trigger])) {
                diff.push(a2[key]); 
            }   else {
                remains.push(a2[key]); 
            }
        }

    }

    return { diff: diff, remains: remains };
}

function JSONSearch(json, key, value){
    
    for (const j in json) {
        if(json[j][key] === value){
            return j;
        }
    }

    return false;
}


