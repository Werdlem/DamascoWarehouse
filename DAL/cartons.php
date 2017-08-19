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

class carton{ 

  //search the goods out table for products not saved on the products table
  public function getStyles(){
  $pdo = Database::DB();
  $stmt = $pdo->prepare('select *
    from ctn_style
    ');
   $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC); 
}

public function getFlutes(){
  $pdo= Database::DB();
  $stmt = $pdo->prepare('select *
    from ctn_flute');
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function getGrades(){
  $pdo= Database::DB();
  $stmt = $pdo->prepare('select *
    from ctn_grade');
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getLiners(){
  $pdo= Database::DB();
  $stmt = $pdo->prepare('select *
    from ctn_liner');
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getFinish(){
  $pdo= Database::DB();
  $stmt = $pdo->prepare('select *
    from ctn_finish');
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getCategories(){
  $pdo= Database::DB();
  $stmt = $pdo->prepare('select *
    from ctn_category');
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function getCartons(){
  $pdo = Database::DB();
  $stmt = $pdo->prepare('
    select *
    from ctn_cartons
    ');
   $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getQuotes(){
  $pdo= Database::DB();
  $stmt = $pdo->prepare('select *
    from ctn_quotes

    ');
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getQuoteRefs(){
  $pdo = Database::DB();
  $stmt = $pdo->prepare('select * 
    from ctn_quotes
    group by ref');  
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function addStyle($style,$height,$width,$length,$breadth,$glueFlap,$trimWidth,$trimLength,$image){
  $pdo = Database::DB();
  $stmt = $pdo->prepare('insert into ctn_style
    (name, height, width, length, breadth, glueFlap, trimWidth, trimLength, image)
    values (?,?,?,?,?,?,?,?,?)');
  $stmt->bindvalue(1, $style);
  $stmt->bindvalue(2, $height);
  $stmt->bindvalue(3, $width);
  $stmt->bindvalue(4, $length);
  $stmt->bindvalue(5, $breadth);
  $stmt->bindvalue(6, $glueFlap);
  $stmt->bindvalue(7, $trimWidth);
  $stmt->bindvalue(8, $trimLength);
  $stmt->bindvalue(9, $image);
  $stmt->execute();

}

public function addJob($ref,$initials, $style, $height, $width, $qty, $deckle, $chop, $glueFlap, $finish, $grade, $image, $category, $cost, 
  $margin, $boardQty, $config, $length, $fluteWidth, $breadth, $flute, $color){
  $pdo = Database::DB();
  $stmt = $pdo->prepare('insert into ctn_cartons
    (ref,initials, style, height,  width, qty, deckle, chop, glueFlap, finish, grade, image, category, cost, margin, 
  boardQty, config, length, fluteWidth, breadth, flute, color)
    values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
  $stmt->bindvalue(1, $ref);
  $stmt->bindvalue(2, $initials);
  $stmt->bindvalue(3, $style);
  $stmt->bindvalue(4, $height);
  $stmt->bindvalue(5, $width);
  $stmt->bindvalue(6, $qty);
  $stmt->bindvalue(7, $deckle);
  $stmt->bindvalue(8, $chop);
  $stmt->bindvalue(9, $glueFlap);
  $stmt->bindvalue(10, $finish);
  $stmt->bindvalue(11, $grade);
  $stmt->bindvalue(12, $image);
  $stmt->bindvalue(13, $category);
  $stmt->bindvalue(14, $cost);
  $stmt->bindvalue(15, $margin);
  $stmt->bindvalue(16, $boardQty);
  $stmt->bindvalue(17, $config);
  $stmt->bindvalue(18, $length);
  $stmt->bindvalue(19, $fluteWidth);
  $stmt->bindvalue(20, $breadth);
  $stmt->bindvalue(21, $flute);
  $stmt->bindvalue(22, $color);
  $stmt->execute();

}

public function addQuote($ref,$productRef,$style,$height,$length,$width,$qty,$deckle,$chop,$glueFlap,$finish,$grade,$category,$cost,$margin,$boardQty,$config,$flute,
  $breadth,$unitPrice,$total,$date,$unitLabour,$unitSqm,$unitMaterials,$materialsTotal,$labourTotal,$totalSqm,$deliveryTotal,$fluteWidth, $customerName, $customerContact, $salesMen, $unitTotal, $orderTotal){
  $pdo = Database::DB();
  $stmt = $pdo->prepare('insert into ctn_quotes
    (ref,productRef,style,height,length,width,qty,deckle,chop,glueFlap,finish,grade,category,cost,margin,boardQty,config,flute,breadth,unitPrice,
  total,date,unitLabour,unitSqm,unitMaterials,materialsTotal,labourTotal,totalSqm,deliveryTotal,fluteWidth, customerName, customerContact, salesMen, unitTotal, orderTotal)
  values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
  $stmt->bindvalue(1, $ref);
  $stmt->bindvalue(2, $productRef);
  $stmt->bindvalue(3, $style);
  $stmt->bindvalue(4, $height);
  $stmt->bindvalue(5, $length);
  $stmt->bindvalue(6, $width);
  $stmt->bindvalue(7, $qty);
  $stmt->bindvalue(8, $deckle);
  $stmt->bindvalue(9, $chop);
  $stmt->bindvalue(10, $glueFlap);
  $stmt->bindvalue(11, $finish);
  $stmt->bindvalue(12, $grade);
  $stmt->bindvalue(13, $category);
  $stmt->bindvalue(14, $cost);
  $stmt->bindvalue(15, $margin);
  $stmt->bindvalue(16, $boardQty);
  $stmt->bindvalue(17, $config);
  $stmt->bindvalue(18, $flute);
  $stmt->bindvalue(19, $breadth);
  $stmt->bindvalue(20, $unitPrice);
  $stmt->bindvalue(21, $total);
  $stmt->bindvalue(22, $date);
  $stmt->bindvalue(23, $unitLabour);
  $stmt->bindvalue(24, $unitSqm);
  $stmt->bindvalue(25, $unitMaterials);
  $stmt->bindvalue(26, $materialsTotal);
  $stmt->bindvalue(27, $labourTotal);
  $stmt->bindvalue(28, $totalSqm);
  $stmt->bindvalue(29, $deliveryTotal);
  $stmt->bindvalue(30, $fluteWidth);
  $stmt->bindvalue(31, $customerName);
  $stmt->bindvalue(32, $customerContact);
  $stmt->bindvalue(33, $salesMen);
  $stmt->bindvalue(34, $unitTotal);
  $stmt->bindvalue(35, $orderTotal);
  $stmt->execute();
}

}