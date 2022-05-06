<?php 

//logout kills destroys this active connection and redirects to index.php

session_start();

session_unset();
session_destroy();

header("Location: index.php");