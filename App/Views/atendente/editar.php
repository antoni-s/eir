<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Editar Atendente</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/atendente/atualizar/<?php echo $viewVar['queryString']; ?>" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['atendente']->getId(); ?>">

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text"  class="form-control" name="nome" id="nome" placeholder="" value="<?php echo $viewVar['atendente']->getNome(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text"  class="form-control"  name="cpf" id="cpf" placeholder="" value="<?php echo $viewVar['atendente']->getCpf(); ?>" maxlength="11" required>
                </div>

                <div class="form-group">
                    <label for="matricula">Matricula</label>
                    <input type="text"  class="form-control"  name="matricula" id="matricula" placeholder="" value="<?php echo $viewVar['atendente']->getMatricula(); ?>" maxlength="13" required>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="tel"  class="form-control"  name="telefone" id="teleofne" placeholder="" value="<?php echo $viewVar['atendente']->getTelefone(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"  class="form-control"  name="email" id="email" placeholder="" value="<?php echo $viewVar['atendente']->getEmail(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="logradouro">Logradouro</label>
                    <input type="text"  class="form-control"  name="logradouro" id="logradouro" placeholder="" value="<?php echo $viewVar['atendente']->getLogradouro(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text"  class="form-control"  name="bairro" id="bairro" placeholder="" value="<?php echo $viewVar['atendente']->getBairro(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text"  class="form-control"  name="complemento" id="complemento" placeholder="" value="<?php echo $viewVar['atendente']->getComplemento(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text"  class="form-control"  name="cep" id="cep" placeholder="" value="<?php echo $viewVar['atendente']->getCep(); ?>" maxlength="8" required>
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text"  class="form-control"  name="cidade" id="cidade" placeholder="" value="<?php echo $viewVar['atendente']->getCidade(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="uf">UF</label>
                    <select name="uf" class="form-control">
                        <option value="AC" <?php echo ($viewVar['atendente']->getUf() == "AC") ? "selected" : "" ?>>AC</option>
                        <option value="AL" <?php echo ($viewVar['atendente']->getUf() == "Al") ? "selected" : "" ?>>AL</option>
                        <option value="AM" <?php echo ($viewVar['atendente']->getUf() == "AM") ? "selected" : "" ?>>AM</option>
                        <option value="AP" <?php echo ($viewVar['atendente']->getUf() == "AP") ? "selected" : "" ?>>AP</option>
                        <option value="BA" <?php echo ($viewVar['atendente']->getUf() == "BA") ? "selected" : "" ?>>BA</option>
                        <option value="CE" <?php echo ($viewVar['atendente']->getUf() == "CE") ? "selected" : "" ?>>CE</option>
                        <option value="DF" <?php echo ($viewVar['atendente']->getUf() == "DF") ? "selected" : "" ?>>DF</option>
                        <option value="ES" <?php echo ($viewVar['atendente']->getUf() == "ES") ? "selected" : "" ?>>ES</option>
                        <option value="GO" <?php echo ($viewVar['atendente']->getUf() == "GO") ? "selected" : "" ?>>GO</option>
                        <option value="MA" <?php echo ($viewVar['atendente']->getUf() == "MA") ? "selected" : "" ?>>MG</option>
                        <option value="MG" <?php echo ($viewVar['atendente']->getUf() == "MG") ? "selected" : "" ?>>MG</option>
                        <option value="MS" <?php echo ($viewVar['atendente']->getUf() == "MS") ? "selected" : "" ?>>MS</option>
                        <option value="MT" <?php echo ($viewVar['atendente']->getUf() == "MT") ? "selected" : "" ?>>MT</option>
                        <option value="PA" <?php echo ($viewVar['atendente']->getUf() == "PA") ? "selected" : "" ?>>PA</option>
                        <option value="PB" <?php echo ($viewVar['atendente']->getUf() == "PB") ? "selected" : "" ?>>PB</option>
                        <option value="PE" <?php echo ($viewVar['atendente']->getUf() == "PE") ? "selected" : "" ?>>PE</option>
                        <option value="PI" <?php echo ($viewVar['atendente']->getUf() == "PI") ? "selected" : "" ?>>PI</option>
                        <option value="PR" <?php echo ($viewVar['atendente']->getUf() == "PR") ? "selected" : "" ?>>PR</option>
                        <option value="RJ" <?php echo ($viewVar['atendente']->getUf() == "RJ") ? "selected" : "" ?>>RJ</option>
                        <option value="RN" <?php echo ($viewVar['atendente']->getUf() == "RN") ? "selected" : "" ?>>RN</option>
                        <option value="RO" <?php echo ($viewVar['atendente']->getUf() == "RO") ? "selected" : "" ?>>RO</option>
                        <option value="RR" <?php echo ($viewVar['atendente']->getUf() == "RR") ? "selected" : "" ?>>RR</option>
                        <option value="RS" <?php echo ($viewVar['atendente']->getUf() == "RS") ? "selected" : "" ?>>RS</option>
                        <option value="SC" <?php echo ($viewVar['atendente']->getUf() == "SC") ? "selected" : "" ?>>SC</option>
                        <option value="SE" <?php echo ($viewVar['atendente']->getUf() == "SE") ? "selected" : "" ?>>SE</option>
                        <option value="SP" <?php echo ($viewVar['atendente']->getUf() == "SP") ? "selected" : "" ?>>SP</option>
                        <option value="TO" <?php echo ($viewVar['atendente']->getUf() == "TO") ? "selected" : "" ?>>TO</option>

                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar </button>
                <a href="http://<?php echo APP_HOST; ?>/atendente/<?php echo $viewVar['queryString']; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
