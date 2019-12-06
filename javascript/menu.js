document.addEventListener('DOMContentLoaded', () => {
  const urlString = window.location.href;
  const url = new URL(urlString);
  const tabValue = url.searchParams.get("tab");
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
      break;
    case 'aprovarMarcacoes':
      ativarBgTab(tabValue);
      break;
    case 'dadosPessoais':
      ativarBgTab(tabValue);
      break;
    default: 
      break;
  }
});

let ativarBgTab = (tab) => {
  const tabEl = document.querySelector(`#${tab}`);
  tabEl.classList.toggle('is-active');
}