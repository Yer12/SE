<?php 
    setcookie('user', $user['c_name'], time() - 3600, "/");
    header('Location: /');

?>