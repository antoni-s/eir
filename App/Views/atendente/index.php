<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="http://<?php echo APP_HOST; ?>/atendente/cadastro" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar</a>
        </div>
        <div class="col-md-6">
            <form action="http://<?php echo APP_HOST; ?>/atendente/" method="get" class="form-inline buscaDireita">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon input-sm" id="basic-addon1">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </span>
                        <input type="text" placeholder="Buscar conteúdo" required value="<?php echo $viewVar['buscaAtendente']; ?>" class="form-control input-sm" name="buscaAtendente" />

                        <div class="input-group-btn">
                        <button class="btn btn-success btn-sm" type="submit">Buscar</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12 col-lg-12">
            <hr>

            <?php
                if(!count($viewVar['listaAtendentes'])){
            ?>
                <div class="alert alert-info" role="alert">Efetue uma busca para exibir a sua Atendente.</div>
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
                            <td class="info hidden-sm hidden-xs">Matricula</td>
                            <td class="info hidden-sm hidden-xs">Endereço</td>
                            <!-- <td class="info hidden-sm hidden-xs">Status</td> -->
                            <td class="info hidden-sm hidden-xs">Data Cadastro</td>
                            <td class="info"></td>
                        </tr>
                        <?php
                            foreach($viewVar['listaAtendentes'] as $atendente) {
                        ?>
                            <tr>
                                <td><?php echo $atendente->getNome(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $atendente->getCpf(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $atendente->getMatricula(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $atendente->getLogradouro().', '.$atendente->getBairro().', '.$atendente->getComplemento().', '.$atendente->getCep().', '.$atendente->getCidade().', '.$atendente->getUf(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $atendente->getDataCadastro()->format('d/m/Y'); ?></td>
                                <td>
                                    <a href="http://<?php echo APP_HOST; ?>/atendente/edicao/<?php echo $atendente->getId(); ?><?php echo $viewVar['queryString']; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar </a>
                                    <a href="http://<?php echo APP_HOST; ?>/atendente/exclusao/<?php echo $atendente->getId(); ?><?php echo $viewVar['queryString']; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir </a>
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
