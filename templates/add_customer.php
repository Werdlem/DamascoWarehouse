<head>
    <title>Add Customer</title>
    </head>
<body>
<?php //include_once('DAL/Production_PDOConnection.php');
//$productDal = new products(); 
	   ?>
<div class="panel panel-primary" style="width:49%; float:left">
<div class="panel-heading" style="text-align:center;"><h3>Add Customer</h3></div>
<div class="panel-body">
    <form method="post" id="add_customer" action="?action=action">
        <div>
            <label for="customer">Customer Name</label>
            <input id="customer" name="customer" class="form-control" type="text" />
            <span id="notesInfo"></span>
        </div>
        <br />
         <button type="submit" class="btn btn-primary" name="add_customer" id="add_customer" >Add</button>
        </form>
        </div>
        </div>
</body>
</html>