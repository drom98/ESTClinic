'use strict';

document.addEventListener('DOMContentLoaded', function () {
  var urlString = window.location.href;
  var url = new URL(urlString);
  var value = url.searchParams.get("erro");
  switch (value) {
    case 'nome':
      mostrarErro(value);
      break;
    case 'password':
      mostrarErro(value);
      break;
  }
});

var mostrarErro = function mostrarErro(erro) {
  var textEl = document.querySelector('#' + erro);
  var inputEl = document.querySelector('input[name=' + erro + ']');

  textEl.classList.remove('is-hidden');
  inputEl.classList.add('is-danger');
};