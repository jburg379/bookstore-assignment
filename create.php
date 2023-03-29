<script>
function checkinput(e) {
	var text="";
	if(document.getElementById("username").value =="") {
		text="username\n";
		document.getElementById("username").focus();
	}
	if(document.getElementById("email").value =="") {
		text=text+"email address\n";
		document.getElementById("email").focus();
	}
	else if(document.getElementById("email").value.indexOf('@') == -1) {
		text=text+"You must enter a valid e-mail address\n";
		document.getElementById("email").focus();
	}
	if((document.getElementById("cemail").value) != (document.getElementById("email").value)) {
		text=text+"E-mail does not match Confirm E-mail\n";
		document.getElementById("cemail").focus();
	}
	if(document.getElementById("password").value =="") {
		text=text+"password\n";
		document.getElementById("password").focus();
	}
	else if(document.getElementById("password").value.length <5) {
		text=text+"password must be at least 5 characters long\n";
		document.getElementById("password").focus();
	}
	if((document.getElementById("cpassword").value) != (document.getElementById("password").value)) {
		text=text+"Password does not match Confirm Password\n";
		document.getElementById("cpassword").focus();
	}
	if((document.getElementById("phone").value=="") || 
	(document.getElementById("phone1").value=="") || 
	(document.getElementById("phone2").value=="")) {
		text=text+"phone number\n";
	}
	if(text=="") { return true;}
	
	else {
		alert("check the following: \n" +text);
		e.preventDefault();
	}
}
function reset(e) {
	if(!confirm("do you want to reset the form?")) {
		e.preventDefault();
	}
}

window.addEventListener("submit", checkinput);
window.addEventListener("reset", reset);



</script>

<?php require_once("header.html"); ?>
	<!-- begin the body of the table -->
	    <div>
	      <p>
	        <h2>Create Account</h2> <table class="log">
	        <form method="post" action="addAccount.php">
		  <tr>
		    <td colspan="4">
		      User Name: &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
		      <input id="username" type="text" name="username" size="20" maxlength="30"/><br/>
		      E-mail Address: &nbsp; &nbsp;&nbsp; 
		      <input id="email" type="text" name="email" size="20" maxlength="35"/><br/>
		
		      Confirm E-mail: &nbsp; &nbsp;&nbsp; 
		      <input id="cemail" type="text" name="email" size="20" maxlength="35"/><br/>
		<br/>
		      <p style="color:black">Select a password (minimum of 5 characters):</p>
		      Password: &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		      <input id="password" type="password" name="password" size="15" maxlength="25" minlength="5"/><br/>
		      Confirm password: &nbsp;
		      <input id="cpassword" type="password" name="password" size="15" maxlength="25" minlength="5"/><br/>
		      <br/>
		      Phone:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		      <input id="phone" name="phone1" type="text" size="3" maxlength="3"/>
		      <input id="phone1" name="phone2" type="text" size="3" maxlength="3"/>
		      <input id="phone2" name="phone3" type="text" size="4" maxlength="4"/>
	        </td>
		</tr>
		</tbody>
		</table>
	      <input type="submit" value="Create Account">
	      <input type="reset" value="Reset Form">
	    </form>
	    <p><em>(Fields in <span style="color:red">red</span> are required)</em></p>
	  </td>
	</tr>
<?php require_once("footer.html"); ?>
