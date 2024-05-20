

<?php

include "../lib/php/functions.php";


$users = file_get_json("../data/users.json");

//turn it into a form look like a realistic form in html, it should be like editing the type, editing email, and editing the classes (it's okay if it's doesn't work for this step)

//how to make the form work, where it will actually edit the json file


//file_put_contents json_encode explode $_POST -use from these three concept and how to use them to update json file with the information from the form once it is submitted

//CRUD, Create Read Update Delete 
//fully working administration form, add new users, and delete users


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'add') {
    $newUser = new stdClass();
    $newUser->name = $_POST['name'] ?? '';
    $newUser->type = $_POST['type'] ?? '';
    $newUser->email = $_POST['email'] ?? '';
    // Assuming classes are submitted as a comma-separated string
    $newUser->classes = array_filter(explode(',', $_POST['classes'] ?? ''));

    // Append the new user to the array and save back to the file
    $users[] = $newUser;
    file_put_contents("../data/users.json", json_encode($users, JSON_PRETTY_PRINT));

    // Redirect to avoid form resubmission
    header('Location: users.php');
    exit;
}



function showUserPage($user) {
    $selectedStudent = $user->type === 'Student' ? 'selected' : '';
    $selectedTeacher = $user->type === 'Teacher' ? 'selected' : '';
    $selectedAdmin = $user->type === 'Administrator' ? 'selected' : '';
    $classes = implode(",", $user->classes);

    echo <<<HTML
<nav class="nav nav-crumbs">
    <ul>
    <li><a href="admin/users.php">Back</a></li>
    </ul>
</nav>
<form action="admin/users.php" method="POST" class="form-card">
    <div class="form-group">
        <h3 class="title">Edit User: {$user->name}</h3>
        <input type="hidden" name="name" value="{$user->name}">
    </div>
    <div class="form-group">
    <div class="form-select-container">
        <label for="type" class="body-text"><strong>Type</strong></label>
        <select name="type" id="type" class="form-select">
            <option value="Student" $selectedStudent>Student</option>
            <option value="Teacher" $selectedTeacher>Teacher</option>
            <option value="Administrator" $selectedAdmin>Administrator</option>
        </select>
    </div>
    <div class="form-group">
        <label for="email" class="body-text"><strong>Email</strong></label>
        <input type="email" name="email" id="email" value="$user->email" class="form-control-admin lato-regular">
    </div>
    <div class="form-group">
        <label for="classes" class="body-text"><strong>Classes</strong></label>
        <input type="text" name="classes" id="classes" value="$classes" class="form-control-admin lato-regular">
    </div>
    <div>
        <button type="submit" class="btn-submit lato-bold">Update User</button>
    </div>
</form>

<br>
<br>


HTML;
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Admin Page</title>

    <?php include "../parts/meta.php"; 


    ?>



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


     
            <?php



            if (isset($_GET['id'])) {
                showUserPage($users[$_GET['id']]);
               
            } else {

            ?>

        <div class="card soft">

        <h2>User List</h2>

        <nav class="nav">

            <ul>

        <?php


         for($i=0;$i<count($users);$i++) {
	         echo "<li>
	         <a href='admin/users.php?id=$i'>{$users[$i]->name}</a>
	   
	         </li>";

    

	     }


        ?>
        </ul>
    </nav>

        <?php } ?>

    </div>
    </div>                  

</body>
</html>