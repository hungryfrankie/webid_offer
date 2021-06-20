 <!-- INCLUDE user_menu_header.tpl -->  
<div class="row">
   <div class="col-md-10 col-md-offset-1 well">
<div class="panel panel-default ">
<legend><a class="btn btn-default"href="{SITEURL}{GOTO_PAGE}">{L_9999}</a></legend>
 <!-- IF B_COUNTER_OFFER -->	
   <div>

     <div class="alert alert-danger">
				{OFFER_MESSAGE}
			</div>
    <div class="panel panel-default ">
						<table class="table table-striped">
							<tr>
								<td width="30%"><b>{L_017} :</b></td>
								<td width="70%">{TITLE}</td>
							</tr>
							<tr>
								<td width="30%"><b>{L_125} :</b></td>
								<td>{SELLER_NICK} {SELLERNUMFBS} <!-- IF FB_ICON ne '' --><img src="{SITEURL}images/icons/{FB_ICON}" alt="{FB_ICON}" class="fbstar"><!-- ENDIF --></td>
							</tr>
							<tr>
								<td width="30%"><b>{L_9807}:</b></td>
								<td>{B_OFFER_PRICE}<!-- IF B_QTY -->{L_868}<!-- ENDIF --></td>
							</tr>
							<tr>
								<td colspan=2 >&nbsp;</td>
							</tr>
              </table>
         </div>
     <div class="panel panel-default ">
      <!-- IF B_SHOW_PAY_NOW -->
           
           <form  name="pay_now" action="{SITEURL}pay_now.php" method="post"  >
           <div class="form-control">
           <input type="hidden"  id="id" value="{offers.OFFER_ITEM_ID}" name="id">
           <input type="hidden"  id="offer_item_price" value="{offers.OFFER_PRICE}" name="offer_item_price">
           <input type="hidden"  id="pay_now" value="pay_now" name="pay_now">
           <input type="hidden"  id="offer_action" value="action" name="offer_action">
           <input type="hidden" name="csrftoken" value="{_CSRFTOKEN}">
           <button type="submit" class="btn btn-success form-control">{L_9811}</button>
           </div>
           </form>
        <!-- ELSE --> 
        <form name="counter_offer" action="{SITEURL}response_offer.php?goto={GOTO_PAGE}&oID={OFFER_ID}&zID=3" method="post">
       
        <!-- IF B_QTY -->
                  <label for="offer_quantity">{L_9038}:</label>
									<input type="number" name="qty" id="qty" value="1" min="1" max="{LEFT}" step="1" class="form-control">{LEFT} {L_5408}
	    <!-- ELSE -->
									<input type="hidden" name="qty" class="form-control" value="1">
	    <!-- ENDIF -->
          <label for="offer_price">{OFFER_MESSAGE}:</label>
           <input type="text"    id="offer_price" value="{B_OFFER_PRICE}" name="offer_price" class="form-control">
           <input type="hidden"  id="offer_id" value="{OFFER_ID}" name="offer_id">
           <input type="hidden"  id="offer_item_id" value="{OFFER_ITEM_ID}" name="offer_item_id">
           <input type="hidden"  id="offer_item_image" value="{OFFER_ITEM_IMAGE}" name="offer_item_image">
           <input type="hidden"  id="offer_item_owner" value="{OFFER_ITEM_OWNER}" name="offer_item_owner">
           <input type="hidden"  id="offer_sender" value="{OFFER_SENDER}" name="offer_sender">
           <input type="hidden"  id="offer_reciever" value="{OFFER_RECIVER}" name="offer_reciver">
           <input type="hidden"  id="viewing_bidder" value="{VIEWING_BIDDER}" name="viewing_bidder">
           <input type="hidden"  id="offer_date" value="{OFFER_DATE}" name="offer_date">
           <input type="hidden"  id="offer_status" value="pending" name="offer_status">
           <input type="hidden"  id="make_offer" value="counter_offer" name="make_offer">
           <input type="hidden"  id="offer_action" value="action5" name="offer_action">
           <input type="hidden" name="csrftoken" value="{_CSRFTOKEN}">
           <input type="hidden"  id="offer_counter_offer" value="{OFFER_COUNTER_OFFER}" name="offer_counter_offer">
           <input type="hidden"  id="offer_item_title" value="{TITLE}" name="offer_item_title">
		       <input type="hidden"  id="offer_item_seller_nick" value="{SELLER_NICK}" name="offer_item_seller_nick">
		       <input type="hidden"  id="offer_can_buy" value="{B_CAN_BUY}" name="offer_can_buy">
		       <input type="hidden"  id="offer_item_qty" value="{QTY}" name="offer_item_qty">
		       <input type="hidden"  id="offer_item_shipping" value="{SHIPPING_COST}" name="offer_item_shipping">
		       <input type="hidden"  id="offer_item_shipping_additional" value="{ADDITIONAL_SHIPPING_COST}" name="offer_item_shipping_additional">
		       <!-- IF B_SHOW_BUTTON -->
         <label for="offer_price">{L_9830}:</label>
         <textarea  id="offer_msg" name="offer_msg" class="form-control" rows="5">{offers.OFFER_MSG}</textarea>
         <br>
         <button type="submit" class="btn btn-info form-control">{l_9501}</button>
         <!-- ENDIF -->
         
         </form>
        
         <!-- ENDIF -->
   </div>   
  </div>
 <!-- ENDIF -->


 <!-- IF B_REJECT_OFFER -->
   <div>
	 <div class="alert alert-danger">
				{OFFER_MESSAGE}
	 </div>
      <div class="panel panel-default ">
						<table class="table table-striped">
							<tr>
								<td width="30%"><b>{L_017} :</b></td>
								<td width="70%">{TITLE}</td>
							</tr>
							<tr>
								<td width="30%"><b>{L_125} :</b></td>
								<td>{SELLER_NICK} {SELLERNUMFBS} <!-- IF FB_ICON ne '' --><img src="{SITEURL}images/icons/{FB_ICON}" alt="{FB_ICON}" class="fbstar"><!-- ENDIF --></td>
							</tr>
							<tr>
								<td width="30%"><b>{L_9810}:</b></td>
								<td>{B_OFFER_PRICE}<!-- IF B_QTY -->{L_868}<!-- ENDIF --></td>
							</tr>
							<tr>
								<td colspan=2 >&nbsp;</td>
							</tr>
              </table>
              </div>
     <div class="panel panel-default ">
        <form name="reject" action="{SITEURL}response_offer.php?goto={GOTO_PAGE}&oID={OFFER_ID}&zID=2" method="post">
        <div class="form-controls">
        <!-- IF B_QTY -->
                  <label for="offer_quantity">{L_9038}:</label>
									<input type="number" name="qty" id="qty" value="1" min="1" max="{LEFT}" step="1" class="form-control">{LEFT} {L_5408}
	<!-- ELSE -->
									<input type="hidden" name="qty" class="form-control" value="1">
	<!-- ENDIF -->
          <label for="offer_price">{OFFER_MESSAGE}:</label>
           <input type="hidden"  id="offer_id" value="{OFFER_ID}" name="offer_id">
           <input type="hidden"  id="offer_item_id" value="{OFFER_ITEM_ID}" name="offer_item_id">
           <input type="hidden"  id="offer_item_image" value="{OFFER_ITEM_IMAGE}" name="offer_item_image">
           <input type="hidden"  id="offer_item_owner" value="{OFFER_ITEM_OWNER}" name="offer_item_owner">
           <input type="hidden"  id="offer_sender" value="{OFFER_SENDER}" name="offer_sender">
           <input type="hidden"  id="offer_reciever" value="{OFFER_RECIVER}" name="offer_reciver">
           <input type="hidden"  id="viewing_bidder" value="{VIEWING_BIDDER}" name="viewing_bidder">
           <input type="hidden"  id="offer_date" value="{OFFER_DATE}" name="offer_date">
           <input type="hidden"  id="offer_status" value="rejected" name="offer_status">
           <input type="hidden"  id="offer_reject" value="{OFFER_REJECT}" name="offer_reject">
           <input type="hidden"  id="offer_accept" value="{OFFER_ACCEPT}" name="offer_accept">
           <input type="hidden"  id="make_offer" value="reject" name="make_offer">
           <input type="hidden"  id="offer_action" value="action5" name="offer_action">
           <input type="hidden" name="csrftoken" value="{_CSRFTOKEN}">
           <input type="hidden"  id="offer_counter_offer" value="{OFFER_COUNTER_OFFER}" name="offer_counter_offer">
           <input type="hidden"  id="offer_item_title" value="{TITLE}" name="offer_item_title">
		       <input type="hidden"  id="offer_item_seller_nick" value="{SELLER_NICK}" name="offer_item_seller_nick">
		       <input type="hidden"  id="offer_can_buy" value="{B_CAN_BUY}" name="offer_can_buy">
		       <input type="hidden"  id="offer_item_qty" value="{QTY}" name="offer_item_qty">
		       <input type="hidden"  id="offer_item_shipping" value="{SHIPPING_COST}" name="offer_item_shipping">
		       <input type="hidden"  id="offer_item_shipping_additional" value="{ADDITIONAL_SHIPPING_COST}" name="offer_item_shipping_additional">
          <!-- IF B_SHOW_BUTTON -->
          <label for="offer_price">{L_9830}:</label>
           <textarea  id="offer_msg" name="offer_msg" class="form-control" rows="5">{offers.OFFER_MSG}</textarea>
           <br>
           <button type="submit" class="btn btn-danger form-control">{L_9818}</button>
         <!-- ENDIF -->
         </div>
         </form>   
      </div>
      </div>
   <!-- ENDIF -->
   

   <!-- IF B_ACCEPT_OFFER -->
     <div >
         <div class="alert alert-danger">
				    {OFFER_MESSAGE}
		 </div>
         <div class="panel panel-default ">
     	       <table class="table table-striped">
						  	<tr>
								<td width="30%"><b>{L_017} :</b></td>
								<td width="70%">{TITLE}</td>
							  </tr>
							  <tr>
								<td width="30%"><b>{L_125} :</b></td>
								<td>{SELLER_NICK} {SELLERNUMFBS} <!-- IF FB_ICON ne '' --><img src="{SITEURL}images/icons/{FB_ICON}" alt="{FB_ICON}" class="fbstar"><!-- ENDIF --></td>
							  </tr>
							  <tr>
								<td width="30%"><b>{L_9817}:</b></td>
								<td>{B_OFFER_PRICE}<!-- IF B_QTY -->{L_868}<!-- ENDIF --></td>
							 </tr>
							 <tr>
							 <td colspan=2 >&nbsp;</td>
						 	 </tr>
              </table>
       </div>
        <div class="panel panel-default ">
         <!-- IF B_SHOW_PAY_NOW -->
           
           <form  name="pay_now" action="{SITEURL}pay_now.php" method="post"  >
           <div class="form-control">
           <input type="hidden"  id="id" value="{offers.OFFER_ITEM_ID}" name="id">
           <input type="hidden"  id="offer_item_price" value="{offers.OFFER_PRICE}" name="offer_item_price">
           <input type="hidden"  id="pay_now" value="pay_now" name="pay_now">
           <input type="hidden"  id="offer_action" value="action" name="offer_action">
           <input type="hidden" name="csrftoken" value="{_CSRFTOKEN}">
           <button type="submit" class="btn btn-success form-control">{L_9811}</button>
           </div>
           </form>
        <!-- ELSE --> 
             <form name="accept" action="{SITEURL}response_offer.php?goto={GOTO_PAGE}&oID={OFFER_ID}&zID=1" method="post">
        <div class="form-controls">
        <!-- IF B_QTY -->
                  <label for="offer_quantity">{L_9038}:</label>
									<input type="number" name="qty" id="qty" value="1" min="1" max="{LEFT}" step="1" class="form-control">{LEFT} {L_5408}
	<!-- ELSE -->
									<input type="hidden" name="qty" class="form-control" value="1">
	<!-- ENDIF -->
          <label for="offer_price">{OFFER_MESSAGE}:</label>
           <input type="hidden"  id="offer_id" value="{OFFER_ID}" name="offer_id">
           <input type="hidden"  id="offer_item_id" value="{OFFER_ITEM_ID}" name="offer_item_id">
           <input type="hidden"  id="offer_item_image" value="{OFFER_ITEM_IMAGE}" name="offer_item_image">
           <input type="hidden"  id="offer_item_owner" value="{OFFER_ITEM_OWNER}" name="offer_item_owner">
           <input type="hidden"  id="offer_sender" value="{OFFER_SENDER}" name="offer_sender">
           <input type="hidden"  id="offer_reciever" value="{OFFER_RECIVER}" name="offer_reciver">
           <input type="hidden"  id="viewing_bidder" value="{VIEWING_BIDDER}" name="viewing_bidder">
           <input type="hidden"  id="offer_date" value="{OFFER_DATE}" name="offer_date">
           <input type="hidden"  id="offer_status" value="accepted" name="offer_status">
           <input type="hidden"  id="offer_reject" value="{OFFER_REJECT}" name="offer_reject">
           <input type="hidden"  id="offer_accept" value="{OFFER_ACCEPT}" name="offer_accept">
           <input type="hidden"  id="make_offer" value="accept" name="make_offer">
           <input type="hidden"  id="offer_action" value="action5" name="offer_action">
           <input type="hidden" name="csrftoken" value="{_CSRFTOKEN}">
           <input type="hidden"  id="offer_counter_offer" value="{OFFER_COUNTER_OFFER}" name="offer_counter_offer">
           <input type="hidden"  id="offer_item_title" value="{TITLE}" name="offer_item_title">
		       <input type="hidden"  id="offer_item_seller_nick" value="{SELLER_NICK}" name="offer_item_seller_nick">
		       <input type="hidden"  id="offer_can_buy" value="{B_CAN_BUY}" name="offer_can_buy">
		       <input type="hidden"  id="offer_item_qty" value="{QTY}" name="offer_item_qty">
		       <input type="hidden"  id="offer_item_shipping" value="{SHIPPING_COST}" name="offer_item_shipping">
		       <input type="hidden"  id="offer_item_shipping_additional" value="{ADDITIONAL_SHIPPING_COST}" name="offer_item_shipping_additional">
          <!-- IF B_SHOW_BUTTON -->
          <label for="offer_price">{L_9830}:</label>
           <textarea  id="offer_msg" name="offer_msg" class="form-control" rows="5">{offers.OFFER_MSG}</textarea>
           <br>
           <button type="submit" class="btn btn-primary form-control">{L_9820}</button>
         <!-- ENDIF -->
         </div>
         </form>  
            <!-- ENDIF -->
   </div>
   </div>
   <!-- ENDIF -->
  
    </div></div> </div>
  
<!-- INCLUDE user_menu_footer.tpl -->