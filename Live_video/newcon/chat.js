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