<?php
    include('./config/connect.php')
?>
<?php
    include('./component/menu.php')
?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>

            <br>

            <?php
                // if(isset($_SESSION['add'])) // Checking whether the session is set of not
                // {
                //     echo $_SESSION['add']; // Display the session message if set
                //     unset($_SESSION['add']); // Removie session Message 
                // }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name : </td>
                        <td>
                            <input type="text" name="full_name" placeholder="Enter Your FullName">
                        </td>
                    </tr>
                    <tr>
                        <td>User Name : </td>
                        <td>
                            <input type="text" name="user_name" placeholder="Enter Your UserName">
                        </td>
                    </tr>
                    <tr>
                        <td>Password : </td>
                        <td>
                            <input type="password" name="password" placeholder="Enter Your Password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php
    // Process the value from Form and Save it in Database
    // Check whether the submit button is clicked or not

    if(isset($_POST['submit'])){
        // echo "Đã click";
        // Get the Data from Form
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];
        $password = md5($_POST['password']);

        // SQL query to save the data into database
        $sql = "INSERT INTO tbl_admin SET 
            full_name = '$full_name',
            user_name = '$user_name',
            password = '$password'
        ";

        //Executing query and saving data into database
        $result = mysqli_query($conn, $sql);

        // Check whether the ( Query is execued )data is inserted or not and display appropriate is message

        if($result == TRUE){
            
            // Create a session variable to display message
            $_SESSION['add'] = "Admin Added Successfully";

            // Redirect Page to Manager Admin
            header("location:".SITEURL.'admin/manager-admin.php');
        }else{
            // Create a session variable to display message
            $_SESSION['add'] = "Failed to Add Admin";
            header("location:".SITEURL.'admin/add-admin.php');
            
        }
    }else{
        // echo "Chưa nha";
    }
?>

<?php
    include('./component/footer.php')
?>