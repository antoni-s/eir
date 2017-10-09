<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Unidade</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/unidade/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control"  name="nome" placeholder="Nome da Unidade" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="idu">IDU</label>
                    <input type="text" class="form-control" name="idu" placeholder="0" value="<?php echo $Sessao::retornaValorFormulario('idu'); ?>" maxlength="13" required>

                </div>
                <div class="form-group">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" name="logradouro" placeholder="0" value="<?php echo $Sessao::retornaValorFormulario('logradouro'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" name="bairro" placeholder="0" value="<?php echo $Sessao::retornaValorFormulario('bairro'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" name="complemento" placeholder="0" value="<?php echo $Sessao::retornaValorFormulario('complemento'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" name="cep" placeholder="0" value="<?php echo $Sessao::retornaValorFormulario('cep'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="cidade" placeholder="0" value="<?php echo $Sessao::retornaValorFormulario('cidade'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="uf">UF</label>
                    <select name="uf" class="form-control">
                        <option value="AC"  <?php echo ($Sessao::retornaValorFormulario('AC') == "AC") ? "select" : "" ?>>AC</option>
                        <option value="AL"  <?php echo ($Sessao::retornaValorFormulario('AL') == "AL") ? "select" : "" ?>>AL</option>
                        <option value="AM"  <?php echo ($Sessao::retornaValorFormulario('AM') == "AM") ? "select" : "" ?>>AM</option>
                        <option value="AP"  <?php echo ($Sessao::retornaValorFormulario('AP') == "AP") ? "select" : "" ?>>AP</option>
                        <option value="BA"  <?php echo ($Sessao::retornaValorFormulario('BA') == "BA") ? "select" : "" ?>>BA</option>
                        <option value="CE"  <?php echo ($Sessao::retornaValorFormulario('CE') == "CE") ? "select" : "" ?>>CE</option>
                        <option value="DF"  <?php echo ($Sessao::retornaValorFormulario('DF') == "DF") ? "select" : "" ?>>DF</option>
                        <option value="ES"  <?php echo ($Sessao::retornaValorFormulario('ES') == "ES") ? "select" : "" ?>>ES</option>
                        <option value="GO"  <?php echo ($Sessao::retornaValorFormulario('GO') == "GO") ? "select" : "" ?>>GO</option>
                        <option value="MA"  <?php echo ($Sessao::retornaValorFormulario('MA') == "MA") ? "select" : "" ?>>MG</option>
                        <option value="MG"  <?php echo ($Sessao::retornaValorFormulario('MG') == "MG") ? "select" : "" ?>>MG</option>
                        <option value="MS"  <?php echo ($Sessao::retornaValorFormulario('MS') == "MS") ? "select" : "" ?>>MS</option>
                        <option value="MT"  <?php echo ($Sessao::retornaValorFormulario('MT') == "MT") ? "select" : "" ?>>MT</option>
                        <option value="PA"  <?php echo ($Sessao::retornaValorFormulario('PA') == "PA") ? "select" : "" ?>>PA</option>
                        <option value="PB"  <?php echo ($Sessao::retornaValorFormulario('PB') == "PB") ? "select" : "" ?>>PB</option>
                        <option value="PE"  <?php echo ($Sessao::retornaValorFormulario('PE') == "PE") ? "select" : "" ?>>PE</option>
                        <option value="PI"  <?php echo ($Sessao::retornaValorFormulario('PI') == "PI") ? "select" : "" ?>>PI</option>
                        <option value="PR"  <?php echo ($Sessao::retornaValorFormulario('PR') == "PR") ? "select" : "" ?>>PR</option>
                        <option value="RJ"  <?php echo ($Sessao::retornaValorFormulario('RJ') == "RJ") ? "select" : "" ?>>RJ</option>
                        <option value="RN"  <?php echo ($Sessao::retornaValorFormulario('RN') == "RN") ? "select" : "" ?>>RN</option>
                        <option value="RO"  <?php echo ($Sessao::retornaValorFormulario('RO') == "RO") ? "select" : "" ?>>RO</option>
                        <option value="RR"  <?php echo ($Sessao::retornaValorFormulario('RR') == "RR") ? "select" : "" ?>>RR</option>
                        <option value="RS"  <?php echo ($Sessao::retornaValorFormulario('RS') == "RS") ? "select" : "" ?>>RS</option>
                        <option value="SC"  <?php echo ($Sessao::retornaValorFormulario('SC') == "SC") ? "select" : "" ?>>SC</option>
                        <option value="SE"  <?php echo ($Sessao::retornaValorFormulario('SE') == "SE") ? "select" : "" ?>>SE</option>
                        <option value="SP"  <?php echo ($Sessao::retornaValorFormulario('SP') == "SP") ? "select" : "" ?>>SP</option>
                        <option value="TO"  <?php echo ($Sessao::retornaValorFormulario('TO') == "TO") ? "select" : "" ?>>TO</option>

                    </select>
                </div>


                <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar </button>
                <a href="http://<?php echo APP_HOST; ?>/unidade" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
