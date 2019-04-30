<?php  $x = 'ICT INSTITUTE'; ?>

<?php
include 'number_to_string.php';

if (isset($_COOKIE['id'] )) {
	
$receipt_no=$_COOKIE['receipt_no'];
$id=$_COOKIE['id'];
$name =$_COOKIE['name'];
$course = $_COOKIE['course_id'];
$course_fee = $_COOKIE['amount'];
$formated_date = $_COOKIE['date'];
$month=$_COOKIE['month'];

$course_fee_words = convertNumberToWord($course_fee);





//call the FPDF library
require('fpdf/fpdf.php');

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('L','mm',array(129,150));
//add new page
$pdf->AddPage();
//output the result



//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',12);

//Cell(width , height , text , border , end line , [align] )
//$pdf->SetTextColor(0,0,255);
$pdf->Image('logo1.png',10,6,30);
$pdf->Cell(40);

$pdf->Cell(70 ,3,'ICT Institute',0,0);

$pdf->Cell(59 ,5,'RESEIPT',0,1);//end of line
$pdf->Cell(40);
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',10);

$pdf->Cell(70 ,5,'No.50,',0,0);
$pdf->Cell(59 ,5,$receipt_no,0,1);//end of line
$pdf->Cell(40);
$pdf->Cell(100 ,5,'1st floor of Malika Book Shop,',0,1);
//$pdf->Cell(25 ,5,'Date',0,0);
//$pdf->Cell(34 ,5,'[dd/mm/yyyy]',0,1);//end of line
$pdf->Cell(40);
$pdf->Cell(100 ,5,'Pola Junction,',0,1);
//$pdf->Cell(25 ,5,'Invoice #',0,0);
//$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line
$pdf->Cell(40);
$pdf->Cell(100 ,5,'Polonnaruwa.',0,1);
$pdf->Cell(40);
$pdf->Cell(100 ,5,'Tel.027 22274 75 Hot Line.0766 866 282',0,0);
//$pdf->Cell(25 ,5,'Customer ID',0,0);
//$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,2,'',0,1);//end of line
/*//billing address
$pdf->Cell(100 ,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Name]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Company Name]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Address]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Phone]',0,1);
*/
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents

$pdf->SetFont('Arial','',10);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(60 ,5,'Receipt No ',1,0);

$pdf->Cell(70 ,5,$receipt_no,1,1,'L');//end of line

$pdf->Cell(60 ,5,'Reg No',1,0);

$pdf->Cell(70 ,5,$id,1,1,'L');//end of line

$pdf->Cell(60 ,5,'Date',1,0);

$pdf->Cell(70 ,5,$formated_date,1,1,'L');//end of line

$pdf->Cell(60 ,5,'Payment Details',1,0);

$pdf->Cell(70 ,5,$month,1,1,'L');//end of line




// upper part
$pdf->Cell(60 ,5,' ',0,0);

$pdf->Cell(70 ,5,'',0,1,'L');//end of line

$pdf->Cell(60 ,5,'Name',0,0);

$pdf->Cell(70 ,5,$name,0,1,'L');//end of line

$pdf->Cell(60 ,5,'Course',0,0);

$pdf->Cell(70 ,5,$course,0,1,'L');//end of line

$pdf->Cell(60 ,5,'The sum of Rupees',0,0);

$pdf->Cell(70 ,5,$course_fee_words.'rupees only.',0,1,'L');//end of line

$pdf->Cell(60 ,20,'..............................',0,0);

$pdf->Cell(70 ,10,'',0,1,'L');//end of line
$pdf->Cell(30 ,10,'Cashier',0,0,'C');




//summary
$pdf->Cell(40 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',0,0);


$pdf->Cell(30 ,5,'Rs.'.$course_fee,1,1,'R');//end of line

$pdf->Cell(80,5,'',0,0);
$pdf->Cell(25 ,5,'*Payment are not refundable',0,0);

$pdf->Output();
}else{
	echo '<script>alert("Receipt Expired!")</script>';

}




?>