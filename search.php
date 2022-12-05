<!DOCTYPE html>
<html lang="en">
<?php include 'db.php';


if (isset($_POST['search'])) {
    $name = htmlspecialchars($_POST['search']);
    $sql = "SELECT * FROM tasks WHERE name like '%$name%'";
    $rows = $db->query($sql);
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
                <h1>Todo list</h1>
            </center>

            <div class="col-md-10 col-md-offset-1">
                <button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success btn-add">Add
                    Task</button>
                <button type="button" class="btn btn-default pull-right btn-print" onclick="print()">Print</button>
                <hr><br>



                <!-- Modal content-->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Task</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="add.php">
                                    <div class="form-group">
                                        <label for="">Task name</label>
                                        <input type="text" required name="task" class="form-control">
                                    </div>
                                    <input type="submit" name="send" value="Add Task" class="btn btn-success">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <p>Search</p>
                    <form action="search.php" method="post" class="form-group">
                        <input type="text" placeholder="Search" name="search" class="form-control">
                    </form>
                </div>
                <?php if (mysqli_num_rows($rows) < 1) : ?>
                <h2 class="text-danger text-center">Nothing Found</h2>
                <a href="index.php" class="btn btn-warning">Back</a>

                <?php else : ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Task</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $rows->fetch_assoc()) : ?>
                        <tr>


                            <th scope="row"><?php echo $row['id'] ?></th>
                            <td class="col-md-10"><?php echo $row['name'] ?></td>
                            <td>
                                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                        <?php endwhile; ?>
                    </tbody>

                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>