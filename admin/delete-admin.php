<?php
    include('./config/connect.php')
?>
<?php
    // Get ID of admin to be deleted
    $id = $_GET['id'];
    // Create SQL query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id = $id";
    // Execute the query
    $result = mysqli_query($conn,$sql);
    //Chec whether the query exectured successfully or not
    if($result == TRUE)
    {
        // echo "Admin delete successfully";
        //Create session variable to display message
        // $_SESSION['delete'] = "Admin Delete Successfully";
        header("location:".SITEURL."admin/manager-admin.php");
    }else{
        // echo "Failed to delete admin";
        // $_SESSION['delete'] = "Failed To Delete Admin";
        header("location:".SITEURL."admin/manager-admin.php"); 
    }
    // Redirect to manager admin page with message
    
?>