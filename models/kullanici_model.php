<?php

/**
 * Kullanici Model sınıfı
 *
 * @author Alexander
 */
class kullanici_model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    function kullanici_ekle($kullanici_adi,$parola,$email)
    {
        $sql = "INSERT INTO demo_kullanici(kullanici_adi, parola, email) VALUES(?,?,?)";
        $this->db->query($sql, array($kullanici_adi,$parola,$email));

        if ( $this->db->insert_id() > 0 )
            return $this->db->insert_id();

        return FALSE;
    }

    function kullanici_adi_parola_ile_al($kullanici_adi,$parola)
    {
        $sql = "SELECT * FROM demo_kullanici WHERE kullanici_adi=? AND parola=?";
        $query = $this->db->query( $sql, array($kullanici_adi, $parola ));

        if( $query->num_rows() > 0 )
            return $query->row();

        return FALSE;
    }

    function kullanici_al($ozellik,$deger)
    {
        $sql = "SELECT * FROM demo_kullanici WHERE $ozellik=?";
        $query = $this->db->query( $sql, $deger);

        if( $query->num_rows() > 0 )
            return $query->result();
        
        return FALSE;
    }
}
