$(document).ready(function(){
    let x = document.getElementById("toast_message");
    switch (x.className){
        case 'success':
            x.className = "show success";
            setTimeout(function(){ x.className = x.className.replace("show success", ""); }, 18000);
            break;
        case 'warning':
            x.className = "show warning";
            setTimeout(function(){ x.className = x.className.replace("show warning", ""); }, 18000);
            break;
        case 'danger':
            x.className = "show danger";
            setTimeout(function(){ x.className = x.className.replace("show danger", ""); }, 18000);
            break;
        default:
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 18000);
    }
    let s = document.getElementById("toast_message_success");
    switch (s.className){
        case 'success':
            s.className = "show success";
            setTimeout(function(){ s.className = s.className.replace("show success", ""); }, 18000);
            break;
        case 'warning':
            s.className = "show warning";
            setTimeout(function(){ s.className = s.className.replace("show warning", ""); }, 18000);
            break;
        case 'danger':
            s.className = "show danger";
            setTimeout(function(){ s.className = s.className.replace("show danger", ""); }, 18000);
            break;
        default:
            s.className = "show";
            setTimeout(function(){ s.className = s.className.replace("show", ""); }, 18000);
    }
    let f = document.getElementById("toast_failed");
    switch (f.className){
        case 'success':
            f.className = "show success";
            setTimeout(function(){ f.className = f.className.replace("show success", ""); }, 18000);
            break;
        case 'warning':
            f.className = "show warning";
            setTimeout(function(){ f.className = f.className.replace("show warning", ""); }, 18000);
            break;
        case 'danger':
            f.className = "show danger";
            setTimeout(function(){ f.className = f.className.replace("show danger", ""); }, 18000);
            break;
        default:
            f.className = "show";
            setTimeout(function(){ f.className = f.className.replace("show", ""); }, 18000);
    }
});