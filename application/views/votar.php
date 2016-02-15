

<div class="container">

    <br/>
    <div class="panel panel-primary">
        <div class="panel-heading">INFORMAÇÕES IMPORTANTES</div>
        <div class="panel-body">
            <p>Prezado(a) eleitor(a), você poderá votar somente <strong>1 (uma) única vez e em até 3 (três) candidatos</strong>.</p>
            <p>Digite o <strong>nome do seu candidato</strong> no campo abaixo e clique no botão <strong>CONFIRMAR</strong> para votar no candidato escolhido.</p>
            <p>Essa operação deverá <strong>ser repetida para CADA CANDIDATO escolhido.</strong></p>
        </div>
    </div>


    <div class="alert alert-danger" role="alert"><strong>Obs1: O eleitor só poderá votar UMA ÚNICA VEZ em cada candidato.</strong></div>
    <div class="alert alert-danger" role="alert"><strong>Obs2: O processo de votação foi iniciado, então você tem um tempo de 20 minutos concluir toda a votação.</strong></div>
    <h3>Lista dos candidatos a serem votados</h3>
    <hr/>
    <form class="form-horizontal" name="votacao" method="post" action="votacao">
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Nome do candidato</label>  
            <div class="col-md-5">
                <input id="textinput" name="candidato" placeholder="Nome do candidato" class="form-control input-md" required="true" type="text" onkeyup="ajax_showOptions(this, 'getCountriesByLetters', event)">
                <input type="hidden" id="candidato_hidden" name="candidato_ID">
                <span class="help-block">Digite o nome do candidato a ser votado</span>  
            </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="btnconfirmar">Opções</label>
            <div class="col-md-8">
                <button id="btnconfirmar" name="btnconfirmar" class="btn btn-success">Confirmar</button>
                <button type="reset" id="btncancelar" name="btncancelar" class="btn btn-danger">Cancelar</button>
            </div>
        </div>

    </form>
    <div class="alert alert-danger" role="alert"><strong>Quantidade de votos: <?php echo $total;?></strong></div>
    <hr/>
</div> <!-- /container -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#example').dataTable({
        });
    });
</script>

<script type="text/javascript">
    // For demo to fit into DataTables site builder...
    $('#example')
            .removeClass('display')
            .addClass('table table-striped table-bordered');
</script>


