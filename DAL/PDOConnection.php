<?php
require_once('settings.php');
class Database
{  

    private static $conn  = null;
     
    public static function DB()
    {       
		if (!isset(self::$conn)) {
			
          self::$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		  self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
           return self::$conn;
    }
}

class products{	
	//SHREDMASTER BOARD ENTRY

	public function addShred($palletNo, $width, $length, $grade, $flute, $qty){
		$pdo = Database::DB();
		try {
			$stmt = $pdo->prepare('insert into
			shredmaster
			(palletNo, width, length, grade, flute, qty)
			values (?,?,?,?,?,?)');
		$stmt->bindValue(1, $palletNo);
		$stmt->bindValue(2, $width);
		$stmt->bindValue(3, $length);
		$stmt->bindValue(4, $grade);
		$stmt->bindValue(5, $flute);
		$stmt->bindValue(6, $qty);
		$stmt->execute();
			}	
			
			catch (PDOException $e){

				echo '<div class="alert alert-danger" role="alert">'. $e .'</div>';
			
				}			
		}

	public function getShred(){
			$pdo = Database::DB();
			$stmt = $pdo->prepare('select * 
				from 
				shredmaster
				order by palletNo desc');
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

	public function deleteShred($id){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('delete 
			from shredmaster
			where id like :stmt
			');
		$stmt->bindValue(':stmt', $id);
		$stmt->execute();
	}	

	public function getProductionList(){
			$pdo = Database::DB();
			$stmt = $pdo->prepare('select
			p.*,
			gi.delivery_date
			from products p
				join goods_in gi on gi.sku=p.sku
				join(select n.sku,
			max(n.delivery_date) as max_delivery_date 
			from goods_in n
			group by n.sku) y on y.sku=gi.sku
			and
			y.max_delivery_date=gi.delivery_date
			where
			p.stock_qty <= p.buffer_qty
			and allocation_id = 27
			');
			$stmt->execute();			
		if($stmt->rowCount()>0){				
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			die('No Results to show');
			}
		}

	//search the goods out table for products not saved on the products table
	public function get_goods_out_products($sku, $days){
	$pdo = Database::DB();
	$stmt = $pdo->prepare('select *,
		(SELECT  sum((qty_delivered) / (:days/ 30)) 
				FROM    goods_out
					WHERE   due_date BETWEEN CURDATE() - INTERVAL :days DAY AND CURDATE() and (sku = :sku 
							or desc1sku = :sku))					
							as ave
		from goods_out
		where 
		sku = :sku
		or desc1sku = :sku
		having qty_delivered <> 0.00
		order by due_date desc
		limit 20
		');
	$stmt->bindValue(':sku', $sku);
	$stmt->bindValue(':days', $days);
	$stmt->execute();
	if($stmt->rowCount()>0){
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	else{

		die ('That SKU cannot be found');
	}
}
	// Search for orders received on a particular day
	public function get_Order_By_Order_Date($date){
	$pdo = Database::DB();
	$stmt = $pdo->prepare('
	select *
	from goods_out
	where order_date = (?)
	');
	$stmt->bindValue(1, $date);
	$stmt->execute();
	if($stmt->rowCount()> 'null')
	{
			while($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
		}
			}
		else{
			die ("No Results");
			}		
		}

	// CUSTOMER SEARCH

	public function get_Customer($search){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('
			select * from goods_out go 				
				where CUSTOMER like :stmt
				and despatch_status <= 0.00
				and qty_delivered >= 0.00
				and due_date > "2017-01-01"
				order by due_date asc
				
		');
		$stmt->bindValue(':stmt', "%".$search."%");
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			die("<br/><div class='alert alert-danger' role='alert'>The order '".$search."' Could not be found. Please try again!</div></div></ br></br>");
			}
	}

	// Customer Order Search

	public function get_Order($search){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('
			select * from goods_out go 				
				where order_id like :stmt
				and despatch_status <= 0.00
				and qty_delivered >= 0.00
				and due_date > "2017-01-01"
				order by due_date asc
				
		');
		$stmt->bindValue(':stmt', "%".$search."%");
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			die("<br/><div class='alert alert-danger' role='alert'>The order '".$search."' Could not be found. Please try again!</div></div></ br></br>");
			}
	}

	// Search Order Date Range

	public function get_Date_Range($dateFrom, $dateTo){
	$pdo = Database::DB();
	$stmt = $pdo->prepare('
	select *
	from goods_out
	where (order_date between (?)
	and (?)
	and despatch_status <= 0.00
	and qty > 0)
	order by due_date asc
	');
	$stmt->bindValue(1 ,$dateFrom);
	$stmt->bindValue(2 ,$dateTo);
	$stmt->execute();
	if($stmt->rowCount()> 'null')
	{
			while($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
		}
			}
		else{
			die ("No Results");
			}		
		}
		

	public function _get_products($sku1, $sku2){
	$pdo = Database::DB();
	$stmt = $pdo->prepare('select * 
		from products
		where
		(sku = :sku1
		or sku = :sku2
		
		or concat(nullif(alias_1,"")) = concat(nullif(:sku1, ""))
		or concat(nullif(alias_1,"")) =  concat(nullif(:sku2, ""))
		
		or concat(nullif(alias_2,"")) =  concat(nullif(:sku1, ""))
		or concat(nullif(alias_2,"")) =  concat(nullif(:sku2, ""))
		)
		
		');
	$stmt->bindValue(':sku1' , $sku1);
	$stmt->bindValue(':sku2', $sku2);
	$stmt->execute();
	if($stmt->rowCount()<0) {
		echo '0';
		}
		else{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

}

	// PRODUCT SEARCH 
	
	public function Search($fetch){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('
			Select *
			from products
			left join location 
			on location.sku_id=products.sku_id
			where (sku like :stmt) or (alias_1 like :stmt) or (alias_2 like :stmt)
		');
		$stmt->bindValue(':stmt', "%".$fetch."%");		
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			die("<div class='alert alert-danger' role='alert'>The Product '".$fetch."' Could not be found. please click
			<a href='?action=add_product_location&search=".$fetch."'>here</a> to add it to the database!</div></div></ br></br>");
			}
	}
	
	public function GetProducts($sku){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('Select *
			from products
			left join stock_allocation on products.allocation_id=stock_allocation.allocation_id
			where sku = :stmt');
		$stmt->bindValue(':stmt', $sku);
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			die("<div class='alert alert-danger' role='alert'>The Product '".$sku."' Could not be found. please click
			<a href='?action=add_product_location&search=".$sku."'>here</a> to add it to the database!</div></div></ br></br>");
			}
	}
	
	public function fetchProductbyId($sku_id){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('Select *
			from location
			where sku_id = :stmt
			order by location_name ASC');
		$stmt->bindValue(':stmt', $sku_id);
		$stmt->execute();
		if($stmt->rowCount()>0){				
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else
		{
		
		}
	}
	
	public function GetProductsId($sku){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('Select *
			from products
			where sku_id = :stmt');
		$stmt->bindValue(':stmt', $sku);
		$stmt->execute();				
		while($row = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $row;
		}
	}
	
	public function get_history($sku_id){
			$pdo = Database::DB();
			$stmt = $pdo->prepare('select *
			from order_history
			where sku_id
			like :stmt
			order by date desc limit 6');
			$stmt->bindValue(':stmt', $sku_id);
			$stmt->execute();
			if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else{
			die("<div class='alert alert-danger' role='alert'>No History</div><br/>");
			}
		}
		
		public function UpdateProduct($sku_id, $sku, $notes, $buffer_qty, $allocation_id, $supplier_name, $description, $alias_1, $alias_2, $alias_3,
			$sku_wildcard, $pack_qty, $stock_qty){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('update products
		set sku = :sku, notes = :notes, buffer_qty = :buffer_qty, allocation_id = :allocation_id, supplier_name = :supplier_name, description = :description, alias_1 = :alias_1, alias_2 = :alias_2, alias_3 = :alias_3, alias_wild = :sku_wild, pack_qty = :pack_qty, stock_qty = :stock_qty
		where sku_id = :sku_id');		
		$stmt->bindValue(':sku', $sku);
		$stmt->bindValue(':notes', $notes);
		$stmt->bindValue(':buffer_qty', $buffer_qty);
		$stmt->bindValue(':allocation_id', $allocation_id);
		$stmt->bindValue(':supplier_name', $supplier_name);
		$stmt->bindValue(':description', $description);
		$stmt->bindValue(':alias_1', $alias_1);
		$stmt->bindValue(':alias_2', $alias_2);
		$stmt->bindValue(':alias_3', $alias_3);
		$stmt->bindValue(':sku_wild', $sku_wildcard);
		$stmt->bindValue(':pack_qty', $pack_qty);
		$stmt->bindValue(':stock_qty', $stock_qty);
		$stmt->bindValue(':sku_id', $sku_id);
		$stmt->execute();
		
		}
		
		public function Update_Product_Location($sku_id, $result){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('update location
		set sku_id = :sku_id
		where location_name = :location_name');		
		$stmt->bindValue(':sku_id', $sku_id);
		$stmt->bindValue(':location_name', $result);
		$stmt->execute();
		}
		
		public function Remove_Location($id){
			$pdo = Database::DB();
			$stmt = $pdo->prepare("update location
			set sku_id = :null
			where location_id = :stmt");	
			$stmt->bindValue(':null', null, PDO::PARAM_NULL);		
			$stmt->bindValue(':stmt', $id);
			$stmt->execute();
			}	
		
		public function SearchLocation($Search){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('Select * 
		from location 
		left join products on location.sku_id=products.sku_id 
		where location_name like :stmt');
		$stmt->bindValue(':stmt', $Search);
		$stmt->execute();
		if($stmt->rowCount()>0){
		while($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
		}
	}
		else{
			$stmt = $pdo->prepare('Select * 
		from products
		left join location on location.sku_id=products.sku_id 
		where notes like :stmt');
		$stmt->bindValue(':stmt', "%".$Search."%");
		$stmt->execute();
		if($stmt->rowCount()>0){
		while($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
		}
		}
		else{die ("<div> <style='line-height: 4.0em; align='center'>
            	<font style='color:red; font-size:20px'> '". $Search ."'</font> could not be found! Please try again.</strong></div></ br></br>");
				}
			}
			
		}	

		public function Delete_Sku($sku){
			$pdo = Database::DB();
			$stmt = $pdo->prepare('delete  
			from products
			where
			sku like :stmt');
			$stmt->bindValue(':stmt', $sku);
			$stmt->execute();
		}
		
		public function Clear_Location($location_id){
			$pdo = Database::DB();
			$stmt = $pdo->prepare('update location
			set sku_id = :null
			where
			location_id like :stmt');
			$stmt->bindValue(':null', null, PDO::PARAM_NULL);
			$stmt->bindValue(':stmt', $location_id);
			$stmt->execute();
		}
		
		public function sku_order($today, $sku){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('update 
		products 
		set last_order_date = (?)
		where
		sku like (?)
		');
		$stmt->bindValue(1, $today);
		$stmt->bindValue(2, $sku);
		$stmt->execute();
		}
		
		public function EmptyLocations($aisle){
			$pdo = Database::DB();
			$stmt = $pdo->prepare('select * from location
			where sku_id is null
			and 
			location_name like (?)
			order by location_name asc');
			$stmt->bindValue(1, $aisle."%");
			$stmt->execute();
			if($stmt->rowCount()> 'null'){
			while($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
		}
			}
		else{
			die ("No Empty Locations Avaliable!");
			}		
		}
		
		public function add_sku($sku, $pack_qty, $alias_1, $alias_2, $alias_3, $allocation_id, $description, $stock_qty, $buffer_qty, $notes){
			$pdo = Database::DB();
		try{
			$stmt = $pdo->prepare('insert
			into products
			(sku, pack_qty, alias_1, alias_2, alias_3, allocation_id, description, stock_qty, buffer_qty, notes)
			values (?, ?, ?, ?, ?, ?, ?,?, ?, ?)');
			$stmt->bindValue(1, $sku);
			$stmt->bindValue(2, $pack_qty);
			$stmt->bindValue(3, $alias_1);
			$stmt->bindValue(4, $alias_2);
			$stmt->bindValue(5, $alias_3);
			$stmt->bindValue(6, $allocation_id);
			$stmt->bindValue(7, $description);
			$stmt->bindValue(8, $stock_qty);
			$stmt->bindValue(9, $buffer_qty);
			$stmt->bindValue(10, $notes);
			$stmt->execute();
			echo '<div class="alert alert-success" role="alert">The product '.$sku . ' has been sucessfully added!</div>';	}	
			
			catch (PDOException $e){

				echo '<div class="alert alert-danger" role="alert">'. $e .'</div>';
			
				}			
		}
		
			public function GetAisle($aisle){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('Select * 
		from location 
		left join products on location.sku_id=products.sku_id 
		where location_name
		like :stmt 
		order by length(location_name),location_name');
		$stmt->bindValue(':stmt', $aisle."%");
		$stmt->execute();
		while($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
		}
	}
	
	public function GetProductsLocation($location_id){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('select *
		from location
		left join products on location.sku_id=products.sku_id
		where location_id = :stmt');
		$stmt->bindValue(':stmt', $location_id);
		$stmt->execute();				
		while($row = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $row;
		}
	}
	
	public function Update_Location($sku_id, $result){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('update
		location
		set sku_id = :stmt
		where
		location_id = :id');
		$stmt->bindValue(':stmt', $sku_id);
		$stmt->bindValue(':id', $result);
		$stmt->execute();
		echo '<div class="alert alert-success" role="alert">Product Successfully updated to Location</div>';
	}
	
	public function goods_in_sku(){
	$pdo = Database::DB();
	$stmt = $pdo->query('select goods_in.sku, products.sku_id
	from goods_in
	left outer join products on goods_in.sku=products.sku
	group by goods_in.sku');
	$stmt->execute();
	if ($stmt->rowCount()> 'null'){
		while ($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
			}
		}
	}
	
	public function get_Goods_In_Sku($sku, $alias_3){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('
			Select *
			from goods_in
			where sku like :stmt
			or sku like :alias_3
			having qty_received <> "0.00"
			order by delivery_date desc
			limit 10			
		');
		$stmt->bindValue(':stmt', $sku);
		$stmt->bindValue(':alias_3', $alias_3);
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			
			}
	}
	
	public function get_sku(){
	$pdo = Database::DB();
	$stmt = $pdo->prepare('select stock_adjustment.sku, MAX(order_date)
	from stock_adjustment
	left join products on stock_adjustment.sku=products.sku
	group by stock_adjustment.sku	
	');
	$stmt->execute();
	if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		
	}
	
	public function Goods_In_Total($total){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('select
		coalesce(sum(qty_received),0) as total
		from goods_in
		group by sku
		having sku = ?
		');
		$stmt->bindValue(1, $total);
		//$stmt->bindValue(2, $sku);
		$stmt->execute();
		
		$results = $stmt->fetch(PDO::FETCH_ASSOC);
		{
			return $results;		
		}
		
		
	}
	
	public function get_Movement($sku){
	$pdo = Database::DB();
		$stmt = $pdo->prepare('
			Select *
			from stock_adjustment 
			where stock_adjustment.sku like (?)
			having date <> "0000-00-00"
			order by date DESC
			limit 10
			
		');
		$stmt->bindValue(1, $sku);		
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			
			}
	}
	
	public function total($sku){ //Stock adjustment total
		$pdo = Database::DB();
		$stmt = $pdo->prepare('select 
		coalesce(sum(qty_in),0) - coalesce(sum(qty_out),0) as total
		from stock_adjustment		
		where
		stock_adjustment.sku like (?)
		
		');
		$stmt->bindValue(1, $sku);
		$stmt->execute();
		if ($stmt->rowCount()>0){
			
				$results = $stmt->fetch(PDO::FETCH_ASSOC);{
				return $results;
		
				}
		}
	}
	
	public function qty_In($sku, $qty_in, $date){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('insert into
		stock_adjustment (sku, qty_in, date)
		values (?,?,?);
		
		');
		$stmt->bindValue(1, $sku);
		$stmt->bindValue(2, $qty_in);
		$stmt->bindValue(3, $date);
	
		$stmt->execute();
		}
		
		public function qty_Out($sku,$qty_out, $date){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('insert into
		stock_adjustment (sku, qty_out, date)
		values(?,?,?)
		
		');
		$stmt->bindValue(1, $sku);
		$stmt->bindValue(2, $qty_out);
		$stmt->bindValue(3, $date);
		$stmt->execute();
		}
		
		public function goods_in_last_total($total){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('select * from 
		products
		left join goods_in on goods_in.sku=products.sku
		where products.sku like (?) 
		group by goods_in.sku
	
		');
		$stmt->bindValue(1, $total);
		$stmt->execute();	
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			die();
			}
	}
	
	public function Stock_Adjustment_Total($total){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('select 
		coalesce(sum(stock_adjustment.qty_out),0) - coalesce(sum(stock_adjustment.qty_in),0) as total
		from stock_adjustment
		group by stock_adjustment.sku 
		having sku = ?
		');
		$stmt->bindValue(1, $total);
		$stmt->execute();		
		$results = $stmt->fetch(PDO::FETCH_ASSOC);
		{
			return $results;		
		}
		
	}
	
	public function delete_line($id){
	$pdo = Database::DB();
	$stmt = $pdo->prepare('delete 
	from stock_adjustment
	where id like (?)'
	);	
	$stmt->bindValue(1, $id);
			$stmt->execute();
	}
	
	public function Get_Allocation(){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('
			Select *
			from stock_allocation
			order by name asc			
		');
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			die();
			}
	}
	
	public function Get_Allocation_Sku ($fetch){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('select *
		from products
		where allocation_id=(?)
		order by sku asc');
		$stmt->bindValue(1 ,$fetch);
	$stmt->execute();
	if ($stmt->rowCount()> 'null'){
		while ($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
			}
		}
	}
	
	public function Qty_Instock($selection){
			$pdo = Database::DB();
			$stmt = $pdo->prepare('select sum(qty_delivered) as total
				from goods_out 
				where goods_out.sku like (?)');
				$stmt->bindValue(1, '%'.$selection.'%');
				//$stmt->bindValue(2, '%'.$selection.'%');			
				$stmt->execute();
				while($row = $stmt->fetchALL(PDO::FETCH_ASSOC))
		{
			return $row;
		}
			}
			
			public function Qty_Delivered($selection){
			$pdo = Database::DB();
			$stmt = $pdo->prepare('select sum(qty_delivered) as total
				from goods_out
				where (goods_out.sku like (?) or goods_out.desc2 like (?))');
				$stmt->bindValue(1, '%'.$selection.'%');
				$stmt->bindValue(2, '%'.$selection.'%');		
				$stmt->execute();
				while($row = $stmt->fetchALL(PDO::FETCH_ASSOC))
		{
			return $row;
		}
			}
			
			public function Qty_In_Stock($total){
			$pdo = Database::DB();
			$stmt = $pdo->prepare('select 
		sum(qty_in) - sum(qty_out) as amount
		from stock_adjustment
		where sku = ?');
				$stmt->bindValue(1, $total);				
				$stmt->execute();
		$results = $stmt->fetch(PDO::FETCH_ASSOC);
		{
			return $results;		
		}
			}
			
			public function Total_Stock($sku){
			$pdo = Database::DB();
			$stmt = $pdo->prepare('select
			sum(qty_received) - (select sum(qty_delivered) from goods_out			
			from goods_in
			where sku like (?)');
			$stmt->bindValue(1, $sku);
			//$stmt->bindValue(2, $sku);				
			$stmt->execute();
		$results = $stmt->fetch(PDO::FETCH_ASSOC);
		{
			return $results;		
		}
			}
			
	public function select($supplier_name, $dateFrom, $dateTo){
	$pdo = Database::DB();
	$stmt = $pdo->prepare('
	select *
	from supplier_performance
	where name like (?)
	and delivery_date between (?)
	and (?)
	group by id
	order by delivery_date DESC
	');
	$stmt->bindValue(1 , "%".$supplier_name."%");
	$stmt->bindValue(2 ,$dateFrom);
	$stmt->bindValue(3 ,$dateTo);
	$stmt->execute();
	if($stmt->rowCount()> 'null')
	{
			while($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
		}
			}
		else{
			die ("No Results");
			}		
		}
		
		public function Add_Allocation($allocation){
		$pdo = Database::DB();
		try{
		$stmt = $pdo->prepare('insert into
		stock_allocation (name)
		values(?)
		');
		$stmt->bindValue(1, $allocation);
		$stmt->execute();
		
		echo '</div><div class="alert alert-success" role="alert">The customer '.$allocation . ' has been sucessfully added!</div>';	}
		catch (PDOException $e){
		{
			echo '</div><div class="alert alert-danger" role="alert">the customer '.$allocation . ' appears to have been entered already</div>';
			}
		}
	}
	
	
	
	//------------------------------------------------------GOODS_OUT_QUERY------------------------------------------------------------------------------//
	
	public function Get_All($sku){
	$pdo = Database::DB();
		$stmt = $pdo->prepare('
		select *
				from goods_in
			left join products on goods_in.sku = products.sku
				where goods_in.sku like (?) 
				group by goods_in.sku			
		');
		$stmt->bindValue(1, $sku);
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			
			}
}

public function get_Goods_Out_Sku($search_sku, $alias1, $alias2, $alias_wild, $alias_3){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('
			Select *
			from goods_out
			where (
			sku = :stmt
			or sku = :stmt1
			or sku = :stmt2 
			or sku like concat(nullif(:stmt,""))
			or sku Rlike concat(nullif(:stmt3,""))
			or sku like concat(nullif(:stmt4,""))  
			or desc1sku = concat(nullif(:stmt,""))
			or desc1sku like concat(nullif(:stmt1,"")) 
			or desc1sku like concat(nullif(:stmt2,""))
			or desc1sku like concat(nullif(:stmt4,""))
			or desc1sku Rlike concat(nullif(:stmt3,"")))
			having qty_delivered <> "0.00"
			and due_date > "2016-01-01"
			order by due_date desc 
			limit 20
				
		');
		$stmt->bindValue(':stmt', $search_sku);
		$stmt->bindValue(':stmt1', $alias1);
		$stmt->bindValue(':stmt2', $alias2);
		$stmt->bindValue(':stmt3',$alias_wild.'[^0A]');
		$stmt->bindValue(':stmt4',$alias_3);
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			
			}
	}


//////////////////////////////////////////////////////////////// STOCK QUANTITY QUERY //////////////////////////////////////////////////////////////

public function Get_Sku_Total($selection, $sku_wildcard){
	$pdo = Database::DB();
	$stmt = $pdo->prepare('select * ,
			(select total from stk_allocation_totals where sku like :stmt) as total_alloc,
			(select sum(qty_received)as total from goods_in where sku like :stmt or sku = alias_3) as total_rec,
			(select delivery_date from goods_in where sku like :stmt order by delivery_date desc LIMIT 1) as date_rec,
			(SELECT  sum((qty_delivered) / 4) 
				FROM    goods_out
					WHERE   due_date BETWEEN CURDATE() - INTERVAL 120 DAY AND CURDATE() and (sku = alias_1 
							or sku = alias_2 
							or sku like concat(nullif(products.sku,"")) 
							or sku Rlike concat (nullif(:wild,""))
							or desc1sku = :stmt 
							or desc1sku like concat(nullif(products.alias_1,"")) 
							or desc1sku like concat(nullif(products.alias_2,""))
							or desc1sku rlike concat(nullif(:wild,""))))
							as last120,
			
			(select sum(qty_delivered) from goods_out where 
			
			sku = alias_1 
			or sku = alias_2 
			or sku Rlike concat (nullif(:wild,""))
			or sku like concat(nullif(products.sku,"")) 
			or desc1sku = :stmt 
			or desc1sku like concat(nullif(products.alias_1,"")) 
			or desc1sku like concat(nullif(products.alias_2,""))
			or desc1sku Rlike concat(nullif(:wild,"")))
			as total_del_desc1				
			from products
			where sku like :stmt
		');
		$stmt->bindValue(':stmt', $selection);
		$stmt->bindValue(':wild', $sku_wildcard.'[^0A]');
		$stmt->execute();
		if($stmt->rowCount()>0) {
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		else{
			 die ('That SKU does not exist! Please try again.');
			}
	}
// sku totals for activity.php

	public function Get_Sku_Total_Ave($selection, $sku_wildcard,$days){
	$pdo = Database::DB();
	$stmt = $pdo->prepare('select * ,
			(select total from stk_allocation_totals where sku like :stmt) as total_alloc,
			(select sum(qty_received)as total from goods_in where sku like :stmt or sku = alias_3) as total_rec,
			(select delivery_date from goods_in where sku like :stmt order by delivery_date desc LIMIT 1) as date_rec,
			(SELECT  sum((qty_delivered) / (:days/ 30)) 
				FROM    goods_out
					WHERE   due_date BETWEEN CURDATE() - INTERVAL :days DAY AND CURDATE() and (sku = alias_1 
							or sku = alias_2 
							or sku like concat(nullif(products.sku,"")) 
							or sku Rlike concat (nullif(:wild,""))
							or desc1sku = :stmt 
							or desc1sku like concat(nullif(products.alias_1,"")) 
							or desc1sku like concat(nullif(products.alias_2,""))
							or desc1sku rlike concat(nullif(:wild,""))))
							as last120,
			
			(select sum(qty_delivered) from goods_out where 
			
			sku = alias_1 
			or sku = alias_2 
			or sku Rlike concat (nullif(:wild,""))
			or sku like concat(nullif(products.sku,"")) 
			or desc1sku = :stmt 
			or desc1sku like concat(nullif(products.alias_1,"")) 
			or desc1sku like concat(nullif(products.alias_2,""))
			or desc1sku Rlike concat(nullif(:wild,"")))
			as total_del_desc1				
			from products
			where sku like :stmt
		');
		$stmt->bindValue(':stmt', $selection);
		$stmt->bindValue(':wild', $sku_wildcard.'[^0A]');
		$stmt->bindValue(':days', $days);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		else{
			 die ('That SKU does not exist! Please try again.');
			}
	}
	
		public function goods_out_total($search_sku){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('select 
		coalesce(sum(qty_delivered),0) as goods_out_total 
		from goods_out
		where sku like :stmt or desc1sku like :stmt
		');
		$stmt->bindValue(':stmt', $search_sku);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		{
		 return $results;		
		}
		}
	
	public function Get_All_Stock_Qty($selection, $selection){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('select sku, qty_delivered, desc1
		from goods_out
		where sku like :stmt or desc1 like :wild or sku like :wild
		order by despatch DESC');
		$stmt->bindValue(':stmt', $selection);
		$stmt->bindValue(':wild', '%'.$selection.'%');
		$stmt->execute();
		if($stmt->rowCount()<0) {
		die ('Nothing');
		}
		while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)){
		return $row;
			
			}
		}
		
		// FETCH STOCK ORDER REPORT RESULTS FROM DB TABLE 'PRODUCTS' POPULATED WITH THE RESULTS CREATED WITH THE 'UPDATESTOCK' STORED PROCEDURE. THE STORED PROCEDURE NEEDS TO BE RUN WHEN EVER AN UPDATED LOW STOCK ORDER REPORT IS REQUIRED.
		
	public function get_stock_order_report(){
			$pdo = Database::DB();
			$stmt = $pdo->prepare('select
			p.*,
			max(gi.delivery_date) as delivery_date
			from products p
			  left join goods_in gi on gi.sku=p.sku
			
			where
			p.stock_qty <= p.buffer_qty
			and allocation_id > 0
			
			group by p.sku_id

			');
			$stmt->execute();			
		if($stmt->rowCount()>0){				
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			echo 'No Results to show';
			}
		}
	////////////////////////// END ////////////////////////
	
	
		public function sku_qty_update(){
			$pdo = Database::DB();
			$stmt = $pdo->prepare('call updateStock()
			');
			$stmt->execute();			
		
		}
	
////////////////////////////////////////////////////OUTSTANDING ORDERS/////////////////////////////////////////////////////////////

public function select_orders(){
	$pdo = Database::DB();
	$stmt = $pdo->prepare('select *
	from goods_out
	where qty_delivered <= 0
	group by order_id');
	$stmt->execute();
	if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			
			}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		
		public function select_all(){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('
		select *
		from products
		where 
		allocation_id > "0"						
		');
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			
			}
}
public function Low_Stock_Qty($amount){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('
		select *
		from products
		where 
		buffer_qty > (?)
		and 
		allocation_id > "0"						
		');
		$stmt->bindValue(1, $amount);
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			
			}
}

public function New_Location($result){
		$pdo = Database::DB();
		try{
		$stmt = $pdo->prepare('
		INSERT INTO location(location_name)
		VALUE (?)						
		');
		$stmt->bindValue(1, $result);
		$stmt->execute();
		echo '<div class="alert alert-success" role="alert">The Location '.$result . ' has been sucessfully added!</div>';	}	
		catch (PDOException $e){

				echo '<div class="alert alert-danger" role="alert"> DUPLICATE LOCATION ENTERED. SEE ERROR -----> '. $e .'</div>';
			
				}			
}

	public function stock_In($date, $product_id, $qty_in){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('insert into
		stock_movment (product_id, qty_in, date)
		values(?,?,?)
		
		');
		$stmt->bindValue(1, $product_id);
		$stmt->bindValue(2, $qty_in);
		$stmt->bindValue(3, $date);
		$stmt->execute();
		}
		
		public function stock_Out($date, $product_id, $qty_out){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('insert into
		stock_movment (product_id, qty_out, date)
		values(?,?,?)
		
		');
		$stmt->bindValue(1, $product_id);
		$stmt->bindValue(2, $qty_out);
		$stmt->bindValue(3, $date);
		$stmt->execute();
		}
		
		public function deleteTotal($delete){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('delete
		from stock_movment
		where
		id like :stmt');
		$stmt->bindValue(':stmt', $delete);
			$stmt->execute();
		
	}
	
		
		public function AddCustomer($customer){
		$pdo = Database::DB();
		try{
		$stmt = $pdo->prepare('insert into
		customers (customer_name)
		values(?)
		');
		$stmt->bindValue(1, $customer);
		$stmt->execute();
		
		echo '</div><div class="alert alert-success" role="alert">The customer '.$customer . ' has been sucessfully added!</div>';	}
		catch (PDOException $e){
		{
			echo '</div><div class="alert alert-danger" role="alert">the customer '.$customer . ' appears to have been entered already</div>';
			}
		}
	}
	
	
	
	
	public function SearchNotes($Search){
		
		$pdo = Database::DB();
		$stmt = $pdo->prepare('Select * 
		from products
		left join location on location.product_id=products.product_id 
		where notes like :stmt');
		$stmt->bindValue(':stmt', "%".$Search."%");
		$stmt->execute();
		while($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
		}
	}
	

	
	public function GetLocation($id){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('Select * 
		from location 
		where id 
		like :stmt 
		');
		$stmt->bindValue(':stmt', $id);
		$stmt->execute();
		while($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
		}
	}
	
	
		
	public function GetAisleSort($Aisle){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('Select * 
		convert (substring(location from 4),unsigned integer)
		inner join products on location.product_id=products.product_id 
		where location 
		like :stmt 
		order by location');
		$stmt->bindValue(':stmt', $Aisle."%");
		$stmt->execute();
		while($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
		}
	}
	
	
		
		public function InsertProduct($id, $product, $notes, $quantity, $description){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('update products
		set product :product, notes = :notes, quantity = :quantity, description = :description
		where product_id = :id');		
		$stmt->bindValue(':product', $product);
		$stmt->bindValue(':notes', $notes);
		$stmt->bindValue(':quantity', $quantity);
		$stmt->bindValue(':description', $description);
		$stmt->bindValue(':id', $id);
		
		}
			
		
			
		public function AddLocation($location){
			$pdo = Database::DB();
			try{
			$stmt = $pdo->prepare('insert into
			location(location, product_id)
			values (:stmt, null)');
			$stmt->execute(array(
			":stmt" => $location));
			echo "<div class='alert alert-success'>Location Added!</div>";
			}
			catch (PDOException $e){
				echo "<div class='alert alert-danger' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>LOCATION ALREADY EXISTS</div>";
				}
			}
			
		public function DeleteLocation($id){				
			$pdo= Database::DB();
			$stmt = $pdo->prepare('delete 
			from location 
			where id = :stmt');
			$stmt->bindValue(':stmt', $id);
			$stmt->execute();				
				}
				
		
		
		public function ProductDelete($product){				
			$pdo= Database::DB();
			$stmt = $pdo->prepare('delete 
			from products 
			where product = :stmt');
			$stmt->bindValue(':stmt', $product);
			$stmt->execute();				
				}
			
		public function order($product, $today){
			$pdo = Database::DB();
			$stmt = $pdo->prepare('update
			products
			set last_ordered = :today
			where product = :stmt');
			$stmt->bindValue(':today', $today);
			$stmt->bindValue(':stmt', $product);
			$stmt->execute();
			}
			
			public function order_history($id, $today){
				$pdo = Database::DB();
				$stmt = $pdo->prepare('insert
				into order_history
				(product_id, date)
				values(?,?)');				
				$stmt->bindValue(1, $id);
				$stmt->bindValue(2, $today);
				$stmt->execute();
				}
			
		public function autoselect($Search){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('
			Select *
			from products
			where product like :stmt
		');
		$stmt->bindValue(':stmt', "%".$Search."%");
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			die("<div> <style='line-height: 4.0em; align='center'>
            	<font style='color:red; font-size:20px'> '". $Search ."'</font> could not be found.</strong></div></ br></br>");
			}
	}
	public function getProductByProductId($product_id){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('Select *
			from products
			left join location 
			on products.product_id=location.product_id
			where products.product_id like :stmt');
		$stmt->bindValue(':stmt', $product_id);
		$stmt->execute();
		while($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
		}
	}
	
	public function GetLocationById($search){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('Select * 
		from location 
		left join products
		on location.product_id=products.product_id
		where id 
		like :stmt 
		');
		$stmt->bindValue(':stmt', $search);
		$stmt->execute();
		while($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
		}
	}
	
	public function exportLocation($loc){
		$d = date("d-m-y");
	$pdo = Database::DB();
	$stmt = $pdo->prepare("select 'Location', 'Product'
	union
	select location, product
	from location
	left join products
	on location.product_id=products.product_id
	where location like :stmt
	into outfile 'c:/tmp/Aisle_" .$loc ."_". $d . ".csv'
	fields terminated by ','
	");
	$stmt->bindValue(':stmt', $loc."%");
	$stmt->execute();
	while($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
	{
		return $results;
		echo "Success";
		
		}
	}
	
	public function Suppliers(){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('select
		distinct name
		from
		supplier_details
		order by name ASC
		');
		$stmt->execute();
		if($stmt->rowCount()> 'null')
		{
			while($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
		}
}
	}
	

}
