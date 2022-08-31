$(document).ready(function () {
    $(".recently-owl").owlCarousel({
        loop: !0,
        margin: 10,
        nav: !0,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsiveClass: !0,
        responsive: {0: {items: 1}, 600: {items: 2}, 1000: {items: 4}}
    }), $(".recommended-owl").owlCarousel({
        loop: !0,
        margin: 10,
        nav: !0,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsiveClass: !0,
        responsive: {0: {items: 1}, 600: {items: 2}, 1000: {items: 4}}
    }), $(".youtube-owl").owlCarousel({
        loop: !0,
        margin: 10,
        nav: !0,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsiveClass: !0,
        responsive: {0: {items: 1}, 600: {items: 2}, 1000: {items: 3}}
    })
});

function show_recommended(city) {
    let istanbul = document.getElementById('istanbul_recommended');
    let fethiye = document.getElementById('fethiye_recommended');
    let kas = document.getElementById('kas_recommended');
    let kalkan = document.getElementById('kalkan_recommended');
    let gocek = document.getElementById('gocek_recommended');
    let all = document.getElementById('all_recommended');
    let btn_ist = document.getElementById('btn_ist');
    let btn_all = document.getElementById('btn_all');
    let btn_feth = document.getElementById('btn_feth');
    let btn_kal = document.getElementById('btn_kal');
    let btn_kas = document.getElementById('btn_kas');
    let btn_goc = document.getElementById('btn_goc');
    switch (city) {
        case "istanbul":
            all.style.display = 'none';
            fethiye.style.display = 'none';
            kas.style.display = 'none';
            kalkan.style.display = 'none';
            gocek.style.display = 'none';
            istanbul.style.display = 'block';
            btn_ist.classList.add('selected_recommend_button');
            btn_all.classList.remove('selected_recommend_button');
            btn_feth.classList.remove('selected_recommend_button');
            btn_kas.classList.remove('selected_recommend_button');
            btn_kal.classList.remove('selected_recommend_button');
            btn_goc.classList.remove('selected_recommend_button');
            break;
        case 'fethiye':
            all.style.display = 'none';
            fethiye.style.display = 'block';
            kas.style.display = 'none';
            kalkan.style.display = 'none';
            gocek.style.display = 'none';
            istanbul.style.display = 'none';
            btn_ist.classList.remove('selected_recommend_button');
            btn_all.classList.remove('selected_recommend_button');
            btn_feth.classList.add('selected_recommend_button');
            btn_kas.classList.remove('selected_recommend_button');
            btn_kal.classList.remove('selected_recommend_button');
            btn_goc.classList.remove('selected_recommend_button');
            break;
        case 'kas':
            all.style.display = 'none';
            fethiye.style.display = 'none';
            kas.style.display = 'block';
            kalkan.style.display = 'none';
            gocek.style.display = 'none';
            istanbul.style.display = 'none';
            btn_ist.classList.remove('selected_recommend_button');
            btn_all.classList.remove('selected_recommend_button');
            btn_feth.classList.remove('selected_recommend_button');
            btn_kas.classList.add('selected_recommend_button');
            btn_kal.classList.remove('selected_recommend_button');
            btn_goc.classList.remove('selected_recommend_button');
            break;
        case 'kalkan':
            all.style.display = 'none';
            fethiye.style.display = 'none';
            kas.style.display = 'none';
            kalkan.style.display = 'block';
            gocek.style.display = 'none';
            istanbul.style.display = 'none';
            btn_ist.classList.remove('selected_recommend_button');
            btn_all.classList.remove('selected_recommend_button');
            btn_feth.classList.remove('selected_recommend_button');
            btn_kas.classList.remove('selected_recommend_button');
            btn_kal.classList.add('selected_recommend_button');
            btn_goc.classList.remove('selected_recommend_button');
            break;
        case 'gocek':
            all.style.display = 'none';
            fethiye.style.display = 'none';
            kas.style.display = 'none';
            kalkan.style.display = 'none';
            gocek.style.display = 'block';
            istanbul.style.display = 'none';
            btn_ist.classList.remove('selected_recommend_button');
            btn_all.classList.remove('selected_recommend_button');
            btn_feth.classList.remove('selected_recommend_button');
            btn_kas.classList.remove('selected_recommend_button');
            btn_kal.classList.remove('selected_recommend_button');
            btn_goc.classList.add('selected_recommend_button');
            break;
        case 'all':
            all.style.display = 'block';
            fethiye.style.display = 'none';
            kas.style.display = 'none';
            kalkan.style.display = 'none';
            gocek.style.display = 'none';
            istanbul.style.display = 'none';
            btn_ist.classList.remove('selected_recommend_button');
            btn_all.classList.add('selected_recommend_button');
            btn_feth.classList.remove('selected_recommend_button');
            btn_kas.classList.remove('selected_recommend_button');
            btn_kal.classList.remove('selected_recommend_button');
            btn_goc.classList.remove('selected_recommend_button');
            break;
        default:
            all.style.display = 'block';
            fethiye.style.display = 'none';
            kas.style.display = 'none';
            kalkan.style.display = 'none';
            gocek.style.display = 'none';
            istanbul.style.display = 'none';
            btn_ist.classList.remove('selected_recommend_button');
            btn_all.classList.add('selected_recommend_button');
            btn_feth.classList.remove('selected_recommend_button');
            btn_kas.classList.remove('selected_recommend_button');
            btn_kal.classList.remove('selected_recommend_button');
            btn_goc.classList.remove('selected_recommend_button');
            break;
    }
}
