<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= base_url();?></loc>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?= base_url();?>Citizenship-by-investment-in-turkey</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?= base_url();?>short-term-residency-permit</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?= base_url();?>short-term-residency-extension</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?= base_url();?>frequently-asked-questions-faq</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?= base_url();?>How-To-Buy-Property-In-Turkey</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?= base_url();?>area-guide</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?= base_url();?>after-sales</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?= base_url();?>about-us</loc>
        <changefreq>yearly</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc><?= base_url();?>contact-us</loc>
        <changefreq>yearly</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc><?= base_url();?>Buying-online</loc>
        <changefreq>monthly</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc><?= base_url();?>privacy-policy</loc>
        <changefreq>yearly</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc><?= base_url();?>blog</loc>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?= base_url();?>news</loc>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
    </url>
    <? foreach($Property_pages as $url) { ?>
        <url>
            <loc><?= base_url().'Properties/'.$url->Property_location; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
    <? } ?>
    <? foreach($Property_ILCE as $url) { ?>
        <url>
            <loc><?= base_url().'Properties/'.$url; ?></loc>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>
    <? } ?>
    <url>
        <loc><?= base_url();?>Turkey/All-cities/All-types/All-bedroom/0-5000000</loc>
        <changefreq>daily</changefreq>
        <priority>0.3</priority>
    </url>
    <? foreach($Property_pages as $url) { ?>
        <url>
            <loc><?= base_url().'Turkey/'.$url->Property_location.'/All-types/All-bedroom/0-5000000/'; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
    <? } ?>
    <? foreach($Property_Types as $url) { ?>
        <url>
            <loc><?= base_url().'Turkey/All-cities/'.$url->Property_type.'/All-bedroom/0-5000000/'; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    <? } ?>
    <? foreach($Property_Bedrooms as $url) { ?>
        <url>
            <loc><?= base_url().'Turkey/All-cities/All-types/'.$url->Property_Bedrooms.'-bedroom/0-5000000/'; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    <? } ?>
    <? foreach($price_array as $url) { ?>
        <url>
            <loc><?= base_url().'Turkey/All-cities/All-types/All-bedroom/0-'.$url.'/'; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    <? } ?>
    <? foreach($Property_City_Type_Filters as $url) { ?>
        <url>
            <loc><?= base_url().'Turkey/'.$url->Property_location.'/'.$url->Property_type.'/All-bedroom/0-5000000/'; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    <? } ?>
    <? foreach($Property_City_Bedroom_Filters as $url) { ?>
        <url>
            <loc><?= base_url().'Turkey/'.$url->Property_location.'/All-types/'.$url->Property_Bedrooms.'-bedroom/0-5000000/'; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    <? } ?>
    <? foreach($price_array as $price){
       $text = 'Property_City_Price_'.$price.'_Filters';
       foreach(${$text} as $url) { ?>
            <url>
                <loc><?= base_url().'Turkey/'.$url->Property_location.'/All-types/All-bedroom/0-'.$price.'/'; ?></loc>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>
        <? } ?>
    <? } ?>
    <? foreach($Property_Type_Bedroom_Filters as $url) { ?>
        <url>
            <loc><?= base_url().'Turkey/All-cities/'.$url->Property_type.'/'.$url->Property_Bedrooms.'-bedroom/0-5000000/'; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    <? } ?>
    <? foreach($price_array as $price){
        $text = 'Property_Type_Bedroom_Price_'.$price.'_Filters';
        foreach(${$text} as $url) { ?>
            <url>
                <loc><?= base_url().'Turkey/All-cities/'.$url->Property_type.'/'.$url->Property_Bedrooms.'-bedroom/0-'.$price.'/'; ?></loc>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>
        <? } ?>
    <? } ?>
    <? foreach($price_array as $price){
        $text = 'Property_Bedroom_price_'.$price.'_Filters';
        foreach(${$text} as $url) { ?>
            <url>
                <loc><?= base_url().'Turkey/All-cities/All-types/'.$url->Property_Bedrooms.'-bedroom/0-'.$price.'/'; ?></loc>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>
        <? } ?>
    <? } ?>
    <? foreach($Property_City_Type_Bedroom_Filters as $url) { ?>
        <url>
            <loc><?= base_url().'Turkey/'.$url->Property_location.'/'.$url->Property_type.'/'.$url->Property_Bedrooms.'-bedroom/0-5000000/'; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    <? } ?>
    <? foreach($price_array as $price){
        $text = 'Property_City_Type_Bedroom_price_'.$price.'_Filters';
        foreach(${$text} as $url) { ?>
            <url>
                <loc><?= base_url().'Turkey/'.$url->Property_location.'/'.$url->Property_type.'/'.$url->Property_Bedrooms.'-bedroom/0-'.$price.'/'; ?></loc>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>
        <? } ?>
    <? } ?>
    <? foreach($Properties as $url) { ?>
        <url>
            <loc><?= base_url().'properties/'.$url->url_slug; ?></loc>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>
    <? } ?>
    <? foreach($News as $url) { ?>
        <url>
            <loc><?= base_url().'News/'.$url->url_slug; ?></loc>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>
    <? } ?>
    <? foreach($Blog as $url) { ?>
        <url>
            <loc><?= base_url().'Blog/'.$url->url_slug; ?></loc>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>
    <? } ?>
    <url>
        <loc><?= base_url();?>prime-videos</loc>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
    </url>
    <? foreach($Videos as $url) { ?>
        <url>
            <loc><?= base_url().'prime-videos/'.$url->url_slug; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.5</priority>
        </url>
    <? } ?>
</urlset>