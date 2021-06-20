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

include 'common.php';
if ($language=="FA"){ $user_content_dir='pull_left'; $user_menu_dir='pull-right';}else{$user_content_dir='pull_right'; $user_menu_dir='pull-left';}

if (!$user->checkAuth()) {
    $_SESSION['LOGIN_MESSAGE'] = $MSG['5000'];
    $_SESSION['REDIRECT_AFTER_LOGIN'] = 'yourfoffers.php';
    header('location: user_login.php');
    exit;
}


if ($language=="FA"){ $user_content_dir='pull_left'; $user_menu_dir='pull-right';}else{$user_content_dir='pull_right'; $user_menu_dir='pull-left';}

$query = "SELECT count(*) As COUNT FROM " . $DBPrefix . "offers WHERE offer_reciever = :user_id and reciever_role=";
$params = array();
$params[] = array(':user_id', $user->user_data['id'], 'int');
$db->query($query, $params);
$total = $db->result('COUNT');
// get number of pages
if (!isset($_GET['PAGE']) || $_GET['PAGE'] <= 1 || $_GET['PAGE'] == '') {
    $OFFSET = 0;
    $PAGE = 1;
} else {
    $PAGE = intval($_GET['PAGE']);
    $OFFSET = ($PAGE - 1) * $system->SETTINGS['perpage'];
}

$USER_ID=$user->user_data['id'];
$PAGES = ($total == 0) ? 1 : ceil($total / $system->SETTINGS['perpage']);
$query = "SELECT *FROM " . $DBPrefix . "offers WHERE offer_reciver =". $USER_ID ." and item_owner=". $USER_ID ." ORDER BY offer_item ";
$db->direct_query($query);

while ($row = $db->fetch()) {
    $template->assign_block_vars('offers', array(
          
            'ID' => $row['id'],
            'OFFER_ITEM' => $row['offer_item'],
            'OFFER_ITEM_IMAGE' => $row['offer_item_image'],
            'OFFER_ID' => $row['offer_id'],
            'OFFER_SENDER' => $row['offer_sender'],
            'OFFER_RECIVER' => $row['offer_reciver'],
            'OFFER_DATE' => $row['offer_date'],
            'OFFER_PRICE' => $row['offer_price'],
            'OFFER_STATUS' => $row['offer_status'],
            'OFFER_SENDER_ROLE' => $row['offer_sender_role'],
            'OFFER_COUNTER_OFFER ' => $row['offer_counter_offer'],
            'USER_CONTEN_DIR' => $user_content_dir,
            'USER_MENU_DIR' => $user_menu_dir,

            'USER_ID' =>$user->user_data['id']
            
            ));
}

include 'header.php';
$TMP_usmenutitle = $MSG['25_0225'];
include INCLUDE_PATH . 'user_cp.php';
$template->set_filenames(array(
        'body' => 'youroffers.tpl'
        ));
$template->display('body');
include 'footer.php';
