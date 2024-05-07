<?php
    class Hewan {
        public $nama;
        public function cetakNama() {
            return $this->nama;
        } 
    }
    $hewan = new Hewan();
    $hewan->nama = "Kucing";
    echo $hewan->cetakNama();  
?>
<hr>
<?php
    class Siswa {
        protected $nama ;
        protected function cetakNama() {
            return $this->nama;
        }
    }

    class Kelas extends Siswa{
        public $kelas;
        function __construct($nama, $kelas) {
            $this->kelas = $kelas;
            $this->nama = $nama;
        }
        function cetakAll() {
            return $this->kelas. $this->nama;
        }
    }
    $siswa = new Kelas("Asep", "XI RPL 1");
    echo "<br>";
    echo $siswa->cetakAll();
?>