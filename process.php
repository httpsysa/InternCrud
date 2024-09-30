<?php
include('db.php');

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $school = $_POST['school'];
    $course = $_POST['course'];
    $required_hours = $_POST['required_hours'];

    if (!empty($_POST['id'])) {
        // Update the record
        $id = $_POST['id'];
        $sql = "UPDATE interns SET name='$name', contact_number='$contact_number', email='$email', school='$school', course='$course', required_hours='$required_hours' WHERE id='$id'";
    } else {
        // Insert new record
        $sql = "INSERT INTO interns (name, contact_number, email, school, course, required_hours) 
                VALUES ('$name', '$contact_number', '$email', '$school', '$course', '$required_hours')";
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// For delete operation
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM interns WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
