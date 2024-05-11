<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Users</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../connection/connection.php";
                    $query = "SELECT * FROM `register`";
                    $run = mysqli_query($conn,$query);
                    if($run){
                        if($run->num_rows>0){
                            while($row=mysqli_fetch_assoc($run)){
                                ?>
                                <tr>
                                    <td><?php echo $row["id"];?></td>
                                    <td><?php echo $row["username"];?></td>
                                    <td><?php echo $row["email"];?></td>
                                    <td><?php echo $row["contact"];?></td>
                                    <td>
                                        <form action="removeuser.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                            <input type="submit" value="Remove">
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    
                    ?>
                    <!-- More rows for additional users -->
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>