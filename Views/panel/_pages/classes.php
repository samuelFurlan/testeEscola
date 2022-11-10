<?php $v->layout("_theme"); ?>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Nova Turma</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="/turmas/salvar"
                                  id="new-classes-form" enctype="multipart/form-data">
                                <input type="hidden" id="classes_id" name="classes_id">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="classes_description">Descrição</label>
                                            <input type="text" id="classes_description" class="form-control"
                                                   name="classes_description" placeholder="Ex. 1 Ano" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="classes_year">Ano</label>
                                            <input type="text" id="classes_year" class="form-control"
                                                   name="classes_year" placeholder="Ex. 2022" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="classes_vacancies">Vagas</label>
                                            <input type="number" min="0" step="1" id="classes_vacancies"
                                                   class="form-control"
                                                   name="classes_vacancies" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="classes_status">Situação</label>
                                            <select class="form-select" id="classes_status" name="classes_status"
                                                    required>
                                                <option value="">Escolha uma opção</option>
                                                <option value="1">Ativo</option>
                                                <option value="2">Inativo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4 d-flex justify-content-end">
                                        <button type="reset" onclick="$('#classes_id').val('');" id="btn-reset"
                                                class="btn btn-light-secondary me-1 mb-1">Limpar
                                        </button>
                                        <button type="submit" id="button-submit" class="btn btn-primary me-1 mb-1">
                                            Salvar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Todas Turmas</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-lg" id="table-classes">
                                    <thead>
                                    <tr>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Ano</th>
                                        <th scope="col">Total Vagas</th>
                                        <th scope="col">Vagas Disponível</th>
                                        <th scope="col">Situação</th>
                                        <th scope="col">Editar</th>
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
    <script src="<?= url_views("panel/_js/classes.js"); ?>"></script>
<?php $v->end(); ?>