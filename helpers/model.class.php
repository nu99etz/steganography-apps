<?php

/**
 * Kumpulan Fungsi Model Untuk Mempermudah Mendapatkan Nama Tabel terkait
 *
 * @author nugraha
*/

include('../config/autoload.php');

class Model extends Query {


    const table = null;
    const schema = null;
    const fillable = null;

    /**
     * Fungsi Memberi Schema Tabel
     *
     * @param $schema = null
     * @return $schema
     */
    public static function getSchema($schema = null) {
        if(empty($schema)) {
            $schema = static::schema;
        } else {
            $schema = $schema;
        }
        return $schema;
    }

    /**
     * Fungsi Mendapatkan Nama Tabel
     *
     * @param $table = null
     * @return $table
     */
    public static function getTable($table = null) {
        if(empty($table)) {
            if(static::getSchema() != null) {
                $table = static::getSchema().'.'.static::table;
            } else {
                $table = static::table;
            }
        } else {
            if(static::getSchema() != null) {
                $table = static::getSchema().'.'.$table;
              } else {
                $table = $table;
              }
            }
        return $table;
    }

    /**
     * Fungsi Mendapatkan Nama Kolom
     *
     * @param $column = null
     * @return $column
     */
    public static function getColumn($column = null) {
        if(empty($column)) {
            $column = static::column;
        } else {
            $column = $column;
        }
        return $column;
    }

    /**
     * Fungsi Mendapatkan Nama Kolom Fillable
     *
     * @param $fillable = null
     * @return $column
     */
    public static function getFillable($fillable = null) {
        if(empty($fillable)) {
            $fillable = static::fillable;
        } else {
            $fillable = $fillable;
        }
        return $fillable;
    }

    public static function getDataField($condition) {
      $sql = self::baseQuery().' WHERE '.static::getColumn().' = '.$condition;
      //$query = self::getQuery($sql);
      return self::getSelf($sql);
    }
}
