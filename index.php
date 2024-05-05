<?php
include "_header.php";
?>
<br>
<div class="container">
    <div class="input-area">
        <form method="POST" action="add.php">
            <input type="text" class="form-control" name="task" placeholder="write your tasks here..." required>
            <button type="submit" class="btn btn-primary mt-2" name="add">Add Task</button>
        </form>
    </div>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tasks</th>
                <th>Status</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>

        <!-- desplying on index page -->
            <?php
            require 'config.php';
            $fetchingtasks = mysqli_query($db, "SELECT * FROM `task` ORDER BY `task_id` ASC")
                or die(mysqli_error($db));
            $count = 1;
            while ($fetch = $fetchingtasks->fetch_array()) {
            ?>
                <tr class="border-bottom">
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $fetch['task'] ?></td>
                    <td><?php echo $fetch['status'] ?></td>
                   

                    <td class="action">
                        <?php if ($fetch['status'] != "Done") { ?>
                            <a href="update_task.php?task_id=<?php echo $fetch['task_id'] ?>" class="btn btn-success">Complete</a>
                        <?php } ?>
                        <a href="delete_task.php?task_id=<?php echo $fetch['task_id'] ?>" class="btn btn-danger">Remove</a>
                        
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>
</div>


</body>