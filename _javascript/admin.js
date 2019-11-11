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
      break;
    case 'usersEliminados':
      ativarBgTab(value);
      break;
    default: 
      break;
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