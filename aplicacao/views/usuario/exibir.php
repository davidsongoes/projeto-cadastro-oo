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
                <!--        Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Lista de Usuários</li>
                </ol>
                <h1>Lista de Usuários</h1>
                <?php
                \components\Helper::mostraAlerta("success");
                \components\Helper::mostraAlerta("warning");
                \components\Helper::mostraAlerta("danger");
                ?>
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control input-sm" placeholder="Buscar"/>
                        <span class="input-group-btn">
                        <button class="btn btn-default btn-sm" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                    </div>
                </div>
                <br>
                <table class="table table-responsive table-striped">
                    <tr>
                        <th style="text-align: center">ID</th>
                        <th style="text-align: center">Login</th>
                        <th style="text-align: center">Nome</th>
                        <th style="text-align: center">Ativo?</th>
                        <th style="text-align: center">Grupo</th>
                        <th style="text-align: center">Opções</th>
                    </tr>
                    <?php foreach ($usuarios as $usuario): ?>
                    <tr class="alinhamento">
                        <td><?php echo $usuario->id ?></td>
                        <td><?php echo $usuario->login ?></td>
                        <td><?php echo $usuario->nome; ?></td>
                        <td><?php echo Helper::$ativo[$usuario->ativo]; ?></td>
                        <td><?php echo Helper::$grupos[$usuario->grupo]; ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Ações <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="index.php?c=usuario&acao=detalhe&id=<?php echo $usuario->id; ?>">Detalhes</a>
                                    </li>
                                    <li>
                                        <a href="index.php?c=usuario&acao=editar&id=<?php echo $usuario->id; ?>">Editar</a>
                                    </li>
                                    <li>
                                        <a href="index.php?c=usuario&acao=remover&id=<?php echo $usuario->id; ?>">Excluir</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
<?php include(__DIR__ . '/../layout/footer.php'); ?>