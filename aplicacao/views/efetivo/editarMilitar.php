<?php
include(__DIR__ . '/../layout/header.php');
use components\Helper;
use models\Efetivo;

?>
    <div class="row">
        <div class="col-lg-3">
            <?php include(__DIR__ . '/../layout/menu.php'); ?>
        </div>
        <div class="col-lg-9">

            <h1>Editar Dados</h1>
            <form class="form-horizontal" role="form" method="post" action="index.php?c=usuario&acao=editarUsuario">
                <input type="hidden" name="id" value="<?php echo $efetivo->id ?>"/>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="saram" class="col-sm-2 control-label">Saram:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="saram" placeholder="Saram" name="saram"
                                       required="required" value="<?= $efetivo->saram ?>">
                            </div>
                        </div>
                        <!--                Posto/Graduação-->
                        <div class="form-group">
                            <label for="post_grad_id" class="col-sm-2 control-label">Posto<br>Graduação</label>
                            <div class="col-sm-10">
                                <select type="text" class="form-control" id="posto_graduacao" name="posto_graduacao"
                                        required="required">
                                    <option value="<?php echo $efetivo->posto_graduacao ?>"><?php echo $efetivo->posto_graduacao ?></option>
                                    <?php foreach (Efetivo::allPostoGraduacao() as $posto_graduacao): ?>
                                        <option value="<?= $posto_graduacao['id_posto_grad'] ?>"><?= $posto_graduacao['posto_grad'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!--                Quadro-->
                        <div class="form-group">
                            <label for="especialidade" class="col-sm-2 control-label">Quadro</label>
                            <div class="col-sm-10">
                                <select type="text" class="form-control" id="quadro" name="quadro" required="required">
                                    <option value="<?php echo $efetivo->quadro ?>"><?php echo $efetivo->quadro ?></option>
                                    <?php foreach (Efetivo::allQuadro() as $quadro): ?>
                                        <option value="<?= $quadro['id_quadro'] ?>"><?= $quadro['quadro'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="especialidade" class="col-sm-2 control-label">Especialidade</label>
                            <div class="col-sm-10">
                                <select type="text" class="form-control" id="especialidade" name="especialidade"
                                        required="required">
                                    <option value="<?php echo $efetivo->especialidade ?>"><?php echo $efetivo->especialidade ?></option>
                                    <?php foreach (Efetivo::allEspecialidade() as $especialidade): ?>
                                        <option value="<?= $especialidade['id_esp'] ?>"><?= $especialidade['esp'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="especialidade" class="col-sm-2 control-label">Seção</label>
                            <div class="col-sm-10">
                                <select type="text" class="form-control" id="secao" name="secao" required="required">
                                    <option value="<?php echo $efetivo->secao ?>"><?php echo $efetivo->secao ?></option>
                                    <?php foreach (Efetivo::allSecao() as $secao): ?>
                                        <option value="<?= $secao['id_secao'] ?>"><?= $secao['secao'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ramal" class="col-sm-2 control-label">Ramal:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="ramal" placeholder="ramal" name="ramal"
                                       required="required" value="<?php echo $usuario->ramal ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nome" class="col-sm-2 control-label">Nome:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nome" placeholder="nome" name="nome"
                                       required="required" value="<?php echo $usuario->nome ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento" class="col-sm-2 control-label">Data Nascimento:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control datepicker" id="data_nascimento"
                                       placeholder="data_nascimento" name="data_nascimento" required="required"
                                       value="<?php echo $usuario->dataNascimento ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="data_ultima_promocao" class="col-sm-2 control-label">Data Ultima
                                Promoção:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control datepicker" id="data_ultima_promocao"
                                       placeholder="data_ultima_promocao" name="data_ultima_promocao"
                                       required="required" value="<?php echo $usuario->dataUltimaPromocao ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="data_praca" class="col-sm-2 control-label">Data de Praça:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control datepicker" id="data_praca"
                                       placeholder="data_praca" name="data_praca" required="required"
                                       value="<?php echo $usuario->dataPraca ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="secao" class="col-sm-2 control-label">Seção</label>
                            <div class="col-sm-10">
                                <select type="text" class="form-control" id="secao" name="secao" required="required">
                                    <option value="<?php echo $usuario->secao ?>"><?php echo Helper::$secoes[$usuario->secao] ?></option>
                                    <?php foreach (Helper::$secoes as $chave => $secao): ?>
                                        <option value="<?= $chave; ?>"><?= $secao ?></option>
                                    <?php endforeach; ?>
                                </select>
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
                            <label for="email" class="col-sm-2 control-label">E-mail Intraer</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="exemplo@depens.intraer"
                                       name="email" required="required" value="<?php echo $usuario->email ?>">
                            </div>
                        </div>
                        <select type="text" class="form-control" id="grupo" name="grupo" required="required">
                            <option value="<?php echo $usuario->grupo ?>"><?php echo Helper::$grupos[$usuario->grupo] ?></option>
                            <?php foreach (Helper::$grupos as $chave => $grupo): ?>
                                <option value="<?= $chave; ?>"><?= $grupo ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="col-lg-6">
                        profile
                        <style>
                            .kv-avatar .krajee-default.file-preview-frame, .kv-avatar .krajee-default.file-preview-frame:hover {
                                margin: 0;
                                padding: 0;
                                border: none;
                                box-shadow: none;
                                text-align: center;
                            }

                            .kv-avatar .file-input {
                                display: table-cell;
                                max-width: 220px;
                            }

                            .kv-reqd {
                                color: red;
                                font-family: monospace;
                                font-weight: normal;
                            }
                        </style>

                        <!-- markup -->
                        <!-- note: your server code `avatar_upload.php` will receive `$_FILES['avatar']` on form submission -->
                        <!-- the avatar markup -->
                        <form class="form form-vertical" action="/avatar_upload.php" method="post"
                              enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="kv-avatar center-block text-center" style="width:200px">
                                        <input id="avatar-1" name="avatar-1" type="file" class="file-loading" required>
                                        <div class="help-block">
                                            <small>Select file < 1500 KB</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
                    </div>

                    <!-- the fileinput plugin initialization -->
                    <script>
                        var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' +
                            'onclick="alert(\'Call your custom code here.\')">' +
                            '<i class="glyphicon glyphicon-tag"></i>' +
                            '</button>';
                        $("#avatar-1").fileinput({
                            overwriteInitial: true,
                            maxFileSize: 1500,
                            showClose: false,
                            showCaption: false,
                            browseLabel: '',
                            removeLabel: '',
                            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
                            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                            removeTitle: 'Cancel or reset changes',
                            elErrorContainer: '#kv-avatar-errors-1',
                            msgErrorClass: 'alert alert-block alert-danger',
                            defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar" style="width:160px">',
                            layoutTemplates: {main2: '{preview} ' + btnCust + ' {remove} {browse}'},
                            allowedFileExtensions: ["jpg", "png", "gif"]
                        });
                    </script>
                </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span>
                        Cadastrar
                    </button>
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>

<?php include(__DIR__ . '/../layout/footer.php'); ?>