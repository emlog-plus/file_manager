<?php
/*
Plugin Name: 文件管理器
Version: 1.0
Description: 对于博客emlog简单的文件管理器
Author: DOC_tr
Author Email: CrimSoN_AL@mail.ru
Author URL: http://phpbl.ru
ForEmlog: 5.3.0+ PHP 5.3+
*/
!defined('EMLOG_ROOT') && exit('access deined!');
function file_m() {
    echo '<li><a href="./plugin.php?plugin=file_manager-master" id="menu_file">文件管理</a></li>';
}
addAction('adm_sidebar_ext', 'file_m');
?>
