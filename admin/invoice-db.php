<?php
require('fpdf17/fpdf.php');
$con = mysqli_connect("localhost","root","","housing");
$book_id= $_GET["book_id"];
$query=mysqli_query($con,"SELECT booking.book_id, booking.book_date, Tenant.tenant_name, Tenant.tenant_address, Tenant.tenant_phone, Tenant.tenant_email from booking JOIN room ON room.room_id=booking.book_id INNER JOIN Tenant ON Tenant.tenant_id=booking.tenant_id where booking.book_id = '".$_GET['book_id']."'");

$invoice=mysqli_fetch_array($query);



//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'Fuzo House',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'St. Anggrek',0,0);
$pdf->Cell(59	,5,'Bekasi',0,1);//end of line

$pdf->Cell(130	,5,'Bekasi, Indonesia,  17534',0,0);
$pdf->Cell(25	,5,'Date :',0,0);
$pdf->Cell(34	,5,$invoice['book_date'],0,1);//end of line

$pdf->Cell(130	,5,'Phone +12345678',0,0);
$pdf->Cell(25	,5,'Invoice :',0,0);
$pdf->Cell(34	,5,$invoice['book_id'],0,1);//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['tenant_name'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['tenant_address'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['tenant_phone'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['tenant_email'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(70	,5,'Room',1,0);
$pdf->Cell(64	,5,'Payment',1,0);
$pdf->Cell(55	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$query=mysqli_query($con,"SELECT booking.book_id, booking.room_id, room.room_label, room.room_monthly_price from booking LEFT JOIN room ON room.room_id =booking.room_id WHERE book_id = '".$_GET['book_id']."'
");
$price= 0;
$deposit= 1000000;
while($item=mysqli_fetch_array($query)){
	$pdf->Cell(70	,5,$item['room_label'],1,0);
	$pdf->Cell(64	,5,'1 month',1,0);
	$pdf->Cell(8	,5,'Rp.',1,0);
	$pdf->Cell(47	,5,number_format($item['room_monthly_price']),1,1,'R');//end of line

	$price+=$item['room_monthly_price'];
	$amount= ($price + $deposit);
}

//summary
$pdf->Cell(110	,5,'',0,0);
$pdf->Cell(24	,5,'Deposit',0,0);
$pdf->Cell(8	,5,'Rp.',1,0);
$pdf->Cell(47	,5,number_format('1000000'),1,1,'R');//end of line

$pdf->Cell(110	,5,'',0,0);
$pdf->Cell(24	,5,'Total Due',0,0);
$pdf->Cell(8	,5,'Rp.',1,0);
$pdf->Cell(47	,5,number_format($amount),1,1,'R');//end of line

$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','U',12);

$pdf->Cell(115	,5,'Terms and Conditions','',1,0);
$pdf->Cell(189	,5,'',0,1);//end of line
$pdf->SetFont('Arial','',12);
$pdf->Cell(130	,5,'Thank you for your business. Please send payment within 30 days after receiving this invoice.',0,0);//end of line
$pdf->Cell(189	,5,'',0,1);//end of line
$pdf->Cell(130	,5,'There will be a warning on every late payment',0,0);//end of line























$pdf->Output();
?>
