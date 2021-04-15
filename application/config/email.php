<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 //config
 $config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'smtp.gmail.com', 
    'smtp_port' => 465,
    'smtp_user' => 'elisee.kalonji99@gmail.com',
    'smtp_pass' => '@elisee2018',
    'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    'mailtype' => 'text', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '5', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);
