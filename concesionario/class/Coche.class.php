<?php
class Coche {
    private $nbastidor;
    private $marca;
    private $color;
    private $nmarchas;//Número de marcha más alto
    private $marcha_actual;
    private $estado; //0-parado 1-arrancado
    
         public function __construct($nbastidor="",$marca="",$color="",$nmarchas=5,$marcha_actual=0,$estado=0) {
            $this->nbastidor=$nbastidor;
            $this->marca=$marca;
            $this->color=$color;            
            
            if ($nmarchas<4)
                $this->nmarchas=4;
            elseif ($nmarchas>6)
                $this->nmarchas=6;
            else 
                $this->nmarchas=$nmarchas;
                  
            if ($marcha_actual<-1)
                $this->marcha_actual=-1;                
            elseif ($marcha_actual>6)
                $this->marcha_actual=6;
            else
                $this->marcha_actual=$marcha_actual;            
            if ($marcha_actual!=0)
                $this->estado=1;
            if ($estado>1 && $estado<0)
                $this->estado=0;
         }
        
        public function getNbastidor() {
            return $this->nbastidor;
        }

        public function getNpuertas() {
            return $this->npuertas;
        }

        public function getMarca() {
            return $this->marca;
        }

        public function getColor() {
            return $this->color;
        }

        public function getNmarchas() {
            return $this->nmarchas;
        }

        public function getMarcha_actual() {
            return $this->marcha_actual;
        }
        
        public function getEstado(){
            return $this->estado;
        }               

        public function setNbastidor($nbastidor) {
            $this->nbastidor = $nbastidor;
        }

        public function setNpuertas($npuertas) {
            $this->npuertas = $npuertas;
        }

        public function setMarca($marca) {
            $this->marca = $marca;
        }

        public function setColor($color) {
            $this->color = $color;
        }

        public function setNmarchas($nmarchas) {
            if ($nmarchas<4)
                $this->nmarchas=4;
            elseif ($nmarchas>6)
                $this->nmarchas=6;
            else
                $this->nmarchas=$nmarchas;
        }

        public function setMarcha_actual($marcha_actual) {
            if ($marcha_actual<-1)
                $this->marcha_actual=-1;
            elseif ($marcha_actual>6)
                $this->marcha_actual=6;
            else 
                $this->marcha_actual = $marcha_actual;
        }
        
        public function setEstado($estado) {
            if ($estado>=0 && $estado<=1)
               $this->estado=$estado;
            
        }
        
        public function subirMarcha(){
           if ($this->nmarchas>$this->marcha_actual){
               $this->marcha_actual =  $this->marcha_actual+1;
               return true;
           }
           else
               return false;
        }
	
	public function bajarMarcha(){
            if ($this->marcha_actual>-1)
                $this->marcha_actual =  $this->marcha_actual-1;
		}
        
        public function arrancarEstado(){
            if ($this->estado==0)                
                $this->estado=1;                         
            
        }
        
        public function pararEstado(){
            if ($this->estado==1)                
                $this->estado=0;
            
        }
            
}
?>
