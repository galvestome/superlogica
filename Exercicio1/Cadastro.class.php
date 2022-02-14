<?php

class Cadastro {

    /**
    * @param string $nome_da_tabela nome da tabela na qual vai inserir os dados
    * @param array informacao é um array com os mesmos nomes dos elementos do form
    */
    public function insert(string $nomeDaTabela, array $informacao): int {

        $senhaMD5 = MD5($informacao['password']);

        //Verifica se ja existe
        $sql = $pdo->prepare("SELECT id FROM :tabela WHERE userName = :userName");
        $sql->execute(array(
            ':tabela' => $nomeDaTabela,
            ':username' => $informacao['userName']
        ));

        if ($sql->rowCount() > 0) {
            echo 'Usuário ja cadastrado!';
            return false;
        } else {
            $sql = $pdo->prepare('INSERT INTO :tabela (name, userName, zipCode, email, password) VALUES(:name, :userName, :zipCode, :email, :password)');
            $sql->execute(array(
              ':tabela' => $nomeDaTabela,  
              ':name' => $informacao['name'],
              ':userName' => $informacao['userName'],
              ':zipCode' => $informacao['zipCode'],
              ':email' => $informacao['email'],
              ':password' => MD5($informacao['password'])
            ));

            echo $sql->rowCount();
            return true;
        }
    }

    /**
    * @param string $nome_da_tabela nome da tabela na qual vai inserir os dados
    * @param array informacao é um array com os mesmos nomes dos elementos do form
    */
    public function select(string $nomeDaTabela): int {

        $sql = $pdo->prepare("SELECT * FROM :tabela");
        $sql->execute(array(
            ':tabela' => $nomeDaTabela
        ));

        while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            echo "Nome: {$linha['name']}<br /> Usuário: {$linha['userName']}<br /> Usuário: {$linha['email']}<br /> Usuário: {$linha['zipCode']}<br />";
        }
    }
}