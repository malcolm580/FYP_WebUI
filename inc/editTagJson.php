<?php
/**
 * Created by IntelliJ IDEA.
 * User: kwunyiufung
 * Date: 30/4/2018
 * Time: 16:58
 */

$jsonFile = file_get_contents('../resources/list_of_tags.json');
$initialData = json_decode($jsonFile , true);
$newData = json_decode($_POST["sendInfo"] , true);

$initialData[count($initialData)] = array("name" => $newData['name']);

$newJsonString = json_encode($initialData);
file_put_contents('../resources/list_of_tags.json', $newJsonString);


?>