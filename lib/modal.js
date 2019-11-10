'use strict';

document.addEventListener('DOMContentLoaded', function () {
  editarUser();
  eliminarUser();
});

var eliminarUser = function eliminarUser() {
  fecharModal();
  var btnApagar = document.querySelectorAll('#btnApagarUser');
  var btnConfirmar = document.querySelector('#btnConfirmar');

  var _loop = function _loop(i) {
    btnApagar[i].addEventListener('click', function () {
      var modalEl = document.querySelector('#modal-apagar');
      var modalTitleEl = document.querySelectorAll('.modal-card-title');
      modalEl.classList.toggle('is-active');
      fetch('../../backend/admin/query_editar_user.php?userid=' + btnApagar[i].name).then(function (resposta) {
        return resposta.json();
      }).then(function (data) {
        modalTitleEl[1].innerHTML = 'Eliminar o utilizador: <strong> ' + data.nome + '</strong>?';
      });
      btnConfirmar.addEventListener('click', function () {
        executarQueryApagar(btnApagar[i].name);
      });
    });
  };

  for (var i = 0; i < btnApagar.length; i++) {
    _loop(i);
  }
};

var executarQueryApagar = function executarQueryApagar(id) {
  fetch('../../backend/admin/apagar_user.php?userid=' + id).then(function (resposta) {
    return resposta.json();
  }).then(function (data) {
    if (data = 1) {
      document.querySelector('.modal').classList.remove('is-active');
      location.reload();
    }
  });
};

var editarUser = function editarUser() {
  fecharModal();
  var btnEditar = document.querySelectorAll('#btnEditarUser');

  var _loop2 = function _loop2(i) {
    btnEditar[i].addEventListener('click', function () {
      var modalEl = document.querySelector('#modal-editar');
      modalEl.classList.toggle('is-active');
      executarQuery(btnEditar[i].name);
    });
  };

  for (var i = 0; i < btnEditar.length; i++) {
    _loop2(i);
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