'use strict';

document.addEventListener('DOMContentLoaded', function () {
  editarUser();
});

var editarUser = function editarUser() {
  fecharModal();
  var btnEditar = document.querySelectorAll('#btnEditarUser');

  var _loop = function _loop(i) {
    btnEditar[i].addEventListener('click', function () {
      var modalEl = document.querySelector('.modal');
      modalEl.classList.toggle('is-active');
      executarQuery(btnEditar[i].name);
    });
  };

  for (var i = 0; i < btnEditar.length; i++) {
    _loop(i);
  }
};

var executarQuery = function executarQuery(id) {
  var modalTitleEl = document.querySelector('.modal-card-title');
  var nomeLoginInput = document.querySelector('input[name="userName"]');
  var nomeInput = document.querySelector('input[name="nome"]');
  var emailInput = document.querySelector('input[name="email"]');
  var tipoInput = document.querySelector('input[name="tipoUtilizador"]');
  fetch('../../backend/admin/query_editar_user.php?userid=' + id).then(function (resposta) {
    return resposta.json();
  }).then(function (data) {
    console.log(data);
    setInputValues(data, modalTitleEl, nomeLoginInput, nomeInput, emailInput);
  });
  submeterAlteracoes(id, nomeLoginInput, nomeInput, emailInput);
};

var setInputValues = function setInputValues(data, modal, login, nome, email) {
  modal.innerHTML = 'Editar dados de: <strong> ' + data.nome + ' </strong>';
  login.value = data.nomeUtilizador;
  nome.value = data.nome;
  email.value = data.email;
};

var submeterAlteracoes = function submeterAlteracoes(id, login, nome, email) {
  var btnGuardarAlteracoes = document.querySelector('#btnGuardar');
  btnGuardarAlteracoes.addEventListener('click', function () {
    var dados = {
      idUtilizador: id,
      nomeUtilizador: login.value,
      nome: nome.value,
      email: email.value
    };

    fetch('../../backend/admin/update_dados.php', {
      method: 'POST',
      body: JSON.stringify(dados)
    }).then(function (resposta) {
      return resposta.json();
    }).then(function (data) {
      if (data = 1) {
        document.querySelector('.modal').classList.remove('is-active');
        location.reload();
      }
    }).catch(function (erro) {
      return console.log(erro);
    });
  });
};