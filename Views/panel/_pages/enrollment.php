<?php $v->layout("_theme"); ?>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Nova matrícula</h4>
                        <small>Utilize o CPF para localizar o aluno.</small>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="/matriculas/salvar"
                                  id="new-enrollment-form" enctype="multipart/form-data">
                                <input type="hidden" id="enrollment_id" name="enrollment_id">
                                <input type="hidden" id="students_id" name="students_id">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="students_cpf">CPF do aluno</label>
                                            <input type="text" id="students_cpf" class="form-control"
                                                   name="students_cpf" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="students_name">Nome do aluno</label>
                                            <input type="text" id="students_name" class="form-control"
                                                   name="students_name" placeholder="Ex. João da Silva" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="classes_id">Turmas</label>
                                            <select class="form-select" id="classes_id" name="classes_id" required>
                                                <option value="">Escolha uma opção</option>
                                                <?php
                                                if (!empty($classes)):
                                                    foreach ($classes as $class):
                                                        ?>
                                                        <option value="<?= $class->classes_id ?>">
                                                            <?= $class->classes_description . " - " . $class->classes_year ?>
                                                        </option>
                                                    <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="enrollment_date">Data da matrícula</label>
                                            <input type="date" id="enrollment_date" class="form-control"
                                                   name="enrollment_date" value="<?= date("Y-m-d") ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="enrollment_status">Situação</label>
                                            <select class="form-select" id="enrollment_status" name="enrollment_status"
                                                    required>
                                                <option value="">Escolha uma opção</option>
                                                <option value="1">Ativo</option>
                                                <option value="2">Inativo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4 d-flex justify-content-end">
                                        <button type="reset" onclick="$('#enrollment_id').val('');$('#students_id').val('');" id="btn-reset"
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
                        <h4 class="card-title">Todas Matrículas</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-lg" id="table-enrollment">
                                    <thead>
                                    <tr>
                                        <th scope="col">Aluno</th>
                                        <th scope="col">CPF</th>
                                        <th scope="col">Turma</th>
                                        <th scope="col">Data matrícula</th>
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
    <script src="<?= url_views("panel/_js/enrollment.js"); ?>"></script>
<?php $v->end(); ?>