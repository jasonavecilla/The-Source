<?php

session_start();

    if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
        $sUserSession = $_SESSION['username'];
        $sUserLevel = $_SESSION['level'];        
    }

include("../../includes/db-connect.php");

if($dbConn == true){

    $qQuery = " SELECT * FROM `u955154186_db_llanes`.`tbl_products`
                WHERE `deletedate` IS NULL
                ORDER BY id DESC
            ";

    $eQuery = mysqli_query($dbConn, $qQuery);

    if ($eQuery == true) {

        $sHtml = "";

        while($rows = mysqli_fetch_array($eQuery)) {

            $sHtml .= ' <tr>
                        <td><img src="';
                            if(!$rows["photo"]) {
                                $sHtml .=  '../assets/images/imgplaceholder.jpg';
                            } else {
                                $sHtml .=  $rows["photo"];
                            }                               
                            $sHtml .= '" width="80px" style="aspect-ratio:1; object-fit: cover;" alt="'.$rows["productname"].'"></td>
                        <td><p class="fw-bold">'.$rows["productname"].'</p></td>
                        <td><p class="text-muted">'.$rows["code"].'</p></td>
                        <td><p>'.$rows["description"].'</p></td>
                        <td><p>'.$rows["quantity"].'</p></td>
                        <td><p>'.$rows["price"].'</p></td>
                        <td class="text-end"><button class="btn btn-outline-success btn-sm border-0 px-2 m-0 me-1" onclick="edit('.$rows["id"].')"><i class="fs-5 bi-pencil-square"></i></button>';
                        if($sUserLevel == "lvl3" || $sUserLevel == "lvl2") {  
                            $sHtml .= '<button class="btn btn-outline-danger btn-sm border-0 px-2 m-0" onclick=del("'.$rows["id"].'",this);><i class="fs-5 bi-trash"></i></button>';
                        } $sHtml .= ' </td>
                        </tr>
            
            ';
        }

        echo $sHtml;
        mysqli_close($dbConn);
    }


} else {
    echo 'failed to connect!';
}