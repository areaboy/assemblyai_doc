<!DOCTYPE html>
<html lang="en">

<head>
 <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="landing page, website design" />


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>



<style>




.section_padding {
padding: 60px 40px;
}

.imagelogo_li_remove {
list-style-type: none;
margin: 0;
 padding: 0;
}

.imagelogo_data{
 width:120px;
 height:80px;
}



  .navbar {
    letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
   background-color:purple;

    z-index: 9999;
    border: 0;
    font-family: comic sans ms;
//color:white;
  }



  
.navbar-toggle {
background-color:orange;
  }

.navgate {
padding:16px;color:white;

}



.navgate:hover{
 color: black;
 background-color: orange;

}


.navbar-header{
height:60px;
}

.navbar-header-collapse-color {
background:white;
}

.dropdown_bgcolor{

background: #800000;
color:white;
}

.dropdown_dashedline{
 border-bottom: 2px dotted white;
}

.navgate101:hover{
background:800000;
color:white;

}






.category_post{
background-color: #800000;
padding: 16px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
width:100%;
z-index: -999;
}
.category_post:hover {
background: black;
color:white;
}	




.category_post1{
background-color: purple;
padding: 16px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
width:100%;
z-index: -999;
}

.category_post1:hover {
background: black;
color:white;
}	



</style>



 
</head>
<body>















<!--start left column all-->

    <div class="left-column-all left_shifting">

<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img class="img-rounded imagelogo_data" src="logo.png"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">



      <ul class="nav navbar-nav navbar-right">

        <li class="navgate about_click">Audio Analyzer</li>
       
       
        
        



      </ul>


    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->



	
<br>
<div class="rows">

<h2 style='color:fuchsia'><center>Audio Contracts Documents Analyzer for People with Hearing Impairments  </center></h2>
<h4><center><b style='color:#800000'>Helping Hearing Impairments Farmers and Businesses People to easily analyze their Legal Contracts Documents Powered by AssemblyAI
</b></center></h4><br>



Most Businesses Contracts involves  engagements with Legal Documents Contracts Agreements.

Alot of Business People especially Local Farmers with Hearing Impairments are shying away from partaking in a certain Contracts Businesses  because of
the unfair and criminal atitudes of some Contracts Agents who Contracts out the Business.<br<br>

<br><br>

<b style="color:#800000; font-size:20px;">Here are two major Issues Faced by Contracts  Business People/Farmers with Hearing Impairments</b><br><br>

1.) Cheating and Fraudlents activities by their Contracting Companies/Parties.<br>

2.) Complex long/lengthy legal Contracts Documents which makes the reading and analyzing of Legal Contracts Documents extremely Difficult.<br>




<h3>What It Does</h3>

It uses <b>AssemblyAI (Phrases and Words API, Content Moderation API, Topic Detection API, Sentiments API, Entities API & Summarization API)</b> to break down the legal Documents Contracts agreements into more <b>Simple, Easy, Understandble
and digestable form</b>
<br><br>
<ul>

<li>

The Applications leverages <b>Phrases and Words API,</b> to detect important phrases and words in your transcription text documents.</b>

</li><br>



<li>

The Applications leverages <b>Content Moderation API</b> to 
detect if any of the following sensitive content is spoken in your audio documents Transcriptions, and pinpoint exactly when and what was spoken in the Documents</b>

</li><br>


<li>

The Applications leverages <b>Topics API</b> to detect topics that are spoken in your audio files Text Documents Transcriptions</b>

</li><br>




<li>

The Applications leverages <b>AssemblyAI Sentiments API</b> to run sentimental analysis of The contracts legal Documents to  breakdown the Documents Contents to more
easy and digestible form. It analyzes each Documents contents for <b>Positivity, negativity or neutrality statements</b>

</li><br>

<li>

The Applications leverages <b>AssemblyAI Entity API</b> to detect, analyze and list all the <b>People, Persons, Organisations, Companies and all the entities</b>
 involves
in the Legal Contracts Documents

</li><br>


<li>

The Applications leverages <b>Assemblyai Summarization API</b> to provide the detail summary of the transcription without going through the overall details.<b>This help to save time and energy</b>

</li><br>


<li>

The Applications leverages <b>Google Statistical Graphs/Charts</b> to display <b>Graphical/Charts</b> 
Visualization of Legal Documents Contracts Agreements <b>Sentiments and Analytics</b> leveraging <b>AssemblyAI Sentimental and Analytics Data</b>
</li><br>

</ul>



<div class="col-sm-1">

</div>

<div class="col-sm-10">


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>

$(document).ready(function(){
$('#documents_btn').click(function(){
		
var audio_url = $('#audio_url').val();


if(audio_url==""){
alert('Please Enter Audio Url Link.');

}



else{

$('#loader_o').fadeIn(400).html('<br><div style="color:white;background:#3b5998;padding:10px;"><img src="ajax-loader.gif">&nbsp;Please Wait, Processing Your Audio Documents via AssemblyAI</div>');
var datasend = {audio_url:audio_url};	
		$.ajax({
			
			type:'POST',
			url:'audio_process.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){


                        $('#loader_o').hide();
				//$('#result_o').fadeIn('slow').prepend(msg);

$('#result_o').fadeIn('slow').html(msg);

			//$('#documents').val('');
			}
			
		});
		
		}
		
	})
					
});




</script>







<!-- form starts  -->


<div class="col-sm-12 form-group" style='background:#f1f1f1; padding:16px;color:black'>
<label>Enter Your Audio URL(Eg. https://learn.virtualspeech.com/uploads/text_to_speech/cje26fxwm7qaurhlb3z1.mp3 ) </label>


<input type="text" name="audio_url" id="audio_url" class="form-control audio_url" placeholder="Enter Audio Url" value="https://learn.virtualspeech.com/uploads/text_to_speech/cje26fxwm7qaurhlb3z1.mp3">


            </div>






<div class="form-group">

                    <br>
<button type="button" id="documents_btn" class="fcss1"  >Analyze Audio Documents</button><br><br>
<div id="loader_o"></div>

<div id="result_o" class="myform_o"></div>
<br />
</div>






<style>

.fcss{
padding: 10px;
  border: 2px solid #666;
  color: white;
  background-color: #800000;
}

.fcss:hover{
 color: black;
  background-color: orange;
}


.fcss1{
padding: 10px;
  border: 2px solid #666;
  color: white;
  background-color: purple;
}

.fcss1:hover{
 color: black;
  background-color: orange;
}



</style>




<br><br><br><br>

</div>



<!-- form ends  -->











</div>

<div class="col-sm-1">

</div>


<div>
   
<br><br><br><br><br>
</body>
</html>



















