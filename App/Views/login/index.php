<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 col-login">
            <h3>Login</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/login/logar" method="post" id="form_login">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control"  name="email" placeholder="Email" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" name="password" placeholder="Senha" value="<?php echo $Sessao::retornaValorFormulario('senha'); ?>" maxlength="13" required>
                </div>
                <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Logar </button>
                <a href="http://<?php echo APP_HOST; ?>/usuario/cadastro/" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Criar conta</a>
            </form>
        </div>
        <div class=" col-md-4"></div>
    </div>
</div>
