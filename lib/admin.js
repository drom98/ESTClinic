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
      break;
    case 'usersEliminados':
      ativarBgTab(value);
      break;
    case 'gerirMarcacoes':
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
  var modalEl = document.querySelectorAll('.modal');
  var bgEl = document.querySelectorAll('.modal-background');
  var closeBtn = document.querySelectorAll('.delete');
  var btnCancel = document.querySelectorAll('#btnCancel');

  bgEl.forEach(function (el) {
    el.addEventListener('click', function () {
      modalEl.forEach(function (modal) {
        modal.classList.remove('is-active');
      });
    });
  });

  closeBtn.forEach(function (el) {
    el.addEventListener('click', function () {
      modalEl.forEach(function (modal) {
        modal.classList.remove('is-active');
      });
    });
  });

  btnCancel.forEach(function (el) {
    el.addEventListener('click', function () {
      modalEl.forEach(function (modal) {
        modal.classList.remove('is-active');
      });
    });
  });
};