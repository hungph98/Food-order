<?php
    include('./config/connect.php');
?>
<?php
    include('./component/menu.php');
?>

    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manager Admin</h1>
            <br/>
            <?php
                // if(isset($_SESSION['add'])){
                //     echo $_SESSION['add']; // Displaying session message
                //     unset($_SESSION['add']);// Removing session message
                // }
                // if(isset($_SESSION['delete'])){
                //     echo $_SESSION['delete'];
                //     unset($_SESSION['delete']);
                // }
                // if(isset($_SESSION['update'])){
                //     echo $_SESSION['update'];
                //     unset($_SESSION['update']);
                // }
            ?>
            <br/>
            <!-- Button -->
            <a href="http://localhost:81/food-order/admin/add-admin.php" class="btn-primary">Add Admin</a>
            <br/>
            <br>
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Actions</th>
                </tr>
                <?php
                    // Query to get all Admin 
                    $sql = "SELECT * FROM tbl_admin";

                    //Execute the Query
                    $result = mysqli_query($conn, $sql);
                    $sn = 1; // Create a variable and assign the value

                    // Check whether the query is executed or not
                    if($result == TRUE){
                        // Count rows to check whether we have data in Database or not
                        $count = mysqli_num_rows($result); // Funtion to get all the rows in database
                        //Check the num of the rows
                        if($count > 0){
                            // We have data in database
                            while($rows =  mysqli_fetch_assoc($result)){
                                // Using while loop to get all the data from database
                                // And while loop will run as long as we have data in database
                                // Get individual data
                                $id = $rows['id'];
                                $full_name = $rows['full_name'];
                                $user_name = $rows['user_name'];

                                // Display the values in our Table
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $user_name; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/change-password.php?id=<?php echo $id ?>" class="btn-primary">Change Password</a>
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            // We do not have data in database
                        }
                    }
                ?>
                
            </table>


            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Main Content Section Ends -->

<?php
    include('./component/footer.php')
?>