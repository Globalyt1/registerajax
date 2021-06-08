<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <style>
    .card {
        border-radius: 9px;
        background: white;
        padding: 9px;
    }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                <h2>ID</h2>
                    <?php $users = $con->query("SELECT * FROM users");
                    echo $users->num_rows;

                    while ($row = $users->fetch_assoc()) {
                        echo $row['id'];
                    }
                    

                    ?>
                </div>   
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <?php ?>
                </div> 
            </div>
        </div>
    </div>
