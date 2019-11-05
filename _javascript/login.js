document.addEventListener('DOMContentLoaded', () => {
    const urlString = window.location.href;
    const url = new URL(urlString);
    const value = url.searchParams.get("erro");
    switch(value) {
      case 'nome':
        mostrarErro(value);
        break;
      case 'password':
        mostrarErro(value);
        break;
    }
});

let mostrarErro = (erro) => {
  const textEl = document.querySelector(`#${erro}`);
  const inputEl = document.querySelector(`input[name=${erro}]`);
  
  textEl.classList.remove('is-hidden');
  inputEl.classList.add('is-danger');
}
