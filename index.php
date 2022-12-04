<!DOCTYPE html>
<html lang="en">

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
                <button type="button" class="btn btn-success btn-add">Add Task</button>
                <button type="button" class="btn btn-default pull-right btn-print">Print</button>
                <hr><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Task</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>