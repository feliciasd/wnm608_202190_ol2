<?php
include "../lib/php/functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = file_get_json("../data/users.json");

    $newUser = new stdClass();
    $newUser->name = $_POST['name'] ?? '';
    $newUser->type = $_POST['type'] ?? '';
    $newUser->email = $_POST['email'] ?? '';
    $newUser->classes = array_filter(explode(',', $_POST['classes'] ?? '')); 

    $users[] = $newUser;

    
    file_put_contents("../data/users.json", json_encode($users, JSON_PRETTY_PRINT));

    
    header('Location: admin/users.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Admin</title>
    <?php include "../parts/meta.php"; ?>
</head>
<body>

<header class="navbar">
    <div class="container display-flex">
        <div class="flex-none">
            <h1>User Admin</h1>
        </div>
        <div class="flex-stretch"></div>
        <nav class="nav nav-flex flex-none">
            <ul>
                <li><a href="admin/users.php">User List</a></li>
                <li><a href="admin/add_user.php">Add New User</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <form action="admin/users.php?action=add" method="POST" class="form-card">
        <div class="form-group">
            <h3 class="title">Add New User</h3>
            <label for="name" class="body-text"><strong>Name</strong></label>
            <input type="text" name="name" id="name" class="form-control lato-regular">
        </div>
        <div class="form-group">
        <div class="form-select-container">
        <label for="type" class="body-text"><strong>Type</strong></label>
        <select name="type" id="type" class="form-select">
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
                <option value="Administrator">Administrator</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email" class="body-text"><strong>Email</strong></label>
            <input type="email" name="email" id="email" class="form-control lato-regular">
        </div>
        <div class="form-group">
            <label for="classes" class="body-text"><strong>Classes (comma-separated)</strong></label>
            <input type="text" name="classes" id="classes" class="form-control lato-regular">
        </div>
        <div>
            <button type="submit" class="btn-submit lato-bold">Add User</button>
        </div>
    </form>
</div>

</body>
</html>