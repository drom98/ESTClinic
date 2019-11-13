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
    //Registo
    case 'userName':
      mostrarErro(value);
      break;
    case 'permissao':
      erroPermissao(value);
    case 'aprovar':
      erroPermissao(value);
    case 'logout':
      erroPermissao(value);
    default:
      break;
  }

  esconderErro(value);
});

var mostrarErro = function mostrarErro(erro) {
  var textEl = document.querySelector('#' + erro);
  var inputEl = document.querySelector('input[name=' + erro + ']');

  textEl.classList.remove('is-hidden');
  inputEl.classList.add('is-danger');
};

var esconderErro = function esconderErro(erro) {
  var textEl = document.querySelector('#' + erro);
  var inputEl = document.querySelector('input[name=' + erro + ']');

  inputEl.addEventListener('click', function () {
    textEl.classList.add('is-hidden');
    inputEl.classList.remove('is-danger');
  });
};

var erroPermissao = function erroPermissao(erro) {
  var messageEl = document.querySelector('#' + erro);

  messageEl.classList.remove('is-hidden');
};