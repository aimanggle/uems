<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\RegistrantModel;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends BaseController
{
	/*
	|--------------------------------------------------------------------------
	| Export Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling export requests
	|
     *

    /**
     * ---------------------------------------------
     * Constructor to load model and validation class
     * ---------------------------------------------
     */
    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->registrantModel = new RegistrantModel();
    }

	/**
	 *  ----------------------------------------
	 *  Methods to export data to excel
	 *  @param int $eventid
	 *  ----------------------------------------
	 */
    public function index($eventid)
    {
        $event = $this->eventModel->Find($eventid);
		$data = $this->registrantModel->findbyeventid($eventid);

		$file_name = $event['eventname'].'.xlsx';

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Bil');
		$sheet->setCellValue('B1', 'Student Name');
		$sheet->setCellValue('C1', 'Student ID');
		$sheet->setCellValue('D1', 'Ticket NO');
		$sheet->setCellValue('E1', 'Register Date');

		$count = 2;
        $bil=1;

		foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $bil++);
			$sheet->setCellValue('B' . $count, $row['fullname']);
			$sheet->setCellValue('C' . $count, $row['studentid']);
			$sheet->setCellValue('D' . $count, $row['regno']);
			$sheet->setCellValue('E' . $count, $row['regdate']);
			$count++;
		}

		$writer = new Xlsx($spreadsheet);
        $writer->save($file_name);
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();
		readfile($file_name);
        exit;

    }
}
