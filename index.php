<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <title>Intern Management</title>

    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        flex-direction: column;
    }

    form {
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        width: 400px;
    }

    form label {
        display: block;
        margin-bottom: 5px;
    }

    form input, form button {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
    }

    .form-group {
        display: flex;
        justify-content: space-between;
    }

    .form-group input {
        width: 50%;
    }
    </style>
</head>

<body>
    <h2>Internship Form</h2>
    <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($intern['id']) ? $intern['id'] : ''; ?>">

        <label for="name">Name:</label>
        <input type="text" name="name" required value="<?php echo isset($intern['name']) ? $intern['name'] : ''; ?>"><br><br>

        <div class="form-group">
            <div>
                <label for="contact_number">Contact Number:</label>
                <input type="text" name="contact_number" required value="<?php echo isset($intern['contact_number']) ? $intern['contact_number'] : ''; ?>">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" required value="<?php echo isset($intern['email']) ? $intern['email'] : ''; ?>">
            </div>
        </div>

        <div class="form-group">
            <div>
                <label for="school">School:</label>
                <input type="text" name="school" required value="<?php echo isset($intern['school']) ? $intern['school'] : ''; ?>">
            </div>
            <div>
                <label for="course">Course:</label>
                <input type="text" name="course" required value="<?php echo isset($intern['course']) ? $intern['course'] : ''; ?>">
            </div>
        </div>

        <label for="required_hours">Required Hours:</label>
        <input type="number" name="required_hours" required value="<?php echo isset($intern['required_hours']) ? $intern['required_hours'] : ''; ?>"><br><br>

        <button type="submit" name="save">Submit</button>
    </form>
    
    <hr>
    
    <h3>Interns List</h3>
    <table id="internTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>           
                <th>Contact</th>            
                <th>Email</th>            
                <th>School</th>
                <th>Course</th>            
                <th>Required Hours</th>            
                <th>Actions</th>       
            </tr>    
        </thead>  
    
        <tbody>
        <?php
        $sql = "SELECT * FROM interns";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['contact_number'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['school'] . "</td>";
            echo "<td>" . $row['course'] . "</td>";
            echo "<td>" . $row['required_hours'] . "</td>";
            echo "<td>
                    <a href='edit.php?id=" . $row['id'] . "'>Edit</a> |
                    <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <script>
    $(document).ready(function() {
        $('#internTable').DataTable({
            "scrollX": true
        });
    });
    </script>
</body>
</html>
