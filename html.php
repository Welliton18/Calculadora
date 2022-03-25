<?php

class html {
    
    public function __construct() {
        $this->iniciaFormularioCalculadora();
        $this->criaCalculadora();
    }
    
    private function iniciaFormularioCalculadora() {
        echo '<form method="POST">
                  <table border="1" width="4" cellpadding="10" id="tabela_calculadora">
                      <tbody>';
    }
    
    private function criaCalculadora() {
        $this->criaVisor();
        $this->criaCampos(['number' => ['1', '2', '3'], 'operador' => 'X']);
        $this->criaCampos(['number' => ['4', '5', '6'], 'operador' => '-']);
        $this->criaCampos(['number' => ['7', '8', '9'], 'operador' => '+']);
        $this->criaCampos(['operador' => '%', 'zero' => '0'], false);
        $this->criaCampos(['operador' => 'C'], false);
        $this->criaCampos(['operador' => '='], false);
    }
    
    private function criaVisor() {
        $iValor = isset($_SESSION['valor_visor']) ? $_SESSION['valor_visor'] : '';
        echo "<input id='visor' type='text' disabled value='{$iValor}'>";
    }
    
    private function criaCampos(array $aCampos, $bAbreFechaTr = true) {
        if($bAbreFechaTr){
            echo '<tr>';
        }
        foreach ($aCampos as $sKey => $aValores) {
            foreach ((array) $aValores as $xValor) {
                echo "<td><input type='submit' name='{$sKey}' value='{$xValor}'></td>"; 
            }
        }
        if($bAbreFechaTr){
            echo '</tr>';
        }
    }
    
    public function __destruct() {
        $this->terminaFormularioCalculadora();
    }
    
    private function terminaFormularioCalculadora() {
        echo '</tbody>
            </table>
        </form>';
    }
    
    
}
