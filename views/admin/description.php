<?php include ROOT . '/views/layouts/dashboard_header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/tasks">
                        <span data-feather="shopping-cart">All tasks</span>

                    </a>
                </li>
<?php
if ($_SESSION['role'] === "developer"){
    echo '<li class="nav-item" style="display: none;"></li>';
}
else {
    echo '<li class="nav-item">' .
            '<a class="nav-link" aria-current="page" href="/task/create">' .
                '<span data-feather="home">' . "Add new tasks" . '</span>' .
            '</a>' .
         '</li>';
}
?>
            </ul>
          </div>
        </nav>

    <form action="" method="post" class="form_id" style='margin-left:50px;'>
<?php
foreach ($arr as $tasks) {
    $fname = Task::getUserName($tasks['created_by']);
    foreach ($fname as $fullName) {
        echo '<label for="task_name">' . "Task name:" . "</label>" .
             '<input type="text" id="task_name" name="task_name"  maxlength=50 style="border: none;"  
              value="' . $tasks['task_name'] . '" readonly>' . '<br><br>' .

             '<label for="task_name">' . "Created by:" . "</label>" .
             '<input type="text" id="created_by" name="created_by" style="border: none"
              value="' . $fullName['first_name'] . " " . $fullName['last_name'] . '" readonly>' . "<br><br>" .

             '<label for="task_name">' . "Assigned to:" . "</label>" .
             '<input type="text" id="assigned_to" name="assigned_to" style="border: none"
              value="' . $tasks['first_name'] . " " . $tasks['last_name'] . '" readonly>' . "<br><br>" .

             '<label for="task_name">' . "Status:" . "</label>" .
             '<input type="text" id="status" name="status" style="border: none"
             value="' . $tasks['status'] . '" readonly>' . "<br><br>" .

             '<label for="description">' . "Description" . "</label><br>" .
             '<textarea rows="5"  name="text" readonly>' . $tasks['description'] . "</textarea>" . "<br><br>" .

             '<button class="description_btn"><a href="/tasks">' . "&lsaquo;&lsaquo; Back" . "</a></button>";
    }
}
?>
    </form>
    </div>
</div>
<?php include ROOT . '/views/layouts/dashboard_footer.php'; ?>
