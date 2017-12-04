<div class="wrapper">
<div class="container">
    <div class="row">
				<div class="col-md-12">
					<form action="http://<?php echo APP_HOST; ?>/medicamento/" method="get" class="form-inline buscaDireita">
							<div class="form-group">
									<div class="input-group">
											<input type="text" placeholder="Buscar conteúdo" required value="<?php echo $viewVar['buscaMedicamento']; ?>" class="form-control" name="buscaMedicamento" aria-describedby="seach-addon" />
											<span class="input-group-addon" id="seach-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
									</div>
							</div>
					</form>
					<?php
						$user = $Sessao::retornaSessao();
						if($user && $user['tipo'] == 2) {
					?>
						<a href="http://<?php echo APP_HOST; ?>/medicamento/cadastro" class="btn btn-success ml-4">Adicionar</a>
					<?php } ?>
				</div>
        <div class="col-md-12 col-lg-12">
            <hr>

            <?php
                if(!count($viewVar['listaMedicamentos'])){
            ?>
                <div class="alert alert-info" role="alert">Efetue uma busca para exibir a seu Medicamento.</div>
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
														<td class="info hidden-sm hidden-xs">Código</td>
                            <!-- <td class="info hidden-sm hidden-xs">Preço</td> -->
                            <td class="info hidden-sm hidden-xs">Composição</td>
                            <td class="info hidden-sm hidden-xs">Tipo</td>
                            <td class="info hidden-sm hidden-xs">Dose</td>
                            <!-- <td class="info hidden-sm hidden-xs">Status</td> -->
                            <td class="info hidden-sm hidden-xs">Informações</td>
														<?php
															$user = $Sessao::retornaSessao();
															if($user && $user['tipo'] == 2) {
														?>
														<td class="info"></td>
													<?php } ?>
                        </tr>
                        <?php
                            foreach($viewVar['listaMedicamentos'] as $medicamento) {
                        ?>
                            <tr>
                                <td><?php echo $medicamento->getNome(); ?></td>
																<td class=" hidden-sm hidden-xs"><?php echo $medicamento->getCodigo(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $medicamento->getComposicao(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $medicamento->getTipo(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $medicamento->getDose(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $medicamento->getInformacoes(); ?></td>
																<?php
																	$user = $Sessao::retornaSessao();
																	if($user && $user['tipo'] == 2) {
																?>
																<td>
                                    <a href="http://<?php echo APP_HOST; ?>/medicamento/edicao/<?php echo $medicamento->getId(); ?><?php echo $viewVar['queryString']; ?>" class="btn btn-info btn-sm m-1">Editar </a>
                                    <a href="http://<?php echo APP_HOST; ?>/medicamento/exclusao/<?php echo $medicamento->getId(); ?><?php echo $viewVar['queryString']; ?>" class="btn btn-danger btn-sm m-1">Excluir </a>
                                </td>
															<?php } ?>
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
