<nav class="navbar navbar-expand-md">
		<div class="container">
				<div class="navbar-translate">
						<button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-bar"></span>
								<span class="navbar-toggler-bar"></span>
								<span class="navbar-toggler-bar"></span>
						</button>
						<a class="navbar-brand" href="http://<?php echo APP_HOST; ?>">EIR</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
						<ul class="navbar-nav ml-auto">
								<li class="nav-item">
										<a class="nav-link" href="http://<?php echo APP_HOST; ?>" >Home</a>
								</li>
								<li class="nav-item">
										<a class="nav-link" href="http://<?php echo APP_HOST; ?>/unidade" >Unidades</a>
								</li>
								<li class="nav-item">
										<a class="nav-link" href="http://<?php echo APP_HOST; ?>/medicamento" >Medicamentos</a>
								</li>
									<?php
										$user = $Sessao::retornaSessao();
										if($user) {
									?>
											<div class="nav-item dropdown">
 												<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
													<i class="fa fa-user-o"></i>
												</a>
												<ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                         	<li class="dropdown-header" href="#">
														<?php
																echo "Bem-vindo, ".$user['nome']."!";
														?>
													</li>
													<a class="dropdown-item" href="http://<?php echo APP_HOST; ?>/usuario/" >Minha Conta</a>
                         	<a class="dropdown-item disabled" href="#">Meu Histórico</a>
													<?php if ($user['tipo'] == 2) { ?>
														<a class="dropdown-item" href="http://<?php echo APP_HOST; ?>/unidade/" >Unidades</a>
														<a class="dropdown-item" href="http://<?php echo APP_HOST; ?>/medicamento/" >Medicamentos</a>
														<a class="dropdown-item" href="http://<?php echo APP_HOST; ?>/usuario/" >Usuários</a>
													<?php } ?>
													<div class="dropdown-divider"></div>
                         	<a class="dropdown-item" href="http://<?php echo APP_HOST; ?>/login/logout" >Sair</a>
                     		</ul>
											</div>
									<?php } else { ?>
										<li class="nav-item">
											<a class="nav-link" href="http://<?php echo APP_HOST; ?>/login" ><i class="fa fa-user-o"></i>Login</a>
										</li>
									<?php } ?>
						</ul>
				</div>
		</div>
</nav>
