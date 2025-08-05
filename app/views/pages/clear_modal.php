<?php
session_start();

if (isset($_SESSION['modal'])) {
    unset($_SESSION['modal']);
}

http_response_code(204); // No Content
