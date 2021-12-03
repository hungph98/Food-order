<?php
    include('./config/connect.php');
?>
<?php
    include('./component/menu.php')
?>
    <div class="main-content">
        <div class="wrapper">
            <h1> Change Password</h1>
            <br>
            <?php
                if(isset($_POST['id'])){
                    $id = $_GET['id'];
                }
            ?>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td> Current Password : </td>
                        <td>
                            <input type="password" name="old_password" placeholder="Current Password">
                        </td>
                    </tr>
                    <tr>
                        <td>New Password : </td>
                        <td>
                            <input type="password" name="new_password" placeholder="New Password">
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm Passwword : </td>
                        <td>
                            <input type="password" name="confirm_password" placeholder="Confirm Password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hiden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php
    // Checked whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        // Get the data from Form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['comfirm_password']);
        // Checked whether the user with current id and current password exist or not
        $sql = " SELECT * FROM tbl_admin WHERE id='$id'AND password = '$current_password' ";
        //  Execute the query 
        $result = mysqli_query($conn, $sql);
        
        if($result == TRUE){
            $count = mysqli_num_rows($result);
            if($count == 1){
                // echo "User Found";
                // Check whether the new password and confirm math or not
                if($new_password == $confirm_password){
                    // Update the password 
                    $sql2 = " UPDATE tbl_admin SET password = '$new_password' WHERE id=$id ";
                    // Execute the query
                    $reslut2 = mysqli_query($conn, $sql2);
                    // Checked whether the query execute or not
                    if($reslut2 == TRUE){
                        // Display Success Message
                        $_SESSION['change-password'] = "Password Change Succesfully";
                        header("location:".SITEURL."admin/manager-admin.php");
                    }else{
                        // Display Success not Mesage 
                        $_SESSION['change-password'] = "Failed to Change Password ";
                        header("location:".SITEURL."admin/manager-admin.php");
                    }
                }else{
                    $_SESSION['pwd-not-math'] = "Password did not math";
                    header("location:".SITEURL."admin/manager-admin.php");
                }
            }else{
                $_SESSION['user-not-found'] = "User Not Found";
                header("loaction:".SITEURL."admin/manager-admin.php");
            }
        }
        // Checked whether the new password and confirm password or not
        // Change password if all above is true

    }
?>
<?php
    include('./component/footer.php')
?>