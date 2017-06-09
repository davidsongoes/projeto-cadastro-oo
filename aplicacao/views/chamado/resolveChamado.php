<?php use components\Helper;
include(__DIR__ . '/../layout/header.php');
?>
<div class="row">
    <div class="col-lg-3">
        <?php  include(__DIR__ . '/../layout/menu.php');?>
    </div>
    <div class="col-lg-9">
<h1>Detalhe do chamado: <? echo $chamado->id; ?></h1>
        <hr/>
        <div class="row">
            <div class="col-lg-6">
                <p><b>Nome do solicitante: </b><?php echo $chamado->usuarioId->nome; ?></p>
            </div>
            <div class="col-lg-6">
                <p><b>Seção do atendimento:</b> <?php echo Helper::$secoes[$chamado->usuarioId->secao] ?></p>
                <p><b>Ramal do solicitante:</b> <?php echo $chamado->usuarioId->ramal; ?></p>
            </div>
        </div>
    <form class="form-horizontal" role="form" method="post" action="index.php?c=chamado&acao=tratarChamado">
        <div class="row">
            <input type="hidden" name="id" value="<?php echo $chamado->id; ?>"/>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="tipo_id" class="col-sm-2 control-label">Tipo</label>
                    <div class="col-sm-10">
                        <select type="text" class="form-control" id="tipo_id" name="tipo" required="required">
                            <option value="<?php echo $chamado->tipo?>"><?php echo Helper::$tipos[$chamado->tipo] ?></option>
                            <?php  foreach(Helper::$tipos as $chave => $tipo):?>
                                <option value="<?=$chave;?>"><?=$tipo?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="prioridade_id" class="col-sm-2 control-label">Prioridade</label>
                    <div class="col-sm-10">
                        <select type="text" class="form-control" id="prioridade_id" name="prioridade" required="required">
                            <option value="<?php echo $chamado->prioridade?>"><?php echo Helper::$prioridades[$chamado->prioridade] ?></option>
                            <?php  foreach(Helper::$prioridades as $chave => $prioridade):?>
                                <option value="<?=$chave;?>"><?=$prioridade?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="descricao" class="col-sm-2 control-label">Descriçao</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" name="descricao" disabled><?php echo $chamado->descricao; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="parecer_tecnico" >Parecer técnico</label><br/>
                        <textarea name="parecer_tecnico" id="parecer_tecnico" cols="50" rows="3" required="required"></textarea>
                </div>
            </div>
            <div class="col-lg-6">

            </div>
        </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" value="fechaChamado" name="trataChamado" class="btn btn-danger">Fechar Chamado</button>
                    <button type="submit" value="atualizaChamado" name="trataChamado" class="btn btn-success">Atualiza Chamado</button>
                </div>
            </div>
    </form>
    </div>
    </div>
<?php include(__DIR__.'/../layout/footer.php'); ?>