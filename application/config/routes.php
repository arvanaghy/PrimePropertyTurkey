<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = 'Custom404';
$route['translate_uri_dashes'] = FALSE;

$route['blog/(:any)'] = 'blog/details/$1';
$route['news/(:any)'] = 'news/details/$1';
$route['BlogFind/(:any)'] = 'BlogFind/details/$1';
$route['NewsFind/(:any)'] = 'NewsFind/details/$1';
//$route['Like/blog/(:any)'] = 'Like/blog/$1';
//$route['Dislike/blog/(:any)'] = 'Dislike/blog/$1';
//$route['Like/news/(:any)'] = 'Like/news/$1';
//$route['Dislike/news/(:any)'] = 'Dislike/news/$1';


$route['ru/blog'] = 'Ru/blogIndex';
$route['ru/blog/(:any)'] = 'Ru/blog/$1';
$route['ru/'] = 'Ru/index';
$route['ru/citizenship-by-investment-in-turkey'] = 'Ru/CitizenshipByInvestment';
$route['ru/short-term-residency-permit'] = 'Ru/ShortTermResidency';
$route['ru/short-term-residency-extension'] = 'Ru/ShortTermExtension';
$route['ru/frequently-asked-questions-faq'] = 'Ru/FAQ';
$route['ru/about-us'] = 'Ru/AboutUS';
$route['ru/contact-us'] = 'Ru/ContactUs';
$route['ru/How-To-Buy-Property-In-Turkey'] = 'Ru/BuyerGuide';
$route['ru/buying-online'] = 'Ru/BuyingOnline';
$route['ru/after-sales'] = 'Ru/AfterSales';
$route['ru/area-guide'] = 'Ru/AreaGuide';
$route['ru/properties/(:any)'] = 'RU_Properties/index/$1';
$route['ru/properties'] = 'RU_Properties/index';

$route['ru/Properties/Istanbul'] = 'RU_Properties/Istanbul';
$route['ru/properties/Istanbul/(:any)'] = 'RU_Properties/Istanbul/$1';

$route['ru/Properties/Fethiye'] = 'RU_Properties/Fethiye';
$route['ru/properties/Fethiye/(:any)'] = 'RU_Properties/Fethiye/$1';

$route['ru/Properties/Bursa'] = 'RU_Properties/Bursa';
$route['ru/properties/Bursa/(:any)'] = 'RU_Properties/Bursa/$1';

$route['ru/Properties/Kalkan'] = 'RU_Properties/Kalkan';
$route['ru/properties/Kalkan/(:any)'] = 'RU_Properties/Kalkan/$1';

$route['ru/Properties/Kas'] = 'RU_Properties/Kas';
$route['ru/properties/Kas/(:any)'] = 'RU_Properties/Kas/$1';

$route['ru/Properties/Gocek'] = 'RU_Properties/Gocek';
$route['ru/properties/Gocek/(:any)'] = 'RU_Properties/Gocek/$1';

$route['ru/Properties/Izmir'] = 'RU_Properties/Izmir';
$route['ru/properties/Izmir/(:any)'] = 'RU_Properties/Izmir/$1';

$route['ru/Properties/Antalya'] = 'RU_Properties/Antalya';
$route['ru/properties/Antalya/(:any)'] = 'RU_Properties/Antalya/$1';

$route['ru/Properties/Yalova'] = 'RU_Properties/Yalova';
$route['ru/properties/Yalova/(:any)'] = 'RU_Properties/Yalova/$1';

$route['ru/Properties/Trabzon'] = 'RU_Properties/Trabzon';
$route['ru/properties/Trabzon/(:any)'] = 'RU_Properties/Trabzon/$1';

$route['ru/Properties/Adalar'] = 'RU_Properties/Adalar';
$route['ru/properties/Adalar/(:any)'] = 'RU_Properties/Adalar/$1';

$route['ru/Properties/Arnavutkoy'] = 'RU_Properties/Arnavutkoy';
$route['ru/properties/Arnavutkoy/(:any)'] = 'RU_Properties/ArnavutkoyAdalar/$1';

$route['ru/Properties/Atasehir'] = 'RU_Properties/Atasehir';
$route['ru/properties/Atasehir/(:any)'] = 'RU_Properties/Atasehir/$1';

$route['ru/Properties/Avcilar'] = 'RU_Properties/Avcilar';
$route['ru/properties/Avcilar/(:any)'] = 'RU_Properties/Avcilar/$1';

$route['ru/Properties/Bagcilar'] = 'RU_Properties/Bagcilar';
$route['ru/properties/Bagcilar/(:any)'] = 'RU_Properties/Bagcilar/$1';

$route['ru/Properties/Bahcelievler'] = 'RU_Properties/Bahcelievler';
$route['ru/properties/Bahcelievler/(:any)'] = 'RU_Properties/Bahcelievler/$1';

$route['ru/Properties/Bakirkoy'] = 'RU_Properties/Bakirkoy';
$route['ru/properties/Bakirkoy/(:any)'] = 'RU_Properties/Bakirkoy/$1';

$route['ru/Properties/Basaksehir'] = 'RU_Properties/Basaksehir';
$route['ru/properties/Basaksehir/(:any)'] = 'RU_Properties/Basaksehir/$1';

$route['ru/Properties/Beylikduzu'] = 'RU_Properties/Beylikduzu';
$route['ru/properties/Beylikduzu/(:any)'] = 'RU_Properties/Beylikduzu/$1';

$route['ru/Properties/Beykoz'] = 'RU_Properties/Beykoz';
$route['ru/properties/Beykoz/(:any)'] = 'RU_Properties/Beykoz/$1';

$route['ru/Properties/Besiktas'] = 'RU_Properties/Besiktas';
$route['ru/properties/Besiktas/(:any)'] = 'RU_Properties/Besiktas/$1';

$route['ru/Properties/Bayrampasa'] = 'RU_Properties/Bayrampasa';
$route['ru/properties/Bayrampasa/(:any)'] = 'RU_Properties/Bayrampasa/$1';

$route['ru/Properties/Beyoglu'] = 'RU_Properties/Beyoglu';
$route['ru/properties/Beyoglu/(:any)'] = 'RU_Properties/Beyoglu/$1';

$route['ru/Properties/Esenler'] = 'RU_Properties/Esenler';
$route['ru/properties/Esenler/(:any)'] = 'RU_Properties/Esenler/$1';

$route['ru/Properties/Cekmekoy'] = 'RU_Properties/Cekmekoy';
$route['ru/properties/Cekmekoy/(:any)'] = 'RU_Properties/Cekmekoy/$1';

$route['ru/Properties/Catalca'] = 'RU_Properties/Catalca';
$route['ru/properties/Catalca/(:any)'] = 'RU_Properties/Catalca/$1';

$route['ru/Properties/Buyukcekmece'] = 'RU_Properties/Buyukcekmece';
$route['ru/properties/Buyukcekmece/(:any)'] = 'RU_Properties/Buyukcekmece/$1';

$route['ru/Properties/Gaziosmanpasa'] = 'RU_Properties/Gaziosmanpasa';
$route['ru/properties/Gaziosmanpasa/(:any)'] = 'RU_Properties/Gaziosmanpasa/$1';

$route['ru/Properties/Eyup'] = 'RU_Properties/Eyup';
$route['ru/properties/Eyup/(:any)'] = 'RU_Properties/Eyup/$1';

$route['ru/Properties/Fatih'] = 'RU_Properties/Fatih';
$route['ru/properties/Fatih/(:any)'] = 'RU_Properties/Fatih/$1';

$route['ru/Properties/Esenyurt'] = 'RU_Properties/Esenyurt';
$route['ru/properties/Esenyurt/(:any)'] = 'RU_Properties/Esenyurt/$1';

$route['ru/Properties/Kartal'] = 'RU_Properties/Kartal';
$route['ru/properties/Kartal/(:any)'] = 'RU_Properties/Kartal/$1';

$route['ru/Properties/Kagithane'] = 'RU_Properties/Kagithane';
$route['ru/properties/Kagithane/(:any)'] = 'RU_Properties/Kagithane/$1';

$route['ru/Properties/Kadikoy'] = 'RU_Properties/Kadikoy';
$route['ru/properties/Kadikoy/(:any)'] = 'RU_Properties/Kadikoy/$1';

$route['ru/Properties/Gungoren'] = 'RU_Properties/Gungoren';
$route['ru/properties/Gungoren/(:any)'] = 'RU_Properties/Gungoren/$1';

$route['ru/Properties/Maltepe'] = 'RU_Properties/Maltepe';
$route['ru/properties/Maltepe/(:any)'] = 'RU_Properties/Maltepe/$1';

$route['ru/Properties/Kucukcekmece'] = 'RU_Properties/Kucukcekmece';
$route['ru/properties/Kucukcekmece/(:any)'] = 'RU_Properties/Kucukcekmece/$1';

$route['ru/Properties/Sile'] = 'RU_Properties/Sile';
$route['ru/properties/Sile/(:any)'] = 'RU_Properties/Sile/$1';

$route['ru/Properties/Sariyer'] = 'RU_Properties/Sariyer';
$route['ru/properties/Sariyer/(:any)'] = 'RU_Properties/Sariyer/$1';

$route['ru/Properties/Sancaktepe'] = 'RU_Properties/Sancaktepe';
$route['ru/properties/Sancaktepe/(:any)'] = 'RU_Properties/Sancaktepe/$1';

$route['ru/Properties/Pendik'] = 'RU_Properties/Pendik';
$route['ru/properties/Pendik/(:any)'] = 'RU_Properties/Pendik/$1';

$route['ru/Properties/Tuzla'] = 'RU_Properties/Tuzla';
$route['ru/properties/Tuzla/(:any)'] = 'RU_Properties/Tuzla/$1';

$route['ru/Properties/Sultangazi'] = 'RU_Properties/Sultangazi';
$route['ru/properties/Sultangazi/(:any)'] = 'RU_Properties/Sultangazi/$1';

$route['ru/Properties/Sultanbeyli'] = 'RU_Properties/Sultanbeyli';
$route['ru/properties/Sultanbeyli/(:any)'] = 'RU_Properties/Sultanbeyli/$1';

$route['ru/Properties/Sisli'] = 'RU_Properties/Sisli';
$route['ru/properties/Sisli/(:any)'] = 'RU_Properties/Sisli/$1';

$route['ru/Properties/Silivri'] = 'RU_Properties/Silivri';
$route['ru/properties/Silivri/(:any)'] = 'RU_Properties/Silivri/$1';

$route['ru/Properties/Umraniye'] = 'RU_Properties/Umraniye';
$route['ru/properties/Umraniye/(:any)'] = 'RU_Properties/Umraniye/$1';

$route['ru/Properties/Uskudar'] = 'RU_Properties/Uskudar';
$route['ru/properties/Uskudar/(:any)'] = 'RU_Properties/Uskudar/$1';

$route['ru/Properties/Zeytinburnu'] = 'RU_Properties/Zeytinburnu';
$route['ru/properties/Zeytinburnu/(:any)'] = 'RU_Properties/Zeytinburnu/$1';

$route['about-us'] = 'about_us';
$route['contact-us'] = 'contact_us';
$route['buying-online'] = 'buying_online';
$route['privacy-policy'] = 'privacy_policy';
$route['area-guide'] = 'area_guide';
$route['How-To-Buy-Property-In-Turkey'] = 'Buyer_guide';
$route['citizenship-by-investment-in-turkey'] = 'Citizenship_by_investment_in_turkey';
$route['short-term-residency-permit'] = 'short_term_residency_permit';
$route['short-term-residency-extension'] = 'short_term_residency_extension';
$route['frequently-asked-questions-faq'] = 'frequently_asked_questions_faq';
$route['after-sales'] = 'after_sales';
$route['apartment-for-investment-in-turkey'] = 'ApartmentForInvestment/index';
$route['Legal-Team'] = 'Legal_Team/index';

$route['Resale/Preview/(:any)'] = 'Resale/Preview/$1';
$route['Resale/PreviewPublishedResale/(:any)'] = 'Resale/PreviewPublishedResale/$1';

$route['Verification/userRegister/(:any)'] ='Verification/userRegister/$1';
$route['Verification/passwordReset/(:any)'] ='Verification/passwordReset/$1';
$route['Signup/Verification/(:any)'] ='Signup/Verification/$1';

$route['Turkey/(:any)/(:any)/(:any)/(:any)'] = 'Turkey/index/$1_$2_$3_$4';
$route['Turkey/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'Turkey/pagination/$1_$2_$3_$4_$5';

$route['ru/Turkey/(:any)/(:any)/(:any)/(:any)'] = 'Ru_TF/index/$1_$2_$3_$4';
$route['ru/Turkey/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'Ru_TF/pagination/$1_$2_$3_$4_$5';

$route['prime-videos'] = 'Prime_Videos/index/';
$route['prime-videos/(:any)'] = 'Prime_Videos/details/$1';

$route['ru/prime-videos'] = 'Ru_PV/index/';
$route['ru/prime-videos/(:any)'] = 'Ru_PV/details/$1';

$route['ru/properties/Search/(:any)'] = 'Ru/Search/$1';
$route['ru/Properties/Search'] = 'Ru/Search';


$route['seo/sitemap\.xml'] = "seo/sitemap";

// properties routes
$route['properties/(:any)'] = 'properties/details/$1';
$route['property/(:any)'] = 'Custom404';
$route['properties/Istanbul/(:any)'] = 'properties/Istanbul/$1';
$route['properties/Fethiye/(:any)'] = 'properties/Fethiye/$1';
$route['properties/Bursa/(:any)'] = 'properties/Bursa/$1';
$route['properties/Kalkan/(:any)'] = 'properties/Kalkan/$1';
$route['properties/Kas/(:any)'] = 'properties/Kas/$1';
$route['properties/Gocek/(:any)'] = 'properties/Gocek/$1';
$route['properties/Izmir/(:any)'] = 'properties/Izmir/$1';
$route['properties/Apartment/(:any)'] = 'properties/Apartment/$1';
$route['properties/Bungalow/(:any)'] = 'properties/Bungalow/$1';
//$route['properties/Hotel'] = 'properties/Hotel/$1';
$route['properties/Duplex/(:any)'] = 'properties/Duplex/$1';
$route['properties/Mansion/(:any)'] = 'properties/Mansion/$1';
$route['properties/Land_for_sale/(:any)'] = 'properties/Land_for_sale/$1';
$route['properties/Penthouse/(:any)'] = 'properties/Penthouse/$1';
$route['properties/Villa/(:any)'] = 'properties/Villa/$1';
$route['properties/Commercial/(:any)'] = 'properties/Commercial/$1';
$route['properties/Search/(:any)'] = 'properties/Search/$1';
$route['properties/Featured/(:any)'] = 'properties/Featured/$1';
$route['PrintPreview/setPrintView/(:any)'] = 'PrintPreview/setPrintView/$1';

// Istanbul Ilce routes
$route['properties/Adalar/(:any)'] = 'properties/Adalar/$1';
$route['properties/Arnavutkoy/(:any)'] = 'properties/Arnavutkoy/$1';
$route['properties/Atasehir/(:any)'] = 'properties/Atasehir/$1';
$route['properties/Avcilar/(:any)'] = 'properties/Avcilar/$1';
$route['properties/Bagcilar/(:any)'] = 'properties/Bagcilar/$1';
$route['properties/Bahcelievler/(:any)'] = 'properties/Bahcelievler/$1';
$route['properties/Bakirkoy/(:any)'] = 'properties/Bakirkoy/$1';
$route['properties/Basaksehir/(:any)'] = 'properties/Basaksehir/$1';
$route['properties/Bayrampasa/(:any)'] = 'properties/Bayrampasa/$1';
$route['properties/Besiktas/(:any)'] = 'properties/Besiktas/$1';
$route['properties/Beykoz/(:any)'] = 'properties/Beykoz/$1';
$route['properties/Beylikduzu/(:any)'] = 'properties/Beylikduzu/$1';
$route['properties/Beyoglu/(:any)'] = 'properties/Beyoglu/$1';
$route['properties/Buyukcekmece/(:any)'] = 'properties/Buyukcekmece/$1';
$route['properties/Catalca/(:any)'] = 'properties/Catalca/$1';
$route['properties/Cekmekoy/(:any)'] = 'properties/Cekmekoy/$1';
$route['properties/Esenler/(:any)'] = 'properties/Esenler/$1';
$route['properties/Esenyurt/(:any)'] = 'properties/Esenyurt/$1';
$route['properties/Eyup/(:any)'] = 'properties/Eyup/$1';
$route['properties/Fatih/(:any)'] = 'properties/Fatih/$1';
$route['properties/Gaziosmanpasa/(:any)'] = 'properties/Gaziosmanpasa/$1';
$route['properties/Gungoren/(:any)'] = 'properties/Gungoren/$1';
$route['properties/Kadikoy/(:any)'] = 'properties/Kadikoy/$1';
$route['properties/Kagithane/(:any)'] = 'properties/Kagithane/$1';
$route['properties/Kartal/(:any)'] = 'properties/Kartal/$1';
$route['properties/Kucukcekmece/(:any)'] = 'properties/Kucukcekmece/$1';
$route['properties/Maltepe/(:any)'] = 'properties/Maltepe/$1';
$route['properties/Pendik/(:any)'] = 'properties/Pendik/$1';
$route['properties/Sancaktepe/(:any)'] = 'properties/Sancaktepe/$1';
$route['properties/Sariyer/(:any)'] = 'properties/Sariyer/$1';
$route['properties/Sile/(:any)'] = 'properties/Sile/$1';
$route['properties/Sisli/(:any)'] = 'properties/Sisli/$1';
$route['properties/Sultanbeyli/(:any)'] = 'properties/Sultanbeyli/$1';
$route['properties/Sultangazi/(:any)'] = 'properties/Sultangazi/$1';
$route['properties/Tuzla/(:any)'] = 'properties/Tuzla/$1';
$route['properties/Umraniye/(:any)'] = 'properties/Umraniye/$1';
$route['properties/Silivri/(:any)'] = 'properties/Silivri/$1';
$route['properties/Uskudar/(:any)'] = 'properties/Uskudar/$1';
$route['properties/Zeytinburnu/(:any)'] = 'properties/Zeytinburnu/$1';

// route old site to new one

$route['blog/blogs/(:any)'] = 'Custom404';
$route['blog/blogs/'] = 'Custom404';
$route['News/news/(:any)'] = 'Custom404';
$route['News/news/'] = 'Custom404';

$route['city'] = 'Custom404';
$route['city/(:any)'] = 'Custom404';

$route['Real_estate'] ='Custom404';
$route['Real_estate/(:any)'] ='Custom404';

//route user functions
$route['User/Delete_Property/(:any)'] = 'User/Delete_Property/$1';
$route['User/Edit_Property/(:any)'] = 'User/Edit_Property/$1';
$route['User/Delete_Published_Property/(:any)'] = 'User/Delete_Published_Property/$1';
$route['User/Delete_Resale_Image/(:any)'] = 'User/Delete_Resale_Image/$1';

//route admin functions
$route['Admin/Delete_Property/(:any)'] ='Admin/Delete_Property/$1';
$route['Admin/Delete_Blog/(:any)'] ='Admin/Delete_Blog/$1';
$route['Admin/Delete_Videos/(:any)'] ='Admin/Delete_Videos/$1';
$route['Admin/Delete_News/(:any)'] ='Admin/Delete_News/$1';

$route['Admin/Publish_Property/(:any)'] ='Admin/Publish_Property/$1';
$route['Admin/Publish_News/(:any)'] ='Admin/Publish_News/$1';
$route['Admin/Publish_Videos/(:any)'] ='Admin/Publish_Videos/$1';
$route['Admin/Publish_Blog/(:any)'] ='Admin/Publish_Blog/$1';

$route['Admin/Edit_News/(:any)'] ='Admin/Edit_News/$1';
$route['Admin/Edit_Blog/(:any)'] ='Admin/Edit_Blog/$1';
$route['Admin/Edit_Videos/(:any)'] ='Admin/Edit_Videos/$1';
$route['Admin/Edit_Property/(:any)'] ='Admin/Edit_Property/$1';
$route['Admin/Delete_Property_Gallery/(:any)'] ='Admin/Delete_Property_Gallery/$1';

$route['Admin/Show_Blog_Comments/(:any)'] ='Admin/Show_Blog_Comments/$1';
$route['Admin/Show_News_Comments/(:any)'] ='Admin/Show_News_Comments/$1';

$route['Admin/Delete_Blog_Comment/(:any)'] ='Admin/Delete_Blog_Comment/$1';
$route['Admin/Delete_News_Comment/(:any)'] ='Admin/Delete_News_Comment/$1';

$route['Admin/Publish_Blog_Comment/(:any)'] ='Admin/Publish_Blog_Comment/$1';
$route['Admin/Publish_News_Comment/(:any)'] ='Admin/Publish_News_Comment/$1';

$route['Admin/DeleteForEver_Property/(:any)'] ='Admin/DeleteForEver_Property/$1';
$route['Admin/DeleteForEver_Blog/(:any)'] ='Admin/DeleteForEver_Blog/$1';
$route['Admin/DeleteForEver_News/(:any)'] ='Admin/DeleteForEver_News/$1';
$route['Admin/DeleteForEver_Videos/(:any)'] ='Admin/DeleteForEver_Videos/$1';

$route['Admin/Change_Job/(:any)'] ='Admin/Change_Job/$1';

$route['Admin/Publish/(:any)'] ='Admin/Publish/$1';
$route['Admin/UnPublish/(:any)'] ='Admin/UnPublish/$1';
