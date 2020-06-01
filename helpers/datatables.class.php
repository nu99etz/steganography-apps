<?php

class DataTables {

    public static function getDataTables($tables) {
        return "<script>
        $(document).ready(function(){
            $('#$tables').DataTable();
        })
        </script>";
    }
}