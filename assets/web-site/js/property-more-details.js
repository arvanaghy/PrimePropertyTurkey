$(document).ready(function () {
    $("#more-details").click(function () {
        $("#show-more").toggle(400, function () {
            if (document.getElementById('show-more').style.display == 'none') {
                document.getElementById('more-details').innerHTML = ' More Details ';
            } else {
                document.getElementById('more-details').innerHTML = ' Less Details ';
            }
        });
    });
});