<?php
class LaudoView
{
    public static function renderizarLaudo($exame)
    {
        // Formatar a data do exame
        $dataExame    = isset($exame['data']) ? date('d/m/Y H:i', strtotime($exame['data'])) : 'Data não informada';
        $nomePaciente = isset($exame['nome_paciente']) ? $exame['nome_paciente'] : 'Paciente não identificado';
        $responsavel  = isset($exame['nome_responsavel']) ? $exame['nome_responsavel'] : 'Responsável não identificado';
        $preceptor    = isset($exame['nome_preceptor']) ? $exame['nome_preceptor'] : 'Preceptor não identificado';

        $html = '<div class="header">
  <img class="header-logo" src="../assets/img/LogoPositivo.png" alt="Logo Universidade Positivo">
  <h1>HEMOGRAMA</h1>
  <p>
    <strong>Paciente:</strong> ' . htmlspecialchars($nomePaciente) . ' |
    <strong>Data do Exame:</strong> ' . $dataExame . ' |
    <strong>Responsável:</strong> ' . htmlspecialchars($responsavel) . ' |
    <strong>Preceptor:</strong> ' . htmlspecialchars($preceptor) . '
  </p>
  <p>
    <strong>Material:</strong> Sangue <strong>Coletado em:</strong> <span id="data-coleta"></span> <strong>Método:</strong> Automatizado - Citometria de fluxo, contagem a laser, impedância
  </p>
</div>

<div class="secao">
  <h3>ERITROGRAMA</h3>
  <div style="display: grid; grid-template-columns: 200px 1fr 100px 150px; font-weight: bold; font-size: 14px; margin-bottom: 5px;">
    <span></span>
    <span></span>
    <span style="text-align: right;">Resultado</span>
    <span style="text-align: right;">Referência</span>
  </div>
  <div class="elemento">
    <span>Hemácias (milhões)</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="hemacia"></span><strong>' . $exame["hemacia"] . '/mm³</strong></span>
    <span class="referencia">3,90 a 5,03 /mm³</span>
  </div>
  <div class="elemento">
    <span>Hemoglobina</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="hemoglobina"></span><strong>' . $exame["hemoglobina"] . 'g/dL</strong></span>
    <span class="referencia">12,0 a 15,5 g/dL</span>
  </div>
  <div class="elemento">
    <span>Hematócrito</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="hematocrito"></span><strong>' . $exame["hematocrito"] . '%</strong></span>
    <span class="referencia">34,9 a 44,5 %</span>
  </div>
  <div class="elemento">
    <span>V.C.M.</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="vcm"></span><strong>' . $exame["vcm"] . 'fL</strong></span>
    <span class="referencia">81,6 a 98,3 fL</span>
  </div>
  <div class="elemento">
    <span>H.C.M.</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="hcm"></span><strong>' . $exame["hcm"] . 'pg</strong></span>
    <span class="referencia">26,0 a 34,0 pg</span>
  </div>
  <div class="elemento">
    <span>C.H.C.M.</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="chcm"></span><strong>' . $exame["chcm"] . 'g/dL</strong></span>
    <span class="referencia">31,0 a 36,0 g/dL</span>
  </div>
  <div class="elemento">
    <span>RDW</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="rdw"></span><strong>' . $exame["rdw"] . '%</strong></span>
    <span class="referencia">11,8 a 15,5 %</span>
  </div>
</div>

<div class="secao">
  <h3>LEUCOGRAMA</h3>
  <div style="display: grid; grid-template-columns: 200px 1fr 100px 150px; font-weight: bold; font-size: 14px; margin-bottom: 5px;">
    <span></span>
    <span></span>
    <span style="text-align: right;">Resultado</span>
    <span style="text-align: right;">Referência</span>
  </div>
  <div class="elemento">
    <span>Leucócitos totais</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="leucocitos"></span><strong>' . $exame["leucocitos"] . '/mm³</strong></span>
    <span class="referencia">3.500 a 10.500/mm³</span>
  </div>
  <div class="elemento">
    <span>Blastos</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="blastos_p"></span><strong>' . $exame["blastos"] . '%</strong></span>
    <span class="referencia">0 %</span>
  </div>
  <div class="elemento">
    <span>Prómielócitos</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="promielocitos_p"></span><strong>' . $exame["promielocitos"] . '%</strong></span>
    <span class="referencia">0 %</span>
  </div>
  <div class="elemento">
    <span>Mielócitos</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="mielocitos_p"></span><strong>' . $exame["mielocitos"] . '%</strong></span>
    <span class="referencia">0 %</span>
  </div>
  <div class="elemento">
    <span>Metamielócitos</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="metamielocitos_p"></span><strong>' . $exame["metamielocitos"] . '%</strong></span>
    <span class="referencia">0 a %</span>
  </div>
  <div class="elemento">
    <span>Bastonetes</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="bastonetes_p"></span><strong>' . $exame["bastonetes"] . '%</strong></span>
    <span class="referencia">0 a 8%</span>
  </div>
  <div class="elemento">
    <span>Segmentados</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="segmentados_p"></span><strong>' . $exame["segmentados"] . '%</strong></span>
    <span class="referencia">40 a 80%</span>
  </div>
  <div class="elemento">
        <span>Neutrófilos</span>
        <div class="traco"></div>
        <span class="valor-unidade"><span id="neutrofilos"></span><strong>' . $exame["neutrofilos"] . '%</strong></span>
        <span class="referencia">35% a 66%</span>
    </div>
  <div class="elemento">
    <span>Eosinófilos</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="eosinofilos_p"></span><strong>' . $exame["eosinofilos"] . '%</strong></span>
    <span class="referencia">1 a 5%</span>
  </div>
  <div class="elemento">
    <span>Basófilos</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="basofilos_p"></span><strong>' . $exame["basofilos"] . '%</strong></span>
    <span class="referencia">0 a 1%</span>
  </div>
</div>
<div class="secao">
    <h3>PLAQUETOGRAMA</h3>
    <div style="display: grid; grid-template-columns: 200px 1fr 100px 150px; font-weight: bold; font-size: 14px; margin-bottom: 5px;">
      <span></span>
      <span></span>
      <span style="text-align: right;">Resultado</span>
      <span style="text-align: right;">Referência</span>
    </div>
    <div class="elemento">
      <span>Plaquetas</span>
      <div class="traco"></div>
        <span class="valor-unidade"><span id="plaquetas"></span><strong>' . $exame["plaquetas"] . 'mil/mm³</strong></span>
        <span class="referencia">150 a 400 mil/mm³</span>
      </div>
    <div class="elemento">
        <span>Volume plaquetário médio</span>
        <div class="traco"></div>
        <span class="valor-unidade"><span id="volplaquetariomedio"></span><strong>' . $exame["volplaquetariomedio"] . 'fL</strong></span>
        <span class="referencia">7,5 a 12fL</span>
    </div>
</div>

</div>';

        return $html;
    }
}
