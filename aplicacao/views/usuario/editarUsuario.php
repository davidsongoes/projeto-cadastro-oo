<?php
include(__DIR__ . '/../layout/header.php');
use components\Helper;
?>
<div class="row">
    <div class="col-lg-3">
        <?php  include(__DIR__ . '/../layout/menu.php');?>
    </div>
    <div class="col-lg-9">

<h1>Editar meus dados</h1>
        <hr/>
    <form class="form-horizontal" role="form" method="post" action="index.php?c=usuario&acao=editarUsuario">
        <input type="hidden" name="id" value="<?php echo $usuario->id ?>"/>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="saram" class="col-sm-5 control-label">Saram:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="saram" placeholder="Saram" name="saram" required="required" value="<?=$usuario->saram?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="post_grad_id" class="col-sm-5 control-label">Posto ou graduação</label>
                    <div class="col-sm-7">
                        <select type="text" class="form-control" id="posto_graduacao" name="posto_graduacao" required="required" >
                            <option value="<?php echo $usuario->postoGraduacao?>"><?php echo Helper::$posto_graduacoes[$usuario->postoGraduacao] ?></option>
                            <?php  foreach(Helper::$posto_graduacoes as $chave => $secao):?>
                                <option value="<?=$chave;?>"><?=$secao?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="especialidade" class="col-sm-5 control-label">Especialidade</label>
                    <div class="col-sm-7">
                        <select type="text" class="form-control" id="especialidade" name="especialidade" required="required">
                            <option value="<?php echo $usuario->especialidade?>"><?php echo Helper::$especialidades[$usuario->especialidade] ?></option>
                            <?php  foreach(Helper::$especialidades as $chave => $secao):?>
                                <option value="<?=$chave;?>"><?=$secao?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-sm-5 control-label">Nome:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nome" placeholder="nome" name="nome" required="required" value="<?php echo $usuario->nome?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="data_nascimento" class="col-sm-5 control-label">Data Nascimento:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control datepicker" id="data_nascimento" placeholder="data_nascimento" name="data_nascimento" required="required" value="<?php echo $usuario->dataNascimento?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="data_ultima_promocao" class="col-sm-5 control-label">Data Ultima Promoção:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control datepicker" id="data_ultima_promocao" placeholder="data_ultima_promocao" name="data_ultima_promocao" required="required" value="<?php echo $usuario->dataUltimaPromocao?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="data_praca" class="col-sm-5 control-label">Data de Praça:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control datepicker" id="data_praca" placeholder="data_praca" name="data_praca" required="required" value="<?php echo $usuario->dataPraca?>">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="ramal" class="col-sm-5 control-label">Ramal:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="ramal" placeholder="ramal" name="ramal" required="required" value="<?php echo $usuario->ramal?>">
                    </div>
                </div>


                <div class="form-group">
                    <label for="secao" class="col-sm-5 control-label">Seção</label>
                    <div class="col-sm-7">
                        <select type="text" class="form-control" id="secao" name="secao" required="required">
                            <option value="<?php echo $usuario->secao?>"><?php echo Helper::$secoes[$usuario->secao] ?></option>
                            <?php  foreach(Helper::$secoes as $chave => $secao):?>
                                <option value="<?=$chave;?>"><?=$secao?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="login" class="col-sm-5 control-label">Login</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="login" placeholder="login" name="login" required="required" value="<?php echo $usuario->login?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">E-mail Intraer</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control" id="email" placeholder="exemplo@depens.intraer" name="email" required="required" value="<?php echo $usuario->email?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="grupo" class="col-sm-5 control-label">Grupo</label>
                    <div class="col-sm-7">
                        <input type="grupo" class="form-control" id="grupo"  name="grupo"  value="<?php echo Helper::$grupos[$usuario->grupo]?>" disabled>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="grupo" value="<?php echo $usuario->grupo ?>" />
        <div class="row">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Atualizar</button>
                </div>
            </div>
        </div>
    </form>
    </div>
    </div>

<?php include(__DIR__.'/../layout/footer.php'); ?>