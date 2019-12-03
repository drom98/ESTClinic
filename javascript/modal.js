document.addEventListener('DOMContentLoaded', () => {
  editarUser();
  eliminarUser();
  eliminarPermanente();
  aprovarUtilizador();
  restaurarUtilizador();
});

//Fetch dados utilizador por ID
let fetchUserByID = (id) => {
  return fetch('../../backend/admin/query_editar_user.php?userid=' + id)
  .then(resposta => resposta.json());
}

let restaurarUtilizador = () => {
  fecharModal();

  const btnRestaurarUser = document.querySelectorAll('#btnRestaurarUser');
  const btnConfirmar = document.querySelectorAll('#btnConfirmar');

  for(let i = 0; i < btnRestaurarUser.length; i++) {
    btnRestaurarUser[i].addEventListener('click', () => {
      const modalEl = document.querySelector('#modal-aprovar');
      const modalTitleEl = document.querySelectorAll('.modal-card-title');
      modalEl.classList.toggle('is-active');

      fetchUserByID(btnRestaurarUser[i].name).then(data => {
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
      const modalEl = document.querySelector('#modal-aprovar');
      const modalTitleEl = document.querySelectorAll('.modal-card-title');
      modalEl.classList.toggle('is-active');

      fetchUserByID(btnAprovarUser[i].name).then(data => {
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
      fetchUserByID(btnApagarPerma[i].name).then(data => {
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

      fetchUserByID(btnApagar[i].name).then(data => {
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
  const passwordInput = document.querySelector('input[name="password"]');
  const tipoInput = document.querySelectorAll('input[name="tipoUser"]');
  fetch('../../backend/admin/query_editar_user.php?userid=' + id)
    .then(resposta => resposta.json())
    .then(data => {
      console.log(data);
      setInputValues(data, modalTitleEl, nomeLoginInput, nomeInput, emailInput, passwordInput, tipoInput);
  });  
  submeterAlteracoes(id, nomeLoginInput, nomeInput, emailInput, passwordInput, tipoInput);
}

let setInputValues = (data, modal, login, nome, email, password, tipoUser) => {
  modal.innerHTML = `Editar dados de: <strong> ${data.nome} </strong>`;
  login.value = data.nomeUtilizador;
  nome.value = data.nome;
  email.value = data.email;
  password.value = data.password;
  switch(data.tipoUtilizador) {
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
}

//Secção Dados pessoais
let alterarDados = () => {
  const btnGuardar = document.querySelector('#btn-dados-pessoais');
  const dados = {
    
  }
}


let submeterAlteracoes = (id, login, nome, email, password, tipoUser) => {
  const btnGuardarAlteracoes = document.querySelector('#btnGuardar');
  btnGuardarAlteracoes.addEventListener('click', () => {
    const dados = {
      idUtilizador: id,
      nomeUtilizador: login.value,
      nome: nome.value,
      email: email.value,
      password: password.value
    }

    tipoUser.forEach(element => {
      if(element.checked == true) {
        dados.tipoUser = element.value
      }
    });
    
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

let fecharModal = () => {
  const modalEl = document.querySelectorAll('.modal');
  const bgEl = document.querySelectorAll('.modal-background');
  const closeBtn = document.querySelectorAll('.delete');
  const btnCancel = document.querySelectorAll('#btnCancel');

  bgEl.forEach(el => {
    el.addEventListener('click', () => {
      modalEl.forEach((modal) => {
        modal.classList.remove('is-active');
      });
    });
  });

  closeBtn.forEach(el => {
    el.addEventListener('click', () => {
      modalEl.forEach((modal) => {
        modal.classList.remove('is-active');
      });
    });
  });

  btnCancel.forEach(el => {
    el.addEventListener('click', () => {
      modalEl.forEach((modal) => {
        modal.classList.remove('is-active');
      });
    });
  });
}