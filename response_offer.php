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
$goto_page = (isset($_GET['goto'])) ? $_GET['goto'] : '';
$oID = (isset($_GET['oID'])) ? $_GET['oID'] : '';
$zID = (isset($_GET['zID'])) ? $_GET['zID'] : '';
if ($zID==1)$make_offer_fdb='accept';
if ($zID==2)$make_offer_fdb='reject';
if ($zID==3)$make_offer_fdb  ='counter_offer';
if (!$user->checkAuth()) {
    $_SESSION['LOGIN_MESSAGE'] = $MSG['5000'];
    $_SESSION['REDIRECT_AFTER_LOGIN'] = $goto_page;
    header('location: user_login.php');
    exit;
}
$query = "SELECT * FROM " . $DBPrefix . "offers
		WHERE offer_id = :offer_id";
$params = array();
$params[] = array(':offer_id', $oID, 'int');
$db->query($query, $params);
while ($row = $db->fetch()) {

$offer_item_id_fdb =$row['offer_item_id'];
$offer_item_fdb =$row['offer_item'];
$offer_item_image_fdb =$row['offer_item_image'];
$offer_item_owner_fdb =$row['offer_item_owner'];
$offer_sender_fdb =$row['offer_sender']; 
$offer_reciever_fdb =$row['offer_reciever'];
$offer_date_fdb =$row['offer_date']; 
$offer_status_fdb =$row['offer_status']; 
$offer_counter_offer= $row['offer_counter_offer'];
$offer_price_fdb =$row['offer_price']; 
$offer_reject_fdb =$row['offer_reject']; 
$offer_accept_fdb =$row['offer_accept'];
$offer_action_fdb =$row['offer_action']; 
//$make_offer_fdb =$row['make_offer'];
$offer_id_fdb =$row['offer_id'];
/////
$offer_item_title_fdb =$row['offer_item_title']; 
$offer_item_seller_nick_fdb =$row['offer_item_seller_nick'];
$offer_can_buy_fdb =$row['offer_can_buy']; 
$offer_item_qty_fdb =$row['offer_item_qty']; 
$offer_item_shipping_fdb= $row['offer_item_shipping']; 
$offer_item_shipping_additional_fdb =$row['offer_item_shipping_additional']; 
$offer_msg_fdb= $row['offer_msg']; 

}

$offer_item_id = (isset($_POST['offer_item_id'])) ? $_POST['offer_item_id'] : $offer_item_id_fdb;
$offer_item = (isset($_POST['offer_item'])) ? $_POST['offer_item'] : $offer_item_fdb;
$offer_item_image = (isset($_POST['offer_item_image'])) ? $_POST['offer_item_image'] : $offer_item_image_fdb;
$offer_item_owner = (isset($_POST['offer_item_owner'])) ? $_POST['offer_item_owner'] : $offer_item_owner_fdb;
$offer_sender = (isset($_POST['offer_sender'])) ? $_POST['offer_sender'] : $offer_sender_fdb;
$offer_reciever = (isset($_POST['offer_reciever'])) ? $_POST['offer_reciever'] : $offer_reciever_fdb;
$offer_date = (isset($_POST['offer_date'])) ? $_POST['offer_date'] : $offer_date_fdb;
$offer_status = (isset($_POST['offer_status'])) ? $_POST['offer_status'] : $offer_status_fdb;
$offer_counter_offer= (isset($_POST['offer_counter_offer'])) ? $_POST['offer_counter_offer'] : $offer_counter_offer_fdb;
$offer_price = (isset($_POST['offer_price'])) ? $_POST['offer_price'] : $offer_price_fdb;
$offer_reject = (isset($_POST['offer_reject'])) ? $_POST['offer_reject'] : $offer_reject_fdb;
$offer_accept = (isset($_POST['offer_accept'])) ? $_POST['offer_accept'] : $offer_accept_fdb;
$offer_action = (isset($_POST['offer_action'])) ? $_POST['offer_action'] : 'action';
$make_offer = (isset($_POST['make_offer'])) ? $_POST['make_offer'] : $make_offer_fdb;
$offer_id = (isset($_POST['offer_id'])) ? $_POST['offer_id'] : $offer_id_fdb;
/////
$offer_item_title = (isset($_POST['offer_item_title'])) ? $_POST['offer_item_title'] : $offer_item_title_fdb;
$offer_item_seller_nick = (isset($_POST['offer_item_seller_nick'])) ? $_POST['offer_item_seller_nick'] : $offer_item_seller_nick_fdb;
$offer_can_buy = (isset($_POST['offer_can_buy'])) ? $_POST['offer_can_buy'] : $offer_can_buy_fdb;
$offer_item_qty = (isset($_POST['offer_item_qty'])) ? $_POST['offer_item_qty'] : $offer_item_qty_fdb;
$offer_item_shipping= (isset($_POST['offer_item_shipping'])) ? $_POST['offer_item_shipping'] : $offer_item_shipping_fdb;
$offer_item_shipping_additional = (isset($_POST['offer_item_shipping_additional'])) ? $_POST['offer_item_shipping_additional'] : $offer_item_shipping_additional_fdb;
$offer_msg= (isset($_POST['offer_msg'])) ? $_POST['offer_msg'] : $offer_msg_fdb;

//// 
        $show=1;
    if ($make_offer=='reject'){
          //here we change the status of the offer to decline 
           $offer_message= $MSG['9823'];
          // we want to set the status to  rejected
            if($offer_action=='action5'){
                $show=0;
                $offer_message= $MSG['9826'];
                $query = "UPDATE " . $DBPrefix . "offers SET  offer_status = 'declined',offer_msg='".$offer_msg."' WHERE offer_id =".$offer_id;
                  $db->direct_query($query);
              }
           
            $template->assign_vars(array(
            'OFFER_MESSAGE'=>$offer_message,
            'B_ACCEPT_OFFER'=>null,
            'B_COUNTER_OFFER'=> null,
            'B_REJECT_OFFER'=>'true'
           
           ));
        
    }

      
    if ($make_offer=='accept'){
            
           //here iwe change the status of the offer to decline
             $offer_message=$MSG['9824'];
          // we want to set the status to  rejected
             if($offer_action=='action5'){
                 $show=0;
                 $query = "UPDATE " . $DBPrefix . "offers SET   offer_status = 'accepted',offer_msg='".$offer_msg."'  where offer_id =".$offer_id;
                   $db->direct_query($query);
            }
            $template->assign_vars(array(
                'OFFER_MESSAGE'=>$offer_message,
                'B_REJECT_OFFER'=>null,
                'B_ACCEPT_OFFER'=>'true',
                'B_COUNTER_OFFER'=> null
             ));
            }  
   

    if ($make_offer=='counter_offer'){
        
             //if we want to make a counter offer
             // here we want to input these in the db again
            // put the number of current offer in the counter_offer colum
             // change the sender and reciver
             // maybe a counter
             // a success message
             // change status to counter offer
             $query = "UPDATE " . $DBPrefix . "offers SET   offer_status = 'counter_offer' where offer_id =".$offer_id;
             $db->direct_query($query);     
             $offer_status='pending';
             $offer_message = $MSG['9819'];
              if($offer_action=='action5'){
              $query = "SELECT make_offer_accept FROM " . $DBPrefix . "auctions
		WHERE auction_id = :auction_id";
$params = array();
$params[] = array(':auction_id', $offer_item_id, 'int');
$db->query($query, $params);
$make_offer_accept=$db->fetch();
               if ($offer_price >=$make_offer_accept){
                $offer_status='accepted';
                  $template->assign_vars(array(  
                  'B_SHOW_PAY_NOW' => 'true'
                ));
                }
              $offer_counter_offer = $offer_counter_offer_fdb.','.$offer_id;
              $offer_message = $MSG['9820'];
              IF ($offer_sender_role=='seller'){$offer_sender_role='bidder';}
              IF ($offer_sender_role=='bidder'){$offer_sender_role='seller';}
              $show=0;
              $query = "INSERT INTO " . $DBPrefix . "offers 
              (offer_item_id,offer_item_image,offer_sender,offer_reciever,offer_status,offer_price,offer_counter_offer,offer_date,offer_sender_role, offer_item_owner,offer_item_title, offer_item_seller_nick, offer_item_qty, offer_item_shipping, offer_item_shipping_additional, offer_msg) 
              VALUES 
              (:offer_item_id,:offer_item_image,:offer_sender,:offer_reciever,:offer_status,:offer_price,:offer_counter_offer,:offer_date,:offer_sender_role, :offer_item_owner,:offer_item_title, :offer_item_seller_nick,:offer_item_qty, :offer_item_shipping, :offer_item_shipping_additional, :offer_msg) ";  
                      $params = array();    
                      $params[] = array(':offer_item_id', $offer_item_id  , 'int');
                      $params[] = array(':offer_item_image',$offer_item_image , 'str');
                      $params[] = array(':offer_sender',$user->user_data['id'], 'str');
                      $params[] = array(':offer_reciever', $offer_sender , 'str');
                      $params[] = array(':offer_status', $offer_status  , 'str');
                      $params[] = array(':offer_price' , $offer_price , 'float');
                      $params[] = array(':offer_counter_offer',$offer_counter_offer, 'str');
                      $params[] = array(':offer_date',  $dt->convertToUTC('now'), 'str');
                      $params[] = array(':offer_sender_role', $offer_sender_role , 'str');
                      $params[] = array(':offer_item_owner', $offer_item_owner , 'int');
                      $params[] = array(':offer_item_title', $offer_item_title , 'str');
                      $params[] = array(':offer_item_seller_nick', $offer_item_seller_nick , 'str');
                      $params[] = array(':offer_item_qty', $offer_item_qty , 'int');
                      $params[] = array(':offer_item_shipping', $offer_item_shipping , 'str');
                      $params[] = array(':offer_item_shipping_additional', $offer_item_shipping_additional , 'str');
                      $params[] = array(':offer_msg', $offer_msg , 'str');      
                      $db->query($query, $params);
                     
              }
             $template->assign_vars(array(
                'OFFER_MESSAGE'=>$offer_message,
                'B_REJECT_OFFER'=>null,
                'B_ACCEPT_OFFER'=>null,
                'B_COUNTER_OFFER'=> 'true'
               ));
              }
             
              
              if ($show==1){
                $template->assign_vars(array(  
                  'B_SHOW_BUTTON' => 'true'
                ));
              }
              if (($offer_item_owner!=$user->user_data['id'])&&($offer_action=='action5')){
             
               
                $template->assign_vars(array(  
                  'B_SHOW_PAY_NOW' => 'true'
                ));
              }

              //}
            $template->assign_vars(array(
                'OFFER_ID'=>$offer_id,
                'TITLE' => $offer_item_title,
                'OFFER_ITEM_ID' => $offer_item_id,
                'ERROR' => ($ERR == 'ERR_') ? '' : $ERR,
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
                'OFFER_ITEM_TITLE'=> $offer_item_title,
                'SELLER_NICK'=>$offer_item_seller_nick,
                'B_CAN_BUY'=> $offer_can_buy,
                'GOTO_PAGE'=>$goto_page,
                'B_SHOW' => $bshow,
                'QTY'=>$offer_item_qty,
                'SHIPPING_COST'=>$offer_item_shipping,
                'ADDITIONAL_SHIPPING_COST'=> $offer_item_shipping_additional,
                'OFFER_MESSAGE' => $offer_message
                ));
               
    
      include 'header.php';
 $template->set_filenames(array(
    
      'body' => 'response_offer.tpl'
        ));
    $template->display('body');
     include 'footer.php';

?>

