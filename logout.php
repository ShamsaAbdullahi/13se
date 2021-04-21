<?php
<<<<<<< HEAD
 
/*
	* session_start()  --> Required To do anything related to sessions. Best to put on top before any other code.
	* session_unset() -->  function frees all session variables currently registered like $_Session['id_user']
	* session_destroy() --> Destroys all data registered to a session. Basically destory all session.
*/
=======

>>>>>>> d6791d4e223c952a2f7d7ebb57e02eb2c17c19b1

session_start();
session_unset();
session_destroy();

header("Location: index.php");
exit();