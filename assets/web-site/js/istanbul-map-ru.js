const istanbul_ilce_list = ["Istanbul","Adalar","Arnavutkoy","Atasehir","Avcilar","Bagcilar","Bahcelievler","Bakirkoy","Basaksehir","Bayrampasa","Besiktas","Beykoz",
    "Beylikduzu","Beyoglu","Buyukcekmece","Catalca","Cekmekoy","Esenler","Esenyurt","Eyup","Fatih","Gaziosmanpasa","Gungoren","Kadikoy","Kagithane",
    "Kartal","Kucukcekmece","Maltepe","Pendik","Sancaktepe","Sariyer","Sile","Sisli","Sultanbeyli","Sultangazi","Tuzla","Umraniye","Silivri","Uskudar","Zeytinburnu"];
const Kapali_ilce_list = ["Avcilar","Bahcelievler","Basaksehir","Besiktas","Beylikduzu","Beyoglu","Esenyurt","Fatih","Kucukcekmece","Sariyer","Sile","Sisli","Tuzla","Umraniye","Zeytinburnu"];
const kapali_mahallaler = [
    ["Avcilar","DENİZKÖŞKLER MAHALLESİ"],
    ["Avcilar","MERKEZ MAHALLESİ"],
    ["Avcilar","GÜMÜŞPALA MAHALLESİ"],
    ["Bahcelievler","ŞİRİNEVLER MAHALLESİ"],
    ["Basaksehir","İKİTELLİ OSB MAHALLESİ"],
    ["Basaksehir","ZİYA GÖKALP MAHALLESİ"],
    ["Besiktas","YILDIZ MAHALLESİ"],
    ["Beylikduzu","BEYLİKDÜZÜOSB MAHALLESİ"]
];

function showClosedArea(element) {
    let element_class = '.mah_'+element;
    let element_count = document.querySelectorAll(element_class).length;
    if (element_count>0){
        for (let i=1; i<=element_count;i++){
            document.getElementById(element+'-mah-'+i).style.display = 'inline-block';
        }
    }
}
function disappearClosedArea(element) {
    let element_class = '.mah_'+element;
    let element_count = document.querySelectorAll(element_class).length;
    if (element_count>0){
        for (let i=1; i<=element_count;i++){
            document.getElementById(element+'-mah-'+i).style.display = 'none';
        }
    }
}
function apearPopUp(element) {
    document.getElementById(element + '-pop-1').style.display = 'inline-block';
    document.getElementById(element + '-pop-2').style.display = 'inline-block';
    document.getElementById(element + '-pop-3').style.display = 'inline-block';
}
function disappearPopUp(element) {
    document.getElementById(element + '-pop-1').style.display = 'none';
    document.getElementById(element + '-pop-2').style.display = 'none';
    document.getElementById(element + '-pop-3').style.display = 'none';
}
function focus_color(element) {
    element.style.fill = '#012169';
    apearPopUp(element.id);
    showClosedArea(element.id);
}
function reset_color(element) {
    if (Kapali_ilce_list.includes(istanbul_ilce_list[element.id])){
        document.getElementById(element.id).style.fill = '#ff8c00';
    }else{
        document.getElementById(element.id).style.fill = '#b4cbe5';
    }
    disappearPopUp(element.id);
    disappearClosedArea(element.id);
}
function reset_color_side(element){
    let id = element.id
    let regex=/^([0-9]{1,2})/;
    found = id.match(regex)
    if (Kapali_ilce_list.includes(istanbul_ilce_list[found[1]])){
        document.getElementById(found[1]).style.fill = '#ff8c00';
    }else{
        document.getElementById(found[1]).style.fill = '#b4cbe5';
    }
    disappearPopUp(found[1]);
    disappearClosedArea(found[1]);
}
function focus_color_side(element){
    let id = element.id
    let regex=/^([0-9]{1,2})/;
    found = id.match(regex)
    document.getElementById(found[1]).style.fill = '#012169';
    apearPopUp(found[1]);
    showClosedArea(found[1]);
}
function focus_color_number(element) {
    let id = element.id
    let regex=/^([0-9]{1,2})/;
    found = id.match(regex);
    document.getElementById(found[1]).style.fill = '#012169';
    apearPopUp(found[1]);
    showClosedArea(found[1]);
}
function show_popup_name(element) {
    let id = element.id
    let regex=/^([0-9]{1,2})/;
    found = id.match(regex);
    window.location="https://www.primepropertyturkey.com/ru/Properties/"+istanbul_ilce_list[found[1]];
}
function toggle_map(element) {
    let id = element.id
    let regex=/^([0-9]{1,2})/;
    found = id.match(regex);
    document.getElementById(found[1]).style.fill = '#012169';
    window.location="https://www.primepropertyturkey.com/ru/Properties/"+istanbul_ilce_list[found[1]];
}
function numberToggleMap(element) {
    let id = element.id
    let regex=/^([0-9]{1,2})/;
    found = id.match(regex);
    document.getElementById(found[1]).style.fill = '#012169';
    window.location="https://www.primepropertyturkey.com/ru/Properties/"+istanbul_ilce_list[found[1]];
}