<section class="View-listing">
         <div class="container">
            <button class="open_filter">Filters <i class="fa fa-sliders pl-1" aria-hidden="true"></i></button>
            <button class="add_to_cart">Add To Cart</button>
            <div class="filter_sidebar" style="display: none;">
                <div class="filter_sidebar_body" style="transform: translateX(-100%);">
                    <button class="close_filter"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <h4>Search Filters</h4>
                    <div class="row">
                         <div class="col-md-12">
                            <button type="button" id="zoningId" rel="zoning" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalZoning">Zoning</button>
                         </div>
                         <div class="col-md-12">
                            <button type="button" id="selectUseId" rel="selectUse" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalUse">Land Use</button>
                         </div>
                         <div class="col-md-12">
                            <button id="zipcodeId" rel="zip" type="button" class="btn form-btn zipcodeCls common-select-cls" data-toggle="modal" data-target="#myModalZipCode">Zip Code</button>
                         </div>
                         <div class="col-md-12">
                            <button type="button" id="divlandRange" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#land_area">Land Area</button>
                         </div>
                         <div class="col-md-12">
                            <button type="button" id="selectNeighbourhoodId" rel="selectNeighbourhood" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalNeighborhood">Neighborhood(s)</button>
                         </div>
                         <div class="col-md-12">
                            <button type="button" id="selectWardId" rel="selectWard" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalWard">Ward(s)</button>
                         </div>
                         <div class="col-md-12">
                            <button type="button" id="selectTaxDeductionId" rel="selectTaxDeduction" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalTaxDeduction">Homestead Tax Deduction(s)</button>
                         </div>
                         <div class="col-md-12">
                            <button type="button" id="divsaleDate" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#last_sale_date">Last Sale Date</button>
                         </div>
                          <div class="col-md-3">
                             <span>Within</span>
                          </div>
                          <div class="col-md-6 col-6 px-md-0">
                             <input type="text" name="miles" class="search-mile form-control numberdecimalcls" placeholder="Enter miles">
                          </div>
                          <div class="col-md-3">
                             <span>From</span>
                          </div>
                          <div class="col-md-12 location-search">
                             <input class="form-control input-lg autocompletegoogleaddress" id="autocomplete" name="searchboxForAddress" placeholder="Enter your address" onfocus="geolocate()" value="" type="text">
                          </div>
                        <div class="col-md-12">
                            <div class="box2 filterbtn m-0" id="view_add_filter">
                               <input type="radio" name="selectRange" autocomplete="off" class="radio-disable selectRadioBtn radio-active text-white" value="squareRange"> View Additionals Filters
                               <span class="pl-2"><i class="fa fa-sort-desc filter-icon" aria-hidden="true"></i></span>
                            </div>
                        </div>                        
                    </div>
                    <div class="hide" id="additionals_filters">
                     <div class="row animated slideInDown a4 ease-out-quart">
                        <!---------------------------------- Start View Additional Filters Buttons-------------------->
                        <div class="col-md-12">
                           <button type="button" id="saleprice" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#sale_price">Sale Price</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="taxablevalue" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#taxable_value">Taxable Value</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="entercount" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#count">Count</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="squarefeet" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#square_feet">Square Feet</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="pricepersquarefeet" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#price_per_square_feet">Price Per Square Feet</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="yearrenovated" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#year_renovated">Year Renovated</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="yearbuilt" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#year_built">Year Built</button>
                        </div>
                        <!---------------------------------- Add Drop Down Box-------------------->
                        <div class="col-md-12">
                           <select class="form-control select2-show-search" data-placeholder="Select Beds" name="beds">
                              <option value="0" selected="">Beds</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                           </select>
                        </div>
                        <div class="col-md-12">
                           <select class="form-control select2-show-search" data-placeholder="Select Bath" name="bath">
                              <option value="0" selected="">Baths</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                           </select>
                        </div>
                        <!--------------------- End Here------------------------------------>
                     </div>
                  </div>
                     <div class="row pt-2 justify-content-center">
                         <div class="col-md-12">
                            <a href="#"><button type="button" class="btn form-btn">View Data</button></a>
                         </div>
                         <div class="col-md-12">
                            <a href="#"><button type="button" class="btn form-btn clear_all">Clear All</button></a>
                         </div>
                     </div>
                </div>
            </div>
            <table class="table table-hover search-listing">
              <thead>
                <tr>
                  <th scope="col"><input type="checkbox" name="check" value=""></th>
                  <th scope="col">Address</th>
                  <th scope="col">Zoning</th>
                  <th scope="col">Land Use</th>
                  <th scope="col">Zip Code</th>
                  <th scope="col">Land Area</th>
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th><input type="checkbox" name="check" value=""></th>
                  <td>Mark</td>
                  <td>ARTS-2</td>
                  <td>192</td>
                  <td>20001</td>
                  <td>500 - 1000</td>
                  <td><i class="fa fa-eye" aria-hidden="true"></i> | <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <th><input type="checkbox" name="check" value=""></th>
                  <td>Mark</td>
                  <td>ARTS-2</td>
                  <td>192</td>
                  <td>20001</td>
                  <td>500 - 1000</td>
                  <td><i class="fa fa-eye" aria-hidden="true"></i> | <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <th><input type="checkbox" name="check" value=""></th>
                  <td>Mark</td>
                  <td>ARTS-2</td>
                  <td>192</td>
                  <td>20001</td>
                  <td>500 - 1000</td>
                  <td><i class="fa fa-eye" aria-hidden="true"></i> | <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <th><input type="checkbox" name="check" value=""></th>
                  <td>Mark</td>
                  <td>ARTS-2</td>
                  <td>192</td>
                  <td>20001</td>
                  <td>500 - 1000</td>
                  <td><i class="fa fa-eye" aria-hidden="true"></i> | <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <th><input type="checkbox" name="check" value=""></th>
                  <td>Mark</td>
                  <td>ARTS-2</td>
                  <td>192</td>
                  <td>20001</td>
                  <td>500 - 1000</td>
                  <td><i class="fa fa-eye" aria-hidden="true"></i> | <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <th><input type="checkbox" name="check" value=""></th>
                  <td>Mark</td>
                  <td>ARTS-2</td>
                  <td>192</td>
                  <td>20001</td>
                  <td>500 - 1000</td>
                  <td><i class="fa fa-eye" aria-hidden="true"></i> | <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <th><input type="checkbox" name="check" value=""></th>
                  <td>Mark</td>
                  <td>ARTS-2</td>
                  <td>192</td>
                  <td>20001</td>
                  <td>500 - 1000</td>
                  <td><i class="fa fa-eye" aria-hidden="true"></i> | <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <th><input type="checkbox" name="check" value=""></th>
                  <td>Mark</td>
                  <td>ARTS-2</td>
                  <td>192</td>
                  <td>20001</td>
                  <td>500 - 1000</td>
                  <td><i class="fa fa-eye" aria-hidden="true"></i> | <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <th><input type="checkbox" name="check" value=""></th>
                  <td>Mark</td>
                  <td>ARTS-2</td>
                  <td>192</td>
                  <td>20001</td>
                  <td>500 - 1000</td>
                  <td><i class="fa fa-eye" aria-hidden="true"></i> | <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <th><input type="checkbox" name="check" value=""></th>
                  <td>Mark</td>
                  <td>ARTS-2</td>
                  <td>192</td>
                  <td>20001</td>
                  <td>500 - 1000</td>
                  <td><i class="fa fa-eye" aria-hidden="true"></i> | <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                </tr>
              </tbody>
            </table>
              <ul class="pagination">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
         </div>
      </section>