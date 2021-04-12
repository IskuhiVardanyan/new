<?php include ROOT . '/views/layouts/dashboard_header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="/tasks">
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
                '<span data-feather="home">' . " Add new tasks" . '</span>' .
            '</a>' .
         '</li>';
}
?>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="container-fluid table_class">
<?php
//echo '<table class="table">';
//if ($_SESSION['role'] === "manager") {
//
//   echo '<tr>' . '<th scope="col">Id</th>' . '<th scope="col">Task name</th>' . '<th scope="col">Created by</th>' .
//        '<th scope="col">Assigned to</th>' . '<th scope="col">Description</th>' . '<th scope="col">Edit</th>' .
//        '<th scope="col">Delete</th>' . '<th scope="col">Status</th>';
//}
//elseif ($_SESSION['role'] === "developer"){
//   echo '<tr>' . '<th scope="col">Id</th>' . '<th scope="col">Task name</th>' . '<th scope="col">Created by</th>' .
//        '<th scope="col">Assigned to</th>' . '<th scope="col">Description</th>' . '<th scope="col">Edit</th>' .
//        '<th scope="col">Status</th>';
//}
//foreach ($all_tasks as $all) {
//   $fname = Task::getUserName($all['created_by']);
//   foreach ($fname as $fullName) {
//       if ($all['created_by'] === $_SESSION['id']) {
//           echo "<tr><td>" . $all['task_id'] . "</td><td>" . $all['task_name'] .
//                "</td><td>" . $fullName['first_name'] . " " . $fullName['last_name'] . "</td><td>" .
//                $all['first_name'] . " " . $all['last_name'] . "</td><td>"
//                . '<a href="/task/description/' . $all['task_id'] . '">' . '<span>' . "Description" .
//                '</span></a>' . "</td><td>" . '<a href="/task/update/' . $all['task_id'] . '">' .
//                '<span>' . "Edit" . '</span></a>'. "</td><td>" . '<a href="/task/delete/' . $all['task_id'] .
//                '">' . '<span>' . "Delete" . '</span></a>' . "</td><td>" . $all['status'] . "</td></tr>";
//       }
//       elseif ($all['created_by'] != $_SESSION['id'] && $_SESSION["role"] === "developer") {
//           if ($all['user_id'] === $_SESSION['id']) {
//               echo "<tr><td>" . $all['task_id'] . "</td><td>" . $all['task_name'] .
//                   "</td><td>" . $fullName['first_name'] . " " . $fullName['last_name'] . "</td><td>" .
//                   $all['first_name'] . " " . $all['last_name'] . "</td><td>"
//                   . '<a href="/task/description/' . $all['task_id'] . '">' . '<span>' . "Description" .
//                   '</span></a>' . "</td><td>" . '<a href="/task/update/' . $all['task_id'] . '">' . '<span>'
//                    . "Edit" . '</span></a>' . "</td><td>" . $all['status'] . "</td></tr>";
//           } else {
//               echo "<tr><td>" . $all['task_id'] . "</td><td>" . $all['task_name'] .
//                   "</td><td>" . $fullName['first_name'] . " " . $fullName['last_name'] . "</td><td>" .
//                   $all['first_name'] . " " . $all['last_name'] . "</td><td>"
//                   . '<a href="/task/description/' . $all['task_id'] . '">' .
//                   '<span>' . "Description" . '</span></a>' . "</td><td>" . '<a><span>' . " " . '</span></a>'
//                   . "</td><td>" . $all['status'] . "</td></tr>";
//           }
//       }
//   }
//}
//echo '</table>';
?>
</div>
<?php include ROOT . '/views/layouts/dashboard_footer.php'; ?>


