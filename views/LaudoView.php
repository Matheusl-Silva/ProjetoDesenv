<?php
class LaudoView
{
  public static function renderizarLaudo($exame)
  {
    $html = '<div class="header">
  <img class="header-logo" src="../assets/img/LogoPositivo.png" alt="Logo Universidade Positivo">
  <h1>HEMOGRAMA</h1>
  <p>
    <strong>Material:</strong> Sangue <strong>Coletado em:</strong> <span id="data-coleta"></span> <strong>Método:</strong> Automatizado - Citometria de fluxo, contagem a laser, impedância
  </p>
</div>

<div class="secao">
  <h3>ERITROGRAMA</h3>
  <div class="elemento">
    <span>Hemácias (milhões)</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="hemacia"></span>' . $exame["hemacia"] . '/mm³</span>
    <span class="referencia">3,90 a 5,03 /mm³</span>
  </div>
  <div class="elemento">
    <span>Hemoglobina</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="hemoglobina"></span>' . $exame["hemoglobina"] . 'g/dL</span>
    <span class="referencia">12,0 a 15,5 g/dL</span>
  </div>
  <div class="elemento">
    <span>Hematócrito</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="hematocrito"></span>' . $exame["hematocrito"] . '%</span>
    <span class="referencia">34,9 a 44,5 %</span>
  </div>
  <div class="elemento">
    <span>V.C.M.</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="vcm"></span>' . $exame["vcm"] . 'fL</span>
    <span class="referencia">81,6 a 98,3 fL</span>
  </div>
  <div class="elemento">
    <span>H.C.M.</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="hcm"></span>' . $exame["hcm"] . 'pg</span>
    <span class="referencia">26,0 a 34,0 pg</span>
  </div>
  <div class="elemento">
    <span>C.H.C.M.</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="chcm"></span>' . $exame["chcm"] . 'g/dL</span>
    <span class="referencia">31,0 a 36,0 g/dL</span>
  </div>
  <div class="elemento">
    <span>RDW</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="rdw"></span>' . $exame["rdw"] . '%</span>
    <span class="referencia">11,8 a 15,5 %</span>
  </div>
</div>

<div class="secao">
  <h3>LEUCOGRAMA</h3>
  <div class="elemento">
    <span>Leucócitos totais</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="leucocitos"></span>' . $exame["leucocitos"] . '/mm³</span>
    <span class="referencia">3.500 a 10.500/mm³</span>
  </div>
  <div class="elemento">
    <span>Blastos</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="blastos_p"></span>' . $exame["blastos"] . '%</span>
    <span class="referencia">0 %</span>
  </div>
  <div class="elemento">
    <span>Prómielócitos</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="promielocitos_p"></span>' . $exame["promielocitos"] . '%</span>
    <span class="referencia">0 %</span>
  </div>
  <div class="elemento">
    <span>Mielócitos</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="mielocitos_p"></span>' . $exame["mielocitos"] . '%</span>
    <span class="referencia">0 %</span>
  </div>
  <div class="elemento">
    <span>Metamielócitos</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="metamielocitos_p"></span>' . $exame["metamielocitos"] . '%</span>
    <span class="referencia">0 a %</span>
  </div>
  <div class="elemento">
    <span>Bastonetes</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="bastonetes_p"></span>' . $exame["bastonetes"] . '%</span>
    <span class="referencia">0 a 8%</span>
  </div>
  <div class="elemento">
    <span>Segmentados</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="segmentados_p"></span>' . $exame["segmentados"] . '%</span>
    <span class="referencia">40 a 80%</span>
  </div>
  <div class="elemento">
        <span>Neutrófilos</span>
        <div class="traco"></div>
        <span class="valor-unidade"><span id="neutrofilos"></span>' . $exame["neutrofilos"] . '%</span>
        <span class="referencia">35% a 66%</span>
    </div>
  <div class="elemento">
    <span>Eosinófilos</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="eosinofilos_p"></span>' . $exame["eosinofilos"] . '%</span>
    <span class="referencia">1 a 5%</span>
  </div>
  <div class="elemento">
    <span>Basófilos</span>
    <div class="traco"></div>
    <span class="valor-unidade"><span id="basofilos_p"></span>' . $exame["basofilos"] . '%</span>
    <span class="referencia">0 a 1%</span>
  </div>
<div class="secao">
    <h3>PLAQUETOGRAMA</h3>
    <div class="elemento">
      <span>Plaquetas</span>
      <div class="traco"></div>
        <span class="valor-unidade"><span id="plaquetas"></span>' . $exame["plaquetas"] . 'mil/mm³</span>
        <span class="referencia">150 a 400 mil/mm³</span>
      </div>
    </div>
    <div class="elemento">
        <span>Volume plaquetário médio</span>
        <div class="traco"></div>
        <span class="valor-unidade"><span id="volplaquetariomedio"></span>' . $exame["volplaquetariomedio"] . 'fL</span>
        <span class="referencia">7,5 a 12fL</span>
    </div>
</div>
  
</div>';

return $html;
  }
}
