<?php 
class ConexionBD {
     private $cn = null;
     public function getConecta() {
        if ($this->cn == null) {
            $this->cn = @mysqli_connect("sql254.main-hosting.eu", "u437250555_sistemaqr","Sistema20-","u437250555_sistemaqr");
         }
         return $this->cn;
      }
    }
 ?>