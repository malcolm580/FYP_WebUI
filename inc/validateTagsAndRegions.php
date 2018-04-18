<?php

include 'xmlVocAnnotations.php';
include 'configuration.php';
//error_reporting(E_ERROR );
$obj = json_decode($_POST['sendInfo']);
//$obj = json_decode("{\"url\":\"/FYP_WebUI/data/images/collection_01/part_1/abc.jpg\",\"id\":\"abc.jpg\",\"folder\":\"collection_01/part_1\",\"width\":1654,\"height\":2339,\"annotations\":[{\"tag\":\"Baby Bird\",\"x\":868.35,\"y\":431.1401766004415,\"width\":501.36875000000003,\"height\":562.8057395143488}]}");

$file = 'file.log';
file_put_contents($file, "INFO - Synthesis of last submit\n");
//file_put_contents($file, date_default_timezone_set('America/Los_Angeles')."\n",FILE_APPEND | LOCK_EX);
file_put_contents($file, serialize($obj)."\n",FILE_APPEND | LOCK_EX);

$folder = $obj->folder;
$id     = $obj->id;
$width  = $obj->width;
$height = $obj->height;

$annotations = $obj->{'annotations'};

file_put_contents($file, "Annotations = ".sizeof($annotations)."\n",FILE_APPEND | LOCK_EX);

$imageSize = [  "width"  => $width ,
				"height" => $height,
				"depth"  => 3 ];			
			
$xml = new xmlVocAnnotations($folder, $id, $imageSize);

file_put_contents($file, "xmlVocAnnotations created\n",FILE_APPEND | LOCK_EX);

foreach ($annotations as &$annotation)
{						
	$xml->addBndBox($annotation->x,
					$annotation->y,
					$annotation->width,
					$annotation->height,
					$annotation->tag);
}

file_put_contents($file, "Before saving\n",FILE_APPEND | LOCK_EX);
// Write xml to file
$xml->save($ANNOTATIONS_DIR);

$response_array['status']  = 'success'; /* match error string in jquery if/else */ 
$response_array['message'] = $id.".xml has been created.";   /* add custom message */ 

file_put_contents($file, "End of file validationTagsAndRegions" ,FILE_APPEND | LOCK_EX);
file_put_contents($file, " " ,FILE_APPEND | LOCK_EX);
file_put_contents($file, " " ,FILE_APPEND | LOCK_EX);

header('Content-type: application/json');

echo json_encode($response_array);

?>