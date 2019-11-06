'use strict';

document.addEventListener('DOMContentLoaded', function () {
  var urlString = window.location.href;
  var url = new URL(urlString);
  var value = url.searchParams.get("tab");
  switch (value) {
    case 'utilizadores':
      ativarBgTab(value);
      break;
    case 'usersPorAprovar':
      ativarBgTab(value);
    default:
      break;
  }
});

var ativarBgTab = function ativarBgTab(tab) {
  var tabEl = document.querySelector('#' + tab);

  console.log(tabEl);
  console.log(tab);
  tabEl.classList.toggle('is-active');
};