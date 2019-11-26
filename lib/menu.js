"use strict";

document.addEventListener('DOMContentLoaded', function () {
  var urlString = window.location.href;
  var url = new URL(urlString);
  var tabValue = url.searchParams.get("tab");
  var mValue = url.searchParams.get("m");
  switch (tabValue) {
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
    case 'dadosPessoais':
      ativarBgTab(tabValue);
      break;
    default:
      break;
  }

  if (mValue == "porAprovar") {
    var tabAprovadas = document.querySelectorAll('#tab');

    tabAprovadas.forEach(function (tab) {
      tab.classList.toggle('is-active');
    });
  }
});

var ativarBgTab = function ativarBgTab(tab) {
  var tabEl = document.querySelector("#" + tab);
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