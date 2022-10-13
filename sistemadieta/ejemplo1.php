<?php
// start a session
session_start();
 

// access session variables
echo $_SESSION['logged_in_user_id'];
echo $_SESSION['logged_in_user_name'];

?>
<form>
<table>
<tr><td>Ingrese el ID Paciente</td><td><input type="text" name="idp" value="<?php echo $_SESSION['logged_in_user_id']; ?>" ></td></tr>
<tr><td>Ingrese el ID Paciente</td><td><input type="text" name="idp" value="<?php echo $_SESSION['logged_in_user_name']; ?>" ></td></tr>
</table>
</form>