<?php

/**
 * Kumpulan Fungsi DML
 *
 * @author nugraha
*/

class Query {


    /**
     * Fungsi Koneksi Database
     *
     *
     * @return $conn
     */
    public function connect() {
        global $config;

        $conn = array();
        if($config['db_driver'] == 'mysql') {
            $conn['connect'] = mysqli_connect("$config[db_host]","$config[db_user]","$config[db_pass]","$config[db_name]");
            $conn['query'] = 'mysqli_';
        } else if(($config['db_driver'] == 'postgres')) {
            $conn['connect'] = pg_connect("host=$config[db_host] port=$config[db_port] dbname=$config[db_name] user=$config[db_user] password=$config[db_pass]");
            $conn['query'] = 'pg_';
        }
        return $conn;
    }

    /**
     * Fungsi Basic Query()
     *
     * @param $key = null
     * @return $query
     */
    public function getQuery($key = null) {
        $conn = self::connect();
        $query = $conn['query']."query";
        return $query($conn['connect'],$key);
    }

    /**
     * Fungsi Menampilkan Seluruh Data Di Table
     *
     * @return $sql
     */
    public static function baseQuery() {
        $sql = 'SELECT*FROM '.static::getTable();
        return $sql;
    }

    /**
     * Fungsi Menghitung Seluruh Data Di Table
     *
     * @param $param = null
     * @return $num_rows
     */
    public function countall($param = null) {
        $conn = self::connect();
        $string = $conn['query']."num_rows";

        if($param != null) {
            $num_rows = $string(self::all());
        } else {
            $num_rows = $string($param);
        }
        return $num_rows;
    }

    /**
     * Fungsi Menampilkan Record dari Table Sesuai Kondisi Yang Diinginkan
     *
     * @param $id = string,int
     * @return $sql
     */
    public function getCondition($conditions) {
        $where = array();
        foreach($conditions as $condition => $value) {
          if(is_numeric($condition)) {
            $where[] = $value;
          } else if(is_string($condition)) {
              $list = explode(' ', $condition);
              $field = $list[0];
              unset($list[0]);
              $operator = implode(' ',$list);
              if(empty($operator)) {
                $operator = '=';
              }
              if(is_null($value)) {
                $where[] = $field . ' ' . $operator . ' NULL';
              } else {
                if(is_numeric($value)) {
                  $where[] = $field . ' ' . $operator . ' \'' . $value . '\'';
                } else if(is_string($value)) {
                    $where[] = $field . ' ' . $operator . ' \'' . $value . '\'';
                } else if(is_array($value)) {
                    $where[] = $field . ' ' . ' (\'' . implode("','",$value) . '\')';
                }
              }
            }
          }
          if(!empty($where)) {
            return static::baseQuery() . ' WHERE ' . implode(' AND ',$where);
          } else {
            return static::baseQuery();
          }
    }

    /**
     * Fungsi Menghapus Record dari Table
     *
     * @param $id = string,int
     * @return $sql
     */
    public function recDelete($id) {
        $query = 'DELETE FROM ' .static::getTable(). ' WHERE ' .static::getColumn(). ' = ' ."'$id'";
        $sql = self::getQuery($query);
        return $sql;
    }

    /**
     * Fungsi Menambah Record Ke Table
     *
     * @param $fillable
     * @param $key = is_null(var)
     * @return $query
     */
    public function recInsert($fillable, $key = null) {
        $insert = 'INSERT INTO ' .static::getTable();
        $insert .= " (";
        for($j=0;$j<count($fillable);$j++) {
            if($j==count($fillable)-1){
                $insert .= "$fillable[$j]";
            } else {
                $insert .= "$fillable[$j]".',';
            }
        }
        $insert .= ") VALUES ";
        $insert .= "(";
        for($i=0;$i<count($key);$i++) {
            if($i==count($key)-1){
                if($i==0) {
                    $insert .= 'DEFAULT';
                } else {
                    $insert .= "'$key[$i]'";
                }
            } else {
                if($i==0) {
                    $insert .= 'DEFAULT'.',';
                } else {
                    $insert .= "'$key[$i]',";
                }
            }
        }
        $insert .= ")";
        $query = self::getQuery($insert);
        return $query;
    }

    /**
     * Fungsi Mengedit Record Ke Table
     *
     * @param $fillable
     * @param $key = is_null(var)
     * @param $id
     * @return $query
     */
    public function recUpdate($fillable,$key = null,$id) {
        $update =  'UPDATE '.static::getTable().' SET ';
        for($i=0;$i<count(static::getFillable())-1;$i++) {
          $set_num = $i+1;
            if($i==count($fillable)-2){
                $update .= "$fillable[$set_num] = '$key[$set_num]' ";
            } else {
                $update .= "$fillable[$set_num] = '$key[$set_num]', ";
            }
        }
        $update .= ' WHERE '.static::getColumn(). ' = '.$id;
        $query = self::getQuery($update);
        return $query;
    }

    /**
     * Fungsi Menampilkan Data Berupa Array
     *
     * @param $param
     * @return $all = Array
     */
    public static function getArray($param) {
        $conn = self::connect();
        $getQuery = self::getQuery($param);
        $string = $conn['query']."fetch_assoc";
        while($result = $string($getQuery)) {
          $all[] = $result;
        }
        return @$all;
    }

    /**
     * Fungsi Menampilkan Data Berupa Array
     *
     * @param $param
     * @return $all = Array
     */
    public static function getCombo() {
        $conn = self::connect();
        $getQuery = self::getQuery(self::baseQuery());
        $string = $conn['query']."fetch_array";
        while($result = $string($getQuery)) {
          $all[] = $result;
        }
        return @$all;
    }

    /**
     * Fungsi Menampilkan Data Berupa Array
     *
     * @param $param
     * @return $all = Array
     */
    public static function getAll() {
        $conn = self::connect();
        $getQuery = self::getQuery(self::baseQuery());
        $string = $conn['query']."fetch_array";
        while($result = $string($getQuery)) {
          $all[] = $result;
        }
        return @$all;
    }

    /**
     * Fungsi Menampilkan Data Berupa Array Tapi Single Record
     *
     * @param $param
     * @return $all = Array
     */
    public static function getSelf($param) {
        $conn = self::connect();
        $getQuery = self::getQuery($param);
        $string = $conn['query']."fetch_array";
        while($result = $string($getQuery)) {
          $all[] = $result;
        }
        return @$all;
    }
}
