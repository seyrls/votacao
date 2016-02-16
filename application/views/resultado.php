
<div class="container">
    <div class="page-header">
        <div class="panel panel-primary">
            <div class="panel-heading">Resultado parcial - Lista do candidatos que receberam votos</div>
            <div class="panel-body">
                <div class="alert alert-info" role="alert"><strong>Total de votos computados: <?php if(!$dados){echo $dados[0]->total_votos;}else{echo 0;} ?></strong></div>
                <?php
                foreach ($dados as $d) {
                    echo $d->nome;
                    echo '<div class="progress">';
                    echo '<div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: ' . $d->total . '%;">';
                    echo $d->total . '%';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>