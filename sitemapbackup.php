<!--    --><?// foreach($Property_ILCE as $url) { ?>
<!--        <url>-->
<!--            <loc>--><?//= base_url().'Properties/'.$url; ?><!--</loc>-->
<!--            <changefreq>daily</changefreq>-->
<!--            <priority>1.0</priority>-->
<!--        </url>-->
<!--    --><?// } ?>
<url>
    <loc><?= base_url();?>Turkey/All-cities/All-types/All-bedroom/0-5000000</loc>
    <changefreq>daily</changefreq>
    <priority>0.3</priority>
</url>
<!--    --><?// foreach($Property_pages as $url) { ?>
<!--        <url>-->
<!--            <loc>--><?//= base_url().'Turkey/'.$url->Property_location.'/All-types/All-bedroom/0-5000000/'; ?><!--</loc>-->
<!--            <changefreq>daily</changefreq>-->
<!--            <priority>0.9</priority>-->
<!--        </url>-->
<!--    --><?// } ?>
<!--    --><?// foreach($Property_Types as $url) { ?>
<!--        <url>-->
<!--            <loc>--><?//= base_url().'Turkey/All-cities/'.$url->Property_type.'/All-bedroom/0-5000000/'; ?><!--</loc>-->
<!--            <changefreq>daily</changefreq>-->
<!--            <priority>0.8</priority>-->
<!--        </url>-->
<!--    --><?// } ?>
<!--    --><?// foreach($Property_Bedrooms as $url) { ?>
<!--        <url>-->
<!--            <loc>--><?//= base_url().'Turkey/All-cities/All-types/'.$url->Property_Bedrooms.'-bedroom/0-5000000/'; ?><!--</loc>-->
<!--            <changefreq>daily</changefreq>-->
<!--            <priority>0.8</priority>-->
<!--        </url>-->
<!--    --><?// } ?>
<!--    --><?// foreach($price_array as $url) { ?>
<!--        <url>-->
<!--            <loc>--><?//= base_url().'Turkey/All-cities/All-types/All-bedroom/0-'.$url.'/'; ?><!--</loc>-->
<!--            <changefreq>daily</changefreq>-->
<!--            <priority>0.8</priority>-->
<!--        </url>-->
<!--    --><?// } ?>
<!--    --><?// foreach($Property_City_Type_Filters as $url) { ?>
<!--        <url>-->
<!--            <loc>--><?//= base_url().'Turkey/'.$url->Property_location.'/'.$url->Property_type.'/All-bedroom/0-5000000/'; ?><!--</loc>-->
<!--            <changefreq>daily</changefreq>-->
<!--            <priority>0.8</priority>-->
<!--        </url>-->
<!--    --><?// } ?>
<!--    --><?// foreach($Property_City_Bedroom_Filters as $url) { ?>
<!--        <url>-->
<!--            <loc>--><?//= base_url().'Turkey/'.$url->Property_location.'/All-types/'.$url->Property_Bedrooms.'-bedroom/0-5000000/'; ?><!--</loc>-->
<!--            <changefreq>daily</changefreq>-->
<!--            <priority>0.8</priority>-->
<!--        </url>-->
<!--    --><?// } ?>
<!--    --><?// foreach($price_array as $price){
//       $text = 'Property_City_Price_'.$price.'_Filters';
//       foreach(${$text} as $url) { ?>
<!--            <url>-->
<!--                <loc>--><?//= base_url().'Turkey/'.$url->Property_location.'/All-types/All-bedroom/0-'.$price.'/'; ?><!--</loc>-->
<!--                <changefreq>daily</changefreq>-->
<!--                <priority>0.8</priority>-->
<!--            </url>-->
<!--        --><?// } ?>
<!--    --><?// } ?>
<!--    --><?// foreach($Property_Type_Bedroom_Filters as $url) { ?>
<!--        <url>-->
<!--            <loc>--><?//= base_url().'Turkey/All-cities/'.$url->Property_type.'/'.$url->Property_Bedrooms.'-bedroom/0-5000000/'; ?><!--</loc>-->
<!--            <changefreq>daily</changefreq>-->
<!--            <priority>0.8</priority>-->
<!--        </url>-->
<!--    --><?// } ?>
<!--    --><?// foreach($price_array as $price){
//        $text = 'Property_Type_Bedroom_Price_'.$price.'_Filters';
//        foreach(${$text} as $url) { ?>
<!--            <url>-->
<!--                <loc>--><?//= base_url().'Turkey/All-cities/'.$url->Property_type.'/'.$url->Property_Bedrooms.'-bedroom/0-'.$price.'/'; ?><!--</loc>-->
<!--                <changefreq>daily</changefreq>-->
<!--                <priority>0.8</priority>-->
<!--            </url>-->
<!--        --><?// } ?>
<!--    --><?// } ?>
<!--    --><?// foreach($price_array as $price){
//        $text = 'Property_Bedroom_price_'.$price.'_Filters';
//        foreach(${$text} as $url) { ?>
<!--            <url>-->
<!--                <loc>--><?//= base_url().'Turkey/All-cities/All-types/'.$url->Property_Bedrooms.'-bedroom/0-'.$price.'/'; ?><!--</loc>-->
<!--                <changefreq>daily</changefreq>-->
<!--                <priority>0.8</priority>-->
<!--            </url>-->
<!--        --><?// } ?>
<!--    --><?// } ?>
<!--    --><?// foreach($Property_City_Type_Bedroom_Filters as $url) { ?>
<!--        <url>-->
<!--            <loc>--><?//= base_url().'Turkey/'.$url->Property_location.'/'.$url->Property_type.'/'.$url->Property_Bedrooms.'-bedroom/0-5000000/'; ?><!--</loc>-->
<!--            <changefreq>daily</changefreq>-->
<!--            <priority>0.8</priority>-->
<!--        </url>-->
<!--    --><?// } ?>
<!--    --><?// foreach($price_array as $price){
//        $text = 'Property_City_Type_Bedroom_price_'.$price.'_Filters';
//        foreach(${$text} as $url) { ?>
<!--            <url>-->
<!--                <loc>--><?//= base_url().'Turkey/'.$url->Property_location.'/'.$url->Property_type.'/'.$url->Property_Bedrooms.'-bedroom/0-'.$price.'/'; ?><!--</loc>-->
<!--                <changefreq>daily</changefreq>-->
<!--                <priority>0.8</priority>-->
<!--            </url>-->
<!--        --><?// } ?>
<!--    --><?// } ?>