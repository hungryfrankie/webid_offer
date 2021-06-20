<!-- INCLUDE user_menu_header.tpl -->
<div class="row">
	<div class="col-md-12">
	</div>
</div>
<div class="panel panel-default ">
	
	<table class="table table-bordered table-condensed table-striped">
    <thead>
      	<tr {offers.BGCOLOUR}>
        <th>{L_9001}</th>
        <th>{L_9002}</th>
        <th>{L_9003}</th>
        
        <th>{L_9005}</th>
        <th>{L_9006}</th>
        <th>{L_9007}</th>
       

     </tr>
    </thead>
    <tbody>
      


<!-- BEGIN offers-->
<tr>
<td>
<a href="{SITEURL}item.php?id={offers.OFFER_ITEM_ID}"> <img class="img-rounded img-responsive center-block" src="{SITEURL}getthumb.php?w=110&fromfile={offers.OFFER_ITEM_IMAGE}&auction_id={offers.OFFER_ITEM_ID}"  width="50px"></a>
					</TD>
<td><a href="{SITEURL}item.php?id={offers.OFFER_ITEM_ID}">{offers.OFFER_ITEM_TITLE}</a></TD>
<td>{offers.OFFER_PRICE}</TD>

<td>
<div class="row" style="padding:5px; margin:5px;">

            <form name="accept" action="{SITEURL}response_offer.php?goto={GOTO_PAGE}&oID={offers.OFFER_ID}&zID=1" method="post" class="pull-left" style="padding-right:5px;">
           <div class="form-group">
           <input type="hidden"  id="offer_id" value="{offers.OFFER_ID}" name="offer_id">
           <input type="hidden"  id="offer_price" value="{offers.OFFER_PRICE}" name="offer_price" >
           <input type="hidden"  id="offer_id" value="{offers.OFFER_ID}" name="offer_id">
           <input type="hidden"  id="offer_item_id" value="{offers.OFFER_ITEM_ID}" name="offer_item_id">
           <input type="hidden"  id="offer_item_image" value="{offers.OFFER_ITEM_IMAGE}" name="offer_item_image">
           <input type="hidden"  id="offer_sender" value="{offers.OFFER_SENDER}" name="offer_sender">
           <input type="hidden"  id="offer_reciver" value="{offers.OFFER_RECIVER}" name="offer_reciver">
           <input type="hidden"  id="offer_status" value="pending" name="offer_status"> 
           <input type="hidden"  id="offer_counter_offer" value="{offers.OFFER_COUNTER_OFFER}" name="offer_counter_offer">
           <input type="hidden"  id="offer_date" value="{offers.OFFER_DATE}" name="offer_date">
           <input type="hidden"  id="offer_sender_role" value="{offers.OFFER_SENDER_ROLE}" name="offer_sendre_role">
           <input type="hidden"  id="offer_item_owner" value="{offers.OFFER_ITEM_OWNER}" name="offer_item_owner">
           <input type="hidden"  id="offer_item_title" value="{offers.OFFER_ITEM_TITLE}" name="offer_item_title">         
           <input type="hidden"  id="offer_item_seller_nick" value="{offers.SELLER_NICK}" name="offer_item_seller_nick">
		       <input type="hidden"  id="offer_item_qty" value="{offers.QTY}" name="offer_item_qty">
		       <input type="hidden"  id="offer_item_shipping" value="{offers.SHIPPING_COST}" name="offer_item_shipping">
		       <input type="hidden"  id="offer_item_shipping_additional" value="{offers.ADDITIONAL_SHIPPING_COST}" name="offer_item_shipping_additional">
           <input type="hidden"  id="viewing_bidder" value="{offers.USER_ID}" name="viewing_bidder">
           <input type="hidden"  id="offer_can_buy" value="{B_CAN_BUY}" name="offer_can_buy">
           <input type="hidden"  id="make_offer" value="accept" name="make_offer">
           <input type="hidden"  id="offer_action" value="action" name="offer_action">
           <input type="hidden" name="csrftoken" value="{_CSRFTOKEN}">
          
           <input type="hidden"  id="offer_msg" value="{offers.OFFER_MSG}" name="offer_msg">
           <button type="submit" class="{offers.B_ACCEPT_CLASS}">{L_9820}</button>
            </div>
            </form>

            <form name="reject" action="{SITEURL}response_offer.php?goto={GOTO_PAGE}&oID={offers.OFFER_ID}&zID=2" method="post" class="pull-left" style="padding-right:5px;">
            <div class="form-group">
            <input type="hidden"  id="offer_id" value="{offers.OFFER_ID}" name="offer_id">
            <input type="hidden"  id="offer_price" value="{offers.OFFER_PRICE}" name="offer_price" >
            <input type="hidden"  id="offer_id" value="{offers.OFFER_ID}" name="offer_id">
            <input type="hidden"  id="offer_item_id" value="{offers.OFFER_ITEM_ID}" name="offer_item_id">
            <input type="hidden"  id="offer_item_image" value="{offers.OFFER_ITEM_IMAGE}" name="offer_item_image">
            <input type="hidden"  id="offer_sender" value="{offers.OFFER_SENDER}" name="offer_sender">
            <input type="hidden"  id="offer_reciver" value="{offers.OFFER_RECIVER}" name="offer_reciver">
            <input type="hidden"  id="offer_status" value="pending" name="offer_status"> 
           <input type="hidden"  id="offer_counter_offer" value="{offers.OFFER_COUNTER_OFFER}" name="offer_counter_offer">
           <input type="hidden"  id="offer_date" value="{offers.OFFER_DATE}" name="offer_date">
           <input type="hidden"  id="offer_sender_role" value="{offers.OFFER_SENDER_ROLE}" name="offer_sendre_role">
           <input type="hidden"  id="offer_item_owner" value="{offers.OFFER_ITEM_OWNER}" name="offer_item_owner">
           <input type="hidden"  id="offer_item_title" value="{offers.OFFER_ITEM_TITLE}" name="offer_item_title">         
           <input type="hidden"  id="offer_item_seller_nick" value="{offers.SELLER_NICK}" name="offer_item_seller_nick">
		       <input type="hidden"  id="offer_item_qty" value="{offers.QTY}" name="offer_item_qty">
		       <input type="hidden"  id="offer_item_shipping" value="{offers.SHIPPING_COST}" name="offer_item_shipping">
		       <input type="hidden"  id="offer_item_shipping_additional" value="{offers.ADDITIONAL_SHIPPING_COST}" name="offer_item_shipping_additional">
           <input type="hidden"  id="viewing_bidder" value="{offers.USER_ID}" name="viewing_bidder">
           <input type="hidden"  id="offer_can_buy" value="{B_CAN_BUY}" name="offer_can_buy">
            <input type="hidden"  id="make_offer" value="reject" name="make_offer">
            <input type="hidden"  id="offer_action" value="action" name="offer_action">
            <input type="hidden" name="csrftoken" value="{_CSRFTOKEN}">
              <input type="hidden"  id="offer_msg" value="{offers.OFFER_MSG}" name="offer_msg">
            <button type="submit" class="{offers.B_REJECT_CLASS}">{L_9818}</button>
            </div>
            </form>

            <form name="counter_offer" action="{SITEURL}response_offer.php?goto={GOTO_PAGE}&oID={offers.OFFER_ID}&zID=3" method="post" class="pull-left " style="padding-right:5px;">
           <div class="form-group">
            <input type="hidden"  id="b_first_offer" name="b_first_offer" value=1>
        <!-- IF B_QTY -->
                  <label for="offer_quantity">{L_9038}:</label>
									<input type="number" name="qty" id="qty" value="1" min="1" max="{LEFT}" step="1" class="form-control">{LEFT} {L_5408}
	<!-- ELSE -->
									<input type="hidden" name="qty" class="form-control" value="1">
	<!-- ENDIF -->
           <!--<label for="offer_price">{L_9032}:</label> -->
           <input type="hidden"  id="offer_price" value="{offers.OFFER_PRICE}" name="offer_price" >
           <input type="hidden"  id="offer_id" value="{offers.OFFER_ID}" name="offer_id">
           <input type="hidden"  id="offer_item_id" value="{offers.OFFER_ITEM_ID}" name="offer_item_id">
           <input type="hidden"  id="offer_item_image" value="{offers.OFFER_ITEM_IMAGE}" name="offer_item_image">
           <input type="hidden"  id="offer_sender" value="{offers.OFFER_SENDER}" name="offer_sender">
           <input type="hidden"  id="offer_reciver" value="{offers.OFFER_RECIVER}" name="offer_reciver">
           <input type="hidden"  id="offer_status" value="pending" name="offer_status"> 
           <input type="hidden"  id="offer_counter_offer" value="{offers.OFFER_COUNTER_OFFER}" name="offer_counter_offer">
           <input type="hidden"  id="offer_date" value="{offers.OFFER_DATE}" name="offer_date">
           <input type="hidden"  id="offer_sender_role" value="{offers.OFFER_SENDER_ROLE}" name="offer_sendre_role">
           <input type="hidden"  id="offer_item_owner" value="{offers.OFFER_ITEM_OWNER}" name="offer_item_owner">
           <input type="hidden"  id="offer_item_title" value="{offers.OFFER_ITEM_TITLE}" name="offer_item_title">         
           <input type="hidden"  id="offer_item_seller_nick" value="{offers.SELLER_NICK}" name="offer_item_seller_nick">
		       <input type="hidden"  id="offer_item_qty" value="{offers.QTY}" name="offer_item_qty">
		       <input type="hidden"  id="offer_item_shipping" value="{offers.SHIPPING_COST}" name="offer_item_shipping">
		       <input type="hidden"  id="offer_item_shipping_additional" value="{offers.ADDITIONAL_SHIPPING_COST}" name="offer_item_shipping_additional">
           <input type="hidden"  id="viewing_bidder" value="{offers.USER_ID}" name="viewing_bidder">
           <input type="hidden"  id="offer_can_buy" value="{B_CAN_BUY}" name="offer_can_buy">
           <input type="hidden"  id="make_offer" value="counter_offer" name="make_offer">
           <input type="hidden"  id="offer_action" value="action" name="offer_action">
           <input type="hidden" name="csrftoken" value="{_CSRFTOKEN}">
             <input type="hidden"  id="offer_msg" value="{offers.OFFER_MSG}" name="offer_msg">
           <button type="submit" class="{offers.B_COUNTER_OFFER_CLASS}">{L_9819}</button>
           </div>
           </form>

			     <form  name="pay_now" action="{SITEURL}pay_now.php" method="post" class="pull-left " >
           <div class="form-group">
           <input type="hidden"  id="id" value="{offers.OFFER_ITEM_ID}" name="id">
           <input type="hidden"  id="offer_item_price" value="{offers.OFFER_PRICE}" name="offer_item_price">
             <input type="hidden"  id="offer_id" value="{offers.OFFER_ID}" name="offer_id">
           <input type="hidden"  id="pay_now" value="pay_now" name="pay_now">
           <input type="hidden"  id="offer_action" value="action" name="offer_action">
           <input type="hidden" name="csrftoken" value="{_CSRFTOKEN}">
           <button type="submit" class="{offers.B_BUY_NOW_CLASS}">{L_9811}</button>
           </div>
           </form>


          <button type="submit" class="{offers.B_COUNTER_CLASS}">{L_9831}
          <button type="submit" class="{offers.B_REJECTED_CLASS}">{L_9821}</button>
          <button type="submit" class="{offers.B_EXPIRED_CLASS}">{L_9822}</button>
          
          
</div>

           
</TD>
<td>{offers.OFFER_DATE}</TD>
<td>{offers.OFFER_MSG}</TD>

<tr>
<!-- END offers -->
	
	
      
</tbody>
</table>


</div>


<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td align="center">
			<small><span class="pagination">{L_5117}&nbsp;{PAGE}&nbsp;{L_5118}&nbsp;{PAGES}</span></small>
			<nav>
				<ul class="pagination">
					<br>
					<li>{PREV}</li>
<!-- BEGIN pages -->
					<li>{pages.PAGE}</li>
<!-- END pages -->
					<li>{NEXT}</li>
				</ul>
			</nav>
		</td>
	</tr>
</table>

<!-- INCLUDE user_menu_footer.tpl -->
