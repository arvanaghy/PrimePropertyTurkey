<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= base_url();?></loc>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?= base_url();?>citizenship-by-investment-in-turkey</loc>
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
        <loc><?= base_url();?>buying-online</loc>
        <changefreq>monthly</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc><?= base_url();?>privacy-policy</loc>
        <changefreq>yearly</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc><?= base_url();?>Turkey/All-cities/Apartment/All-bedroom/0-5000000</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= base_url();?>Turkey/All-cities/Bungalow/All-bedroom/0-5000000</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= base_url();?>Turkey/All-cities/Villa/All-bedroom/0-5000000</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= base_url();?>Turkey/All-cities/Commercial/All-bedroom/0-5000000</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= base_url();?>Turkey/All-cities/Duplex/All-bedroom/0-5000000</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= base_url();?>Turkey/All-cities/Mansion/All-bedroom/0-5000000</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <? foreach($Property_pages as $url) { ?>
        <url>
            <loc><?= base_url().'Properties/'.$url->Property_location; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
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
            <loc><?= base_url().'news/'.$url->url_slug; ?></loc>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>
    <? } ?>
    <? foreach($Blog as $url) { ?>
        <url>
            <loc><?= base_url().'blog/'.$url->url_slug; ?></loc>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>
    <? } ?>
    <? foreach($RUBlog as $url) { ?>
        <url>
            <loc><?= base_url().'ru/blog/'.$url->url_slug; ?></loc>
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