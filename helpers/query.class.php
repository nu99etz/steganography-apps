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

        require_once($config['app_include']. 'adodb5/adodb.inc.php');

        $conn = ADONewConnection($config['db_driver']);
        if($config['db_driver'] == 'mysqli') {
            $conn->Connect($config['db_host'],$config['db_user'],$config['db_pass'],$config['db_name']);
        } else if($config['db_driver'] == 'postgres') {
            $conn->Connect('host='.$config['db_host'].' port='.$config['db_port'].' dbname='.$config['db_name'].' user='.$config['db_user'].' password='.$config['db_pass']);
        }
        return $conn;
    }

    /**
     * Fungsi Mendapatkan Query Dasar Tabel
     *
     * @return $sql
     */
    public static function baseQuery() {
        $sql = 'SELECT*FROM '.static::getTable();
        return $sql;
    }

    /**
     * Fungsi Menampilkan Seluruh Data Array
     *
     * @return $sql
     */
    public static function getAll() {
        $conn = self::connect();
        $row = $conn->getAll(self::baseQuery());
        return $row;
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
    public function recInsert($record) {
        $conn = Query::connect();
        $col = $conn->SelectLimit("select*from ".static::getTable(),1);
        $sql = $conn->GetInsertSQL($col,$record);
        $rs = $conn->Execute($sql);
        return $conn->ErrorNo();
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
    // public static function getAll() {
    //     $conn = self::connect();
    //     $getQuery = self::getQuery(self::baseQuery());
    //     $string = $conn['query']."fetch_array";
    //     while($result = $string($getQuery)) {
    //       $all[] = $result;
    //     }
    //     return @$all;
    // }

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
