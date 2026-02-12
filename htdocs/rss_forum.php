<?php
$cache_file = __DIR__ . '/var/cache2/staticmap/rss_forum_cache.xml';
$cache_lifetime = 600;
$atom_url = 'https://forum.opencaching.de/app.php/feed';

if (file_exists($cache_file) && (time() - filemtime($cache_file) < $cache_lifetime)) {
    $atom_xml = @simplexml_load_file($cache_file);
} else {
    $atom_xml = @simplexml_load_file($atom_url);
    if ($atom_xml) {
        @file_put_contents($cache_file, $atom_xml->asXML());
    }
}

if (!$atom_xml) {
    header('HTTP/1.1 500 Internal Server Error');
    die('Fehler: ATOM-Feed konnte nicht geladen werden.');
}

header('Content-Type: application/rss+xml; charset=utf-8');

echo '<?xml version="1.0" encoding="UTF-8" ?>' . PHP_EOL;?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title><?php echo htmlspecialchars($atom_xml->title); ?> (RSS Proxy)</title>
        <link>https://forum.opencaching.de/</link>
        <description>Konvertierter Feed des Opencaching-Forums</description>
        <language>de-de</language>
        <lastBuildDate><?php echo date(DATE_RSS, strtotime($atom_xml->updated)); ?></lastBuildDate>

        <?php foreach ($atom_xml->entry as $entry): ?>
            <item>
                <title><?php echo htmlspecialchars($entry->title); ?></title>
                <link><?php echo htmlspecialchars($entry->link['href']); ?></link>
                <guid isPermaLink="false"><?php echo htmlspecialchars($entry->id); ?></guid>
                <pubDate><?php echo date(DATE_RSS, strtotime($entry->updated)); ?></pubDate>
                <description>
                    <![CDATA[<?php echo htmlspecialchars($entry->content); ?>]]>
                </description>
            </item>
        <?php endforeach; ?>
    </channel>
</rss>
