document.addEventListener('DOMContentLoaded', () => {
  editarUser();
  eliminarUser();
  eliminarPermanente();
});

let eliminarPermanente = () => {
  fecharModal();

  const btnApagarPerma = document.querySelectorAll('#btnApagarPermaUser');
  const btnConfirmar = document.querySelector('#btnConfirmar');

  for(let i = 0; i < btnApagarPerma.length; i++) {
    btnApagarPerma[i].addEventListener('click', () => {
      console.log(btnApagarPerma);
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