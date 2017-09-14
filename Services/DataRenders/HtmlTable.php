<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    13/09/17
 * Time:    12:57
 * Project: opus-symfony
 * File:    HtmlTable.php
 *
 **/

namespace PartFire\CommonBundle\Services\DataRenders;


class HtmlTable implements DataRenderInterface
{
    public function getOutput(array $data) : string
    {
        return $this->generateTable($data);
    }

    private function generateTable(array $data) : string
    {
        $html = "";
        $html .= '<table style="width:100%">';
        $html .= $this->getTableHeaders($data[0]);
        $html .= $this->getTableData($data);
        $html .= '</table>';

        return $html;
    }

    private function getTableData(array $data) : string
    {
        $html = "";
        foreach($data as $row) {
            $html .= $this->getTableRowBegin();
            foreach ($row as $name => $value) {
                $html .= $this->getTableCellBegin() . $value . $this->getTableCellEnd();
            }
            $html .= $this->getTableRowEnd();
        }

        return $html;
    }

    private function getTableHeaders(array $data) : string
    {
        $html = "";
        $html .= $this->getTableRowBegin();
            foreach($data as $name => $value) {
                $html .= $this->getTableHeaderBegin() . $name . $this->getTableHeaderEnd();
            }
        $html .= $this->getTableRowEnd();

        return $html;
    }

    private function getTableCellBegin() : string
    {
        return '<td>';
    }

    private function getTableCellEnd() : string
    {
        return '</td>';
    }

    private function getTableHeaderBegin() : string
    {
        return '<th>';
    }

    private function getTableHeaderEnd() : string
    {
        return '</th>';
    }

    private function getTableRowBegin() : string
    {
        return '<tr>';
    }

    private function getTableRowEnd() : string
    {
        return '</tr>';
    }
}