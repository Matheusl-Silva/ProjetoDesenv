const examRegex = /^\d+([.,]\d+)?$/;

exports.hematoExamValidation = (reqBody) => {
  const examNames = Object.keys(reqBody).filter((key) => {
    return ![
      "id_responsavel",
      "id_preceptor",
      "id_paciente",
      "data",
      "observacao",
    ].includes(key);
  });
  for (let i = 0; i < examNames.length; i++) {
    return isValidDecimal(reqBody[examNames[i]]);
  }
};

exports.replaceToInsertHemato = (reqBody) => {
  const nomesExames = Object.keys(reqBody).filter((key) => {
    return ![
      "id_responsavel",
      "id_preceptor",
      "id_paciente",
      "data",
      "observacao",
    ].includes(key);
  });
  nomesExames.forEach((nome) => {
    reqBody[nome] = String(reqBody[nome]).replace(",", ".");
  });
};

exports.bioExamValidation = reqBody => {
    const examNames = Object.keys(reqBody).filter((key) => {
    return ![
      "id_responsavel",
      "id_preceptor",
      "id_paciente",
      "data_exame",
      "observacao",
    ].includes(key);
  });
  for (let i = 0; i < examNames.length; i++) {
    const examValue = reqBody[examNames[i]];
    if(!examRegex.test(String(examValue)) && examValue !== "" && examValue !== null) {
    console.log("Nome: ", examNames[i], "Valor:", examValue);
      return false;
    }
  }
  return true;
}

exports.replaceToInsertBio = reqBody => {
const nomesExames = Object.keys(reqBody).filter((key) => {
    return ![
      "id_responsavel",
      "id_preceptor",
      "id_paciente",
      "data_exame",
      "observacao",
    ].includes(key);
  });
  nomesExames.forEach((nome) => {
    reqBody[nome] = String(reqBody[nome]).replace(",", ".");
  })
}