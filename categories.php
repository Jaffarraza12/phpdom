<?php
include("include/connection.php");
$json = array();
$result = mysqli_query($con,"SELECT * FROM `categories` WHERE `parent_id` = '".$_REQUEST['id']."'") or die('rea '.mysqli_error($con));
while($row = mysqli_fetch_object($result)){
    $json[$row->id] = $row->title;

}
 echo json_encode($json);
