<?php

class Table {

    private function table_def($class = null, $id = null) {
        return "<table class = '$class' id = '$id' >
            <thead>";
    }

    public static function column($class = null, $id = null,$key = null) {
        $table = self::table_def($class,$id);
        $table .= "<tr>";
        for($i=0;$i<count($key);$i++) {
            $table .= "<th scope='col'>$key[$i]</th>";
        }
        $table .= "</tr>
        </thead>";
        return $table;
    }

    public static function columndata($all = null, $rows = null,$key = null) {  
        $table = "<tbody>";
        $no = 1;
        for($i=0;$i<$rows;$i++){
            $table .= "<tr>";
            $table .= "<td>".$no++."</td>";
            for($j=0;$j<count($key);$j++) {
                $table .= "<td>".$all[$i][$j]."</td>";
            }
            $table .= "<td><a href = ".Route::Delete($key[0]."=".$all[$i][0]).">";
            $table .= "Delete </a>";
            $table .= "<a href = ".Route::Edit($key[0]."=".$all[$i][0]).">";
            $table .= "Update</a></td>";
            $table .= "</tr>";
        }
        $table .= "</tbody>";
        $table .= "</table>";      
        return $table;
    }
}