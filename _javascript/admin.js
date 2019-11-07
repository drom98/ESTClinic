document.addEventListener('DOMContentLoaded', () => {
  const urlString = window.location.href;
  const url = new URL(urlString);
  const value = url.searchParams.get("tab");
  switch(value) {
    case 'utilizadores':
      ativarBgTab(value);
      break;
    case 'usersPorAprovar':
      ativarBgTab(value);
    default: 
      break;
  }

  editarUser();
  fecharModal();
});

let ativarBgTab = (tab) => {
  const tabEl = document.querySelector(`#${tab}`);
  tabEl.classList.toggle('is-active');
}

//Secção Gerir Utilizadores
let editarUser = () => {
  fecharModal();
  const btnEditar = document.querySelector('#btnEditarUser');
  btnEditar.addEventListener('click', () => {
    const modalEl = document.querySelector('.modal');
    console.log(modalEl);
    modalEl.classList.toggle('is-active');
  });
}

let fecharModal = () => {
  const modalEl = document.querySelector('.modal');
  const bgEl = document.querySelector('.modal-background');
  const closeBtn = document.querySelector('.delete');
  const btnCancel = document.querySelector('#btnCancel');

  bgEl.addEventListener('click', () => {
    modalEl.classList.remove('is-active');
    console.log('cenas');
  });
  closeBtn.addEventListener('click', () => {
    modalEl.classList.remove('is-active');
  });
  btnCancel.addEventListener('click', () => {
    modalEl.classList.remove('is-active');
  });
}