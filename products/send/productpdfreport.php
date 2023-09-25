<?php
include("../../fpdf/fpdf.php");
include("../../includes/db-connect.php");
include('../../phpmailer/class.phpmailer.php');

if ($dbConn == true) {

    $sEmails = $_POST['emails'];
    $sCCs = $_POST['ccs'];
    $sBCCs = $_POST['bccs'];

    $aEmails = array_map('trim', explode(',', $sEmails));
    $aCCs = array_map('trim', explode(',', $sCCs));
    $aBCCs = array_map('trim', explode(',', $sBCCs));

    $qQuery = " SELECT * FROM `u955154186_db_llanes`.`tbl_products`
                WHERE `deletedate` IS NULL
                ORDER BY id ASC    
    ";

    $eQuery = mysqli_query($dbConn, $qQuery); 


    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Logo
            $this->Image('../assets/images/imgplaceholder.jpg',10,6,30);
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Move to the right
            $this->Cell(80);
            // Title
            $this->Cell(80,10,'Product List',1,0,'C');
            // Line break
            $this->Ln(20);
        }

        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
        }
    }

    $pdf =  new PDF('L'); // class
    $pdf->AddPage('L'); // Orientation
    $pdf->SetTopMargin(20);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,10,"Image", 1, 0, 'C');
    $pdf->Cell(50,10,"NAME", 1, 0, 'C');
    $pdf->Cell(20,10,"CODE", 1, 0, 'C');
    $pdf->Cell(120,10,"DESCRIPTION", 1, 0, 'C');
    $pdf->Cell(20,10,"QUANTITY", 1, 0, 'C');
    $pdf->Cell(30,10,"PRICE", 1, 1, 'C');

    $x = 10;
    $y = 40;
    $c = 0;
    if ($eQuery == true) {
        while($rows = mysqli_fetch_assoc($eQuery)) {
            $pdf->SetFont('Arial','',10);
            // ../products/images/1681377003_nhan-hoang-5StsNsthTyc-unsplash.jpg
            // "'../".$rows['photo']."'"
            // '../'.trim($str,"../products")
            // "../assets/images/emptyprof.jpg"
            $pdf->Image('../'.trim($rows['photo'],'../products'), $x, $y, 20, 10,'jpg');
            $pdf->Cell(20,10,'', 1, 0, 'L');
            $pdf->Cell(50,10,$rows['productname'], 1, 0, 'L');
            $pdf->Cell(20,10,$rows['code'], 1, 0, 'L');
            $pdf->Cell(120,10,$rows['description'], 1, 0, 'L');
            $pdf->Cell(20,10,$rows['quantity'], 1, 0, 'L');
            $pdf->Cell(30,10,$rows['price'], 1, 1, 'L');
            $c++;
            $y += 10;
            if($c == 14) { 
                $y = 50;
                $pdf->SetFont('Arial','B',10);
                $pdf->Cell(20,10,"Image", 1, 0, 'C');
                $pdf->Cell(50,10,"NAME", 1, 0, 'C');
                $pdf->Cell(20,10,"CODE", 1, 0, 'C');
                $pdf->Cell(120,10,"DESCRIPTION", 1, 0, 'C');
                $pdf->Cell(20,10,"QUANTITY", 1, 0, 'C');
                $pdf->Cell(30,10,"PRICE", 1, 1, 'C');
            };
        }
    }
    
    $pdf->Output('F', '../files/productsreport.pdf', true);
    // $pdf->Output();

    // echo "PDF Created";

    header("Content-type:application/pdf");

    $sFileName = "usersasof_".date("YmdHis").".pdf";
    // It will be called downloaded.pdf
    header("Content-Disposition:attachment;filename=\"$sFileName\"");

    // The PDF source is in original.pdf
    readfile("../files/productsreport.pdf");


    $mail = new PHPMailer();
 
    $mail->IsSMTP();
    $mail->SMTPAuth 	= true;
    $mail->Host 		= 'smtp.gmail.com';
    $mail->Username 	= 'fr3d.1lanes@gmail.com';
    $mail->Password 	= 'sbezvakzzbszgxdy';
    $mail->From 		= 'fr3d.1lanes@gmail.com';
    $mail->FromName 	= "WD49P PHP Mailer";
    $mail->SMTPSecure 	= 'ssl';
    $mail->Port 		= 465;
    
    
    $mail->AddAddress("fr3d.1lanes@gmail.com", "Ted Llanes");
    foreach ($aEmails as $email) {
        $mail->AddAddress( $email, "");        
    }
    // $mail->AddAddress("fourthcesar@gmail.com", "Cesar Cabatit");
    // $mail->AddAddress("danielngdxb@gmail.com", "Daniel Ng");
    // $mail->AddAddress("yanzimaki@gmail.com", "Cyan Mikey");
    // $mail->AddAddress("jetertrajano2018@gmail.com", "Jeter Trajano");
    // $mail->AddAddress("joeversonrempis22@gmail.com", "Joeverson Rempis");
    // $mail->AddAddress("jonalyn.boaloy@gmail.com", "Jonalyn Boaloy");

    // $mail->AddCC("jesthonymorales@gmail.com", "Jesthony Morales");
    foreach ($aCCs as $email) {
        $mail->AddCC( $email, "");        
    }


    // $mail->AddBCC("jesthonymorales@gmail.com", "Jesthony Morales");
    foreach ($aBCCs as $email) {
        $mail->AddBCC( $email, "");        
    }


    $mail->addAttachment("../files/productsreport.pdf");


    $mail->Subject = "New PDF product report from: MP2 - Ted Llanes";
    $mail->Body = nl2br("testing send pdf product list report");		
    $mail->IsHTML(true);
    

    if(!$mail->Send()) {
        return "failed to send";
    } else {
        echo "sent";
    }

}