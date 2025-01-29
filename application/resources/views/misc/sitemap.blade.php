<?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>"; ?>
@if(isset($urls) && count($urls))
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        @foreach($urls as $url)
            <url>
                <loc>{{ $url['loc'] }}</loc>
                <lastmod>{{ $url['lastmod'] }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>1</priority>
            </url>
        @endforeach
    </urlset>
@endif

@if(isset($urlset) && count($urlset))
    <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        @foreach($urlset as $url)
            <sitemap>
                <loc>{{ $url['loc'] }}</loc>
                <lastmod>{{ $url['lastmod'] }}</lastmod>
            </sitemap>
        @endforeach
    </sitemapindex>
@endif

@if(!$urls && !$urlset)
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    </urlset>
@endif