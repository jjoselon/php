<?php
function getNodeAttributes($html, $nodeFilter = "p", $attributes = array()) {
    $data = array();
    $crawler = new Crawler();
    $crawler->addHtmlContent($html);
    $nodesAttributes = $crawler->filter($nodeFilter)->extract($attributes);
    // @see https://api.drupal.org/api/drupal/vendor%21symfony%21dom-crawler%21Crawler.php/function/Crawler%3A%3Aextract/8.2.x
    foreach ($nodesAttributes as $nodeAttributes) {
        $data[] = array_combine($attributes, $nodeAttributes);
    }
    return $data;
}
