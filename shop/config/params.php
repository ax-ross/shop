<?php

require_once 'smtp.php';

return [
    'admin_email' => 'admin@shop.loc',
    'site_name' => 'Shop',
    'pagination' => 3,

    'smtp_host' => $smtp['smtp_host'],
    'smtp_auth' => $smtp['smtp_auth'],
    'smtp_port' => $smtp['smtp_port'],
    'smtp_username' => $smtp['smtp_username'],
    'smtp_password' => $smtp['smtp_password'],
    'smtp_secure' => $smtp['smtp_secure'],
    'smtp_from_email' => $smtp['smtp_from_email']
];