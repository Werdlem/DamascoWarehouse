<?php 
if(isset($_POST['search_date'])){ 
 
 $dateFrom = $_POST['date-from'];
 $dateTo = $_POST['date-to'];
 $supplier_name = $_POST['taskOption'];
}
//declare variables 
 else
  { 
    $dateFrom = 'Date From';
    $dateTo = 'Date To';
    $supplier_name = 'Select Supplier';
  }
  ?>

<style>
.vertical-text{	
	 writing-mode: vertical-lr; 

   }
.check-box{
	text-align: center;
	vertical-align: middle;
}
</style>
<h1>Outstanding Sales Order Report</h1>
<!--CUSTOMER ORDERS SEARCH SEARCH-->
<form action="?action=_stock_order_search_results" method="post">
<div class="col-lg-4">
    <div class="input-group">
     <input type="text" class="form-control" placeholder="Search Customer" id="sku" name="search_customer" width="200px" autocomplete="off" data-toggle="tooltip" data-placement="right" title="Search a particular Customer"/>
      <span class="input-group-btn">
     <button type="submit" class="btn btn-default" value="Search"  id='search_cus' data-toggle="tooltip" data-placement="right" title="Search a particular Customer">Search</button>
     <input type="hidden" name="doSearch" value="1">
     <span>
  </div>
  </div>
</form>
<br/><br/>
<!--ORDER SEARCH-->
<form action="?action=_stock_order_search_results" method="post">
 <div class="col-lg-4">
    <div class="input-group">
     <input type="text" class="form-control" placeholder="Search Order" id="sku" name="search_order" width="200px" autocomplete="off" data-toggle="tooltip" data-placement="right" title="Search a particular Order"/>
     <span class="input-group-btn">
    <button type="submit" class="btn btn-default" value="Search" id='search_ord' data-toggle="tooltip" data-placement="right" title="Search a particular Order">Search</button>
  <input type="hidden" name="doSearch" value="2">
  </span>
  </div>
  </div>
</form>
<br/><br />
<!--SEARCH NEW ORDERS BY DATE RECEIVED-->
<form action="?action=_stock_order_search_results" method="post">
<div class="col-lg-4">
<div class="input-group">
 <input class="form-control" name="date" placeholder="Search Day" type="text" onfocus="(this.type='date')" data-toggle="tooltip" data-placement="right" title="Search Orders Placed on a Particular Day"/>
 <span class="input-group-btn">
    <button class="btn btn-default" type="submit" value="Search" id='search_day' data-toggle="tooltip" data-placement="right" title="Search Orders Placed on a Particular Day">Search</button>
  <input type="hidden" name="doSearch" value="4">
  </span>
  </div>
  </div>
</form>
<br/><br/>


<form action="?action=_stock_order_search_results" method="post">
<div class="col-lg-4">
<div class="input-group">
<input class="form-control" style="width: 40%" name="date-from" placeholder="Search date from" type="text" onfocus="(this.type='date')" data-toggle="tooltip" data-placement="right" title="Search Orders Placed between a Specific Date Range"/>
      <input class="form-control" style="width: 40%; " name="date-to" placeholder="Search date to" type="text" onfocus="(this.type='date')" data-toggle="tooltip" data-placement="right" title="Search Orders Placed between a Specific Date Range"/>
     <span class="input-group-btn" style="float: left;">
     <button class="btn btn-default" type="submit" value="Search" id='search_date' data-toggle="tooltip" data-placement="right" title="Search Orders Placed between a Specific Date Range">Search</button>
      <input type="hidden" name="doSearch" value="3">
      </span>
      </div>
      </div>
    </form>
    <br/><br/><br/>
   <div id='page_break' style="border-bottom: solid 2px black "></div>
   <script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>


