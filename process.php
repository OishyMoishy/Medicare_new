<?php
include 'database.php';
if(isset($_POST['Submit']))
{
    $Username=mysqli_real_escape_string($con, $_POST['username']);
    $Email=mysqli_real_escape_string($con, $_POST['email']);
    $Info=mysqli_real_escape_string($con, $_POST['short_info']); // Assuming this corresponds to 'info' column in the database
    $Address=mysqli_real_escape_string($con, $_POST['address']);
    $Phone=mysqli_real_escape_string($con, $_POST['phone']);

    $sql="INSERT INTO student (username, email, info, address, phone) VALUES ('$Username', '$Email', '$Info', '$Address', '$Phone')";
    if(mysqli_query($con,$sql))
    {
        echo "<script>alert('New record inserted')</script>";
        echo "<script>window.open('insert.php','_self')</script>";
    }
    else
    {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
