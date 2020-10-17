<?php 
class ConexionBD {
     private $cn = null;
     public function getConecta() {
        if ($this->cn == null) {
            $this->cn = @mysqli_connect("localhost", "u437250555_sistemaqr","Sistema20-","u437250555_sistemaqr");
         }
         return $this->cn;
      }
    }
 ?>