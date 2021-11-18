<?php
require "../config.php";
require "../common.php";
if(isset($_POST["submit"])){
	if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
	try{
		$connection = new PDO($dsn, $username, $password, $options);

		$new_user = array(
            "lastname" => $_POST['lname'],
            "firstname"  => $_POST['fname'],
            "address"     => $_POST['address'],
            "mobile_number"       => $_POST['mobile_number'],
            "home_number"  => $_POST['home_number']
        );

        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "phone_book_table",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
        );
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
	} catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <div class="container py-4">
        <div class="conatainer-fluid py-4">
            <div class="toast show fade mx-auto show fade text-white bg-success" id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
                <div class="toast-header text-white bg-success">
                    <strong class="me-auto">Success</strong>
                    <button type="button" class="btn-close btn-close-white btn-exit" data-mdb-dismiss="toast" aria-label="Close"></button>
                </div>
            <div class="toast-body"><?php echo $_POST['fname']; ?> successfully added.</div>
            </div>
        </div>
    </div>
<?php }?>
<!-- Modal -->
<div
  class="modal fade"
  id="create"
  tabindex="-1"
  aria-labelledby="create-content"
  aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-content">Create new Contact</h5>
                <button
                type="button"
                class="btn-close"
                data-mdb-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <!--
                    <div class="form-outline mb-4">
                        <input type="text" id="form7Example1" class="form-control" />
                        <label class="form-label" for="form7Example1">Name</label>
                    </div>

                
                    <div class="form-outline mb-4">
                        <input type="email" id="form7Example2" class="form-control" />
                        <label class="form-label" for="form7Example2">Email address</label>
                    </div>-->

                    <div class="row">
                        <div class="col">
                            <div class="form-outline input-border">
                                <input type="text" id="fname" class="form-control" name="fname" />
                                <label class="form-label" for="fname">First Name</label>
                            </div>
                            <span class="border-bottom"></span>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="lname" class="form-control" name="lname" />
                                <label class="form-label" for="lname">Last Name</label>
                            </div>
                        </div>
                    </div>

                        <hr />

                    <div class="row">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="address" class="form-control" name="address"/>
                                <label class="form-label" for="address">Address</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="number" id="mobile-number" class="form-control" name="mobile_number" />
                                <label class="form-label" for="mobile-number">Mobile Number</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="home-number" class="form-control" name="home_number" />
                                <label class="form-label" for="home-number">Home Number</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary bg-warning" data-mdb-dismiss="modal">
                    Close
                    </button>
                    <button type="submit" class="btn btn-primary" name="submit" onclick="toastr.success('<?php echo $message . ' Added Successfully' ?>');">Create Contact</button>
                </div>
                <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
            </form>
        </div>
    </div>
</div>

<script>
var modal = document.getElementById("static-example");
var span = document.getElementsByClassName("btn-exit")[0];


 modal.style.display = "block";
span.onclick = function() {
  modal.style.display = "none";
}
</script>