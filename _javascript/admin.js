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
});

let ativarBgTab = (tab) => {
  const tabEl = document.querySelector(`#${tab}`);

  console.log(tabEl);
  console.log(tab)
  tabEl.classList.toggle('is-active');
}