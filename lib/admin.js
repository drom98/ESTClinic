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

  editarUser();
  fecharModal();
});

var ativarBgTab = function ativarBgTab(tab) {
  var tabEl = document.querySelector('#' + tab);
  tabEl.classList.toggle('is-active');
};

//Secção Gerir Utilizadores
var editarUser = function editarUser() {
  fecharModal();
  var btnEditar = document.querySelector('#btnEditarUser');
  btnEditar.addEventListener('click', function () {
    var modalEl = document.querySelector('.modal');
    console.log(modalEl);
    modalEl.classList.toggle('is-active');
  });
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