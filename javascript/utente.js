document.addEventListener('DOMContentLoaded', () => {
  verificarOpcao();
});

const verificarOpcao = () => {
  const tipoConsultaEl = document.querySelectorAll('input[name="tipoConsulta"]');

  tipoConsultaEl.forEach(element => {
    element.addEventListener('click', () => {
      if(tipoConsultaEl[0].checked) {
        console.log(tipoConsultaEl[0].value);
      } else if(tipoConsultaEl[1].checked) {
        console.log(tipoConsultaEl[1].value);
      }
    })
  });
}