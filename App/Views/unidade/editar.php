<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Editar Unidade</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/unidade/atualizar/<?php echo $viewVar['queryString']; ?>" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['unidade']->getId(); ?>">

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text"  class="form-control" name="nome" id="nome" placeholder="" value="<?php echo $viewVar['unidade']->getNome(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="idu">IDU</label>
                    <input type="text"  class="form-control"  name="idu" id="idu" placeholder="" value="<?php echo $viewVar['unidade']->getIdu(); ?>" maxlength="13" required>
                </div>

                <div class="form-group">
                    <label for="logradouro">Logradouro</label>
                    <input type="text"  class="form-control"  name="logradouro" id="logradouro" placeholder="" value="<?php echo $viewVar['unidade']->getLogradouro(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text"  class="form-control"  name="bairro" id="bairro" placeholder="" value="<?php echo $viewVar['unidade']->getBairro(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text"  class="form-control"  name="complemento" id="complemento" placeholder="" value="<?php echo $viewVar['unidade']->getComplemento(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text"  class="form-control"  name="cep" id="cep" placeholder="" value="<?php echo $viewVar['unidade']->getCep(); ?>" maxlength="8" required>
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text"  class="form-control"  name="cidade" id="cidade" placeholder="" value="<?php echo $viewVar['unidade']->getCidade(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="uf">UF</label>
                    <select name="uf" class="form-control">
                        <option value="AC" <?php echo ($viewVar['unidade']->getUf() == "AC") ? "select" : "" ?>>AC</option>
                        <option value="AL" <?php echo ($viewVar['unidade']->getUf() == "Al") ? "select" : "" ?>>AL</option>
                        <option value="AM" <?php echo ($viewVar['unidade']->getUf() == "AM") ? "select" : "" ?>>AM</option>
                        <option value="AP" <?php echo ($viewVar['unidade']->getUf() == "AP") ? "select" : "" ?>>AP</option>
                        <option value="BA" <?php echo ($viewVar['unidade']->getUf() == "BA") ? "select" : "" ?>>BA</option>
                        <option value="CE" <?php echo ($viewVar['unidade']->getUf() == "CE") ? "select" : "" ?>>CE</option>
                        <option value="DF" <?php echo ($viewVar['unidade']->getUf() == "DF") ? "select" : "" ?>>DF</option>
                        <option value="ES" <?php echo ($viewVar['unidade']->getUf() == "ES") ? "select" : "" ?>>ES</option>
                        <option value="GO" <?php echo ($viewVar['unidade']->getUf() == "GO") ? "select" : "" ?>>GO</option>
                        <option value="MA" <?php echo ($viewVar['unidade']->getUf() == "MA") ? "select" : "" ?>>MG</option>
                        <option value="MG" <?php echo ($viewVar['unidade']->getUf() == "MG") ? "select" : "" ?>>MG</option>
                        <option value="MS" <?php echo ($viewVar['unidade']->getUf() == "MS") ? "select" : "" ?>>MS</option>
                        <option value="MT" <?php echo ($viewVar['unidade']->getUf() == "MT") ? "select" : "" ?>>MT</option>
                        <option value="PA" <?php echo ($viewVar['unidade']->getUf() == "PA") ? "select" : "" ?>>PA</option>
                        <option value="PB" <?php echo ($viewVar['unidade']->getUf() == "PB") ? "select" : "" ?>>PB</option>
                        <option value="PE" <?php echo ($viewVar['unidade']->getUf() == "PE") ? "select" : "" ?>>PE</option>
                        <option value="PI" <?php echo ($viewVar['unidade']->getUf() == "PI") ? "select" : "" ?>>PI</option>
                        <option value="PR" <?php echo ($viewVar['unidade']->getUf() == "PR") ? "select" : "" ?>>PR</option>
                        <option value="RJ" <?php echo ($viewVar['unidade']->getUf() == "RJ") ? "select" : "" ?>>RJ</option>
                        <option value="RN" <?php echo ($viewVar['unidade']->getUf() == "RN") ? "select" : "" ?>>RN</option>
                        <option value="RO" <?php echo ($viewVar['unidade']->getUf() == "RO") ? "select" : "" ?>>RO</option>
                        <option value="RR" <?php echo ($viewVar['unidade']->getUf() == "RR") ? "select" : "" ?>>RR</option>
                        <option value="RS" <?php echo ($viewVar['unidade']->getUf() == "RS") ? "select" : "" ?>>RS</option>
                        <option value="SC" <?php echo ($viewVar['unidade']->getUf() == "SC") ? "select" : "" ?>>SC</option>
                        <option value="SE" <?php echo ($viewVar['unidade']->getUf() == "SE") ? "select" : "" ?>>SE</option>
                        <option value="SP" <?php echo ($viewVar['unidade']->getUf() == "SP") ? "select" : "" ?>>SP</option>
                        <option value="TO" <?php echo ($viewVar['unidade']->getUf() == "TO") ? "select" : "" ?>>TO</option>

                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar </button>
                <a href="http://<?php echo APP_HOST; ?>/unidade/<?php echo $viewVar['queryString']; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
