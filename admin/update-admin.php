<?php
    include('./config/connect.php')
?>
<?php
    include('./component/menu.php');
?>
    <div class="main-content">
        <div class="wrapper">
            <h1> Update Admin </h1>
            <br>
            <?php
                // Get the Id of selected admin
                $id = $_GET['id'];
                // Create sql query to get the details
                $sql = " SELECT * FROM tbl_admin WHERE id = $id";
                // Execute the query
                $result = mysqli_query($conn, $sql);
                // Check whether the query is executed or not
                if($result == TRUE){
                    // Check whether the data is avaiable or not
                    $count = mysqli_num_rows($result);
                    // Check whether we have admin data or not
                    if($count == 1){
                        // echo " Admin Available ";
                        // Get the datails
                        $row = mysqli_fetch_assoc($result);
                        
                        $full_name = $row['full_name'];
                        $user_name = $row['user_name'];
                    }else{
                        header("location:".SITEURL."admin/manager-admin.php");
                    }
                }
            ?>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name : </td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name ;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>User Name : </td>
                        <td>
                            <input type="text" name="user_name" value="<?php echo $user_name ;?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php
    // Check whether the Submit button is Clicked or not
    if(isset($_POST['submit'])){
        // Get all the avalues from form to update

        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];

        // Create SQL query to update admin
        $sql = " UPDATE tbl_admin SET full_name = '$full_name', user_name = '$user_name' WHERE id = '$id'";

        // Execute the query
        $result = mysqli_query($conn,$sql);

        // Check whether the query executed successfully or not
        if($result == true){
            $_SESSION['update'] = "Admin Update Successfully";
            header("location:".SITEURL."admin/manager-admin.php");
        }else{
            $_SESSION['update'] = "Failed to Update Admin";
            header("location:".SITEURL."admin/manager-admin.php");
        }
    }
?>
<?php
    include('./component/footer.php');
?>