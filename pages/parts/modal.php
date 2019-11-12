<div class="modal" id="modal-editar">
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
      </div>

      <div class="field">
        <label class="label">Nome:</label>
        <div class="control has-icons-left">
          <input name="nome" type="text" class="input" placeholder="Insira o seu nome..." required>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
      </div>

      <div class="field">
        <label class="label">Email:</label>
        <div class="control has-icons-left">
          <input name="email" type="email" class="input" placeholder="Insira o seu email..." required>
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
        </div>
      </div>

      <div class="field">
        <label class="label">Tipo de Utilizador:</label>
        <input class="is-checkradio is-warning" id="admin-radio" type="radio" name="tipoUser" value="1">
        <label for="admin-radio">Administrador</label>

        <input class="is-checkradio is-info" id="medico-radio" type="radio" name="tipoUser" value="2">
        <label for="medico-radio">Médico</label>

        <input class="is-checkradio is-info" id="enf-radio" type="radio" name="tipoUser" value="3">
        <label for="enf-radio">Enfermeiro</label>

        <input class="is-checkradio is-info" id="utente-radio" type="radio" name="tipoUser" value="5">
        <label for="utente-radio">Utente</label>
      </div>

    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" id="btnGuardar">Guardar alterações</button>
      <button class="button" id="btnCancel">Cancelar</button>
    </footer>
  </div>
</div>

<div class="modal" id="modal-apagar">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modal title</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <footer class="modal-card-foot">
      <button class="button is-danger" id="btnConfirmar">Eliminar utilizador</button>
      <button class="button" id="btnCancel">Cancelar</button>
    </footer>
  </div>
</div>

<div class="modal" id="modal-aprovar">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modal title</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <footer class="modal-card-foot">
      <button class="button is-success" id="btnConfirmar">Aprovar utilizador</button>
      <button class="button" id="btnCancel">Cancelar</button>
    </footer>
  </div>
</div>
  
<script src="../../lib/modal.js"></script>