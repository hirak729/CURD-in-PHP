<?php include('header.php') ?>
<?php include('dbcon.php') ?>


    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $query = "SELECT * FROM `students` WHERE `id` = '$id'";

            $result = mysqli_query($connection, $query);

            if(!$result){
                die("query Failed".mysqli_error($connection));
            }
            else{
               $row = mysqli_fetch_assoc($result);
            //    print_r($row);
            }

        }
    ?>

    <?php

        if(isset($_POST['update_students'])){

            if(isset($_GET['id_new'])){
                $idNew = $_GET['id_new'];
            }

            $fName = $_POST['f_name'];
            $lName = $_POST['l_name'];
            $age = $_POST['age'];

            $query = "UPDATE `students` set `first_name` = '$fName', `last_name` = '$lName', `age` = '$age' WHERE `id` = $idNew";

            $result = mysqli_query($connection, $query);

            if(!$result){
                die("query Failed".mysqli_error());
            }
            else{
                header('location:index.php?update_msg=Updation is successfull');
            }
        }

    ?>

    <form action="update.php?id_new=<?php echo $id; ?>" method="post">
        <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name= "f_name" class="form-control" value="<?php echo $row['first_name'] ?>">
        </div>
        <div class="form-group">
            <label for="l_name">Last Name</label>
            <input type="text" name= "l_name" class="form-control" value="<?php echo $row['last_name'] ?>">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name= "age" class="form-control" value="<?php echo $row['age'] ?>">
        </div>
        <div class="mt-3">
        <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
        </div>
    </form>


<?php include('footer.php') ?>