<?php
include('conn.php');
$sql = "DELETE FROM Tenant WHERE tenant_id= ". $_GET["tenant_id"]. "";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
        header("location:tenant.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
