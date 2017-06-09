<?php
/**
 * Criado por PhpStorm.
 * Desenvolvedor: 3S SIN Góes
 * Data: 08/06/17
 * Hora: 14:07
 */
use components\Helper;

include(__DIR__ . '/../layout/header.php');
?>
    <div class="row">
        <div class="col-lg-3">
            <?php include(__DIR__ . '/../layout/menu.php'); ?>
        </div>
        <div class="col-lg-9">
            <!--        Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Lista do Efetivo</li>
            </ol>
            <h1>Lista do Efetivo</h1><br/>
            <!--            Busca-->
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
            <!--            Tabela-->
            <table class="table table-responsive table-striped">
                <tr>
                    <th style="text-align: center">SARAM</th>
                    <th style="text-align: center">Nome Completo</th>
                    <th style="text-align: center">Nome de Guerra</th>
                    <th style="text-align: center">Posto/Grad</th>
                    <th style="text-align: center">Situação</th>
                    <th style="text-align: center">Especialidade</th>
                    <th style="text-align: center">Quadro</th>
                    <th style="text-align: center">Seção</th>
                    <th style="text-align: center">Ramal</th>
                    <th style="text-align: center">Opções</th>
                </tr>
                <?php foreach ($efetivos as $efetivo): ?>
                    <tr class="alinhamento">
                        <td><?php echo $efetivo->saram; ?></td>
                        <td><?php echo $efetivo->posto_graduacao; ?></td>
                        <td><?php echo $efetivo->nome_completo; ?></td>
                        <td><?php echo $efetivo->nome_guerra; ?></td>
                        <td><?php echo $efetivo->situacao; ?></td>
                        <td><?php echo $efetivo->especialidade; ?></td>
                        <td><?php echo $efetivo->quadro; ?></td>
                        <td><?php echo $efetivo->secao; ?></td>
                        <td><?php echo $efetivo->ramal; ?></td>
                        <!--                    <td>-->
                        <!--                        <a href="index.php?c=efetivo&acao=detalhesMilitar&id=-->
                        <?php //echo $efetivo->id;?><!--"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>-->
                        <!--                        <a href="index.php?c=efetivo&acao=editarMilitar&id=-->
                        <?php //echo $efetivo->id;?><!--"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>-->
                        <!--                        <a href="index.php?c=efetivo&acao=excluirMilitar&id=-->
                        <?php //echo $efetivo->id;?><!--"><span class="glyphicon glyphicon-remove botaoVermelho" aria-hidden="true"></span></a>-->
                        <!--                    </td>-->
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Ações <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="index.php?c=efetivo&acao=detalhesMilitar&id=<?php echo $efetivo->id; ?>">Detalhes</a>
                                    </li>
                                    <li><a href="index.php?c=efetivo&acao=editarMilitar&id=<?php echo $efetivo->id; ?>">Editar</a>
                                    </li>
                                    <li>
                                        <a href="index.php?c=efetivo&acao=excluirMilitar&id=<?php echo $efetivo->id; ?>">Excluir</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>


        </div>
    </div>
<?php include(__DIR__ . '/../layout/footer.php'); ?>