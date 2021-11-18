<?php 
try{
	require "../config.php";
	$connection=new PDO($dsn, $username, $password, $options);

	$sql="SELECT * FROM phone_book_table";

	$statement = $connection->prepare($sql);
  	$statement->execute();
	$result = $statement->fetchAll();

} catch(PDOException $error){
	echo $sql . "<br>" . $error->getMessage();
}
?>

<div class="container mt-5">
    <div class="row">
        <?php foreach ($result as $row) : ?>
        <div class="col-sm-3 mt-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo escape($row["firstname"]); ?> <?php echo escape($row["lastname"]); ?>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo escape($row["id"]); ?></h6>
                    <p class="card-text">
                        Date: <?php echo escape($row["date"]); ?><br>
                        Address: <?php echo escape($row["address"]); ?><br>
                        Mobile Number: <?php echo escape($row["mobile_number"]); ?><br>
                        Home Number: <?php echo escape($row["home_number"]); ?> <br>
                    </p>
                    <a href="../public/?delete_id=<?php echo escape($row["id"]); ?>" class="card-link btn btn-danger">
                        <i class="far fa-trash-alt"></i>
                        <span style="padding-left:2px;">Delete</span>
                    </a>
                    <a href="update.php?id=<?php echo escape($row["id"]); ?>" class="card-link btn btn-success">
                        <i class="far fa-edit"></i>
                        <span style="padding-left:2px;">Update</span>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>        
</div>
