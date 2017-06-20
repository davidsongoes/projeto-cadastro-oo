<?php
include(__DIR__ . '/../layout/header.php');
use components\Helper;

?>
    <div class="row">
        <div class="col-lg-2">
            <?php include(__DIR__ . '/../layout/menu.php'); ?>
        </div>
        <div class="container-fluid margem_direita">
            <div class="col-lg-10">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?c=usuario&acao=exibir">Lista de Usuários</a>
                    </li>
                    <li class="breadcrumb-item active">Editar Novo Usuário
                        - <?php echo (!empty($usuario->id)) ? strtolower($usuario->login) : "Novo Cadastro"; ?></li>
                </ol>
                <h1>Editar meus dados</h1>
                <form class="form-horizontal" role="form" method="post" action="index.php?c=usuario&acao=editarUsuario">
                    <input type="hidden" name="id" value="<?php echo $usuario->id ?>"/>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="saram" class="col-sm-2 control-label">Saram:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="saram" placeholder="Saram"
                                           name="saram" required="required" value="<?= $usuario->saram ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="login" class="col-sm-2 control-label">Login</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="login" placeholder="login" name="login"
                                           required="required" value="<?php echo $usuario->login ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label">Nome Completo:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nome" placeholder="nome" name="nome"
                                           required="required" value="<?php echo $usuario->nome ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">E-mail Intraer</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email"
                                           placeholder="exemplo@depens.intraer" name="email" required="required"
                                           value="<?php echo $usuario->email ?>">
                                </div>
                            </div>
<!--                            <div class="form-group">-->
<!--                                <label for="grupo" class="col-sm-2 control-label">Grupo</label>-->
<!--                                <div class="col-sm-10">-->
<!--                                    <select type="text" class="form-control" id="grupo" name="grupo"-->
<!--                                            required="required">-->
<!--                                        <option value="--><?php //echo $usuario->grupo ?><!--">--><?php //echo Helper::$grupos[$usuario->grupo] ?><!--</option>-->
<!--                                        --><?php //foreach (Helper::$grupos as $chave => $grupo): ?>
<!--                                            <option value="--><?//= $chave; ?><!--">--><?//= $grupo ?><!--</option>-->
<!--                                        --><?php //endforeach; ?>
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="form-group">
                                <label for="ativo" class="col-sm-2 control-label">Ativo</label>
                                <div class="col-sm-10">
                                    <select type="text" class="form-control" id="ativo" name="ativo"
                                            required="required">
                                        <option value="<?php echo $usuario->ativo ?>"><?php echo Helper::$ativo[$usuario->ativo] ?></option>
                                        <?php foreach (Helper::$ativo as $chave => $ativo): ?>
                                            <option value="<?= $chave; ?>"><?= $ativo ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-warning"><span
                                                class="glyphicon glyphicon-pencil"></span> Editar
                                    </button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

<?php include(__DIR__ . '/../layout/footer.php'); ?>
