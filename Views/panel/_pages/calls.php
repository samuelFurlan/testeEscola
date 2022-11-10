<?php $v->layout("_theme"); ?>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Todas turmas</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-lg" id="table-calls">
                                    <thead>
                                    <tr>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Ano</th>
                                        <th scope="col">Total Matriculados</th>
                                        <th scope="col">Abrir</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $v->start("scripts"); ?>
    <script src="<?= url_views("panel/_js/calls.js"); ?>"></script>
<?php $v->end(); ?>