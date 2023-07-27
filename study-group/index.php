<!DOCTYPE html>

<html lang="en">
<?php
require_once '../header.php';
//if user is already login then this index page will be shown in browser
$user_data = check_login($conn);
?>

<title>Study Group</title>

<link rel="stylesheet" href="<?php echo CSS['post.css']."?".time(); ?>">
</head>

<body>
<?php require_once INCLUDES['nav-main-template']; ?>
<?php require_once INCLUDES['nav-logged-template']; ?>

<div class="post-container">

    <?php

    $groups = mysqli_query($conn, "SELECT * FROM study_group WHERE close_date >= NOW()");

    // Check if user is already in a study group
  // Define $user_id and assign a default value of 0
$user_id = 0;

// Check if the user is logged in and retrieve their user ID
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

// Execute a query that uses $user_id
$user_groups = mysqli_query($conn, "SELECT * FROM participants WHERE user_id = $user_id");

    $user_group_ids = array();
    while ($row = mysqli_fetch_assoc($user_groups)) {
        array_push($user_group_ids, $row['group_id']);
    }

    $count = 0;
    foreach ($groups as $group) {
        // Check if user is already in this group
        if (in_array($group['group_id'], $user_group_ids)) {
            continue; // Skip this group
        }
        ?>
        <a href="<?php echo PAGES['group-chat'].'?group_id='.$group['group_id']; ?>">
        
            <div class="post-card">
                <div class="post-text-container">
                    <div class="post-title-style">
                        <?php echo $group['group_name']; ?>
                    </div>
                </div>
            </div>
        </a>
        <?php
        $count++;
    }

    if ($count == 0) {
        echo "You have no available study groups.";
    }


    ?>

</div>

</body>

</html>