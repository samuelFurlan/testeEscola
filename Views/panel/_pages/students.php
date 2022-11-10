<?php $v->layout("_theme"); ?>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Novo aluno</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="/alunos/salvar"
                                  id="new-students-form" enctype="multipart/form-data">
                                <input type="hidden" id="students_id" name="students_id">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="students_name">Nome Completo</label>
                                            <input type="text" id="students_name" class="form-control"
                                                   name="students_name" placeholder="Ex. João da Silva" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="students_birth">Data de nascimento</label>
                                            <input type="date" id="students_birth" class="form-control"
                                                   name="students_birth" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="students_cpf">CPF</label>
                                            <input type="text" id="students_cpf" class="form-control"
                                                   name="students_cpf" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="students_status">Situação</label>
                                            <select class="form-select" id="students_status" name="students_status"
                                                    required>
                                                <option value="">Escolha uma opção</option>
                                                <option value="1">Ativo</option>
                                                <option value="2">Inativo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4 d-flex justify-content-end">
                                        <button type="reset" onclick="$('#students_id').val('');" id="btn-reset"
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
                        <h4 class="card-title">Todos Alunos</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-lg" id="table-students">
                                    <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Nascimento</th>
                                        <th scope="col">CPF</th>
                                        <th scope="col">Turma</th>
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
    <script src="<?= url_views("panel/_js/students.js"); ?>"></script>
<?php $v->end(); ?>