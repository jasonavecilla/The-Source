<?php

session_start();

    if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
        $sUserSession = $_SESSION['username'];
        $sUserLevel = $_SESSION['level'];        
    } 

include("../../../includes/db-connect.php");

if($dbConn == true){

    $qQuery = " SELECT * FROM `u955154186_db_llanes`.`tbl_users`
                WHERE `deletedate` IS NULL AND `accesslevel` != 'lvl0'
                ORDER BY id DESC
            ";

    $eQuery = mysqli_query($dbConn, $qQuery);

    if ($eQuery == true) {

        $sHtml = "";

        while($rows = mysqli_fetch_array($eQuery)) {

            $sHtml .= ' <tr>
                            <td class="align-middle" ';
                            if($rows["status"] == "inactive") {  
                                $sHtml .= 'style="opacity:0.3;"';
                            }
                            $sHtml .= '><img class="rounded-circle" src="';
                            if($rows["photo"]) {
                                $sHtml .= substr($rows["photo"],3);
                            } else {
                                $sHtml .= 'assets/images/emptyprof.jpg';
                            }                            
                            $sHtml .='" width="46px" style="aspect-ratio:1;"></td>
                            <td class="align-middle" ';
                            if($rows["status"] == "inactive") {  
                                $sHtml .= 'style="opacity:0.3;"';
                            }
                            $sHtml .= '>'.$rows["fullname"].'</td>
                            <td class="align-middle" ';
                            if($rows["status"] == "inactive") {  
                                $sHtml .= 'style="opacity:0.3;"';
                            }
                            $sHtml .= '>'.$rows["position"].'</td>
                            <td class="align-middle" ';
                            if($rows["status"] == "inactive") {  
                                $sHtml .= 'style="opacity:0.3;"';
                            }
                            $sHtml .= '>'.$rows["username"].'</td>
                            
                            <td class="align-middle" ';
                            if($rows["status"] == "inactive") {  
                                $sHtml .= 'style="opacity:0.3;"';
                            }
                            $sHtml .= '>'.$rows["accesslevel"].'</td>
                            <td class="align-middle">
                            <div class="d-flex flex-row justify-content-center">
                                    <button class="btn btn-outline-success btn-sm border-0 px-2 m-0 me-1" onclick="edit('.$rows["id"].')"><i class="fs-5 bi-pencil-square"></i></button>
                            ';
                            // <td class="align-middle">'.$rows["password"].'</td>
                                    
            if($sUserLevel == "lvl3" || $sUserLevel == "lvl2") {  
                $sHtml .= '<button class="btn btn-outline-danger btn-sm border-0 px-2 m-0" onclick=del("'.$rows["id"].'",this);><i class="fs-5 bi-trash"></i></button>';
            }                                    
                $sHtml .= '</div>
                            </td>';
            if($sUserLevel == "lvl3") {
                $sHtml .= '<td class="align-middle"><input type="checkbox" onchange="activate('.$rows["id"].')" id="act'.$rows["id"].'" value="'.$rows["status"].'"> <span id="label'.$rows["id"].'" ';
                if($rows["status"] == "inactive") {  
                    $sHtml .= 'style="opacity:0.3;"';
                }
                $sHtml .= '>'.$rows["status"].'</span></td>';
            }
                $sHtml .= '</tr>';
                                      
        }

        echo $sHtml;
        mysqli_close($dbConn);
    }


} else {
    echo 'failed to connect!';
}



?>