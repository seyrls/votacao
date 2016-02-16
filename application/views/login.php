

<div class="container">
    <form class="form-horizontal" action="votar/validaUsuario" method="post">
        <fieldset>

            <!-- Form Name -->
            <legend>Acesso do eleitor</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="usuario">Usuário</label>  
                <div class="col-md-4">
                    <input id="usuario" name="usuario" placeholder="Informe o seu número de CPF" class="form-control input-md" required="" type="text">
                    <span class="help-block">Digite o número do seu CPF sem ponto(.) ou traço(-)</span>  
                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="senha">Senha</label>
                <div class="col-md-4">
                    <input id="senha" name="senha" placeholder="Informe a senha" class="form-control input-md" required="" type="password">
                    <span class="help-block">Informe sua senha cadastrada</span>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="btnacesso"></label>
                <div class="col-md-4">
                    <button id="btnacesso" name="btnacesso" class="btn btn-primary">Entrar</button>
                </div>
            </div>

        </fieldset>
    </form>
</div> <!-- /container -->

