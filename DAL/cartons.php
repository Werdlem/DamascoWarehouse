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
  $stmt = $pdo->prepare('select *
    from ctn_cartons
    ');
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

public function addJob($ref,$initials, $style, $height, $width, $qty, $deckle, $chop, $chopCrease1, $chopCrease2,$deckleCreaseL, $deckleCreaseW, $glueFlap, $finish, $grade, $image, $category, $cost, 
  $margin, $boardQty, $config, $length){
  $pdo = Database::DB();
  $stmt = $pdo->prepare('insert into ctn_cartons
    (ref,initials, style, height,  width, qty, deckle, chop, chopCrease1, chopCrease2,deckleCreaseL, deckleCreaseW, glueFlap, finish, grade, image, category, cost, margin, 
  boardQty, config, length)
    values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
  $stmt->bindvalue(1, $ref);
  $stmt->bindvalue(2, $initials);
  $stmt->bindvalue(3, $style);
  $stmt->bindvalue(4, $height);
  $stmt->bindvalue(5, $width);
  $stmt->bindvalue(6, $qty);
  $stmt->bindvalue(7, $deckle);
  $stmt->bindvalue(8, $chop);
  $stmt->bindvalue(9, $chopCrease1);
  $stmt->bindvalue(10, $chopCrease2);
  $stmt->bindvalue(11, $deckleCreaseL);
  $stmt->bindvalue(12, $deckleCreaseW);
  $stmt->bindvalue(13, $glueFlap);
  $stmt->bindvalue(14, $finish);
  $stmt->bindvalue(15, $grade);
  $stmt->bindvalue(16, $image);
  $stmt->bindvalue(17, $category);
  $stmt->bindvalue(18, $cost);
  $stmt->bindvalue(19, $margin);
  $stmt->bindvalue(20, $boardQty);
  $stmt->bindvalue(21, $config);
  $stmt->bindvalue(22, $length);
  $stmt->execute();

}

}