<!DOCTYPE html>
<html lang="en">
<?php include 'db.php';

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$sql = "SELECT * FROM tasks limit " . $start . " , " . $perPage . " ";
$total = $db->query("SELECT * FROM tasks")->num_rows;
$pages = ceil($total / $perPage);



$rows = $db->query($sql);

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
                <button type="button" class="btn btn-default pull-right btn-print">Print</button>
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

                <table class="table">
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
                <center>
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $pages; $i++) : ?>
                        <li>
                            <a href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage; ?>"><?php echo $i; ?></a>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </center>
            </div>
        </div>
    </div>
</body>

</html>