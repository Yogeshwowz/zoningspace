<style>
.selectSubscription {width:300px;}</style>
<section class="cart-table" id="cart-table">
     <div class="container">
	 
    <div class="row">
	<div class="block-heading">
              <h2>Cart</h2>
            </div>
        <div class="col-sm-12 col-md-12 col-md-offset-1">
		<form action="<?php echo base_url();?>payment-method" method="post">
            <table class="table table-hover" id="cartTable">
                <thead>
                    <tr class="text-center">
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Subscription</th>
                        <th class="text-center">Number Of Records</th>
						<th class="text-center">Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
				  $sum = 0;
				  if(count($cart) >0){
				  foreach($cart as $cart){
				  
				  ?>
                    <tr id="tr_<?php echo $cart['cartid'];?>" class="text-center">
                        <td class="col-md-6">
                        <div class="media">
                           <div class="media-body"><h4 class="media-heading"><?php echo $cart['searchName'];?></h4>
						   <input type="hidden" name="searchid[]" class="searchid"  value="<?php echo $cart['search_id'];?>">
						   </div>
                        </div></td>
                        <td class="col-md-1" style="text-align: center">1
                        <input  type="hidden" class="form-control" id="exampleInputEmail1" value="1">
                        </td>
                        <td class="col-md-1 text-center">
						View Data + Download + Contact Information (30 cent per records)
						<!--<select name="subscription[]" class="form-control selectSubscription"  rel="<?php echo $cart['cartid'];?>" rowcount="<?php echo $cart['rowcount'];?>" single-data-check="<?php echo $cart['single_record_id'];?>">
							<option value="1">View Data(5 cent per records)</option>
							<option value="2">View Data + Download (10 cent per records)</option>
							<option value="3">View Data + Download + Contact Information (15 cent per records)</option>
					
						</select>-->
						</td>
                        <td class="col-md-1 text-center"><strong><?php echo $cart['rowcount'];?></span></strong>&nbsp;&nbsp;(1 records = <span id="rc_<?php echo $cart['cartid'];?>">30</span>cents)</td>
						<?php if($cart['single_record_id']==0 || $cart['single_record_id']=1){?>
							<td class="col-md-1 text-center price" id="tdprice_<?php echo $cart['cartid'];?>"  data-price="<?php echo $cart['rowcount']*30/100;?>"><strong>$<?php echo $cart['rowcount']*30/100;?></strong>
							
							<input type="hidden" name="packageamount[]" id="packageamount_<?php echo $cart['cartid'];?>"  value="<?php echo $cart['rowcount']*30/100;?>">
							</td><?php } else {?>
							<td class="col-md-1 text-center price" id="tdprice_<?php echo $cart['cartid'];?>"  data-price="<?php echo "5.50";?>"><strong>$<?php echo "5.50";?></strong>
							<input type="hidden" name="packageamount[]" id="packageamount_<?php echo $cart['cartid'];?>"  value="<?php echo "5.50";?>">
							</td>
							
							<?php } ?>
						
                        <td class="col-md-1">
                        <button type="button" class="btn btn-danger removeitem"  rel="<?php echo $cart['cartid'];?>">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
						<?php if($cart['single_record_id']==0 || $cart['single_record_id']==1){ $sum = $sum + ($cart['rowcount']*30/100); } else { $sum = $sum + 5.50;} ?>
                    </tr><?php }
					}else{?>
					<tr class="text-center">
					<td colspan="6">No Search Found</td>
					</tr>
					<?php
					
					
					}
					?>
					<?php if(count($cart) >0){ ?>
					 <tr class="text-center">
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td id="total"><h3><strong>$<?php echo number_format($sum,2);?></strong></h3>
						</td>
						<td>  <input type="hidden" name="totalamount" id="totalamount"  value="<?php echo  number_format($sum,2);?>"> </td>
						
                    </tr>
					<?php } ?>
                    <tr class="text-center">
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
						<?php if(count($cart)==0){ ?>
                        <td>   </td>
						<?php } ?>
                        <td>   </td>
                        <td>
						<a href="<?php echo base_url();?>search-saved">
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Search
                        </button>
						</a>
						</td>
						<?php if(count($cart) >0){ ?>
                        <td>
                        <input  type="submit" class="btn btn-success" name="Checkout" value="Proceed For Payment"> 
                             <!--<span class="glyphicon glyphicon-play"></span>-->
                        </td>
						<?php } ?>
                    </tr>
                </tbody>
            </table>
		</form>
	  </div>
    </div>
</div>
    </section>