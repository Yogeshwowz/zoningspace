<div class="page-wrapper chiller-theme toggled">
<div class="down_loader" id="loading" style="display:none;">
                <div class="loader_icon">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="loader_text">Please Wait Start Downloading</div>
            </div>
<?php $this->view('user-dashboard/side-bar'); ?>

  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container">
      <h2 class="text-center">Purchased Data</h2>
      <table class="table table-hover single-search-listing">
              <tbody>
                <tr>
                  <th>Primary Name</th>
                  <td><?php if(!empty($records['owner_names'])){
							echo $records['owner_names']; 
					  }?></td>
                  <th>Secondary Name</th>
                  <td><?php if(!empty($records['owner2_name'])){
							echo $records['owner2_name']; 
					  }?></td>
                </tr> 
                <tr>
                  <th>Phone No.</th>
                  <td><?php if(!empty($records['contactPhone'])){
							echo $records['contactPhone']; 
					  }?></td>
                  <th>Email</th>
                  <td><?php if(!empty($records['contactEmail'])){
							echo $records['contactEmail']; 
					  }?></td>
                </tr> 
                <tr>
                  <th>Address</th>
                  <td><?php if(!empty($records['correct_address'])){
							echo $records['correct_address']; 
					  }?></td>
                  <th>Zoning</th>
                  <td><?php if(!empty($records['zoning'])){
							echo $records['zoning']; 
					  }?></td>
                </tr> 
                <tr>
                  <th>Land Use</th>
                  <td><?php if(!empty($records['pro_use'])){
							echo $records['pro_use']; 
					  }?></td>
                  <th>zip Code</th>
                  <td><?php if(!empty($records['20017'])){
							echo $records['20017']; 
					  }?></td>
                </tr> 
                <tr>
                  <th>Land Area</th>
                  <td><?php if(!empty($records['land_area'])){
							echo $records['land_area']; 
					  }?></td>
                  <th>Neighborhood(s)</th>
                  <td><?php if(!empty($records['neighborhood'])){
							echo $records['neighborhood']; 
					  }?></td>
                </tr> 
                <tr>
                  <th>Ward(s)</th>
                  <td><?php if(!empty($records['ward'])){
							echo $records['ward']; 
					  }?></td>
                  <th>Homestead Tax Deduction(s)</th>
                  <td><?php if(!empty($records['homestead_tax_deduction'])){
							echo $records['homestead_tax_deduction']; 
					  }?></td>
                </tr> 
                <tr>
                  <th>Last Sale Date</th>
                  <td><?php if(!empty($records['sale_date'])){
							echo $records['sale_date']; 
					  }?></td>
                  <th>Sale Price</th>
                  <td><?php if(!empty($records['sale_price'])){
							echo $records['sale_price']; 
					  }?></td>
                </tr> 
                <tr>
                  <th>Taxable Value</th>
                  <td><?php if(!empty($records['taxable_value_total'])){
							echo $records['taxable_value_total']; 
					  }?></td>
                  <th>Count</th>
                  <td><?php if(!empty($records['count'])){
							echo $records['count']; 
					  }?></td>
                </tr> 
                <tr>
                  <th>Square Feet</th>
                  <td><?php if(!empty($records['square_feet'])){
							echo $records['square_feet']; 
					  }?></td>
                  <th>Price Per Square Feet</th>
                  <td><?php if(!empty($records['price_per_square_feet'])){
							echo $records['price_per_square_feet']; 
					  }?></td>
                </tr> 
                <tr>
                  <th>Year Renovated</th>
                  <td><?php if(!empty($records['year_renovated'])){
							echo $records['year_renovated']; 
					  }?></td>
                  <th>Year Built</th>
                  <td><?php if(!empty($records['year_built'])){
							echo $records['year_built']; 
					  }?></td>
                </tr> 
                <tr>
                  <th>Beds</th>
                  <td><?php if(!empty($records['beds'])){
							echo $records['beds']; 
					  }?></td>
                  <th>Baths</th>
                  <td><?php if(!empty($records['baths'])){
							echo $records['baths']; 
					  }?></td>
                </tr> 
				<?php if(!empty($records['atye']) && $records['atye']=='person'){?>
                <tr>
                  <th>Property Owned By Person</th>
                  <td></td>
                 </tr>
				<?php }?>
				<?php if(!empty($records['atye']) && $records['atye']=='business'){?>
                <tr>
                  <th>Property Owned By Business</th>
                  <td></td>
                 </tr>
				<?php }?>
               	<?php if(!empty($records['atye']) && $records['atye']=='govt'){?>
                <tr>
                  <th>Property Owned By Government</th>
                  <td></td>
                 </tr>
				<?php }?>			
                
                
              </tbody>
            </table>
               
    </div>
  </main>
  <!-- page-content" -->
</div>
