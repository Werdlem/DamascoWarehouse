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

<form action="?action=_stock_order_search_results" method="post">
  <input type="text" placeholder="Search Customer" id="sku" name="search_customer" width="200px" autocomplete="off"/>
    <button type="submit" value="Search" id='search_cus'>Search</button>
  <input type="hidden" name="doSearch" value="1">
</form>
<br/>
<form action="?action=_stock_order_search_results" method="post">
  <input type="text" placeholder="Search Order" id="sku" name="search_order" width="200px" autocomplete="off"/>
    <button type="submit" value="Search" id='search_ord'>Search</button>
  <input type="hidden" name="doSearch" value="2">
</form>
<br/>

<p>Search Date Range</p>
<form action="?action=_stock_order_search_results" method="post">
<input class="suppliers" name="date-from" value="<?php echo $dateFrom ?>" type="text" onfocus="(this.type='date')" />
      <input class="suppliers" name="date-to" value="<?php echo $dateTo ?>" type="text" onfocus="(this.type='date')" />
     <button type="submit" value="Search" id='search_date'>Search</button>
      <input type="hidden" name="doSearch" value="3">
    </form>
    <br/>
    <div id='page_break' style="border-bottom: solid 2px black "></div>


