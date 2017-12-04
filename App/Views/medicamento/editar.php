<div class="wrapper">
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Editar Medicamento</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/medicamento/atualizar/<?php echo $viewVar['queryString']; ?>" method="post" id="form_cadastro_medicamento">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['medicamento']->getId(); ?>">

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text"  class="form-control" name="nome" id="nome" placeholder="" value="<?php echo $viewVar['medicamento']->getNome(); ?>" required>
                </div>

								<div class="form-group">
										<label for="nome">Código</label>
										<input type="text"  class="form-control" name="codigo" id="codigo" placeholder="" value="<?php echo $viewVar['medicamento']->getCodigo(); ?>" required>
								</div>

                <div class="form-group">
                    <label for="idu">Composição</label>
                    <input type="text"  class="form-control"  name="composicao" id="composicao" placeholder="" value="<?php echo $viewVar['medicamento']->getComposicao(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <input type="tipo"  class="form-control" name="tipo" id="tipo" placeholder="" value="<?php echo $viewVar['medicamento']->getTipo(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="dose">Dose</label>
                    <input type="text"  class="form-control" name="dose" id="dose" placeholder="" value="<?php echo $viewVar['medicamento']->getDose(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="informacoes">Informações Adicionais</label>
                    <input type="text"  class="form-control"  name="informacoes" id="informacoes" placeholder="" value="<?php echo $viewVar['medicamento']->getInformacoes(); ?>" required>
                </div>
                <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar </button>
                <a href="http://<?php echo APP_HOST; ?>/medicamento/<?php echo $viewVar['queryString']; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
</div>
