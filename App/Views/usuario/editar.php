<div class="wrapper">
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Usuário</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/usuario/atualizar/<?php echo $viewVar['queryString']; ?>" method="post" id="form_cadastro_usuario">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['usuario']->getId(); ?>">

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text"  class="form-control" name="nome" id="nome" placeholder="" value="<?php echo $viewVar['usuario']->getNome(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text"  class="form-control"  name="cpf" id="cpf" placeholder="" value="<?php echo $viewVar['usuario']->getCpf(); ?>" required>
                </div>

								<div class="form-group">
										<label for="senha">Senha</label>
										<input type="password"  class="form-control"  name="senha" id="senha" placeholder="" value="<?php echo $viewVar['usuario']->getSenha(); ?>" required>
								</div>

								<div class="form-group">
										<label for="nomeMae">Nome da Mãe</label>
										<input type="text"  class="form-control"  name="nomeMae" id="nomeMae" placeholder="" value="<?php echo $viewVar['usuario']->getNomeMae(); ?>" required>
								</div>

                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="tel"  class="form-control"  name="telefone" id="teleofne" placeholder="" value="<?php echo $viewVar['usuario']->getTelefone(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"  class="form-control"  name="email" id="email" placeholder="" value="<?php echo $viewVar['usuario']->getEmail(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="logradouro">Logradouro</label>
                    <input type="text"  class="form-control"  name="logradouro" id="logradouro" placeholder="" value="<?php echo $viewVar['usuario']->getLogradouro(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text"  class="form-control"  name="bairro" id="bairro" placeholder="" value="<?php echo $viewVar['usuario']->getBairro(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text"  class="form-control"  name="complemento" id="complemento" placeholder="" value="<?php echo $viewVar['usuario']->getComplemento(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text"  class="form-control"  name="cep" id="cep" placeholder="" value="<?php echo $viewVar['usuario']->getCep(); ?>" maxlength="8" required>
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text"  class="form-control"  name="cidade" id="cidade" placeholder="" value="<?php echo $viewVar['usuario']->getCidade(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="uf">UF</label>
                    <select name="uf" class="form-control">
                        <option value="AC" <?php echo ($viewVar['usuario']->getUf() == "AC") ? "selected" : "" ?>>AC</option>
                        <option value="AL" <?php echo ($viewVar['usuario']->getUf() == "Al") ? "selected" : "" ?>>AL</option>
                        <option value="AM" <?php echo ($viewVar['usuario']->getUf() == "AM") ? "selected" : "" ?>>AM</option>
                        <option value="AP" <?php echo ($viewVar['usuario']->getUf() == "AP") ? "selected" : "" ?>>AP</option>
                        <option value="BA" <?php echo ($viewVar['usuario']->getUf() == "BA") ? "selected" : "" ?>>BA</option>
                        <option value="CE" <?php echo ($viewVar['usuario']->getUf() == "CE") ? "selected" : "" ?>>CE</option>
                        <option value="DF" <?php echo ($viewVar['usuario']->getUf() == "DF") ? "selected" : "" ?>>DF</option>
                        <option value="ES" <?php echo ($viewVar['usuario']->getUf() == "ES") ? "selected" : "" ?>>ES</option>
                        <option value="GO" <?php echo ($viewVar['usuario']->getUf() == "GO") ? "selected" : "" ?>>GO</option>
                        <option value="MA" <?php echo ($viewVar['usuario']->getUf() == "MA") ? "selected" : "" ?>>MG</option>
                        <option value="MG" <?php echo ($viewVar['usuario']->getUf() == "MG") ? "selected" : "" ?>>MG</option>
                        <option value="MS" <?php echo ($viewVar['usuario']->getUf() == "MS") ? "selected" : "" ?>>MS</option>
                        <option value="MT" <?php echo ($viewVar['usuario']->getUf() == "MT") ? "selected" : "" ?>>MT</option>
                        <option value="PA" <?php echo ($viewVar['usuario']->getUf() == "PA") ? "selected" : "" ?>>PA</option>
                        <option value="PB" <?php echo ($viewVar['usuario']->getUf() == "PB") ? "selected" : "" ?>>PB</option>
                        <option value="PE" <?php echo ($viewVar['usuario']->getUf() == "PE") ? "selected" : "" ?>>PE</option>
                        <option value="PI" <?php echo ($viewVar['usuario']->getUf() == "PI") ? "selected" : "" ?>>PI</option>
                        <option value="PR" <?php echo ($viewVar['usuario']->getUf() == "PR") ? "selected" : "" ?>>PR</option>
                        <option value="RJ" <?php echo ($viewVar['usuario']->getUf() == "RJ") ? "selected" : "" ?>>RJ</option>
                        <option value="RN" <?php echo ($viewVar['usuario']->getUf() == "RN") ? "selected" : "" ?>>RN</option>
                        <option value="RO" <?php echo ($viewVar['usuario']->getUf() == "RO") ? "selected" : "" ?>>RO</option>
                        <option value="RR" <?php echo ($viewVar['usuario']->getUf() == "RR") ? "selected" : "" ?>>RR</option>
                        <option value="RS" <?php echo ($viewVar['usuario']->getUf() == "RS") ? "selected" : "" ?>>RS</option>
                        <option value="SC" <?php echo ($viewVar['usuario']->getUf() == "SC") ? "selected" : "" ?>>SC</option>
                        <option value="SE" <?php echo ($viewVar['usuario']->getUf() == "SE") ? "selected" : "" ?>>SE</option>
                        <option value="SP" <?php echo ($viewVar['usuario']->getUf() == "SP") ? "selected" : "" ?>>SP</option>
                        <option value="TO" <?php echo ($viewVar['usuario']->getUf() == "TO") ? "selected" : "" ?>>TO</option>

                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar </button>
                <a href="http://<?php echo APP_HOST; ?>/usuario/<?php echo $viewVar['queryString']; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
</div>
