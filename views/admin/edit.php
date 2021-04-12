<?php include ROOT . '/views/layouts/dashboard_header.php'; ?>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/tasks">
                    <span data-feather="shopping-cart"></span>
                    All tasks
                </a>
            </li>
<?php
if ($_SESSION['role'] === "developer"){
    echo '<li class="nav-item" style="display: none;"></li>';
}
else {
    echo '<li class="nav-item">' .
        '<a class="nav-link" aria-current="page" href="/task/create">' .
            '<span data-feather="home"></span>' .
            " Add new tasks" .
        '</a>' .
        '</li>';
}
?>
        </ul>
      </div>
  </nav>

  <form action="" method="post" class="form_id">
  <?php
  foreach ($arr as $tasks) {
      $fname = Task::getUserName($tasks['created_by']);
      foreach ($fname as $fullName) {
          if ($tasks['created_by'] != $_SESSION["id"]) {
              echo '<label for="task_name">' . "Task name:" . "</label>" .
                   '<input type="text" id="task_name" name="task_name"  maxlength=50 style="border: none;"  
                   value="' . $tasks['task_name'] . '" readonly>' . '<br><br>' .

                   '<label for="task_name">' . "Created by:" . "</label>" .
                   '<input type="text" id="created_by" name="created_by" style="border: none"
                   value="' . $fullName['first_name'] . " " . $fullName['last_name'] . '" readonly>' . "<br><br>" .

                   '<label for="task_name">' . "Assigned to:" . "</label>" .
                   '<input type="text" id="assigned_to" name="assigned_to" style="border: none"
                   value="' . $tasks['first_name'] . " " . $tasks['last_name'] . '" readonly>' . "<br><br>" .

                   '<select class="form-control form-select-lg form-control  mb-3" aria-label="Default select example"
                    name="status">' .
                      '<option class="form-control" value="in-progress">' . "In progress" . '</option>' .
                      '<option class="form-control" value="done">' . "Done" . '</option>' .
                   '</select><br>' .

                   '<label for="description">' . "Description" . "</label><br>" .
                   '<textarea rows="5"  name="text" readonly>' . $tasks['description'] . "</textarea>" . "<br><br>" .

                   '<input type="submit" id="submit" name="submit" value="Edit">';
          }else{
              echo '<label for="task_name">' . "Task name:" . "</label>" .
                   '<input type="text" id="task_name" name="task_name"  maxlength=50 style="border: none;"  
                   value="' . $tasks['task_name'] . '" readonly>' . '<br><br>' .

                   '<label for="task_name">' . "Created by:" . "</label>" .
                   '<input type="text" id="created_by" name="created_by" style="border: none"
                   value="' . $fullName['first_name'] . " " . $fullName['last_name'] . '" readonly>' . "<br><br>" .

                   '<select class="form-control form-select-lg form-control  mb-3 assigned_to" aria-label="Default select example"
                   name="select_developers">';

                   $developers = new User();
                   $developers->getDeveloper();

                   echo '</select><br>'.
                   '<select class="form-control form-select-lg form-control  mb-3" aria-label="Default select example"
                    name="status">' .
                       '<option class="form-control" value="created">' . "Created" . '</option>' .
                       '<option class="form-control" value="assigned">' . "Assigned" . '</option>' .
                   '</select><br>' .

                   '<label for="description">' . "Description" . "</label><br>" .
                   '<textarea rows="5"  name="'. 'text' . '">' . $tasks['description'] . "</textarea>" . "<br><br>" .

                   '<input type="submit" id="submit" name="submit" value="Edit">';
          }
      }
  }
  ?>
   </form>
  </div>
</div>
<?php include ROOT . '/views/layouts/dashboard_footer.php'; ?>