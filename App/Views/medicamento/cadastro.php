<div class="wrapper">
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Medicamento</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/medicamento/salvar" method="post" id="form_cadastro_medicamento">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control"  name="nome" placeholder="Nome do Medicamento" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>

                </div>
								<div class="form-group">
										<label for="codigo">Código</label>
										<input type="text" class="form-control" name="codigo" placeholder="Código do Medicamneto" value="<?php echo $Sessao::retornaValorFormulario('codigo'); ?>" required>

								</div>
                <div class="form-group">
                    <label for="composicao">Composição</label>
                    <input type="text" class="form-control" name="composicao" placeholder="Composição do Medicamneto" value="<?php echo $Sessao::retornaValorFormulario('composicao'); ?>" required>

                </div>
								<div class="form-group">
                    <label for="tipo">Tipo</label>
                    <input type="text" class="form-control" name="tipo" placeholder="Caixa, ampola, vidro, etc." value="<?php echo $Sessao::retornaValorFormulario('tipo'); ?>" required>

                </div>
								<div class="form-group">
										<label for="dose">Dose</label>
										<input type="text" class="form-control" name="dose" placeholder="12 cps, 150 ml, etc." value="<?php echo $Sessao::retornaValorFormulario('dose'); ?>" required>

								</div>
                <div class="form-group">
                    <label for="informacoes">Informações Adicionais</label>
                    <input type="text" class="form-control"  name="informacoes" placeholder="Informações Adicionais" value="<?php echo $Sessao::retornaValorFormulario('informacoes'); ?>" required>

                </div>
                <button type="submit" class="btn btn-success btn-sm">Salvar </button>
                <a href="http://<?php echo APP_HOST; ?>/medicamento" class="btn btn-info btn-sm"></span> Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
</div>
