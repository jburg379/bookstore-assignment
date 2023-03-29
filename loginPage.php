<script>
function checkinput(e) {
	var text="";
	if(document.getElementById("email").value =="") {
		text="email address\n";
	}
	if(document.getElementById("password").value =="") {
		text=text+"password\n";
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
	       <h2>Login</h2>   <table class="log">
		<tbody>
	          <form method="post" action="login.php">
	            <tr colspan="4">
		      <td>
		      E-mail Address:
		      <input id="email" type="text" name="email" size="20" maxlenght="50"/><br/>
		      Password: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		      <input id="password" type="password" name="password" size="20" maxlenght="25"/><br/>
		      </td>
		      </tr>
		      </tbody>
		      </table>
	              <input type="submit" value="Login">
	              <input type="reset" value="Reset Form">
	          </form>
	          <p><em>(Fields in <span style="color:red">red</span>are required)</em></p>
              </div>
	  </td>
	</tr>
<?php require_once("footer.html"); ?>
