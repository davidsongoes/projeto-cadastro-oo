<?php use components\Helper;
include(__DIR__ . '/../layout/header.php');
?>
<div class="row">
    <div class="col-lg-3">
        <?php  include(__DIR__ . '/../layout/menu.php');?>
    </div>
    <div class="col-lg-9">
<h1>Nova Ordem de Serviço</h1>
        <p>Preencha os campos conforme a necessidade do seu serviço</p>
        <hr/>
    <form  role="form" method="post" action="index.php?c=chamado&acao=novoChamado">
        <div class="form-group">
            <label for="prioridade" >Prioridade</label>
            <select type="text" class="form-control input_menor" id="prioridade_id" name="prioridade" required="required">
                <option value="<?php echo $chamado->prioridade?>"><?php echo Helper::$prioridades[$chamado->prioridade] ?></option>
                <?php  foreach(Helper::$prioridades as $chave => $prioridade):?>
                    <option value="<?=$chave;?>"><?=$prioridade?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tipo_id">Tipo</label>
                <select type="text" class="form-control input_menor" id="tipo_id" name="tipo" required="required">
                    <option value="<?php echo $chamado->tipo?>"><?php echo Helper::$tipos[$chamado->tipo] ?></option>
                    <?php  foreach(Helper::$tipos as $chave => $tipo):?>
                        <option value="<?=$chave;?>"><?=$tipo?></option>
                    <?php endforeach; ?>
                </select>
        </div>
        <div class="form-group">
            <label for="descricao">Descriçao do Serviço</label><br/>
            <textarea name="descricao" id="descricao" cols="90" rows="8" required="required"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="cadastrar" value="Cadastrar"/>
        </div>


    </form>
</div>
    </div>
<?php include(__DIR__.'/../layout/footer.php'); ?>