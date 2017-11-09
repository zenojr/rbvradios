<?php
	
	class expToPdf extends Model{

		public function upload($filename, $valor){

			//abre arquivo EXP
			$lines = file($filename);

			//get biblioteca PDF
			require('fpdf/mc_table.php');

			//abre pdf
			$pdf = new PDF_MC_Table();
			$pdf->AddPage();

			//vars
			$titulo  = "PLANILHA ECAD";
			$empresa = "Empresa: ".substr($lines[0], 9, 44);
			$mes_numeral = substr($lines[0], 68, 2)."/".substr($lines[0], 70, 4);
			$mes = utf8_decode("Mês: ").$mes_numeral;

			//set valor
			setlocale(LC_MONETARY,"pt_BR", "ptb");
			$valorPago = "Valor Pago: ".money_format('%n', $valor);


			//cria cabeçalho
			$pdf->setHeader($titulo, $empresa, $mes, $valorPago);


			//Table with 20 rows and 4 columns
			$pdf->SetWidths(array(80,50,50));

			//remove 2 primeiras linhas do array
			array_splice($lines, 0, 2);

			//add header tabela
			$header = array(utf8_decode("Música"), 'Autor', utf8_decode('Intérprete'));
			$pdf->setHeaderTable($header);

			// Percorre o array, removendo o que é nulo no nome e pegando as linhas/colunas (musica, interprete e autor)
			foreach ($lines as $line_num => $line) {

				if (empty(substr($line, 80, 80))) {
					unset($line);
				}else{
					$pdf->Row(array(substr($line, 80, 80), substr($line, 175, 175),substr($line, 425, -13)));
				}
			}

			//gera nome de arquivo
			$nameMD5 = md5( (new DateTime())->format('Y-m-d H:i:s:u') );

			//verifica se pasta existe, se não cria
			$pasta = getcwd()."/system/helpers/pdfTEMP/";
			if (!is_dir($pasta)) {
				mkdir($pasta, 0755);
			}

			//gera nome com caminho pra salvar o pdf
			$pdfName = $pasta.$nameMD5.".pdf";
			$pdf->Output($pdfName,'F');

			//Upload OID ====================
			$db = $this->connectPG();
		    pg_query($db, 'begin');
		    $oid = pg_lo_import($db, $pdfName);
		    pg_query($db, 'commit');
		    pg_close($db);

		    // deleta arquivo
		    unlink($pdfName);

		    //monta array
			$array = array('oid'=> $oid,'mes' => $mes_numeral);

		    return $array;

		}

		public function delete($filename){

			//DELETE OID ====================
			$db = $this->connectPG();
		    pg_query($db, 'begin');
		    $oid = pg_lo_unlink($db, $filename);
		    pg_query($db, 'commit');
		    pg_close($db);

		}

	}

?>