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
    $_SESSION['REDIRECT_AFTER_LOGIN'] = 'make_offer.php';
    header('location: user_login.php');
    exit;
}

$offer_item_id = (isset($_POST['offer_item_id'])) ? $_POST['offer_item_id'] : '';
$offer_item = (isset($_POST['offer_item'])) ? $_POST['offer_item'] : '';
$offer_item_image = (isset($_POST['offer_item_image'])) ? $_POST['offer_item_image'] : '';
$offer_item_owner = (isset($_POST['offer_item_owner'])) ? $_POST['offer_item_owner'] : '';
$offer_sender = (isset($_POST['offer_sender'])) ? $_POST['offer_sender'] : '';
$offer_reciver = (isset($_POST['offer_reciver'])) ? $_POST['offer_reciver'] : '';
$offer_date = (isset($_POST['offer_date'])) ? $_POST['offer_date'] : $dt->formatDate('now');
$offer_status = (isset($_POST['offer_status'])) ? $_POST['offer_status'] : '';
$offer_counter_offer= (isset($_POST['offer_counter_offer'])) ? $_POST['offer_counter_offer'] : '0';
$offer_price = (isset($_POST['offer_price'])) ? $_POST['offer_price'] : '';
$offer_reject = (isset($_POST['offer_reject'])) ? $_POST['offer_reject'] : '';
$offer_accept = (isset($_POST['offer_accept'])) ? $_POST['offer_accept'] : '';
$offer_action = (isset($_POST['offer_action'])) ? $_POST['offer_action'] : '';
$make_offer = (isset($_POST['make_offer'])) ? $_POST['make_offer'] : '';
$offer_id = (isset($_POST['offer_id'])) ? $_POST['offer_id'] : '';
$offer_msg = (isset($_POST['offer_msg'])) ? $_POST['offer_msg'] : '';
/////
$offer_item_title = (isset($_POST['offer_item_title'])) ? $_POST['offer_item_title'] : '';
$offer_item_seller_nick = (isset($_POST['offer_item_seller_nick'])) ? $_POST['offer_item_seller_nick'] : '';
$offer_can_buy = (isset($_POST['offer_can_buy'])) ? $_POST['offer_can_buy'] : '';
$offer_item_qty = (isset($_POST['offer_item_qty'])) ? $_POST['offer_item_qty'] : '';
$offer_item_shipping= (isset($_POST['offer_item_shipping'])) ? $_POST['offer_item_shipping'] : '';
$offer_item_shipping_additional = (isset($_POST['offer_item_shipping_additional'])) ? $_POST['offer_item_shipping_additional'] : '';
////
$b_counter_offer = (isset($_POST['b_counter_offer'])) ? $_POST['b_counter_offer'] : '';
$b_first_offer = (isset($_POST['b_first_offer'])) ? $_POST['b_first_offer'] : '';
$viewer = (isset($_POST['b_first_offer'])) ? $_POST['b_first_offer'] : '';

if ($b_counter_offer == '1' ) {
    $template->assign_vars(array(
        'B_COUNTER_OFFER'=>'true',
    ));
}
if ($b_first_offer == '1'){
    $template->assign_vars(array(
        'B_FIRST_OFFER'=>'true'
    ));
}
if($offer_action='action'){
    
    if ($make_offer='offer'){
        $query = "SELECT * FROM " . $DBPrefix . "auctions WHERE id = :item_id";
    $params = array();
    $params[] = array(':item_id', $offer_item_id, 'int');
    $db->query($query, $params);
    $owner_id=$db->result();
if ($owner_id ['user']== $user->user_data['id']){
    $template->assign_vars(array(
        'TITLE_MESSAGE' => $MSG['9415'],
        'BODY_MESSAGE' => $ERR_9000
        ));
include 'header.php';
$template->set_filenames(array(
        'body' => 'message.tpl'
        ));
$template->display('body');
include 'footer.php';
exit; // kill the page

        //here is the first offer for an auction item so we set the status as pending
        $offer_status='pending';
        $offer_sender_role='bidder';
        $b_start='first_offer' ;
       // $offer_date=  date("Y/m/d");
        $offer_result_msg_recieved= $MSG['9803'];
        $offer_message=$offer_result_msg_recieved;
        $template->assign_vars(array(
            'OFFER_MESSAGE'=>$offer_message,
            'B_WAITING_OFFER'=>'true',
            'B_ACCEPT_OFFER'=>null,
            'B_FIRST_OFFER'=> null
           ));
        if ($offer_price < $offer_reject) {
            // here we deal with auto reject 
            // we want to set the status to  rejected
            $offer_status='declined';
            $offer_result_msg_reject= $MSG['9801'];
            $offer_message=$offer_result_msg_reject;
            $template->assign_vars(array(
              'OFFER_MESSAGE'=>$offer_message,
              'B_ACCEPT_OFFER'=>null,
              'B_WAITING_OFFER'=>null,
              'B_FIRST_OFFER'=>'true'
            ));
            }
        if ($offer_price >= $offer_accept) {
            // here we deal with auto accept
            // we want to set the status to  accepted
            
            $offer_result_msg_accepted=$MSG['9802'];
            $offer_status='accepted';
            $offer_message=$offer_result_msg_accepted;
            // here we create buy now  
            $template->assign_vars(array(
               'OFFER_MESSAGE'=>'your offer has been accepted. you can pay now.',
               'B_ACCEPT_OFFER'=>'true',
               'B_FIRST_OFFER'=> null,
               'B_WAITING_OFFER'=>null
           ));
          }
        $query = "INSERT INTO " . $DBPrefix . "offers 
(offer_item_id,offer_item_image,offer_sender,offer_reciever,offer_status,offer_price,offer_counter_offer,offer_date,offer_sender_role, offer_item_owner,offer_item_title, offer_item_seller_nick, offer_item_qty, offer_item_shipping, offer_item_shipping_additional,offer_msg) 
VALUES 
(:offer_item_id,:offer_item_image,:offer_sender,:offer_reciver,:offer_status,:offer_price,:offer_counter_offer,:offer_date,:offer_sender_role, :offer_item_owner,:offer_item_title, :offer_item_seller_nick,:offer_item_qty, :offer_item_shipping, :offer_item_shipping_additional,:offer_msg) ";  
        $params = array();    
        $params[] = array(':offer_item_id', $offer_item_id  , 'int');
        $params[] = array(':offer_item_image',$offer_item_image , 'str');
        $params[] = array(':offer_sender',$user->user_data['id'], 'str');
        $params[] = array(':offer_reciver', $offer_reciver , 'str');
        $params[] = array(':offer_status', $offer_status  , 'str');
        $params[] = array(':offer_price' , $offer_price , 'float');
        $params[] = array(':offer_counter_offer',$offer_counter_offer, 'str');
        $params[] = array(':offer_date',  $dt->convertToUTC('now'), 'str');
        $params[] = array(':offer_sender_role', $offer_sender_role , 'str');
        $params[] = array(':offer_item_owner', $offer_item_owner , 'str');
        $params[] = array(':offer_item_title', $offer_item_title , 'str');
        $params[] = array(':offer_item_seller_nick', $offer_item_seller_nick , 'str');
        $params[] = array(':offer_item_qty', $offer_item_qty , 'int');
        $params[] = array(':offer_item_shipping', $offer_item_shipping , 'str');
        $params[] = array(':offer_item_shipping_additional', $offer_item_shipping_additional , 'str');
        $params[] = array(':offer_msg', $offer_msg , 'str');  
        $db->query($query, $params);
       
       
        $template->assign_vars(array(
            'OFFER_MESSAGE'=>$offer_message

        ));

    }
   
}
// lets try to pass the values to template
$template->assign_vars(array(
    'OFFER_ID'=>$id,
    'TITLE' => htmlspecialchars($title),
    'OFFER_ITEM_ID' => $offer_item_id,
    //'ERROR' => ($ERR == 'ERR_') ? '' : $ERR,
    'OFFER_ITEM_IMAGE' => $offer_item_image,
    'OFFER_SENDER' => $offer_sender,
    'OFFER_RECIVER' => $offer_reciver,
    'OFFER_PRICE' => $offer_price,
    'OFFER_STATUS' => $offer_status,
    'OFFER_COUNTER_OFFER' => $offer_counter_offer,
    'OFFER_SENDER_ROLE' => $offer_sender_role,
    'OFFER_DATE' => $dt->formatDate('now'),
    'OFFER_ITEM_OWNER'=> $offer_item_owner,
    'OFFER_REJECT' => $offer_reject,
    'OFFER_ACCEPT' => $offer_accept,
    'B_OFFER_PRICE'=>$offer_price,
    'TITLE'=> $offer_item_title,
    'SELLER_NICK'=>$offer_item_seller_nick,
    'B_CAN_BUY'=> $offer_can_buy,
    'QTY'=>$offer_item_qty,
    'OFFER_MSG'=>$offer_msg,
    'SHIPPING_COST'=>$offer_item_shipping,
    'ADDITIONAL_SHIPPING_COST'=> $offer_item_shipping_additional
    //'OFFER_MESSAGE' => $offer_message
    ));

    
    include 'header.php';
$template->set_filenames(array(
        'body' => 'make_offer.tpl'
        ));
$template->display('body');
include 'footer.php';
unset($_SESSION['browse_id']);
?>

