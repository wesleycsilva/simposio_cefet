<?php

class FuncaoUser
{
    public static function mask($valor, $mask)
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == '#') {
                if (isset($valor[$k])) {
                    $maskared .= $valor[$k++];
                }
            } else {
                if (isset($mask[$i])) {
                    $maskared .= $mask[$i];
                }
            }
        }
        return $maskared;
    }

    public static function removeCaracter($telefone)
    {
        $caracteres = array("(", ")", "-", " ");
        $telefone = str_replace($caracteres, "", $telefone);
        $telefone = preg_replace("/[^0-9.]/", "", $telefone);
        return $telefone;
    }

    public function maskTel($telefone)
    {
        $telefone = self::removeCaracter($telefone);

        $telefone = ltrim($telefone, '0');

        if (strlen($telefone) == 10) {
            $telefone = self::mask($telefone, '(##) ####-####');
        } elseif (strlen($telefone) == 11) {
            $telefone = self::mask($telefone, '(##) #####-####');
        } else {
            $telefone = $telefone;
        }

        return $telefone;
    }

    public function maskCpf($cpf)
    {
        $cpf = self::removeCaracter($cpf);

        $cpf = self::mask($cpf, '###.###.###-##');

        return $cpf;
    }

    public function maskDataBr($data)
    {
        list($ano, $mes, $dia) = explode("-", $data);

        $data = $dia . $mes . $ano;

        $data = self::mask($data, '##/##/####');

        return $data;
    }

    public static function generatePassword($qtyCaraceters = 8)
    {
        //Letras minúsculas embaralhadas
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');

        //Letras maiúsculas embaralhadas
        $capitalLetters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');

        //Números aleatórios
        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;

        //Caracteres Especiais
        $specialCharacters = str_shuffle('!@#$%*-');

        //Junta tudo
        $characters = $capitalLetters.$smallLetters.$numbers.$specialCharacters;

        //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
        $password = substr(str_shuffle($characters), 0, $qtyCaraceters);

        //Retorna a senha
        return $password;
    }
}