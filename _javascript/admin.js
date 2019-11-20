document.addEventListener('DOMContentLoaded', () => {
  const urlString = window.location.href;
  const url = new URL(urlString);
  const tabValue = url.searchParams.get("tab");
  const mValue = url.searchParams.get("m");
  switch(tabValue) {
    case 'utilizadores':
      ativarBgTab(tabValue);
      break;
    case 'usersPorAprovar':
      ativarBgTab(tabValue);
      break;
    case 'usersEliminados':
      ativarBgTab(tabValue);
      break;
    case 'gerirMarcacoes':
        ativarBgTab(tabValue);
    default: 
      break;
  }

  if(mValue == "porAprovar") {
    const tabAprovadas = document.querySelectorAll('#tab');

    tabAprovadas.forEach(tab => {
      tab.classList.toggle('is-active');
    });
  }
});

let ativarBgTab = (tab) => {
  const tabEl = document.querySelector(`#${tab}`);
  tabEl.classList.toggle('is-active');
}

let fecharModal = () => {
  const modalEl = document.querySelectorAll('.modal');
  const bgEl = document.querySelectorAll('.modal-background');
  const closeBtn = document.querySelectorAll('.delete');
  const btnCancel = document.querySelectorAll('#btnCancel');

  bgEl.forEach(el => {
    el.addEventListener('click', () => {
      modalEl.forEach((modal) => {
        modal.classList.remove('is-active');
      });
    });
  });

  closeBtn.forEach(el => {
    el.addEventListener('click', () => {
      modalEl.forEach((modal) => {
        modal.classList.remove('is-active');
      });
    });
  });

  btnCancel.forEach(el => {
    el.addEventListener('click', () => {
      modalEl.forEach((modal) => {
        modal.classList.remove('is-active');
      });
    });
  });
}