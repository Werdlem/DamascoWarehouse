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
	
	public function search($Search){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('
			Select *
			from products
			left join location 
			on products.product_id=location.product_id
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
	
	public function SearchLocation($Search){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('Select * 
		from location 
		left join products on location.product_id=products.product_id 
		where location like :stmt');
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
		left join location on location.product_id=products.product_id 
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
            	<font style='color:red; font-size:20px'> '". $Search ."'</font> could not be found! Please try again.</strong></div></ br></br>");}
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
	
	public function GetAisle($Aisle){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('Select * 
		from location 
		left join products on location.product_id=products.product_id 
		where location 
		like :stmt 
		order by length(location),location');
		$stmt->bindValue(':stmt', $Aisle."%");
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
	
	public function update_location($location_id, $location){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('update
		location
		set location = :stmt
		where
		id = :id');
		$stmt->bindValue(':stmt', $location);
		$stmt->bindValue(':id', $location_id);
		$stmt->execute();		
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

	
	public function GetProducts($id){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('Select *
			from products
			where product = :stmt');
		$stmt->bindValue(':stmt', $id);
		$stmt->execute();				
		while($row = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $row;
		}
	}
	public function GetProductsLocation($id){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('select *
		from location
		left join products on location.product_id=products.product_id
		where id = :stmt');
		$stmt->bindValue(':stmt', $id);
		$stmt->execute();				
		while($row = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $row;
		}
	}
	
	public function UpdateProduct($id, $product, $notes, $quantity, $description){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('update products
		set product = :product, notes = :notes, quantity = :quantity, description = :description
		where product = :id');		
		$stmt->bindValue(':product', $product);
		$stmt->bindValue(':notes', $notes);
		$stmt->bindValue(':quantity', $quantity);
		$stmt->bindValue(':description', $description);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		
		}
		
		public function UpdateLocation($product_id, $result){
		$pdo = Database::DB();
		$stmt = $pdo->prepare('update location
		set product_id = :product_id
		where location = :id');		
		$stmt->bindValue(':product_id', $product_id);
		$stmt->bindValue(':id', $result);
		$stmt->execute();
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
		
		public function Delete($id){
			$pdo = Database::DB();
			$stmt = $pdo->prepare("update location
			set product_id = :null
			where id = :stmt");	
			$stmt->bindValue(':null', null, PDO::PARAM_NULL);		
			$stmt->bindValue(':stmt', $id);
			$stmt->execute();
			}	
			
		public function EmptyLocations(){
			$pdo = Database::DB();
			$stmt = $pdo->query('select * from location
			where product_id
			is null');
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
			
		public function AddLocation($location){
			$pdo = Database::DB();
			try{
			$stmt = $pdo->prepare('insert into
			location(location)
			values (:stmt)');
			$stmt->execute(array(
			":stmt" => $location));
			echo "Location Add!";
			}
			catch (PDOException $e){
				echo "<div> <style='line-height: 4.0em; align='center'>
            	<strong style='color:#00F'>LOCATION ALREADY EXISTS</strong></div></ br></br>";
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
				
		public function AddProduct($product, $notes, $quantity, $description){
			$pdo = Database::DB();
		try{
			$stmt = $pdo->prepare('insert
			into products
			(product, notes, quantity, description)
			values (?, ?, ?, ?)');
			$stmt->bindValue(1, $product);
			$stmt->bindValue(2, $notes);
			$stmt->bindValue(3, $quantity);
			$stmt->bindValue(4, $description);
			$stmt->execute();	
			echo "Product ". $product." Has been added successfully";		
			}
			catch (PDOException $e){
				echo "<div> <style='line-height: 4.0em; align='center'>
            	<strong style='color:#00F'>PRODUCT ALREADY EXISTS</strong></div></ br></br>";
			
				}			
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
}
