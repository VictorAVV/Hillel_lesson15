<?php
/**
 * Есть массив вида 
 * { 'song1.mp3'=>'Track1 -Track Title', 'song2.mp3'=>'Track2 -Track Title','song3.mp3'=>'Track3 -Track Title'}. 
 * Нужно динамически создать xml (songs.xml) вида:
 * <?xml version="1.0" encoding="UTF-8"?>
 * <xml>
 *  <track>
 *      <path>song1.mp3</path>
 *      <title>Track 1 - Track Title</title>
 *  </track>
 *  <track>
 *      <path>song2.mp3</path>
 *      <title>Track 2 - Track Title</title>
 *  </track>
 *  <track>
 *      <path>song3.mp3</path>
 *      <title>Track 3 - Track Title</title>
 *  </track>
 */

$songsArray = Array(
        'song1.mp3' => 'Track1 -Track Title', 
        'song2.mp3' => 'Track2 -Track Title',
        'song3.mp3' => 'Track3 -Track Title'
    );

$dom = new DOMDocument('1.0', 'UTF-8');
$xmlNode = $dom->appendChild($dom->createElement('xml'));
foreach ($songsArray as $path => $title) {
    $trackNode = $xmlNode->appendChild($dom->createElement('track'));
    $pathNode = $trackNode->appendChild($dom->createElement('path'));
    $pathNode->appendChild($dom->createTextNode($path));
    $titleNode = $trackNode->appendChild($dom->createElement('title'));
    $titleNode->appendChild($dom->createTextNode($title));
}
$dom->formatOutput = true;
$songsXml = $dom->saveXML();
echo '<pre>' . htmlentities($songsXml) . '<pre/>';
$dom->save('songs.xml');
