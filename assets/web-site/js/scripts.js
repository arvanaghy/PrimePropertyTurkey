$("#searchToggle").on('click',function(){
    $("#toggle-search").toggle();
    $("#search").val('');
    $("#search").focus();
});
let mybutton = document.getElementById("btn-back-to-top");
function scrollFunction() {
    document.body.scrollTop > 20 || document.documentElement.scrollTop > 20 ? mybutton.style.display = "block" : mybutton.style.display = "none"
}
window.onscroll = function () {
    scrollFunction()
};
let x = document.getElementById("toast_message");
switch (x.className) {
    case"success":
        x.className = "show success", setTimeout(function () {
            x.className = x.className.replace("show success", "")
        }, 18e3);
        break;
    case"warning":
        x.className = "show warning", setTimeout(function () {
            x.className = x.className.replace("show warning", "")
        }, 18e3);
        break;
    case"danger":
        x.className = "show danger", setTimeout(function () {
            x.className = x.className.replace("show danger", "")
        }, 18e3);
        break;
    default:
        x.className = "show", setTimeout(function () {
            x.className = x.className.replace("show", "")
        }, 18e3)
}