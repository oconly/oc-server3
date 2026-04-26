<?php
function smarty_function_donation_icon():string
{
    global $opt;

    $baseUrl = '/resource2/misc/donation';

    $variants = [
        1 => ['ext' => 'svg', 'w' => 130, 'h' => 130, 'lang_main' => true, 'lang_hover' => true],
        2 => ['ext' => 'svg', 'w' => 130, 'h' => 132, 'lang_main' => false, 'lang_hover' => false],
        3 => ['ext' => 'png', 'w' => 130, 'h' => 148, 'lang_main' => true, 'lang_hover' => false],
    ];

    $picked = array_rand($variants);
    $variant = $variants[$picked];

    $lang = strtolower($opt['template']['locale'] ?? 'en');
    $supportedLangs = ['en', 'fr', 'it', 'es', 'nl', 'de'];
    if (!in_array($lang, $supportedLangs)) {
        $lang = 'en';
    }

    $mainSuffix = $variant['lang_main'] ? '-' . $lang : '';
    $hoverSuffix = $variant['lang_hover'] ? '-' . $lang : '';

    $normalSrc = $baseUrl . '/donations-' . $picked . $mainSuffix . '.' . $variant['ext'];
    $hoverSrc  = $baseUrl . '/donations-' . $picked . $hoverSuffix . '-hover.' . $variant['ext'];

    return '<link rel="preload" href="' . htmlspecialchars($hoverSrc) . '" as="image" />'
          . '<a href="articles.php?page=donations" style="display:inline-block;">'
          . '<img src="' . htmlspecialchars($normalSrc) . '" alt="Spenden" '
          . 'style="border:0; width:' . $variant['w'] . 'px; height:' . $variant['h'] . 'px;" '
          . 'onmouseover="this.src=\'' . htmlspecialchars($hoverSrc) . '\'" '
          . 'onmouseout="this.src=\'' . htmlspecialchars($normalSrc) . '\'" '
          . '/></a>';
}

