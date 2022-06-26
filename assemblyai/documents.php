

<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>

<style>
.xcss{
background:#800000;
color:white;
padding:10px;
border:none;
max-width:100px;
border-radius:15%;
}


.xcss:hover{
background:black;
color:white;
padding:10px;
border:none;
}
</style>


<style>

.red_css{
background: red;
color:white;
padding:8px;
border-radius:15%;
text-align:center;
}


.green_css{
background: green;
color:white;
padding:8px;
border-radius:15%;
text-align:center;
}



.pink_css{
background: purple;
color:white;
padding:8px;
border-radius:15%;
text-align:center;

}
</style>

<?php
error_reporting(0);
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);

session_start();

//$conversationId ='ouenj7zt8d-bf0a-47c9-9262-e55964b78f50';
$conversationId = $_SESSION['id_sess'];

include('db_connect.php');

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.assemblyai.com/v2/transcript/$conversationId",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => [
        'authorization: API-TOKEN-GOES-HERE',
        'content-type: application/json',
    ],
]);
 $response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
    echo "<div style='color:white;padding:10px;background:red;padding:10px;'>cURL Error: $err</div>";
} else {
    $response;




$json = json_decode($response, true);
 $text = $json["text"];
 $status = $json["status"];


if($status == 'processing'){

echo "<div style='color:white;background:red;padding:10px;'>AssemblyAI Audio Status= Processing.     Please Reload the Page to get Analysis</div>";

//echo "<button type='button' id='documents_btn' class='xcss'  >Analyze Audio Documents</button><br><br>";
exit();

}

 $audio_url = $json["audio_url"];

$st = $json["auto_highlights_result"]["status"];



echo "<h2> Keywords and Phrases Analysis</h2>";

foreach($json["auto_highlights_result"]["results"] as $row){

 $text = $row["text"];
echo "<div class='xcss'>$text</div><br>";

}

//"results": []

echo "<br>";

echo "<h2>Content Safety Detection</h2>";
echo "Easily detect if any of the following sensitive content 
is spoken in your audio/video files, and pinpoint exactly when and what was spoken<br>";


$st2 = $st = $json["content_safety_labels"]["status"];

if($json["content_safety_labels"]["results"]==[]){
//echo "<br>";
}


foreach($json["content_safety_labels"]["results"] as $row){

 $text = $row["text"];
echo "<div class='xcss'>$text</div><br>";
}


echo "<br>";


echo "<h2>Topic Detection</h2>";
echo "Easily detects the topics that are spoken in your audio/video files";
$st2 = $st = $json["iab_categories_result"]["status"];

if($json["iab_categories_result"]["results"]==[]){
//echo "hey 2<br>";
}
echo '<table border="0" cellspacing="2" cellpadding="2" class="table table-striped_no table-bordered table-hover"> 
      <tr> 
	  <th> <font face="Arial">Topics Relevance</font> </th> 
          <th> <font face="Arial">Topics Labels</font> </th> 
      </tr>';

foreach($json["iab_categories_result"]["results"] as $row){

//echo $text = $row["text"];
echo "<div class='xcss'>$text</div><br>";


foreach($row["labels"] as $row1){

$relevance = $row1["relevance"];
$label = $row1["label"];


echo "<tr> 
                  <td>$relevance</td> 
                  <td class=''>$label</td> 

              </tr>


";


}

}

echo "</table>";









// sentiments Analysis

echo "<br>";
echo "<h2>Sentiments Analysis</h2>";
echo "Easily Analyze Audio Text Files for Sentiments <b>Positivity, Negativity or Neutrality</b> Statements<br><br>";

if($json["sentiment_analysis_results"]==[]){
//echo "hey 2<br>";
}



echo '<table border="0" cellspacing="2" cellpadding="2" class="table table-striped_no table-bordered table-hover"> 
      <tr> 
	  <th> <font face="Arial">Text</font> </th> 
          <th> <font face="Arial">Sentiments</font> </th> 
 <th> <font face="Arial">Confidence</font> </th> 
 <th> <font face="Arial">Sentiments Image Analysis</font> </th> 
      </tr>';


foreach($json["sentiment_analysis_results"] as $row){

 $text = $row["text"];
 $sentiments = $row["sentiment"];
 $confidence = $row["confidence"];


//create table sentiments(id int primary key auto_increments,conversation_id  varchar(200),documents text,score  varchar(200),sentiments  varchar(200))

$statement = $db->prepare('INSERT INTO sentiments
(conversation_id,documents,score,sentiments)
 
                          values
(:conversation_id,:documents,:score,:sentiments)');

$statement->execute(array( 

':conversation_id' => $conversationId,
':documents' => $text,
':score' => $confidence,		
':sentiments' => $sentiments

));



if($sentiments == 'POSITIVE'){

$st = $sentiments;
$colorx ="green_css";


$image = 'happy.png';
}
if($sentiments == 'NEUTRAL'){

$st = $sentiments;
$colorx ="pink_css";
$image = 'neutral.png';
}

if($sentiments == 'NEGATIVE'){

$st = $sentiments;
$colorx ="red_css";
$image = 'sad.png';
}




echo "<tr> 
                  <td>$text</td> 
                  <td class='$colorx'>$sentiments</td> 
<td class=''>$confidence</td> 
<td><img class='' style='border-style: solid; border-width:3px; border-color:#8B008B; width:40px;height:40px; 
max-width:40px;max-height:40px;border-radius: 40%;' src='sentiments_image/$image' title='Image'></td> 

              </tr>";


}
echo "</table>";



echo "<br>";


// summary Analysis


echo "<h2>Text Summary Analysis</h2>";

echo '<table border="0" cellspacing="2" cellpadding="2" class="table table-striped_no table-bordered table-hover"> 
      <tr> 
	  <th> <font face="Arial">Headline</font> </th> 
          <th> <font face="Arial">Summary</font> </th> 
 <th> <font face="Arial">Gist</font> </th> 
      </tr>';




if($json["chapters"]==[]){
//echo "hey 2<br>";
}

foreach($json["chapters"] as $row){

 $summary = $row["summary"];
$headline = $row["headline"];
 $gist = $row["gist"];



echo "<tr> 
                  <td>$summary</td> 
                  
<td class=''>$summary</td> 
<td class=''>$gist</td> 

              </tr>";

}

echo "</table>";


// Entities Analysis

echo "<br>";


echo "<h2>Text Name Entities Analysis</h2>";

echo "Easily identify a wide range of entities that are spoken in your audio files, such as person and company names,
email addresses, dates, and locations.<br><br>";


echo '<table border="0" cellspacing="2" cellpadding="2" class="table table-striped_no table-bordered table-hover"> 
      <tr> 
	  <th> <font face="Arial">Entity Type</font> </th> 
          <th> <font face="Arial">Text</font> </th> 
      </tr>';


if($json["entities"]==[]){
//echo "hey 2<br>";
}

foreach($json["entities"] as $row){

$entity_type = $row["entity_type"];
$text = $row["text"];
$start = $row["start"];
 $end = $row["end"];


echo "<tr> 
<td>$entity_type</td> 
                  <td class=''>$text</td> 
              </tr>";

}



echo "</table>";

}








?>












<script>
/*
$(document).ready(function(){
$('#entity_btn').click(function(){
		
var access_token = $('.access_token').val();
var cid = $('.cid').val();


if(access_token==""){
alert('There is problem with access Token.');

}
else if(cid==""){
alert('There is aproblem with Conversation Id');

}


else{



$('#loader_x').fadeIn(400).html('<br><div style="color:white;background:#3b5998;padding:10px;"><img src="ajax-loader.gif">&nbsp;Please Wait, Processing Your Documents via Symbl.ai Entities API</div>');
var datasend = {access_token:access_token, cid:cid};	
		$.ajax({
			
			type:'POST',
			url:'entity.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){


                        $('#loader_x').hide();
				//$('#result_x').fadeIn('slow').prepend(msg);

$('#result_x').fadeIn('slow').html(msg);

			//$('.cid').val('');
			}
			
		});
		
		}
		
	})
					
});


*/

</script>





<script type="text/javascript">  

var conversation_idxx = '<?php echo $conversationId; ?>';

google.charts.load('current', {'packages':['corechart']});


google.charts.setOnLoadCallback(column_chart);
//google.charts.setOnLoadCallback(line_chart);


function column_chart() {

$('#loader1').fadeIn(400).html('<div style="background:#ddd;color:black;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i> &nbsp; &nbsp;Please Wait, Documents Statistical Analytics is being Loaded 1.</div>');

var res = $.ajax({
url: 'chart.php?conversation_idxx='+conversation_idxx,
dataType:"json",
async: false,
success: function(res)
{

  var options = {'title':'Documents Analytic Type vs Percent Vs Seconds', 'width':800, 'height':400,
 series: {
            0: { color: 'purple' },
            1: { color: 'navy' },
          
          }
};


var data = new google.visualization.arrayToDataTable(res);
var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_data'));
chart.draw(data, options);
$('#loader1').hide();

}
}).responseText;
}




google.charts.setOnLoadCallback(line_chart);
function line_chart() {


$('#loader2').fadeIn(400).html('<div style="background:#ddd;color:black;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i> &nbsp; &nbsp;Please Wait, Documents Statistical Analytics is being Loaded 2</div>');

var res1 = $.ajax({
url: 'chart.php?conversation_idxx='+conversation_idxx,
dataType:"json",
async: false,
success: function(res1)
{

  var options = {'title':'Documents Analytic Type vs Percent Vs Seconds', 'width':800, 'height':400,
 series: {
            0: { color: '#800000' },
            1: { color: 'orange' },
          
          }
};


var data = new google.visualization.arrayToDataTable(res1);
var chart = new google.visualization.BarChart(document.getElementById('areachart_data'));
chart.draw(data, options);
$('#loader2').hide();

}
}).responseText;
}






google.charts.setOnLoadCallback(pie_chart);
function pie_chart() {


$('#loader3').fadeIn(400).html('<div style="background:#ddd;color:black;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i> &nbsp; &nbsp;Please Wait, Documents Sentimental Statistics is being Loaded</div>');

var res2 = $.ajax({
url: 'chart1.php?conversation_idxx='+conversation_idxx,
dataType:"json",
async: false,
success: function(res2)
{

  var options = {'title':'Documents Sentiments Vs Score', 'width':800, 'height':400,
 series: {
            0: { color: '#800000' },
            1: { color: 'orange' },
          
          }
};


var data = new google.visualization.arrayToDataTable(res2);
var chart = new google.visualization.ColumnChart(document.getElementById('piechart_data'));
chart.draw(data, options);
$('#loader3').hide();

}
}).responseText;
}





</script>

<br><br>
<h3><center>Documents Analytics Vs Percent Vs Seconds</center></h3>
<div id="loader1"></div>
    <div id="areachart_data"></div>

<div id="loader2"></div>
    <div id="columnchart_data"></div>


<h3><center>Audio Text Sentiments Vs Score(Confidence)</center></h3>

<div id="loader3"></div>
    <div id="piechart_data"></div>



    </div>



<div id="loader" class='res_center_css'></div>


