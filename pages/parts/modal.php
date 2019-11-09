<div class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title"></p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <div class="field">
        <label class="label">Nome de utilizador:</label>
        <div class="control has-icons-left">
          <input name="userName" type="text" class="input" placeholder="Insira o seu nome de login..." required>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
        <p id="userName" class="help is-danger is-hidden">O nome que introduziu já existe.</p>

      <div class="field">
        <label class="label">Nome:</label>
        <div class="control has-icons-left">
          <input name="nome" type="text" class="input" placeholder="Insira o seu nome..." required>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>

      <div class="field">
        <label class="label">Email:</label>
        <div class="control has-icons-left">
          <input name="email" type="email" class="input" placeholder="Insira o seu email..." required>
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
        </div>

      <div class="field">
        <label class="label">Tipo de utilizador:</label>
        <div class="control">
          <select name="tipoUSER">
            <option value="1">Volvo</option>
            <option value="2">Saab</option>
            <option value="3">Fiat</option>
            <option value="audi">Audi</option>
          </select> 
        </div>
      </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success">Guardar alterações</button>
      <button class="button" id="btnCancel">Cancelar</button>
    </footer>
  </div>
</div>

<script>
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
};

let executarQuery = (id) => {
  fetch('../../backend/admin/query_editar_user.php?userid=' + id)
    .then(resposta => resposta.json())
    .then(data => {
      console.log(data);
      const modalTitleEl = document.querySelector('.modal-card-title'); 
      const nomeLoginInput = document.querySelector('input[name="userName"]');
      const nomeInput = document.querySelector('input[name="nome"]');
      const emailInput = document.querySelector('input[name="email"]');
      const tipoInput = document.querySelector('input[name="tipoUtilizador"]');
      nomeLoginInput.value = data.nomeUtilizador;
      nomeInput.value = data.nome;
      emailInput.value = data.email;
      modalTitleEl.innerHTML = `Editar dados de: <strong> ${data.nome} </strong>`;
  });  
}
</script>