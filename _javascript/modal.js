document.addEventListener('DOMContentLoaded', () => {
  editarUser();
  eliminarUser();
  eliminarPermanente();
  aprovarUtilizador();
  restaurarUtilizador();
});

let restaurarUtilizador = () => {
  fecharModal();

  const btnRestaurarUser = document.querySelectorAll('#btnRestaurarUser');
  const btnConfirmar = document.querySelectorAll('#btnConfirmar');

  for(let i = 0; i < btnRestaurarUser.length; i++) {
    btnRestaurarUser[i].addEventListener('click', () => {
      const modalEl = document.querySelector('#modal-aprovar');
      const modalTitleEl = document.querySelectorAll('.modal-card-title');
      modalEl.classList.toggle('is-active');
      fetch('../../backend/admin/query_editar_user.php?userid=' + btnRestaurarUser[i].name)
      .then(resposta => resposta.json())
      .then(data => {
        modalTitleEl[2].innerHTML = `Pretende restaurar o utilizador: <strong> ${data.nome}</strong>?`;
      }); 
      btnConfirmar[1].addEventListener('click', () => {
        executarQueryAprovarUser(btnRestaurarUser[i].name);
      });
    });
  }
}

let aprovarUtilizador = () => {
  fecharModal();

  const btnAprovarUser = document.querySelectorAll('#btnAprovarUser');
  const btnConfirmar = document.querySelectorAll('#btnConfirmar');

  for(let i = 0; i < btnAprovarUser.length; i++) {
    btnAprovarUser[i].addEventListener('click', () => {
      console.log(btnAprovarUser[i]);
      const modalEl = document.querySelector('#modal-aprovar');
      const modalTitleEl = document.querySelectorAll('.modal-card-title');
      modalEl.classList.toggle('is-active');
      fetch('../../backend/admin/query_editar_user.php?userid=' + btnAprovarUser[i].name)
      .then(resposta => resposta.json())
      .then(data => {
        modalTitleEl[2].innerHTML = `Pretende aprovar o utilizador: <strong> ${data.nome}</strong>?`;
      }); 
      btnConfirmar[1].addEventListener('click', () => {
        executarQueryAprovarUser(btnAprovarUser[i].name);
      });
    });
  }
}

let executarQueryAprovarUser = (id) => {
  fetch('../../backend/admin/aprovar-user.php?userid=' + id)
  .then(resposta => resposta.json())
  .then(data => {
    if(data = 1) {
      document.querySelector('.modal').classList.remove('is-active');
      location.reload();
    }
  }); 
}

let eliminarPermanente = () => {
  fecharModal();

  const btnApagarPerma = document.querySelectorAll('#btnApagarPermaUser');
  const btnConfirmar = document.querySelector('#btnConfirmar');

  for(let i = 0; i < btnApagarPerma.length; i++) {
    btnApagarPerma[i].addEventListener('click', () => {
      const modalEl = document.querySelector('#modal-apagar');
      const modalTitleEl = document.querySelectorAll('.modal-card-title');
      modalEl.classList.toggle('is-active');
      fetch('../../backend/admin/query_editar_user.php?userid=' + btnApagarPerma[i].name)
      .then(resposta => resposta.json())
      .then(data => {
        modalTitleEl[1].innerHTML = `Apagar permanentemente o utilizador: <strong> ${data.nome}</strong>?`;
      }); 
      btnConfirmar.addEventListener('click', () => {
        executarQueryApagarPerma(btnApagarPerma[i].name);
      });
    });
  }
}

let executarQueryApagarPerma = (id) => {
  fetch('../../backend/admin/apagar-perma.php?userid=' + id)
  .then(resposta => resposta.json())
  .then(data => {
    if(data = 1) {
      document.querySelector('.modal').classList.remove('is-active');
      location.reload();
    }
  }); 
}

let eliminarUser = () => {
  fecharModal();
  const btnApagar = document.querySelectorAll('#btnApagarUser');
  const btnConfirmar = document.querySelector('#btnConfirmar');

  for(let i = 0; i < btnApagar.length; i++) {
    btnApagar[i].addEventListener('click', () => {
      const modalEl = document.querySelector('#modal-apagar');
      const modalTitleEl = document.querySelectorAll('.modal-card-title');
      modalEl.classList.toggle('is-active');
      fetch('../../backend/admin/query_editar_user.php?userid=' + btnApagar[i].name)
      .then(resposta => resposta.json())
      .then(data => {
        modalTitleEl[1].innerHTML = `Eliminar o utilizador: <strong> ${data.nome}</strong>?`;
      }); 
      btnConfirmar.addEventListener('click', () => {
        executarQueryApagar(btnApagar[i].name);
      });
    });
  }
}

let executarQueryApagar = (id) => {
  fetch('../../backend/admin/apagar_user.php?userid=' + id)
  .then(resposta => resposta.json())
  .then(data => {
    if(data = 1) {
      document.querySelector('.modal').classList.remove('is-active');
      location.reload();
    }
}); 
}

let editarUser = () => {
  fecharModal();
  const btnEditar = document.querySelectorAll('#btnEditarUser');

  for(let i = 0; i < btnEditar.length; i++) {
    btnEditar[i].addEventListener('click', () => {
      const modalEl = document.querySelector('#modal-editar');
      modalEl.classList.toggle('is-active');
      executarQuery(btnEditar[i].name);
    });
  }
}

let executarQuery = (id) => {
  const modalTitleEl = document.querySelector('.modal-card-title'); 
  const nomeLoginInput = document.querySelector('input[name="userName"]');
  const nomeInput = document.querySelector('input[name="nome"]');
  const emailInput = document.querySelector('input[name="email"]');
  const tipoInput = document.querySelector('input[name="tipoUtilizador"]');
  fetch('../../backend/admin/query_editar_user.php?userid=' + id)
    .then(resposta => resposta.json())
    .then(data => {
      console.log(data);
      setInputValues(data, modalTitleEl, nomeLoginInput, nomeInput, emailInput);
  });  
  submeterAlteracoes(id, nomeLoginInput, nomeInput, emailInput);
}

let setInputValues = (data, modal, login, nome, email) => {
  modal.innerHTML = `Editar dados de: <strong> ${data.nome} </strong>`;
  login.value = data.nomeUtilizador;
  nome.value = data.nome;
  email.value = data.email;
}

let submeterAlteracoes = (id, login, nome, email) => {
  const btnGuardarAlteracoes = document.querySelector('#btnGuardar');
  btnGuardarAlteracoes.addEventListener('click', () => {
    const dados = {
      idUtilizador: id,
      nomeUtilizador: login.value,
      nome: nome.value,
      email: email.value
    }

    fetch('../../backend/admin/update_dados.php', {
      method: 'POST',
      body: JSON.stringify(dados)
    })
      .then(resposta => resposta.json())
      .then(data => {
        if(data = 1) {
          document.querySelector('.modal').classList.remove('is-active');
          location.reload();
        }
      })
      .catch(erro => console.log(erro))
  })
}