<?php
/**
 * Created by PhpStorm.
 * User: santana
 * Date: 27/01/15
 * Time: 14:56
 */
namespace models;

use components\PHPMailer;
use components\View;
use models\base\AbstractModel;

Class Usuario extends UsuarioDAO{
    public $saram;
    public $nome;
    public $login;
    public $email;
    public $senha;
    public $ativo;
    public $grupo;

    static public function buscaUsuario($dados){
        AbstractModel::verificaDados($dados);
        $result = AbstractModel::query(self::QUERY_UNICO,array(':login' => $dados['login'], ':senha' => md5($dados['senha'])));
        if($result){
            $usuario = new Usuario();
            $usuario->id = $result['id'];
            $usuario->saram = $result['saram'];
            $usuario->nome = $result['nome'];
            $usuario->login = $result['login'];
            $usuario->senha = $result['senha'];
            $usuario->email = $result['email'];
            $usuario->ativo = $result['ativo'];
            $usuario->grupo = $result['grupo'];
        }
        return isset($usuario) ? $usuario : NULL;
    }
    static public function adicionaUsuario($dados)
    {
        AbstractModel::verificaDados($dados);
        try {
            AbstractModel::executar(self::QUERY_INSERT,array(
                ':saram' => $dados['saram'],
                ':nome' => $dados['nome'],
                ':login' => $dados['login'],
                ':senha' => md5($dados['senha']),
                ':email' => $dados['email'],
                ':ativo' => $dados['ativo'],
                ':grupo' => $dados['grupo']
            ));
            return true;
        } catch (\PDOException  $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function cadastraUsuario($dados){

    }

    static public function editaUsuario($dados)
    {
        try {
            AbstractModel::executar(self::QUERY_ALTER_USER, array(
                ':id' => $dados['id'],
                ':saram' => $dados['saram'],
                ':nome' => $dados['nome'],
                ':login' => $dados['login'],
                ':email' => $dados['email'],
                ':grupo' => $dados['grupo'],
                ':ativo' => $dados['ativo']
            ));
            return true;
        } catch (\PDOException  $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    static public function buscarTodos(){
        $consulta = AbstractModel::queryAll(self::QUERY_ALL, null);
        $usuarios = array();
        foreach($consulta as $result){
            $usuario = new Usuario();
            $usuario->id = $result['id'];
            $usuario->login = $result['login'];
            $usuario->saram = $result['saram'];
            $usuario->nome = $result['nome'];
            $usuario->ativo = $result['ativo'];
            $usuario->grupo = $result['grupo'];
            $usuarios[] = $usuario;
        }
        return $usuarios;
    }
    static public function listaSolucionador(){
        $consulta = AbstractModel::queryAll(self::QUERY_POR_GRUPO, array(':grupo' => '3'));
        foreach($consulta as $result){
            $usuario = new Usuario;
            $usuario->id = $result['id'];
            $usuario->nome = $result['nome'];
            $usuarios[] = $usuario;
        }
        return $usuarios;
    }
    static public function buscarPorId($id){
        $result = AbstractModel::query(self::QUERY_POR_ID, ARRAY(':id' => $id));
        if($result){
            $usuario = new Usuario();
            $usuario->id = $result['id'];
            $usuario->saram = $result['saram'];
            $usuario->nome = $result['nome'];
            $usuario->login = $result['login'];
            $usuario->grupo = $result['grupo'];
            $usuario->email = $result['email'];
            $usuario->senha = $result['senha'];
            $usuario->ativo = $result['ativo'];
        }
        return isset($usuario) ? $usuario : NULL;
    }
    static public function buscaPorEmail($dados){
        $result = AbstractModel::query(self::QUERY_POR_EMAIL, array(':email' => $dados['email']));
        if(result){
            $usuario = new Usuario();
            $usuario->nome = $result['nome'];
            $usuario->login = $result['login'];
            $usuario->senha = $result['senha'];
            $usuario->email = $result['email'];
            $usuario->dataNascimento = $result['data_nascimento'];
        }
        return isset($usuario) ? $usuario : NULL;
    }
    static public function resetaSenha($dados){
        AbstractModel::verificaDados($dados);
        $usuario = Usuario::buscaPorEmail($dados);
        if($usuario->email == null){
            return false;
        }else{
            $senhaNova = Usuario::dataSenha($usuario->dataNascimento);
        }
        $dados = ['senha' => $senhaNova, 'email' => $usuario->email];
        AbstractModel::executar(self::QUERY_RESET_SENHA, array(':senha' => md5($senhaNova), ':email' => $usuario->email));
        Usuario::enviarEmail($dados);

        return true;
    }
    public function remover()
    {
        AbstractModel::executar(self::DElETE_BY_ID, array(':id' => $this->id));
    }
    static public function enviarEmail($dados){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.brasilia.intraer";
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "bacula" ;
        $mail->Password ="123123" ;
        $mail->From = "bacula@depens.intraer";
        $mail->FromName = "Sistema de OS";
        $mail->addAddress("{$dados['email']}", "Your"); //QuemRecebe
        $mail->Subject = "Recuperar senha";
        $mail->IsHTML(true);
        $mail->Body    = Usuario::conteudoEmail($dados);
        $mail->AltBody = 'Navegador nao suportado';
        $mail->send();
    }
    static public function conteudoEmail($dados){
        return "sua senha eh  ".$dados['senha'];
    }
    static public function dataSenha($data){
        $arrayData = explode('-',$data);
        $data = $arrayData[2].$arrayData[1].$arrayData[0];
        return $data;
    }
    static public function alteraSenha($dados){
        if(AbstractModel::verificaDados($dados)){
        $usuario = Usuario::buscarPorId($dados['id']);
            if((md5($dados['senha_atual'])) == $usuario->senha){
                AbstractModel::executar(self::QUERY_RESET_SENHA,array(
                    ':senha' => md5($dados['nova_senha']),
                    ':email' => $usuario->email,
                ));
                return true;
            }else{
                return false;
            }

        }
    }
}