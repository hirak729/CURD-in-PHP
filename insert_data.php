<?php include('dbcon.php') ?>

<?php 

    if(isset($_POST['add_students'])){
        // echo "Data submit successfuly";

        $fName = $_POST['f_name'];
        $lName = $_POST['l_name'];
        $age = $_POST['age'];

        if($fName == ""  || empty($fName)){
            header('location:index.php?message=You need to fill all the fields.');
        }
        elseif($lName == ""  || empty($lName)){
            header('location:index.php?message=You need to fill all the fields.');
        }
        elseif($age == ""  || empty($age)){
            header('location:index.php?message=You need to fill all the fields.');
        }
        else{
            $query = "INSERT INTO `students` (`first_name`, `last_name`, `age`) values ('$fName', '$lName', '$age')";

            $result = mysqli_query($connection, $query);

            if(!$result){
                die("Data not insert".mysqli_error());
            }
            else{
                header('location:index.php?message=Data Insert Successfully');
            }
        }
    }
?>