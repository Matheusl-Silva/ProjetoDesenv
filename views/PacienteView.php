<?php
require_once '../dao/PacienteDAO.php';
class PacienteView
{
    public static function renderizarTabelaPaciente()
    {
        $pDao = new PacienteDAO();

        $listaPacientes = $pDao->listarPacientes();
        $html           = '<div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Período</th>
                                <th>Data de nascimento</th>
                                <th>Telefone</th>
                                <th>Nome da mãe</th>
                                <th>Medicamento</th>
                                <th>Patologia</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>';

        foreach ($listaPacientes as $paciente) {
            $html .= '<tr>
                        <td>' . ($paciente["id"]) . '</td>
                        <td>' . ($paciente["nome"]) . '</td>
                        <td>' . ($paciente["email"]) . '</td>
                        <td>' . ($paciente["periodo"]) . '</td>
                        <td>' . ($paciente["data_nascimento"]) . '</td>
                        <td>' . ($paciente["telefone"]) . '</td>
                        <td>' . ($paciente["nome_mae"]) . '</td>
                        <td>' . ($paciente["toma_medicamento"] === "S" ? ($paciente["medicamento"]) : "Não") . '</td>
                        <td>' . ($paciente["trata_patologia"] === "S" ? ($paciente["patologia"]) : "Não") . '</td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="editarPaciente.php" method="POST" style="display: inline;">
                                    <input type="hidden" name="email" value="' . ($paciente["email"]) . '">
                                    <button type="submit" name="buscar_paciente" class="btn btn-primary btn-sm" style="width: 60px;">Editar</button>
                                </form>
                                <form action="editarPaciente.php" method="POST" style="display: inline;" id="formExcluir_' . $paciente["email"] . '">
                                    <input type="hidden" name="email" value="' . $paciente["email"] . '">
                                    <input type="hidden" name="excluir_paciente" value="1">
                                    <button type="button" class="btn btn-danger btn-sm" style="width: 60px;" onclick="confirmarExclusao(\'' . $paciente["email"] . '\')">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>';
        }

        $html .= '</tbody></table></div>';

        $html .= '
        <!-- Modal de Confirmação de Exclusão -->
        <div class="modal fade" id="modalConfirmacao" tabindex="-1" aria-labelledby="modalConfirmacaoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalConfirmacaoLabel">Confirmar Exclusão</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja excluir este paciente?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="btnConfirmarExclusao">Confirmar Exclusão</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
        function confirmarExclusao(email) {
            const modal = new bootstrap.Modal(document.getElementById("modalConfirmacao"));
            const btnConfirmar = document.getElementById("btnConfirmarExclusao");

            btnConfirmar.onclick = function() {
                document.getElementById("formExcluir_" + email).submit();
            };

            modal.show();
        }
        </script>';

        return $html;
    }

    public static function renderizarFormularioEdicao($paciente)
    {
        $data           = new DateTime($paciente["data_nascimento"]);
        $data_formatada = $data->format('d/m/Y');

        $html = '<div class="card-body bg-body-tertiary">
                    <form action="editarPaciente.php" method="POST">
                        <input type="hidden" name="id" value="' . ($paciente["id"]) . '">
                        <div class="row">
                            <div class="form-group col">
                                <label for="nome" class="form-label">Nome Completo:</label>
                                <input type="text" class="form-control mb-2" name="nome" id="nome"
                                    value="' . ($paciente["nome"]) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" class="form-control mb-2" name="email" id="email"
                                    value="' . ($paciente["email"]) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label">Período:</label>
                                <div class="form-check">
                                    <input type="radio" id="matutino" class="form-check-input" name="periodo" value="matutino" ' . ($paciente["periodo"] === "matutino" ? "checked" : "") . '>
                                    <label for="matutino" class="form-check-label">Matutino</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="noturno" class="form-check-input" name="periodo" value="noturno" ' . ($paciente["periodo"] === "noturno" ? "checked" : "") . '>
                                    <label for="noturno" class="form-check-label">Noturno</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                                <input type="text" class="form-control mb-2" name="data_nascimento" id="data_nascimento"
                                    value="' . $data_formatada . '" placeholder="DD/MM/AAAA" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="telefone" class="form-label">Telefone:</label>
                                <input type="tel" class="form-control mb-2" name="telefone" id="telefone"
                                    value="' . ($paciente["telefone"]) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="nome_mae" class="form-label">Nome da Mãe:</label>
                                <input type="text" class="form-control mb-2" name="nome_mae" id="nome_mae"
                                    value="' . ($paciente["nome_mae"]) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label">Toma algum medicamento contínuo?</label>
                                <div class="form-check">
                                    <input type="radio" id="medNao" class="form-check-input" name="toma_medicamento" value="N" ' . ($paciente["toma_medicamento"] === "N" ? "checked" : "") . '>
                                    <label for="medNao" class="form-check-label">Não</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="medSim" class="form-check-input" name="toma_medicamento" value="S" ' . ($paciente["toma_medicamento"] === "S" ? "checked" : "") . '>
                                    <label for="medSim" class="form-check-label">Sim</label>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="medicamentoContainer" style="display: ' . ($paciente["toma_medicamento"] === "S" ? "block" : "none") . ';">
                            <div class="form-group col">
                                <label for="medicamento" class="form-label">Qual medicamento?</label>
                                <input type="text" class="form-control mb-2" name="medicamento" id="medicamento"
                                    value="' . ($paciente["medicamento"]) . '">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label">Trata alguma patologia?</label>
                                <div class="form-check">
                                    <input type="radio" id="patNao" class="form-check-input" name="trata_patologia" value="N" ' . ($paciente["trata_patologia"] === "N" ? "checked" : "") . '>
                                    <label for="patNao" class="form-check-label">Não</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="patSim" class="form-check-input" name="trata_patologia" value="S" ' . ($paciente["trata_patologia"] === "S" ? "checked" : "") . '>
                                    <label for="patSim" class="form-check-label">Sim</label>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="patologiaContainer" style="display: ' . ($paciente["trata_patologia"] === "S" ? "block" : "none") . ';">
                            <div class="form-group col">
                                <label for="patologia" class="form-label">Qual patologia?</label>
                                <input type="text" class="form-control mb-2" name="patologia" id="patologia"
                                    value="' . ($paciente["patologia"]) . '">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="atualizar_paciente" class="btn btn-primary col-12 mt-3 mb-2">Atualizar</button>
                        </div>
                    </form>
                </div>';

        return $html;
    }
}
