<?php
//error_reporting(0);


ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);


include('db_connect.php');

$conversation_idxx = $_GET['conversation_idxx'];

$data[] = array('Documents Analytic Type', 'Percent', 'Seconds');

$result = $db->prepare('SELECT * FROM analytics where conversation_id=:conversation_id');
$result->execute(array(':conversation_id' => $conversation_idxx));
$nosofrows = $result->rowCount();
while($row = $result->fetch()){
$id= $row['id'];


//foreach($json['data'] as $v1){
$type = $row['type'];
$percent = $row['percent'];
$seconds = $row['seconds']; 

//$sentiments= 'Feedback_Sentiments';
$sentiments= $type;
//$data[] = array($sentiments,(int)$type,(int)$percent,(int)$seconds);
$data[] = array($sentiments,(int)$percent,(int)$seconds);
}



echo json_encode($data);
