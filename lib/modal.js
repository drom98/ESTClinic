'use strict';

document.addEventListener('DOMContentLoaded', function () {
  editarUser();
  eliminarUser();
  eliminarPermanente();
  aprovarUtilizador();
  restaurarUtilizador();
});

//Fetch dados utilizador por ID
var fetchUserByID = function fetchUserByID(id) {
  fetch('../../backend/admin/query_editar_user.php?userid=' + id).then(function (resposta) {
    return resposta.json();
  }).then(function (data) {
    return data;
  });
};

var restaurarUtilizador = function restaurarUtilizador() {
  fecharModal();

  var btnRestaurarUser = document.querySelectorAll('#btnRestaurarUser');
  var btnConfirmar = document.querySelectorAll('#btnConfirmar');

  var _loop = function _loop(i) {
    btnRestaurarUser[i].addEventListener('click', function () {
      var modalEl = document.querySelector('#modal-aprovar');
      var modalTitleEl = document.querySelectorAll('.modal-card-title');
      modalEl.classList.toggle('is-active');
      data = fetchUserByID(btnRestaurarUser[i].name);
      modalTitleEl[2].innerHTML = 'Pretende restaurar o utilizador: <strong> ' + data.nome + '</strong>?';
      btnConfirmar[1].addEventListener('click', function () {
        executarQueryAprovarUser(btnRestaurarUser[i].name);
      });
    });
  };

  for (var i = 0; i < btnRestaurarUser.length; i++) {
    _loop(i);
  }
};

var aprovarUtilizador = function aprovarUtilizador() {
  fecharModal();

  var btnAprovarUser = document.querySelectorAll('#btnAprovarUser');
  var btnConfirmar = document.querySelectorAll('#btnConfirmar');

  var _loop2 = function _loop2(i) {
    btnAprovarUser[i].addEventListener('click', function () {
      console.log(btnAprovarUser[i]);
      var modalEl = document.querySelector('#modal-aprovar');
      var modalTitleEl = document.querySelectorAll('.modal-card-title');
      modalEl.classList.toggle('is-active');
      data = fetchUserByID(btnAprovarUser[i].name);
      modalTitleEl[2].innerHTML = 'Pretende aprovar o utilizador: <strong> ' + data.nome + '</strong>?';
      btnConfirmar[1].addEventListener('click', function () {
        executarQueryAprovarUser(btnAprovarUser[i].name);
      });
    });
  };

  for (var i = 0; i < btnAprovarUser.length; i++) {
    _loop2(i);
  }
};

var executarQueryAprovarUser = function executarQueryAprovarUser(id) {
  fetch('../../backend/admin/aprovar-user.php?userid=' + id).then(function (resposta) {
    return resposta.json();
  }).then(function (data) {
    if (data = 1) {
      document.querySelector('.modal').classList.remove('is-active');
      location.reload();
    }
  });
};

var eliminarPermanente = function eliminarPermanente() {
  fecharModal();

  var btnApagarPerma = document.querySelectorAll('#btnApagarPermaUser');
  var btnConfirmar = document.querySelector('#btnConfirmar');

  var _loop3 = function _loop3(i) {
    btnApagarPerma[i].addEventListener('click', function () {
      var modalEl = document.querySelector('#modal-apagar');
      var modalTitleEl = document.querySelectorAll('.modal-card-title');
      modalEl.classList.toggle('is-active');
      data = fetchUserByID(btnAprovarUser[i].name);
      modalTitleEl[1].innerHTML = 'Apagar permanentemente o utilizador: <strong> ' + data.nome + '</strong>?';
      btnConfirmar.addEventListener('click', function () {
        executarQueryApagarPerma(btnApagarPerma[i].name);
      });
    });
  };

  for (var i = 0; i < btnApagarPerma.length; i++) {
    _loop3(i);
  }
};

var executarQueryApagarPerma = function executarQueryApagarPerma(id) {
  fetch('../../backend/admin/apagar-perma.php?userid=' + id).then(function (resposta) {
    return resposta.json();
  }).then(function (data) {
    if (data = 1) {
      document.querySelector('.modal').classList.remove('is-active');
      location.reload();
    }
  });
};

var eliminarUser = function eliminarUser() {
  fecharModal();
  var btnApagar = document.querySelectorAll('#btnApagarUser');
  var btnConfirmar = document.querySelector('#btnConfirmar');

  var _loop4 = function _loop4(i) {
    btnApagar[i].addEventListener('click', function () {
      var modalEl = document.querySelector('#modal-apagar');
      var modalTitleEl = document.querySelectorAll('.modal-card-title');
      modalEl.classList.toggle('is-active');
      data = fetchUserByID(btnAprovarUser[i].name);
      modalTitleEl[1].innerHTML = 'Eliminar o utilizador: <strong> ' + data.nome + '</strong>?';
      btnConfirmar.addEventListener('click', function () {
        executarQueryApagar(btnApagar[i].name);
      });
    });
  };

  for (var i = 0; i < btnApagar.length; i++) {
    _loop4(i);
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

  var _loop5 = function _loop5(i) {
    btnEditar[i].addEventListener('click', function () {
      var modalEl = document.querySelector('#modal-editar');
      modalEl.classList.toggle('is-active');
      executarQuery(btnEditar[i].name);
    });
  };

  for (var i = 0; i < btnEditar.length; i++) {
    _loop5(i);
  }
};

var executarQuery = function executarQuery(id) {
  var modalTitleEl = document.querySelector('.modal-card-title');
  var nomeLoginInput = document.querySelector('input[name="userName"]');
  var nomeInput = document.querySelector('input[name="nome"]');
  var emailInput = document.querySelector('input[name="email"]');
  var passwordInput = document.querySelector('input[name="password"]');
  var tipoInput = document.querySelectorAll('input[name="tipoUser"]');
  fetch('../../backend/admin/query_editar_user.php?userid=' + id).then(function (resposta) {
    return resposta.json();
  }).then(function (data) {
    console.log(data);
    setInputValues(data, modalTitleEl, nomeLoginInput, nomeInput, emailInput, tipoInput);
  });
  submeterAlteracoes(id, nomeLoginInput, nomeInput, emailInput, passwordInput, tipoInput);
};

var setInputValues = function setInputValues(data, modal, login, nome, email, tipoUser) {
  modal.innerHTML = 'Editar dados de: <strong> ' + data.nome + ' </strong>';
  login.value = data.nomeUtilizador;
  nome.value = data.nome;
  email.value = data.email;
  switch (data.tipoUtilizador) {
    case "1":
      tipoUser[0].checked = true;
      break;
    case "2":
      tipoUser[1].checked = true;
      break;
    case "3":
      tipoUser[2].checked = true;
      break;
    case "5":
      tipoUser[3].checked = true;
      break;
    default:
      break;
  }
};

var submeterAlteracoes = function submeterAlteracoes(id, login, nome, email, password, tipoUser) {
  var btnGuardarAlteracoes = document.querySelector('#btnGuardar');
  btnGuardarAlteracoes.addEventListener('click', function () {
    var dados = {
      idUtilizador: id,
      nomeUtilizador: login.value,
      nome: nome.value,
      email: email.value,
      password: password.value
    };

    tipoUser.forEach(function (element) {
      if (element.checked == true) {
        dados.tipoUser = element.value;
      }
    });

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