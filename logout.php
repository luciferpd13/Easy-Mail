<?php
session_start();

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>
<script language="javascript">
 alert('You have Logged out !');
	window.location.href='index.html';
	
</script>
