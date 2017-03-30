<?php 

require_once './DAL/PDOConnection.php';


if(isset($_GET['term'])){
	$return_arr = array();
	
		$pdo = Database::DB();
		$stmt = $pdo->prepare('select *
		from goods_out
		where desc1sku
		like :term
		group by desc1sku
		');
		$stmt->execute(array('term' => $_GET['term'].'%'));
		foreach ($stmt as $result)
		{
			$result['value'] = $result['desc1sku'];
			$result['label'] = "{$result['desc1sku']}";
			$matches[] = $result;
			}
}
		$matches = array_slice($matches, 0, 7);
		print json_encode($matches);