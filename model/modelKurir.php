<!--Fathoni IBrahim basyir Uluputty (205150201111057)-->

<?php 

class ModelKurir extends Model 
{
    private $table = "Kurir";//nama tabel
    
    public function getColumnName()
    {
        $sql = "SELECT COLUMN_NAME
        from INFORMATION_SCHEMA.COLUMNS
        where TABLE_NAME='{$this->table}'";
        $this->db->query($sql);
        $this->db->execute();
        return $this->db->resultSet();

    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM '.$this->table);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE ID_kurir = :id";
        $this->db->query($sql);
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->single();
    }

    public function add($nama,  $noHp, $lokasi)
    {
        $sql = 'INSERT INTO '.$this->table.' VALUES (:nama, :no_hp, :lokasi)';
        $this->db->query($sql);
        $this->db->bind('nama',$nama);
        $this->db->bind('no_hp',$noHp);
        $this->db->bind('lokasi',$lokasi);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE ID_kurir = :id";
        $this->db->query($sql);
        $this->db->bind('id',$id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllIdName()
    {
        $this->db->query('SELECT ID_kurir, nama FROM '.$this->table);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function editById($id, $newNama, $newNoHp, $newLokasi)
    {
        $sql = "UPDATE {$this->table} SET 
        nama = :nama, 
        no_hp = :no_hp,
        lokasi = :lokasi
        WHERE ID_kurir = :id;";
        $this->db->query($sql);
        
        $this->db->bind('nama',$newNama);
        $this->db->bind('no_hp',$newNoHp);
        $this->db->bind('lokasi',$newLokasi);
        $this->db->bind('id',$id);

        $this->db->execute();

        return $this->db->rowCount();
    }

}


?>
