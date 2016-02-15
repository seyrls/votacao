

<div class="container">

    <div class="page-header">
        <h1>Sistema de votação da ANAUNI</h1>
    </div>

    <h3>Cadastro de eleitor</h3>

    <form class="form-horizontal" method="post" action="cadastro/salvar">
        <fieldset>

            <!-- Form Name -->
            <legend>Dados do(a) eleitor(a)</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nome">Nome</label>  
                <div class="col-md-4">
                    <input id="nome" name="nome" type="text" placeholder="Digite seu nome" class="form-control input-md" required="">
                    <span class="help-block">Digite seu nome completo</span>  
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cpf">CPF</label>  
                <div class="col-md-4">
                    <input id="cpf" name="cpf" type="text" placeholder="CPF" class="form-control input-md" required="">
                    <span class="help-block">Digite somente os números do seu CPF sem (.) ou (-)</span>  
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">E-mail</label>  
                <div class="col-md-4">
                    <input id="email" name="email" type="text" placeholder="Endereço de e-mail" class="form-control input-md" required="">
                    <span class="help-block">Digite seu endereço de e-mail</span>  
                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="senha">Senha</label>
                <div class="col-md-4">
                    <input id="senha" name="senha" type="password" placeholder="Sua senha" class="form-control input-md" required="">
                    <span class="help-block">Digite sua senha</span>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="btnsalvar">Opção</label>
                <div class="col-md-4">
                    <button id="btnsalvar" name="btnsalvar" class="btn btn-primary">Salvar</button>
                </div>
            </div>

        </fieldset>
    </form>


</div> <!-- /container -->

