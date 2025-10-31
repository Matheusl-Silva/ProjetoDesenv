const db = require("../database/connection");

exports.findAll = () => {
  return new Promise((resolve, reject) => {
    db.query("SELECT * FROM referencia_hematologia", (err, result) => {
      err ? reject(err) : resolve(result);
    });
  });
};

exports.create = (data) => {
  return new Promise((resolve, reject) => {
    const query = `
      INSERT INTO referencia_hematologia (
        id,
        chemacia_m, chemacia_f,
        chemoglobina_m, chemoglobina_f,
        chematocrito_m, chematocrito_f,
        cvcm_m, cvcm_f,
        chcm_m, chcm_f,
        cchcw_m, cchcw_f,
        crdw_m, crdw_f,
        cleucocitos_relativo, cleucocitos_absoluto,
        cneutrofilos_relativo, cneutrofilos_absoluto,
        cblastos_relativo, cblastos_absoluto,
        cpromielocitos_relativo, cpromielocitos_absoluto,
        cmielocitos_relativo, cmielocitos_absoluto,
        cmetamielocitos_relativo, cmetamielocitos_absoluto,
        cbastonetes_relativo, cbastonetes_absoluto,
        csegmentados_relativo, csegmentados_absoluto,
        ceosinofilos_relativo, ceosinofilos_absoluto,
        cbasofilos_relativo, cbasofilos_absoluto,
        clinfocitos_relativo, clinfocitos_absoluto,
        clinfocitos_atipicos_relativo, clinfocitos_atipicos_absoluto,
        cmonocitos_relativo, cmonocitos_absoluto,
        cmieloblastos_relativo, cmieloblastos_absoluto,
        coutras_celulas_relativo, coutras_celulas_absoluto,
        ccelulas_linfoides_relativo, ccelulas_linfoides_absoluto,
        ccelulas_monocitoides_relativo, ccelulas_monocitoides_absoluto,
        cplaquetas,
        cvolume_plaquetario_medio
      ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    `;

    const values = [
      data.id,
      data.hemacia_m,
      data.hemacia_f,
      data.hemoglobina_m,
      data.hemoglobina_f,
      data.hematocrito_m,
      data.hematocrito_f,
      data.vcm_m,
      data.vcm_f,
      data.hcm_m,
      data.hcm_f,
      data.chcm_m,
      data.chcm_f,
      data.rdw_m,
      data.rdw_f,
      data.leucocitos_relativo,
      data.leucocitos_absoluto,
      data.neutrofilos_relativo,
      data.neutrofilos_absoluto,
      data.blastos_relativo,
      data.blastos_absoluto,
      data.promielocitos_relativo,
      data.promielocitos_absoluto,
      data.mielocitos_relativo,
      data.mielocitos_absoluto,
      data.metamielocitos_relativo,
      data.metamielocitos_absoluto,
      data.bastonetes_relativo,
      data.bastonetes_absoluto,
      data.segmentados_relativo,
      data.segmentados_absoluto,
      data.eosinofilos_relativo,
      data.eosinofilos_absoluto,
      data.basofilos_relativo,
      data.basofilos_absoluto,
      data.linfocitos_relativo,
      data.linfocitos_absoluto,
      data.linfocitos_atipicos_relativo,
      data.linfocitos_atipicos_absoluto,
      data.monocitos_relativo,
      data.monocitos_absoluto,
      data.mieloblastos_relativo,
      data.mieloblastos_absoluto,
      data.outras_celulas_relativo,
      data.outras_celulas_absoluto,
      data.celulas_linfoides_relativo,
      data.celulas_linfoides_absoluto,
      data.celulas_monocitoides_relativo,
      data.celulas_monocitoides_absoluto,
      data.plaquetas,
      data.volume_plaquetario_medio,
    ];

    db.query(query, values, (err, result) => {
      if (err) {
        console.error("Erro ao executar query:", err);
        reject(err);
      } else {
        resolve(result);
      }
    });
  });
};

exports.update = (id, data) => {
  return new Promise((resolve, reject) => {
    const query = `
      UPDATE referencia_hematologia SET
        chemacia_m = ?, chemacia_f = ?,
        chemoglobina_m = ?, chemoglobina_f = ?,
        chematocrito_m = ?, chematocrito_f = ?,
        cvcm_m = ?, cvcm_f = ?,
        chcm_m = ?, chcm_f = ?,
        cchcw_m = ?, cchcw_f = ?,
        crdw_m = ?, crdw_f = ?,
        cleucocitos_relativo = ?, cleucocitos_absoluto = ?,
        cneutrofilos_relativo = ?, cneutrofilos_absoluto = ?,
        cblastos_relativo = ?, cblastos_absoluto = ?,
        cpromielocitos_relativo = ?, cpromielocitos_absoluto = ?,
        cmielocitos_relativo = ?, cmielocitos_absoluto = ?,
        cmetamielocitos_relativo = ?, cmetamielocitos_absoluto = ?,
        cbastonetes_relativo = ?, cbastonetes_absoluto = ?,
        csegmentados_relativo = ?, csegmentados_absoluto = ?,
        ceosinofilos_relativo = ?, ceosinofilos_absoluto = ?,
        cbasofilos_relativo = ?, cbasofilos_absoluto = ?,
        clinfocitos_relativo = ?, clinfocitos_absoluto = ?,
        clinfocitos_atipicos_relativo = ?, clinfocitos_atipicos_absoluto = ?,
        cmonocitos_relativo = ?, cmonocitos_absoluto = ?,
        cmieloblastos_relativo = ?, cmieloblastos_absoluto = ?,
        coutras_celulas_relativo = ?, coutras_celulas_absoluto = ?,
        ccelulas_linfoides_relativo = ?, ccelulas_linfoides_absoluto = ?,
        ccelulas_monocitoides_relativo = ?, ccelulas_monocitoides_absoluto = ?,
        cplaquetas = ?,
        cvolume_plaquetario_medio = ?
      WHERE id = 1
    `;

    const values = [
      data.hemacia_m,
      data.hemacia_f,
      data.hemoglobina_m,
      data.hemoglobina_f,
      data.hematocrito_m,
      data.hematocrito_f,
      data.vcm_m,
      data.vcm_f,
      data.hcm_m,
      data.hcm_f,
      data.chcm_m,
      data.chcm_f,
      data.rdw_m,
      data.rdw_f,
      data.leucocitos_relativo,
      data.leucocitos_absoluto,
      data.neutrofilos_relativo,
      data.neutrofilos_absoluto,
      data.blastos_relativo,
      data.blastos_absoluto,
      data.promielocitos_relativo,
      data.promielocitos_absoluto,
      data.mielocitos_relativo,
      data.mielocitos_absoluto,
      data.metamielocitos_relativo,
      data.metamielocitos_absoluto,
      data.bastonetes_relativo,
      data.bastonetes_absoluto,
      data.segmentados_relativo,
      data.segmentados_absoluto,
      data.eosinofilos_relativo,
      data.eosinofilos_absoluto,
      data.basofilos_relativo,
      data.basofilos_absoluto,
      data.linfocitos_relativo,
      data.linfocitos_absoluto,
      data.linfocitos_atipicos_relativo,
      data.linfocitos_atipicos_absoluto,
      data.monocitos_relativo,
      data.monocitos_absoluto,
      data.mieloblastos_relativo,
      data.mieloblastos_absoluto,
      data.outras_celulas_relativo,
      data.outras_celulas_absoluto,
      data.celulas_linfoides_relativo,
      data.celulas_linfoides_absoluto,
      data.celulas_monocitoides_relativo,
      data.celulas_monocitoides_absoluto,
      data.plaquetas,
      data.volume_plaquetario_medio,
    ];

    db.query(query, values, (err, result) => {
      if (err) {
        console.error("Erro ao executar query de update:", err);
        reject(err);
      } else {
        resolve(result);
      }
    });
  });
};