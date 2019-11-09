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
  tabEl.classList.toggle('is-active');
};

var fecharModal = function fecharModal() {
  var modalEl = document.querySelector('.modal');
  var bgEl = document.querySelector('.modal-background');
  var closeBtn = document.querySelector('.delete');
  var btnCancel = document.querySelector('#btnCancel');

  bgEl.addEventListener('click', function () {
    modalEl.classList.remove('is-active');
    console.log('cenas');
  });
  closeBtn.addEventListener('click', function () {
    modalEl.classList.remove('is-active');
  });
  btnCancel.addEventListener('click', function () {
    modalEl.classList.remove('is-active');
  });
};