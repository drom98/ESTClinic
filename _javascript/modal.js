document.addEventListener('DOMContentLoaded', () => {
  editarUser();
});

let editarUser = () => {
  fecharModal();
  const btnEditar = document.querySelectorAll('#btnEditarUser');

  for(let i = 0; i < btnEditar.length; i++) {
    btnEditar[i].addEventListener('click', () => {
      const modalEl = document.querySelector('.modal');
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

    console.log(dados);
    console.log(JSON.stringify(dados));

    fetch('../../backend/admin/update_dados.php', {
      method: 'POST',
      body: JSON.stringify(dados)
    })
      .then(resposta => resposta)
      .then(data => console.log(data))
      .catch(erro => console.log(erro))
  })
}