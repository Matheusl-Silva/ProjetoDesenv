<?php

class ExameHematoDAO
{
    private function converterParaObj($row)
    {
        $exameHemato = new ExameHemato();

        $exameHemato->setId($row['id']);
        $exameHemato->setHemacia($row['hemacia']);
        $exameHemato->setHemoglobina($row['hemoglobina']);
        $exameHemato->setHematocrito($row['hematocrito']);
        $exameHemato->setVcm($row['vcm']);
        $exameHemato->setHcm($row['hcm']);
        $exameHemato->setChcm($row['chcm']);
        $exameHemato->setRdw($row['rdw']);
        $exameHemato->setLeucocitos($row['leucocitos']);
        $exameHemato->setNeutrofilos($row['neutrofilos']);
        $exameHemato->setBlastos($row['blastos']);
        $exameHemato->setPromielocitos($row['promielocitos']);
        $exameHemato->setMielocitos($row['mielocitos']);
        $exameHemato->setMetamielocitos($row['metamielocitos']);
        $exameHemato->setBastonetes($row['bastonetes']);
        $exameHemato->setSegmentados($row['segmentados']);
        $exameHemato->setEosinofilos($row['eosinofilos']);
        $exameHemato->setBasofilos($row['basofilos']);
        $exameHemato->setLinfocitos($row['linfocitos']);
        $exameHemato->setLinfocitosAtipicos($row['linfocitosAtipicos']);
        $exameHemato->setMonocitos($row['monocitos']);
        $exameHemato->setMieloblastos($row['mieloblastos']);
        $exameHemato->setOutrasCelulas($row['outrasCelulas']);
        $exameHemato->setCelulasLinfoides($row['celulasLinfoides']);
        $exameHemato->setCelulasMonocitoides($row['celulasMonocitoides']);
        $exameHemato->setPlaquetas($row['plaquetas']);
        $exameHemato->setVolumePlaquetarioMedio($row['volumePlaquetarioMedio']);
        $exameHemato->setDataExame($row['dataExame']);
        $exameHemato->setIdResponsavel($row['idResponsavel']);
        $exameHemato->setPreceptor($row['preceptor']);
        $exameHemato->setPaciente($row['paciente']);

        return $exameHemato;
    }
}
