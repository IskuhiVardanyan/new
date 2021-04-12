<?php
    include ROOT . '/views/layouts/dashboard_header.php';
?>

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
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/task/create">
                    <span data-feather="home">Add new task</span>
                </a>
            </li>
        </ul>
      </div>
    </nav>
  </div>
</div>

      <form action="" method="POST" class="form_id">
          <label for="task_name">Task name:</label>
          <input type="text" id="task_name" name="task_name"><br><br>

          <select class="form-control form-select-lg form-control  mb-3 assigned_to" aria-label="Default select example"
                  name="created_by" style="display: none">
          <?php echo '<option class="form-control" selected value=' . $_SESSION['id'] . ">" .  "</option>"; ?>
          </select><br>

          <select class="form-control form-select-lg form-control  mb-3 assigned_to" aria-label="Default select example"
                  name="select_developers">
              <option class="form-control" selected value="0">Assigned to</option>
         <?php
             $developers = new User();
             $developers->getDeveloper();
         ?>
          </select><br>

          <label for="description">Description</label><br>
          <textarea rows="5" cols="5" name="text"></textarea>
          <br><br>

          <select class="form-control form-select-lg form-control  mb-3" aria-label="Default select example"
                  name="status">
              <option class="form-control" value='assigned'>Assigned</option>
              <option class="form-control" value='created'>Created</option>
          </select><br>

          <input type="submit" id="submit" name="submit" value="Create">
      </form>
<?php include ROOT . '/views/layouts/dashboard_footer.php'; ?>
