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
                                <th>ID</th>
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
                        <td>' . htmlspecialchars($paciente["id"]) . '</td>
                        <td>' . htmlspecialchars($paciente["nome"]) . '</td>
                        <td>' . htmlspecialchars($paciente["email"]) . '</td>
                        <td>' . htmlspecialchars($paciente["periodo"]) . '</td>
                        <td>' . htmlspecialchars($paciente["data_nascimento"]) . '</td>
                        <td>' . htmlspecialchars($paciente["telefone"]) . '</td>
                        <td>' . htmlspecialchars($paciente["nome_mae"]) . '</td>
                        <td>' . ($paciente["toma_medicamento"] === "medSim" ? htmlspecialchars($paciente["medicamento"]) : "Não") . '</td>
                        <td>' . ($paciente["trata_patologia"] === "patSim" ? htmlspecialchars($paciente["patologia"]) : "Não") . '</td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="editarPaciente.php" method="POST" style="display: inline;">
                                    <input type="hidden" name="email" value="' . htmlspecialchars($paciente["email"]) . '">
                                    <button type="submit" name="buscar_paciente" class="btn btn-primary btn-sm" style="width: 60px;">Editar</button>
                                </form>
                                <form action="editarPaciente.php" method="POST" style="display: inline;" onsubmit="return confirm(\'Tem certeza que deseja excluir este paciente?\');">
                                    <input type="hidden" name="email" value="' . htmlspecialchars($paciente["email"]) . '">
                                    <button type="submit" name="excluir_paciente" class="btn btn-danger btn-sm" style="width: 60px;">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>';
        }

        $html .= '</tbody></table></div>';

        return $html;
    }

    public static function renderizarFormularioEdicao($paciente)
    {
        $html = '<div class="card-body bg-body-tertiary">
                    <form action="editarPaciente.php" method="POST">
                        <div class="row">
                            <div class="form-group col">
                                <label for="nome" class="form-label">Nome Completo:</label>
                                <input type="text" class="form-control mb-2" name="nome" id="nome"
                                    value="' . htmlspecialchars($paciente["nome"]) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" class="form-control mb-2" name="email" id="email"
                                    value="' . htmlspecialchars($paciente["email"]) . '" required>
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
                                <input type="date" class="form-control mb-2" name="data_nascimento" id="data_nascimento"
                                    value="' . htmlspecialchars($paciente["data_nascimento"]) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="telefone" class="form-label">Telefone:</label>
                                <input type="tel" class="form-control mb-2" name="telefone" id="telefone"
                                    value="' . htmlspecialchars($paciente["telefone"]) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="nome_mae" class="form-label">Nome da Mãe:</label>
                                <input type="text" class="form-control mb-2" name="nome_mae" id="nome_mae"
                                    value="' . htmlspecialchars($paciente["nome_mae"]) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label">Toma algum medicamento contínuo?</label>
                                <div class="form-check">
                                    <input type="radio" id="medNao" class="form-check-input" name="toma_medicamento" value="medNao" ' . ($paciente["toma_medicamento"] === "medNao" ? "checked" : "") . '>
                                    <label for="medNao" class="form-check-label">Não</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="medSim" class="form-check-input" name="toma_medicamento" value="medSim" ' . ($paciente["toma_medicamento"] === "medSim" ? "checked" : "") . '>
                                    <label for="medSim" class="form-check-label">Sim</label>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="medicamentoContainer" style="display: ' . ($paciente["toma_medicamento"] === "medSim" ? "block" : "none") . ';">
                            <div class="form-group col">
                                <label for="medicamento" class="form-label">Qual medicamento?</label>
                                <input type="text" class="form-control mb-2" name="medicamento" id="medicamento"
                                    value="' . htmlspecialchars($paciente["medicamento"]) . '">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label">Trata alguma patologia?</label>
                                <div class="form-check">
                                    <input type="radio" id="patNao" class="form-check-input" name="trata_patologia" value="patNao" ' . ($paciente["trata_patologia"] === "patNao" ? "checked" : "") . '>
                                    <label for="patNao" class="form-check-label">Não</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="patSim" class="form-check-input" name="trata_patologia" value="patSim" ' . ($paciente["trata_patologia"] === "patSim" ? "checked" : "") . '>
                                    <label for="patSim" class="form-check-label">Sim</label>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="patologiaContainer" style="display: ' . ($paciente["trata_patologia"] === "patSim" ? "block" : "none") . ';">
                            <div class="form-group col">
                                <label for="patologia" class="form-label">Qual patologia?</label>
                                <input type="text" class="form-control mb-2" name="patologia" id="patologia"
                                    value="' . htmlspecialchars($paciente["patologia"]) . '">
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
