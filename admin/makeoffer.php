<?php
/***************************************************************************
 *   copyright				: (C) 2008 - 2017 WeBid
 *   site					: http://www.webidsupport.com/
 ***************************************************************************/

/***************************************************************************
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version. Although none of the code may be
 *   sold. If you have been sold this script, get a refund.
 ***************************************************************************/

define('InAdmin', 1);
$current_page = 'settings';
include '../common.php';
include INCLUDE_PATH . 'functions_admin.php';
include 'loggedin.inc.php';

if (isset($_POST['action']) && $_POST['action'] == 'update') {

  
    


    $system->writesetting("offer_available", $_POST['offer_available'], "str");

    $system->writesetting("offer_available_for", $_POST['offer_available_for'], 'str');
    
    $template->assign_block_vars('alerts', array('TYPE' => 'success', 'MESSAGE' => $MSG['make_an_offer_settings_updated']));
}

loadblock($MSG['addoffer'], $MSG['enable_mon_only_auto_disable_explain'], 'yesno', 'offer_available', $system->SETTINGS['offer_available'], array($MSG['yes'], $MSG['no']));
loadblock($MSG['enable_make_an_offer_only'], '', 'select3num', 'offer_available_for', $system->SETTINGS['offer_available_for'], array($MSG['auction'], $MSG['dutch'], $MSG['nooffer']));

$template->assign_vars(array(
        'SITEURL' => $system->SETTINGS['siteurl'],
        'TYPENAME' => $MSG['25_0008'],
        'PAGENAME' => $MSG['2__1025']
        ));

include 'header.php';
$template->set_filenames(array(
        'body' => 'adminpages.tpl'
        ));
$template->display('body');
include 'footer.php';
