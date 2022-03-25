<?php

require_once 'calculadora.php';

class processaDados {
    
    public function __construct() {
        $this->processaDados();
    }
    
    private function processaDados() {
        

        if(isset($_POST['number'])){
            if(!isset($_SESSION['num1'])){
                $_SESSION['num1'] = $_POST['number'];
                $_SESSION['valor_visor'] = $_SESSION['num1'] ;
            } else if(!isset($_SESSION['operador'])){
                $_SESSION['num1'] .= $_POST['number'];
                $_SESSION['valor_visor'] = $_SESSION['num1'] ;
            } else if(!isset($_SESSION['num2'])){
                $_SESSION['num2'] = $_POST['number'];
                $_SESSION['valor_visor'] = $_SESSION['num2'] ;
            } else {
                $_SESSION['num2'] .= $_POST['number'];
                $_SESSION['valor_visor'] = $_SESSION['num2'] ;
            }
        }
        

        if(isset($_POST['operador'])){
            if($_POST['operador'] === 'C'){
                $this->limpar();
            } else if($_POST['operador'] === '=' || isset($_SESSION['operador'])){
                $this->calcula($_SESSION['operador']);
            } else {
                $_SESSION['operador'] = $_POST['operador'];
            }
        }
    } 

    private function limpar(){
        session_destroy();
        session_start();
    }
    
    private function calcula($sOperador) {
        switch ($sOperador) {
            case '+':
                $_SESSION['num1'] = Calculadora::soma($_SESSION['num1'], $_SESSION['num2']);
                break;
            case '-':
                $_SESSION['num1'] = Calculadora::subrtracao($_SESSION['num1'], $_SESSION['num2']);
                break;
            case 'X':
                $_SESSION['num1'] = Calculadora::multiplicacao($_SESSION['num1'], $_SESSION['num2']);
                break;
            case '%':
                $_SESSION['num1'] = Calculadora::divisao($_SESSION['num1'], $_SESSION['num2']);
                break;
        }
        $_SESSION['reset'] = true;
        $_SESSION['operador'] = null;
        $_SESSION['num2'] = null;
        $_SESSION['valor_visor'] = $_SESSION['num1'];
    }
    
    private function isNumero($iNumero) {
        $aNumeros = ['zero', 1, 2, 3, 4, 5, 6, 7, 8, 9];
        return in_array($iNumero, $aNumeros);
    }

    public function __destruct() {
        header('Location: index.php');
    }
    
}
