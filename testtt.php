<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tite</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <h1>list</h1>
    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "myDB";
            echo "<tr>
                <td>1</td>
                <td>John</td>
                <td>Doe</td>
                <td>johndoe@example.com</td>
                <td>1234567890</td>
                <td>123 Main St, City, State, ZIP</td>
                <td>
                    <a href='update'>Edit</a>
                    <a href='update'>Delete</a>
                </td>
            </tr>";
            ?>
        </tbody>
    </table>