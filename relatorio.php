<?php
require_once("tcpdf/tcpdf.php");
require_once("conexao.php");
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetTitle("Relatorio dos Produtos");
$obj_pdf->SetHeaderData('', '60', 'MUSISOM ' . date('d.m.y'));
$obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin('15');
$obj_pdf->SetFooterMargin('30');
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '40', PDF_MARGIN_RIGHT);
$obj_pdf->setPrintHeader(true);
$obj_pdf->setPrintFooter(true);
$obj_pdf->SetAutoPageBreak(TRUE, 10);
//$obj_pdf->SetFont('helvetica','',11);  
$obj_pdf->SetFont('dejavusans', '', 12, '', true);
$obj_pdf->AddPage();
//rotina para colocar um logotipo no relatório - imagem da internet
//$img = file_get_contents('http://img.cinemablend.com/cb/0/f/c/5/9/e/0fc59efffd13d661c3231986d2d7c60b4cb03b10a15b266dd6694c0326a224a2.jpg');
//$imgdata = base64_decode(base64_encode($img));
//$obj_pdf->Image('@' . $imgdata,16,8,30);
//rotina para colocar um logotipo no relatório 
$obj_pdf->Image('../img/logo.png', 15, 10, 50, 13, '', '', '', true, 200, '', false, false, 1, false, false, false);
$txt = "P R O D U T O S";
$co = "Código";
$d = "Descrição";
$m = "Marca";
$t = "Tipo";
// config de fonte e texto
$obj_pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
//Titulo relatorio
$conexao = conexao::getInstance();
$sql = 'SELECT codigo, tipo, marca, descricao, valor, qtd_estoque FROM produtos';
$stm = $conexao->prepare($sql);
$stm->execute();
$produtos = $stm->fetchAll(PDO::FETCH_OBJ);
$a = '';
//dados do relatorio
foreach($produtos as $linha) {
    $a .= "<tr>
                <td> $linha->codigo </td>
                <td> $linha->descricao </td>
                <td> $linha->marca </td>
                <td> $linha->tipo </td>
            </tr>";
}

$html = <<<EOD
<table border="1">
<tr>   
    <th style="text-align: center; font-weight:bold">Código</th>
    <th style="text-align: center; font-weight:bold">Descrição</th>
    <th style="text-align: center; font-weight:bold">Marca</th>
    <th style="text-align: center; font-weight:bold">Tipo</th>
</tr>
$a
</table>
EOD;

$obj_pdf->writeHTML($html, 1, 0, 0, 0, '');

//TCPDF ERROR: Some data has already been output, can't send PDF file*/
ob_start();
//gerar o relatório para tela (I) gerar relatorio PDF para arquivo (D)
$obj_pdf->Output('relatorio.pdf', 'I');
