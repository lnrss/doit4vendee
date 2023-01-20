<?php
session_start();
echo(isset($_SESSION['lastName']) ? $_SESSION['lastName'] : '');