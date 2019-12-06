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
      //Registo
      case 'userName':
        mostrarErro(value);
        break;
      case 'permissao':
        erroPermissao(value);
        break;
      case 'aprovar':
        erroPermissao(value);
        break;
      case 'logout':
        erroPermissao(value);
        break;
      case 'eliminado':
        erroPermissao(value);
      default: 
        break;
    }

    esconderErro(value);
});

let mostrarErro = (erro) => {
  const textEl = document.querySelector(`#${erro}`);
  const inputEl = document.querySelector(`input[name=${erro}]`);
  
  textEl.classList.remove('is-hidden');
  inputEl.classList.add('is-danger');
}

let esconderErro = (erro) => {
  const textEl = document.querySelector(`#${erro}`);
  const inputEl = document.querySelector(`input[name=${erro}]`);

  inputEl.addEventListener('click', () => {
    textEl.classList.add('is-hidden');
    inputEl.classList.remove('is-danger');
  });
}

let erroPermissao = (erro) => {
  const messageEl = document.querySelector(`#${erro}`);

  messageEl.classList.remove('is-hidden');
}