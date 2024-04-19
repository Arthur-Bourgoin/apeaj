<?php
namespace app\class;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class Session {

    public $idSession;
    public $wording;
    public $theme;
    public $description;
    public $timeBegin;
    public $timeEnd;
    public $state;

    public function __construct(object $obj) {
        $this->idSession = $obj->idSession;
        $this->wording = $obj->wording;
        $this->theme = $obj->theme;
        $this->description = $obj->description;
        $this->timeBegin = $obj->timeBegin;
        $this->timeEnd = $obj->timeEnd;
        $this->state = $obj->state;
    }

    public function setLineXLS(Worksheet $sheet, int $line){
        $sheet->setCellValue('A'.$line , $this->idSession);
        $sheet->setCellValue('B'.$line , $this->wording);
        $sheet->setCellValue('C'.$line , $this->theme);
        $sheet->setCellValue('D'.$line , $this->description);
        $sheet->setCellValue('E'.$line , $this->timeBegin);
        $sheet->setCellValue('F'.$line , $this->timeEnd);
    }
}