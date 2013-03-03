<!doctype html>
<html>
	<head>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<style>
			a
			{
				color:#4444FF;
				text-decoration:none;
			}
			.real-page table tr td
			{
				text-align:justify;
			}
		</style>
	</head>
	<body style="font-family:Arial;background-color:#000000;">
		<div class="fake-page script-only" style="display:none;position:absolute;top:0px;bottom:0px;right:0px;left:0px;background-image:url('../images/bd.png');background-repeat:no-repeat;background-position:center top;background-color:#DDDDDD;background-size:70%;">
		</div>
		<div class="real-page" style="min-width:900px;position:absolute;top:40px;right:40px;left:40px;bottom:40px;">
			<div class="script-only" style="color:#DDDDDD;padding:13px;display:none;">
				<div style="display:block;font-size:30px;">You saw all that nice? </div>
				<div style="display:block;font-size:18px;padding-bottom:20px;">That was Board Directory as an image. We'd like to let you see the real version, but your browser is't capable of displaying it. Wondering why? You are using Internet Explorer. More information is provided below. </div>
			</div>
			<noscript>
				<div style="color:#DDDDDD;padding:13px;">
					<div style="display:block;font-size:30px;">You need to update your browser in order to visit Board Directory</div>
					<div style="display:block;font-size:18px;padding-bottom:20px;">Your browser isn't able to display Board Directory. Wondering why? You are using Internet Explorer. You need to update your browser to enter Board Directory. More information is provided below. </div>
				</div>
			</noscript>
			<table style="left:0px;right:0px;padding-top:13px;padding-bottom:13px;padding-right:13px;padding-left:13px;">
				<tr style="background-color:#99AAFF;padding:13px;">
					<td style="padding:20px;">
						<img style="height:150px;;" src="../images/ie.png"/>
					</td>
					<td style="vertical-align: middle;">
						<div style="font-size:15px;padding-left:20px;padding-right:50px;padding-top:10px;padding-bottom:10px;">
							<span style="font-size:17px;font-weight:bold;">Internet Explorer</span> has been torturing Web Developers for the past years. It's outdated and supports a lot less features. We, from Board Directory, did our very best to display everything we offer well on Internet Explorer but with less success. 
							<br/>We were able to make Board Directory fully functional on Internet Explorer 9 and up, but the version you are using now, is not supported. 
							<br/>
							<br/>To view Board Directory, we suggest you to update to a better browser. Below we listed our recommendations. 
						</div>
					</td>
				</tr>
				<tr style="background-color:#FFFF66;padding:13px;">
					<td style="padding:20px;">
						<img style="height:150px;;" src="../images/googlechrome.png"/>
					</td>
					<td style="vertical-align: middle;">
						<div style="font-size:15px;padding-left:20px;padding-right:50px;padding-top:10px;padding-bottom:10px;">
							<span style="font-size:17px;font-weight:bold;">Google Chrome</span> is probably the fastest browser currently available. It's not only our major recommendation, but also the browser we are building Board Directory for. Using this browser you'll always be sure that Board Directory will show properly. 
							<br/>Not only does Google Chrome display Board Directory better then all other browsers, but also other websites will show better and faster using it. Additionally does Google Chrome have a super fast installation, not requiring you to do anything else then clicking a few simple OK buttons. 
							<br/>
							<br/>What are you waiting for? Click <a target="_blank" href="http://google.com/chrome">here</a> to download Google Chrome and browse to Board Directory at lightning speed!
						</div>
					</td>
				</tr>
				<tr style="background-color:#FF943D;padding:13px;">
					<td style="padding:20px;">
						<img style="height:150px;;" src="../images/mozillafirefox.png"/>
					</td>
					<td style="vertical-align: middle;">
						<div style="font-size:15px;padding-left:20px;padding-right:50px;padding-top:10px;padding-bottom:10px;">
							<span style="font-size:17px;font-weight:bold;">Mozilla Firefox</span> may not be the fastest browser available, but it certainly is faster then Internet Explorer. It shows Board Directory fine although some parts may look a little bit less good then in Google Chrome. 
							<br/>Mozilla Firefox has dominated the web for years, and it certainly is a good browser. It may be slower to setup or browse the web, but for casual internet browsers it certainly is one of the best browsers you can get. 
							<br/>
							<br/>Convinced? Click <a target="_blank" href="http://www.mozilla.org/en-US/firefox/new/">here</a> to download Mozilla Firefox! Be sure you don't forget to visit Board Directory after! 
						</div>
					</td>
				</tr>
			</table>
		</div>
	</body>
	<footer>
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('.script-only').css({'display' : 'block'});
				$('.real-page').css({'display' : 'none'});
				setTimeout("display()", 5000);
				$(".fake-page").click(function()
				{
					setTimeout("display()", 750);
				});
			});
			
			function display()
			{
				$(".fake-page").fadeOut(1000, function()
				{
					$('.real-page').fadeIn(1000);
				});
			}
		</script>
	</footer>
</html>
<? die() ?>