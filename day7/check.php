<?php
session_start();
echo "Name from session : ".($_SESSION['name']??' Session not Found');
?>