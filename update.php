<!DOCTYPE html>
<html lang="en">
<?php include 'db.php';

$id = (int)$_GET['id'];

$sql = "SELECT * FROM tasks WHERE id='$id'";

$rows = $db->query($sql);

$row = $rows->fetch_assoc();
if (isset($_POST['send'])) {
    $task = htmlspecialchars($_POST['task']);
    $sql2 = "UPDATE FROM tasks set name='$task'";

    $db->query($sql2);

    header('location: index.php');
}


?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>To do list PHP</title>
</head>

<body>
    <div class="container">
        <div class="row main">
            <center>
                <h1>Update Todo list</h1>
            </center>

            <div class="col-md-10 col-md-offset-1">





                <form method="post">
                    <div class="form-group">
                        <label for="">Task name</label>
                        <input type="text" required name="task" value="<?php echo $row['name']; ?>"
                            class="form-control">
                    </div>
                    <input type="submit" name="send" value="Update" class="btn btn-success">&nbsp;
                    <a href="index.php" class="btn btn-warning">Back</a>
                </form>

            </div>
        </div>
    </div>
</body>

</html>