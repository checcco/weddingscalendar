<?php 
App::import('Vendor','xtcpdf');  
$tcpdf = new XTCPDF(); 
$textfont = 'freesans'; 

$tcpdf->SetAuthor("KBS Homes & Properties at http://kbs-properties.com"); 
$tcpdf->SetAutoPageBreak( false ); 
$tcpdf->setHeaderFont(array($textfont,'',40)); 
$tcpdf->xheadercolor = array(150,0,0); 
$tcpdf->xheadertext = 'KBS Homes & Properties'; 
$tcpdf->xfootertext = 'Copyright Â© %d KBS Homes & Properties. All rights reserved.'; 

// add a page (required with recent versions of tcpdf) 
$tcpdf->AddPage(); 

$html = "";
/*$html = "<table>";
$html .= "<tr><td><h1>".$player['Player']['ruolo']."</h1></td><td></td><td></td><td></td></tr>";
foreach ($player['Wedding'] as $wedding) {
	$html .= "<tr><td>".$wedding['datamatrimonio']."</td><td>".$wedding['orario']."</td><td>".$wedding['nomecognomelui']." e ".$wedding['nomecognomelei']."</td><td></td></tr>";
}
$html .= "</table>";*/
foreach ($player['Wedding'] as $wedding) {
$html .= <<<EOT
<p>ciao</p>
EOT;
}

// output the HTML content
$tcpdf->writeHTML($html, true, false, true, false, '');

echo $tcpdf->Output('filename.pdf', 'D'); 
?>