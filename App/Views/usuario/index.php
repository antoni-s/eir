<div class="wrapper">
<div class="container">
    <div class="row">
				<div class="col-md-12">
					<form action="http://<?php echo APP_HOST; ?>/usuario/" method="get" class="form-inline buscaDireita">
							<div class="form-group">
									<div class="input-group">
											<input type="text" placeholder="Buscar conteúdo" required value="<?php echo $viewVar['buscaUsuario']; ?>" class="form-control" name="buscaUsuario" aria-describedby="seach-addon" />
											<span class="input-group-addon" id="seach-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
									</div>
							</div>
					</form>
					<a href="http://<?php echo APP_HOST; ?>/usuario/cadastro" class="btn btn-success ml-4">Adicionar</a>
				</div>
        <div class="col-md-12 col-lg-12">
            <hr>

            <?php
                if(!count($viewVar['listaUsuarios'])){
            ?>
                <div class="alert alert-info" role="alert">Efetue uma busca para exibir a sua Usuario.</div>
            <?php
                } else {
            ?>
                <?php if($Sessao::retornaMensagem()){ ?>
                    <div class="alert alert-warning" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $Sessao::retornaMensagem(); ?>
                    </div>
                <?php } ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td class="info">Nome</td>
                            <!-- <td class="info hidden-sm hidden-xs">Preço</td> -->
                            <td class="info hidden-sm hidden-xs">CPF</td>
                            <td class="info hidden-sm hidden-xs">Nome</td>
                            <td class="info hidden-sm hidden-xs">Endereço</td>
                            <!-- <td class="info hidden-sm hidden-xs">Status</td> -->
                            <td class="info"></td>
                        </tr>
                        <?php
                            foreach($viewVar['listaUsuarios'] as $usuario) {
                        ?>
                            <tr>
                                <td><?php echo $usuario->getNome(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $usuario->getCpf(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $usuario->getNome(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $usuario->getLogradouro().', '.$usuario->getBairro().', '.$usuario->getComplemento().', '.$usuario->getCep().', '.$usuario->getCidade().', '.$usuario->getUf(); ?></td>
                                <td>
                                    <a href="http://<?php echo APP_HOST; ?>/usuario/edicao/<?php echo $usuario->getId(); ?><?php echo $viewVar['queryString']; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar </a>
                                    <a href="http://<?php echo APP_HOST; ?>/usuario/exclusao/<?php echo $usuario->getId(); ?><?php echo $viewVar['queryString']; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir </a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
                <?php echo $viewVar['paginacao']; ?>
                <?php
                    }
                ?>
        </div>
    </div>
</div>
</div>
