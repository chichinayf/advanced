<?php
/* @var $this yii\web\View */
/* @var $model app\models\ArcFiles */
$this->title = '';
?>
<div class="arc-files-update">
	<img src="../statics/images/asr.png" class="arc-arc" /> <img
		id="arcMicrophone" src="../statics/images/microphone.png"
		class="arc-microphone" />
	<div class="arc-font">点击"麦克风按钮"后，请允许您的浏览器获取麦克风权限。</div>
	<svg>
    <linearGradient id="leftWaveGradient">
		<stop offset="0" stop-color="#00CBFF"></stop>
		<stop offset="1" stop-color="#FE297E"></stop></linearGradient>
		<linearGradient id="rightWaveGradient">
		<stop offset="0" stop-color="#FE297E"></stop>
		<stop offset="1" stop-color="#00CBFF"></stop></linearGradient>
		<path stroke="url(#rightWaveGradient)" fill="none" stroke-width="2" d="M132.1859375,32.59375 L132.1859375,32.59375
       C139.4886222031741,44.03526133422848
        146.7913069063482,21.15223866577152
        154.0939916095223,32.59375
       C161.33391573862068,51.7266637609341
        168.57383986771904,13.460836239065902
        175.81376399681739,32.59375
       C183.70417685962673,58.28258283424634
        191.5945897224361,6.904917165753659
        199.48500258524544,32.59375
       C204.0577100568303,41.68672391443319
        208.63041752841514,23.500776085566812
        213.203125,32.59375"></path></svg>
</div>

<script type="text/javascript">
	var exports = this;
	$("#arcMicrophone").click(function(){
		 var audioCtx;  
	    try  
	    {  
	        audioCtx=new (window.AudioContext || window.webkitAudioContext)();  
	    }  
	    catch(e)  
	    {  
	        console.log("Your browser does not support AudioContext!");  
	    }  
	    navigator.getUserMedia=(navigator.getUserMedia || navigator.webkitGetUserMedia ||   
	                            navigator.mozGetUserMedia || navigator.msGetUserMedia);  
	    if(navigator.getUserMedia)   
	    {  
	        navigator.getUserMedia(  
	        {  
	            audio:true  
	        },  
	        function(stream)  
	        {  
	            var source=audioCtx.createMediaStreamSource(stream);  
	            var biquadFilter=audioCtx.createBiquadFilter();  
	            biquadFilter.type="lowshelf";  
	            biquadFilter.frequency.value=1000;  
	            biquadFilter.gain.value=25;  
	            source.connect(biquadFilter);  
	            biquadFilter.connect(audioCtx.destination);  
	        },  
	        function(err)  
	        {  
	            console.log("The following gUM error occured: "+err);  
	        });  
	    }  
	    else   
	    {  
	        console.log("getUserMedia not supported on your browser!");  
	    } 
	});
</script>
