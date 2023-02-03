<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">
    <url>
        <loc><?= base_url();?></loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru" />
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?= base_url();?>citizenship-by-investment-in-turkey</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/citizenship-by-investment-in-turkey"/>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?= base_url();?>short-term-residency-permit</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/short-term-residency-permit"/>
        <changefreq>daily</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?= base_url();?>short-term-residency-extension</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/short-term-residency-extension"/>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?= base_url();?>frequently-asked-questions-faq</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/frequently-asked-questions-faq"/>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?= base_url();?>How-To-Buy-Property-In-Turkey</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/How-To-Buy-Property-In-Turkey"/>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?= base_url();?>area-guide</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/area-guide"/>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?= base_url();?>after-sales</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/after-sales"/>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?= base_url();?>about-us</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/about-us"/>
        <changefreq>yearly</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc><?= base_url();?>contact-us</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/contact-us"/>
        <changefreq>yearly</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc><?= base_url();?>buying-online</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/buying-online"/>
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
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/Turkey/All-cities/Apartment/All-bedroom/0-5000000"/>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= base_url();?>Turkey/All-cities/Bungalow/All-bedroom/0-5000000</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/Turkey/All-cities/Bungalow/All-bedroom/0-5000000"/>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= base_url();?>Turkey/All-cities/Villa/All-bedroom/0-5000000</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/Turkey/All-cities/Villa/All-bedroom/0-5000000"/>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= base_url();?>Turkey/All-cities/Commercial/All-bedroom/0-5000000</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/Turkey/All-cities/Commercial/All-bedroom/0-5000000"/>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= base_url();?>Turkey/All-cities/Duplex/All-bedroom/0-5000000</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/Turkey/All-cities/Duplex/All-bedroom/0-5000000"/>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= base_url();?>Turkey/All-cities/Mansion/All-bedroom/0-5000000</loc>
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/Turkey/All-cities/Mansion/All-bedroom/0-5000000"/>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <? foreach($Property_pages as $url) { ?>
        <url>
            <loc><?= base_url().'Properties/'.$url->Property_location; ?></loc>
            <xhtml:link
                    rel="alternate"
                    hreflang="ru"
                    href="<?= base_url().'ru/Properties/'.$url->Property_location; ?>"/>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
    <? } ?>
    <? foreach($Properties as $url) { ?>
        <url>
            <loc><?= base_url().'properties/'.$url->url_slug; ?></loc>
            <xhtml:link
                    rel="alternate"
                    hreflang="ru"
                    href="<?= base_url().'ru/properties/'.$url->url_slug; ?>"/>
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
        <xhtml:link
                rel="alternate"
                hreflang="ru"
                href="<?= base_url();?>ru/prime-videos"/>
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
    <? foreach($RUVideos as $url) { ?>
        <url>
            <loc><?= base_url().'ru/prime-videos/'.$url->url_slug; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.5</priority>
        </url>
    <? } ?>
</urlset>