<div class="wrapper">
<div class="container">
    <div class="row">
				<div class="col-md-12">
					<form action="http://<?php echo APP_HOST; ?>/unidade/" method="get" class="form-inline buscaDireita">
							<div class="form-group">
									<div class="input-group">
											<input type="text" placeholder="Buscar conteúdo" required value="<?php echo $viewVar['buscaUnidade']; ?>" class="form-control" name="buscaUnidade" aria-describedby="seach-addon" />
											<span class="input-group-addon" id="seach-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
									</div>
							</div>
					</form>
					<?php
						$user = $Sessao::retornaSessao();
						if($user && $user['tipo'] == 2) {
					?>
						<a href="http://<?php echo APP_HOST; ?>/unidade/cadastro" class="btn btn-success ml-4">Adicionar</a>
					<?php } ?>
				</div>
        <div class="col-md-12 col-lg-12">
            <hr>

            <?php
                if(!count($viewVar['listaUnidades'])){
            ?>
                <div class="alert alert-info" role="alert">Efetue uma busca para exibir a sua Unidade.</div>
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
                            <td class="info hidden-sm hidden-xs">IDU</td>
                            <td class="info hidden-sm hidden-xs">Horário de Funcionamento</td>
                            <td class="info hidden-sm hidden-xs">Endereço</td>
                            <!-- <td class="info hidden-sm hidden-xs">Status</td> -->
                            <td class="info hidden-sm hidden-xs">Data Cadastro</td>
														<?php
															$user = $Sessao::retornaSessao();
															if($user && $user['tipo'] == 2) {
														?>
														<td class="info"></td>
													<?php } ?>
                        </tr>
                        <?php
                            foreach($viewVar['listaUnidades'] as $unidade) {
                        ?>
                            <tr>
                                <td><?php echo $unidade->getNome(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $unidade->getIdu(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $unidade->getHoraAbertura().' - '.$unidade->getHoraFechamento(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $unidade->getLogradouro().', '.$unidade->getBairro().', '.$unidade->getComplemento().', '.$unidade->getCep().', '.$unidade->getCidade().', '.$unidade->getUf(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $unidade->getDataCadastro()->format('d/m/Y'); ?></td>
																<?php
																	$user = $Sessao::retornaSessao();
																	if($user && $user['tipo'] == 2) {
																?>
																<td>
                                    <a href="http://<?php echo APP_HOST; ?>/unidade/edicao/<?php echo $unidade->getId(); ?><?php echo $viewVar['queryString']; ?>" class="btn btn-info btn-sm m-1">Editar </a>
                                    <a href="http://<?php echo APP_HOST; ?>/unidade/exclusao/<?php echo $unidade->getId(); ?><?php echo $viewVar['queryString']; ?>" class="btn btn-danger btn-sm m-1">Excluir </a>
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
