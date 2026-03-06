function isValidDecimal(value) {
  if (!value) return false;
  const regex = /^\d+([.,]\d+)?$/;
  return regex.test(value);
}

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
  for (i = 0; i < examNames.length; i++) {
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
