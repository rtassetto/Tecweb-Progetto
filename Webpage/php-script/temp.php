<script>
		function validateForm() {
			var fail=false;
			//Correttezza username
			var username=document.forms["registration"]["username"].value;
			if (username.length<5){
				document.getElementById("usernameerr").innerHTML="Username troppo corto";
				fail=true;
			}
			 else if (username.length>20){
				document.getElementById("usernameerr").innerHTML="Username troppo lungo";
				fail=true;
			}
			else
			{
				document.getElementById("usernameerr").innerHTML="";
			}
			
			//correttezza password
			var password=document.forms["registration"]["password"].value;
			if (password.length<5){
				document.getElementById("passworderr").innerHTML="Password troppo corta";
				fail=true;
			}
			else if (password.length>20){
				document.getElementById("passworderr").innerHTML="Password troppo lunga";
				fail=true;
			}
			else{
				document.getElementById("passworderr").innerHTML="";
			}

			//correttezza email
			var email=document.forms["registration"]["email"].value;
			if (email.length<5){
				document.getElementById("emailerr").innerHTML="Email troppo corto";
				fail=true;
			}
			else if (email.length>50){
				document.getElementById("emailerr").innerHTML="Email troppo lungo";
				fail=true;
			}
			else{
				document.getElementById("emailerr").innerHTML="";
			}
			
		return !fail;
		}
	</script>