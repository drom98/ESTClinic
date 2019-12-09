document.addEventListener('DOMContentLoaded', () => {
  verificarOpcao();
});

const verificarOpcao = () => {
  const tipoMarcacao = document.querySelectorAll('input[name="tipoConsulta"]');
  const tipoTratamento = document.querySelector('#tipoTratamento');
  const tipoConsulta = document.querySelector('#tipoConsulta');
  const enfermeiro = document.querySelector('#enfermeiro');
  const medico = document.querySelector('#medico');

  tipoMarcacao.forEach(element => {
    element.addEventListener('change', () => {
      if(tipoMarcacao[0].checked) {
        if(!tipoConsulta.className.includes('is-hidden') || !medico.className.includes('is-hidden')) {
          tipoConsulta.classList.toggle('is-hidden');
          medico.classList.toggle('is-hidden');
        }
        tipoTratamento.classList.toggle('is-hidden');
        enfermeiro.classList.toggle('is-hidden');
      } else if(tipoMarcacao[1].checked) {
        if(!tipoTratamento.className.includes('is-hidden') || !enfermeiro.className.includes('is-hidden')) {
          tipoTratamento.classList.toggle('is-hidden');
          enfermeiro.classList.toggle('is-hidden');
        }
        tipoConsulta.classList.toggle('is-hidden');
        medico.classList.toggle('is-hidden');
      }
    })
  });
}