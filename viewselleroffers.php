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

if (!$user->checkAuth()) {
    $_SESSION['LOGIN_MESSAGE'] = $MSG['5000'];
    $_SESSION['REDIRECT_AFTER_LOGIN'] = 'viewselleroffers.php';
    header('location: user_login.php');
    exit;
}


$query = "SELECT count(*) As COUNT FROM " . $DBPrefix . "offers WHERE offer_item_owner = :offer_item_owner and offer_reciever = :offer_reciever";
$params = array();
$params[] = array(':offer_item_owner', $user->user_data['id'], 'int');
$params[] = array(':offer_reciever', $user->user_data['id'], 'int');
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
$PAGES = ($total == 0) ? 1 : ceil($total / $system->SETTINGS['perpage']);



$query = "SELECT * FROM " . $DBPrefix . "offers 
          WHERE offer_item_owner = :offer_item_owner
          and offer_reciever = :offer_reciever
          ORDER by offer_item_id DESC
          LIMIT :offset, :perpage";
$params = array();
$params[] = array(':offer_item_owner', $user->user_data['id'], 'int');
$params[] = array(':offer_reciever', $user->user_data['id'], 'int');
$params[] = array(':offset', $OFFSET, 'int');
$params[] = array(':perpage', $system->SETTINGS['perpage'], 'int');
$db->query($query, $params);


while ($row = $db->fetch()) {
    if ($row['offer_status']=='pending'){
           
        $b_buy_now_class='hidden';
        $b_reject_class= 'btn btn-warning btn-sm ';
        $b_counter_offer_class='btn  btn-sm btn-info '; 
        $b_accept_class= 'btn btn-primary  btn-sm '; 
        $b_rejected_class='hidden';
        $b_expired_class='hidden';
        $b_counter_class='hidden';
    }
    if ($row['offer_status']=='expired'){
        $b_buy_now_class='hidden';
        $b_reject_class='hidden';
        $b_counter_offer_class='hidden'; 
        $b_accept_class='hidden';
        $b_rejected_class='hidden';
        $b_expired_class='btn btn-light form-group';
        $b_counter_class='hidden';
    }
    if ($row['offer_status']=='declined'){
        $b_buy_now_class='hidden';
        $b_reject_class='hidden';
        $b_counter_offer_class='hidden'; 
        $b_accept_class='hidden';
        $b_rejected_class='btn btn-light form-group';
        $b_expired_class='hidden';
        $b_counter_class='hidden';
    }
    if ($row['offer_status']=='accepted'){
      $b_reject_class='hidden';
      $b_counter_offer_class='hidden'; 
      $b_accept_class='hidden';
      $b_buy_now_class='btn btn-success form-group';
      $b_rejected_class='hidden';
      $b_expired_class='hidden';
      $b_counter_class='hidden';
    }
    if ($row['offer_status']=='counter_offer'){
         $b_buy_now_class='hidden';
         $b_reject_class='hidden';
         $b_counter_offer_class='hidden'; 
         $b_accept_class='hidden';
         $b_rejected_class='hidden';
         $b_expired_class='hidden';
         $b_counter_class='btn btn-default form-group';
    }
    

    $template->assign_block_vars('offers', array(
            'BGCOLOUR' => (!(($i + 1) % 2)) ? '' : 'class="alt-row"',
            'OFFER_ID' => $row['offer_id'],
            'OFFER_ITEM_ID' => $row['offer_item_id'],
            'OFFER_ITEM_IMAGE' => $row['offer_item_image'],
            'OFFER_SENDER' => $row['offer_sender'],
            'OFFER_RECIVER' => $row['offer_reciever'],
            'OFFER_STATUS' => $row['offer_status'],
            'OFFER_PRICE' => $row['offer_price'],
            'OFFER_COUNTER_OFFER ' => $row['offer_counter_offer'],
            'OFFER_DATE' => $row['offer_date'],
            'OFFER_SENDER_ROLE' => $row['offer_sender_role'],
            'OFFER_ITEM_OWNER' => $row['offer_item_owner'],
            'OFFER_ITEM_TITLE' => $row['offer_item_title'],
            'SELLER_NICK'=> $row['offer_item_seller_nick'],
            'QTY'=>$row['offer_item_qty'],
            'SHIPPING_COST' =>$row['offer_item_shipping'],
            'ADDITIONAL_SHIPPING_COST' =>$row['offer_item_shipping_additional'],
            'OFFER_MSG' =>$row['offer_msg'],
            'USER_CONTENT_DIR' => $user_content_dir,
            'USER_MENU_DIR' => $user_menu_dir,
            'USER_ID' =>$user->user_data['id'],
            'USER_NICK' =>$user->user_data['nick'],
            'B_EXPIRED_CLASS' => $b_expired_class,
            'B_ACCEPT_CLASS' => $b_accept_class,
            'B_REJECT_CLASS' => $b_reject_class,
            'B_BUY_NOW_CLASS' =>$b_buy_now_class,
            'B_REJECTED_CLASS' =>$b_rejected_class,
            'B_COUNTER_OFFER_CLASS' =>$b_counter_offer_class,
            'B_COUNTER_CLASS' =>$b_counter_class
            ));

            
        }


// get pagenation
$PREV = intval($PAGE - 1);
$NEXT = intval($PAGE + 1);
if ($PAGES > 1) {
    $LOW = $PAGE - 5;
    if ($LOW <= 0) {
        $LOW = 1;
    }
    $COUNTER = $LOW;
    while ($COUNTER <= $PAGES && $COUNTER < ($PAGE + 6)) {
       // if ($COUNTER==$PAGE) $PAGE = '<u> '.$COUNTER.'</u>';
        $template->assign_block_vars('pages', array(
                'PAGE' => ($PAGE == $COUNTER) ?  '<a  style="background-color:lightblue;opacity: 0.3;"><u>'.$COUNTER . '</u></a>' : '<a href="' . $system->SETTINGS['siteurl'] . 'viewselleroffers.php?PAGE=' . $COUNTER . '"><u>' . $COUNTER . '</u></a>'
                ));
        $COUNTER++;
    }
 
}


$template->assign_vars(array(
        'USERNICK' => $user->user_data['nick'],
        'USERFB' => $user->user_data['rate_sum'],
        'GOTO_PAGE' =>'viewselleroffers.php',

        'PREV' => ($PAGES > 1 && $PAGE > 1) ? '<a href="' . $system->SETTINGS['siteurl'] . 'viewselleroffers.php?PAGE=' . $PREV . '"><u>' . $MSG['5119'] . '</u></a>&nbsp;&nbsp;' : '',
        'NEXT' => ($PAGE < $PAGES) ? '<a href="' . $system->SETTINGS['siteurl'] . 'viewselleroffers.php?PAGE=' . $NEXT . '"><u>' . $MSG['5120'] . '</u></a>' : '',
        'PAGE' => $PAGE,
        'PAGES' => $PAGES,

        'BGCOLOUR' => (!(($i + 1) % 2)) ? '' : 'class="alt-row"'
        ));
        

include 'header.php';
$TMP_usmenutitle = $MSG['9901'];
include INCLUDE_PATH . 'user_cp.php';
$template->set_filenames(array(
    'body' => 'youroffers.tpl'
        ));
$template->display('body');
include 'footer.php';
