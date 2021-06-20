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
            
          <button type="submit" class="{offers.B_COUNTER_OFFER_CLASS}">{L_9831}</button>
          <button type="submit" class="{offers.B_ACCEPT_CLASS}">{L_9832}</button>
          <button type="submit" class="{offers.B_REJECTED_CLASS}">{L_9821}</button>
          <button type="submit" class="{offers.B_EXPIRED_CLASS}">{L_9822}</button>
          <button type="submit" class="{offers.B_PENDING_CLASS}">{L_9833}</button>
          
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
