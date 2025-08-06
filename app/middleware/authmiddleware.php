<?php
class AuthMiddleware
{
    public static function adminOnly()
    {
        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!defined('Admin')) define('Admin', 1);

        if (!isset($_SESSION['session_loginuser']) || $_SESSION['session_loginuser']['role_id'] != Admin) {
            header("Location: " . URLROOT . "/pages/login");
            exit();
        }
    }

    public static function userOnly()
    {
        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!defined('User')) define('User', 2);

        if (!isset($_SESSION['session_loginuser']) || $_SESSION['session_loginuser']['role_id'] != User) {
            header("Location: " . URLROOT . "/pages/login");
            exit();
        }
    }
}
