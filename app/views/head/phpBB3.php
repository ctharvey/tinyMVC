<?php
global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
define('IN_PHPBB', true);
// Specify the path to you phpBB3 installation directory.
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : BASE_DIR.'/forums/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
// The common.php file is required.
include($phpbb_root_path . 'common.' . $phpEx);
// since we are grabbing the user avatar, the function is inside the functions_display.php file since RC7
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);

// Start session management
$user->session_begin();

$auth->acl($user->data);
session_start();
