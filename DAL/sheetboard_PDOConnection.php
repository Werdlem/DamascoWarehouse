<?php
require_once('settings.php');
class SBDatabase
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

class sheetboard{	

public function sku(){
	$pdo = SBDatabase::DB();
	$stmt = $pdo->query('select *
	from goods_in
	group by sku');
	$stmt->execute();
	if ($stmt->rowCount()> 'null'){
		while ($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
		{
			return $results;
			}
		}
	}
	
	public function get_Sheetboard($sku){
		$pdo = SBDatabase::DB();
		$stmt = $pdo->prepare('
			Select *
			from goods_in
			where sku like :stmt
			order by delivery_date desc
			
		');
		$stmt->bindValue(':stmt', $sku);
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			die();
			}
	}
	
	public function get_Details($sku, $description){
	$pdo = SBDatabase::DB();
		$stmt = $pdo->prepare('
			Select *
			from goods_in 		
			where goods_in.sku like (?)
			and goods_in.description like(?)			
		');
		$stmt->bindValue(1, $sku);
		$stmt->bindValue(2, $description);		
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			die();
			}
	}
	
	public function get_Movement($sku){
	$pdo = SBDatabase::DB();
		$stmt = $pdo->prepare('
			Select *
			from sheetboard_movement 
			where sheetboard_movement.sku like (?)
			order by date DESC
		');
		$stmt->bindValue(1, $sku);		
		$stmt->execute();
		if($stmt->rowCount()>0) {
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else{
			die();
			}
	}
	
	public function qty_In($sku, $description, $qty_in, $date){
		$pdo = SBDatabase::DB();
		$stmt = $pdo->prepare('insert into
		sheetboard_movement (sku, description, qty_in, date)
		values(?,?,?,?)
		
		');
			$stmt->bindValue(1, $sku);
		$stmt->bindValue(2, $description);
		$stmt->bindValue(3, $qty_in);
		$stmt->bindValue(4, $date);
		$stmt->execute();
		}
		
		public function qty_Out($sku, $description, $qty_out, $date){
		$pdo = SBDatabase::DB();
		$stmt = $pdo->prepare('insert into
		sheetboard_movement (sku, description, qty_out, date)
		values(?,?,?,?)
		
		');
		$stmt->bindValue(1, $sku);
		$stmt->bindValue(2, $description);
		$stmt->bindValue(3, $qty_out);
		$stmt->bindValue(4, $date);
		$stmt->execute();
		}
}
	
	
