<?php
/** * Use an HTML form to edit an entry in the * users table. * */
require "../config.php";
if (isset($_POST['update']))
{

    try
    {
        $connection = new PDO($dsn, $username, $password, $options);
        $user = ["id" => $_POST['id'], "date" => $_POST['date'], "lastname" => $_POST['lastname'], "firstname" => $_POST['firstname'], "address" => $_POST['address'], "mobile_number" => $_POST['mobile_number'], "home_number" => $_POST['home_number']];
        $sql = "UPDATE phone_book_table SET id = :id, firstname = :firstname, lastname = :lastname, address = :address, mobile_number = :mobile_number	, home_number = :home_number, date = :date WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute($user);
    }
    catch(PDOException $error)
    {
        echo $sql . "<br>" . $error->getMessage();
    }
}
if (isset($_GET['id']))
{
    try
    {
        $connection = new PDO($dsn, $username, $password, $options);
        $id = $_GET['id'];
        $sql = "SELECT * FROM phone_book_table WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $error)
    {
        echo $sql . "<br>" . $error->getMessage();
    }
}
else
{
    echo "Something went wrong!";
    exit;
} ?> 

<?php  require 'templates/header.php'; ?>
<?php include 'create.php' ?>

<?php if (isset($_POST['update']) && $statement): ?> 
    <div class="container py-4">
        <div class="conatainer-fluid py-4">
            <div class="toast show fade mx-auto show fade text-white bg-success" id="updated" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
                <div class="toast-header text-white bg-success">
                    <strong class="me-auto">Success</strong>
                    <button type="button" class="btn-close btn-close-white btn-exit" data-mdb-dismiss="toast" aria-label="Close"></button>
                </div>
            <div class="toast-body"><?php echo escape($_POST['firstname']); ?> successfully updated. </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="d-flex align-items-center justify-content-center" style="margin-top:5%"> 
    <form method="post"> 
        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <h5 class="card-title">Update Record</h5>
                <h6 class="card-subtitle mb-2 text-muted">Users Profile</h6>
                <p class="card-text">
                    
                        <div class="row">
                            <?php foreach ($user as $key => $value): ?>
                                <div class="col-sm-5"> 
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="<?php echo $key; ?>">
                                        <?php echo ucfirst($key); ?>
                                    </label> 
                                    <input class="form-control" type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>> 
                                </div>
                                </div>
                                <?php endforeach; ?> 
                        </div>
                        <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
                    </form>
                </p>
                <a href="../public/" class="card-link btn btn-warning">
                    <i class="fas fa-angle-left"></i>
                    <span style="padding-left:5px;">Back</span>
                </a>
                <button class="card-link btn btn-success" type="submit" name="update">
                    <i class="far fa-edit"></i>
                    <span style="padding-left:5px;">Update<span>
                </button>
            </div>
        </div>
    </form>
</div>

<script>
var modal_up = document.getElementById("updated");
var span = document.getElementsByClassName("btn-exit")[0];


modal_up.style.display = "block";
span.onclick = function() {
    modal_up.style.display = "none";
}
</script>
<?php  require 'templates/footer.php'; ?>