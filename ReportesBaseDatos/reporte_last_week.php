<?php
require("/xampp/htdocs/accountly/server/session/session.php");
require 'fpdf/fpdf.php';
require 'conexion/Conexion.php'; //puede que no lo necesiten

class PDF extends FPDF
{
	// Cabecera de página

	function Header()
	{
		$this->SetFont('Times', 'B', 20);
		$this->Image('img/logo.png', 0, 0, 70); //imagen(archivo, png/jpg || x,y,tamaño)
		$this->setXY(60, 15);
		$this->Cell(100, 8, 'Gatos de la ultima semana', 0, 1, 'C', 0);
		//$this->Image('img/shinheky.png', 150, 10, 35); //imagen(archivo, png/jpg || x,y,tamaño)
		$this->Ln(40);
	}

	// Pie de página

	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);

		$this->SetFont('Arial', 'B', 10);
		// Número de página

		$this->Cell(170, 10, "Todos los derechos reservados", 0, 0, 'C', 0);
		$this->Cell(25, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}

	// --------------------METODO PARA ADAPTAR LAS CELDAS------------------------------
	var $widths;
	var $aligns;

	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths = $w;
	}

	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns = $a;
	}

	function Row($data, $setX) //yo modifique el script a  mi conveniencia :D
	{
		//Calculate the height of the row
		$nb = 0;
		for ($i = 0; $i < count($data); $i++) {
			$nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
		}

		$h = 8 * $nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h, $setX);
		//Draw the cells of the row
		for ($i = 0; $i < count($data); $i++) {
			$w = $this->widths[$i];
			$a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
			//Save the current position
			$x = $this->GetX();
			$y = $this->GetY();
			//Draw the border
			$this->Rect($x, $y, $w, $h, 'DF');
			//Print the text
			$this->MultiCell($w, 8, $data[$i], 0, $a);
			//Put the position to the right of the cell
			$this->SetXY($x + $w, $y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h, $setX)
	{
		//If the height h would cause an overflow, add a new page immediately
		if ($this->GetY() + $h > $this->PageBreakTrigger) {
			$this->AddPage($this->CurOrientation);
			$this->SetX($setX);

			//volvemos a definir el  encabezado cuando se crea una nueva pagina
			$this->SetFont('Helvetica', 'B', 15);
			$this->Cell(40, 8, 'Codigo', 1, 0, 'C', 0);
			$this->Cell(40, 8, 'Codigo', 1, 0, 'C', 0);
			$this->Cell(40, 8, 'Codigo', 1, 0, 'C', 0);
			$this->Cell(40, 8, 'Nombre', 1, 1, 'C', 0);
			$this->SetFont('Arial', '', 12);
		}

		if ($setX == 100) {
			$this->SetX(100);
		} else {
			$this->SetX($setX);
		}
	}

	function NbLines($w, $txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw = &$this->CurrentFont['cw'];
		if ($w == 0) {
			$w = $this->w - $this->rMargin - $this->x;
		}

		$wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
		$s = str_replace("\r", '', $txt);
		$nb = strlen($s);
		if ($nb > 0 and $s[$nb - 1] == "\n") {
			$nb--;
		}

		$sep = -1;
		$i = 0;
		$j = 0;
		$l = 0;
		$nl = 1;
		while ($i < $nb) {
			$c = $s[$i];
			if ($c == "\n") {
				$i++;
				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
				continue;
			}
			if ($c == ' ') {
				$sep = $i;
			}

			$l += $cw[$c];
			if ($l > $wmax) {
				if ($sep == -1) {
					if ($i == $j) {
						$i++;
					}
				} else {
					$i = $sep + 1;
				}

				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
			} else {
				$i++;
			}
		}
		return $nl;
	}
	// -----------------------------------TERMINA---------------------------------
}

//------------------OBTENES LOS DATOS DE LA BASE DE DATOS-------------------------


$data = new Conexion();
$fecha_final = date("Y-m-d");
$fecha_inicial = date("Y-m-d", strtotime($fecha_final . "- 7 days"));

$sql = "SELECT t.amount, id_transaction, f.id_font , name_font, reference, date FROM transaction t INNER JOIN font f on f.id_font=t.id_font WHERE (date BETWEEN '$fecha_inicial' and '$fecha_final') AND id_user=$id_user AND id_management=2";
$sql1 = "SELECT count(id_transaction) as count FROM transaction t INNER JOIN font f on f.id_font=t.id_font WHERE (date BETWEEN '$fecha_inicial' and '$fecha_final') AND id_user=$id_user AND id_management=2";
$conexion = $data->conect();

$result = $conexion->prepare($sql);
$result->execute();
$data = $result->fetchall(PDO::FETCH_ASSOC);

$data1 = new Conexion();
$conexion1 = $data1->conect();

$result1 = $conexion1->prepare($sql1);
$result1->execute();
$data1 = $result1->fetchall(PDO::FETCH_ASSOC);


/* IMPORTANTE: si estan usando MVC o algún CORE de php les recomiendo hacer uso del metodo
que se llama *select_all* ya que es el que haria uso del *fetchall* tal y como ven en la linea 161
ya que es el que devuelve un array de todos los registros de la base de datos
si hacen uso de el metodo *select* hara uso de fetch y este solo selecciona una linea*/

//--------------TERMINA BASE DE DATOS-----------------------------------------------

// Creación del objeto de la clase heredada
$pdf = new PDF(); //hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); //añade l apagina / en blanco
$pdf->SetMargins(10, 10, 10); //MARGENES
$pdf->SetAutoPageBreak(true, 20); //salto de pagina automatico

// -----------ENCABEZADO------------------
$pdf->SetX(25);
$pdf->SetFont('Helvetica', 'B', 15);
//$pdf->Cell(10, 8, 'N', 1, 0, 'C', 0);
$pdf->Cell(40, 8, 'Monto', 1, 0, 'C', 0);
$pdf->Cell(40, 8, 'Deposito', 1, 0, 'C', 0);
$pdf->Cell(40, 8, 'Referencia', 1, 0, 'C', 0);
$pdf->Cell(40, 8, 'Fecha', 1, 1, 'C', 0);
//$pdf->Cell(35, 8, 'Precio', 1, 1, 'C', 0);
// -------TERMINA----ENCABEZADO------------------

$pdf->SetFillColor(233, 229, 235); //color de fondo rgb
$pdf->SetDrawColor(61, 61, 61); //color de linea  rgb

$pdf->SetFont('Arial', '', 12);

//El ancho de las celdas
$pdf->SetWidths(array(40, 40, 40, 40)); //???

// esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!
$pdf->SetAligns(array('C', 'C'));

for ($i = 0; $i < count($data); $i++) {

	$pdf->Row(array($data[$i]['amount'], $data[$i]['name_font'], $data[$i]['reference'], $data[$i]['date']), 25);
}
$pdf->Cell(180, 10, "Cantidad de registros: " . $data1[0]['count'], 0, 1, 'C', 0);

// cell(ancho, largo, contenido,borde?, salto de linea?)

$pdf->Output();