<?php
$conn = mysqli_connect("localhost","root","","housing");

function query($query){
    global $conn;
    $result= mysqli_query($conn, $query);
    $rows= [];
    while ($row= mysqli_fetch_assoc($result)){
        $rows[]= $row;
    }
    return $rows;
}

function edit($data){
    global $conn;
    //collect data
    $tenant_id = htmlspecialchars($data["tenant_id"]);
    $tenant_name = htmlspecialchars($data["tenant_name"]);
    $tenant_address = htmlspecialchars($data["tenant_address"]);
    $tenant_ktp_no = htmlspecialchars($data["tenant_ktp_no"]);
    $tenant_phone = htmlspecialchars($data["tenant_phone"]);
    $tenant_email = htmlspecialchars($data["tenant_email"]);
    $tenant_emergcp = htmlspecialchars($data["tenant_emergcp"]);
    $tenant_emergcp_phone = htmlspecialchars($data["tenant_emergcp_phone"]);
    $tenant_emergcp_email = htmlspecialchars($data["tenant_emergcp_email"]);
    $tenant_bankaccount = htmlspecialchars($data["tenant_bankaccount"]);
    $tenant_bankaccount_no = htmlspecialchars($data["tenant_bankaccount_no"]);



    $query= "UPDATE Tenant SET
            tenant_id= '$tenant_id',
            tenant_name= '$tenant_name',
            tenant_address= '$tenant_address',
            tenant_ktp_no= '$tenant_ktp_no',
            tenant_phone= '$tenant_phone',
            tenant_email = '$tenant_email',
            tenant_emergcp = '$tenant_emergcp',
            tenant_emergcp_phone = '$tenant_emergcp_phone',
            tenant_emergcp_email = '$tenant_emergcp_email',
            tenant_bankaccount= '$tenant_bankaccount',
            tenant_bankaccount_no= '$tenant_bankaccount_no'

            WHERE tenant_id= '$tenant_id'";

    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}
