<?php
include 'config.php';

$sql = "SELECT id, post_title FROM post_vacancy";
$result = mysqli_query($conn,$sql);

$xml = new XMLWriter();

$xml->openURI("php://output");
$xml->startDocument();
$xml->setIndent(true);

$xml->startElement('posts');

while ($row = mysqli_fetch_assoc($result)) {
  $xml->startElement("postTitle");

  $xml->writeAttribute('id', $row['id']);
  $xml->writeRaw($row['post_title']);

  $xml->endElement();
}

$xml->endElement();

header('Content-type: text/xml');
$xml->flush();

?>