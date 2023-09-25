<?php

session_start();

include("../../includes/db-connect.php");

function codeChecker($code) {
    $nChkr = 0;
    foreach ($_SESSION['mycart'] as $key => $cartProduct)
    {
        if($code == $cartProduct['code'])
        {
            $nChkr++;
        } 
    }

    if ($nChkr > 0) {
        return true;
    } else {
        return false;
    }
};
if($dbConn == true){

    $qQuery = " SELECT * FROM `u955154186_db_llanes`.`tbl_products`
                WHERE `deletedate` IS NULL AND `quantity` > 0
                ORDER BY price ASC
            ";

    $eQuery = mysqli_query($dbConn, $qQuery);

    if ($eQuery == true) {

        $sHtml = "";

        while($rows = mysqli_fetch_array($eQuery)) {

                $sHtml .= ' <div class="col-md-4 p-2">
                            <div class="p-card">
                                <div class="p-carousel">
                                    <div class="carousel" data-bs-ride="" id="carousel-2-1">
                                        <div class="carousel-inner" role="listbox">
                                <div class="carousel-item img-container active" style="background-image: url(';
                $sHtml .= "'../" . $rows['photo'] . "'";
                $sHtml .= ');"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-details p-2">
                                    <div class="d-flex justify-content-between align-items-center mx-2">
                                        <h5>';
                $sHtml .=  $rows['productname'];
                $sHtml .= '</h5><span>';
                $sHtml .=  $rows['code'];
                $sHtml .= '</span></div>
                                    <div class="mx-2">
                                        <hr class="line">
                                    </div>
                                    <div class="d-flex justify-content-between py-2 mt-2 spec mx-2 text-center">';
                $sHtml .=  $rows['description'];                      
                $sHtml .= '         </div>
                                    <div class="mx-2">
                                    <hr class="line">
                                    </div>
                                    <div class="d-flex justify-content-around mt-2 spec mx-2">
                                        <div class="d-flex flex-column align-items-center">
                                            <h6 class="mb-0">BEST PRICE NEAR YOU</h6><h4>₱';
                $sHtml .=   $rows['price'];
                $sHtml .= '.00                 </h4></div>
                                    </div>

                                    <div class="buy mt-3 ';
                $sHtml .=   $rows['code'];                    
                $sHtml .=                               '">';
            if(codeChecker($rows['code']) == false)
            {
                $sHtml .= '<button class="btn btn-primary" type="button" id="';
                $sHtml .=   "'" . $rows['code'] . "'";
                $sHtml .=   '" onclick="addToCart(';
                $sHtml .=   "'" . $rows['code'] . "'";
                $sHtml .= ')"';
                $sHtml .= '>buy</button>';
            } else {
                $sHtml .= '<button class="btn btn-danger" type="button" onclick="document.location=\'../cart/\'">view cart</button>';
            }
                $sHtml .='</div>
                                    
                                </div>
                            </div>
                        </div>
                ';
        }

        echo $sHtml;
        mysqli_close($dbConn);
    }


} else {
    echo 'failed to connect!';
}