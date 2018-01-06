<!DOCTYPE html>
<html lang="en">
<head>

    <title>Video.js | HTML5 Video Player</title>
    <link href="http://vjs.zencdn.net/5.19/video-js.css" rel="stylesheet">
    <script src="http://vjs.zencdn.net/ie8/1.1/videojs-ie8.min.js"></script>
    <script src="http://vjs.zencdn.net/5.19/video.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>

</head>
  
<body> 

  <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="264" poster="http://vjs.zencdn.net/v/oceans.png" data-setup="{}">
    <source src="C:\xampp\htdocs\Ai_Edutech_trial_project\video js\video-js-6.4.0\examples\simple-embed\HTML Tutorial for Beginners - 00 - Introduction to HTML.mp4" type="video/mp4">

   <track kind="captions" src="C:\xampp\htdocs\Ai_Edutech_trial_project\video js\video-js-6.4.0\examples\simple-embed\HTML Tutorial for Beginners - 00 - Introduction to HTML [English].vtt" srclang="en" label="English" default>
    <!-- Tracks need an ending tag thanks to IE9 -->
    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
  </video>
<script type="text/javascript">


	function ajax_post_one(count,duration,tot_time,arr){
    // Create our XMLHttpRequest object 
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "my_parse_file_one.php";
    //var fn = document.getElementById("first_name").value;
 
    var num_pause = count;
    var tt = tot_time;
    var time_arr=arr;
    var dur = duration;
    
    alert("check arr value");
    alert(time_arr);
    // the variable names can be changed and will be fixed later only in the php 
    var vars = "count="+num_pause+"&tot_time="+tt+"&arr="+time_arr+"&duration="+dur;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("status").innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "processing...";
}

///////	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*
function ajax_post_two(pause_t,arr){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "my_parse_file_two.php";
    //var fn = document.getElementById("first_name").value;
    var t = pause_t;
    var time_arr=arr;
    var vars  = "pause_t="+t+"&time_arr="+time_arr;
    hr.open("POST", url, true);
    
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("status").innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "processing...";
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function ajax_post_three(duration){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "my_parse_file_three.php";
    //var fn = document.getElementById("first_name").value;
    var dur = duration;
    var vars = "duration="+dur;
    hr.open("POST", url, true);
    
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("status").innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "processing...";
}
*/
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
	$(document).ready(function(){
		var player = videojs('example_video_1');
		var pause_t=0;
		var tot_time=0;
        var duration=0;
        var count=0;
        //var arr = new Array();
        var arr=[];
		player.ready(function() {
  			//alert("Working");
		});

		player.on("pause",function(){
			 //var time = player.currentTime();
			pause_t = parseInt(player.currentTime());
			tot_time=tot_time + pause_t;
            //alert(pause_t);
             arr= arr +pause_t+",";
             //arr= arr.push(pause_t);
             alert(arr);  

           //ajax_post_two(pause_t,arr);
		});

        player.on("play",function(){
			//alert("Running");
		});

        player.on("play",function(){
           count=count+1;
            //alert(count);
        });
		//This tells the total duration of the video... 
		player.one('loadedmetadata', function() {
		//var duration = player.duration();
        duration = player.duration();
           // ajax_post_three(duration);
		});

		 var video = videojs('example_video_1').ready(function(){
  		 var player = this;
		player.on('ended', function() {
            //alert(count);
            //alert(duration);
            alert(tot_time);
             alert(arr);
            ajax_post_one(count,duration,tot_time,arr);
 		 });
		});


				

	});
</script>
<p> Status down here</p>
<div id="status"></div>
</body>
</html>
