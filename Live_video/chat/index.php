<!DOCTYPE html>
<html>
<head>
	<title>Live chat</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		function submitChat() {
			if (form1.uname.value == '' || form1.msg.value == '') {
				alert("Empty message can't be sent");
			}
            
			var uname = form1.uname.value;
			var msg = form1.msg.value;
			var xmlhttp = new XMLHttpRequest();

			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
				}
			}
            
            xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
            xmlhttp.send();

		}
		// $(document).ready(function(e) {
		// 	$.ajexSetup({cache:false});
		// 	setInterval(function() {
		// 		$('#chatlogs').load('logs.php');},2000);
		// });

	</script>
</head>
<body style="background: gray;">
	<div align="center">
<form name="form1">
	Enter name : <input type="text" name="uname"><br>
	Message : <textarea name="msg"></textarea><br>
	<a href="#" onclick="submitChat()">Send</a><br><br>

	<div id="chatlogs">
		Loading chatlog please wait...
	</div>
</form>
</div>
</body>
</html>