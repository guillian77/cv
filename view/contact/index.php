<div class="container">
  <div id="formations" class="section" style="padding: 90px 0 120px;">
    <h1 class="text-center"><?= $this->pageName; ?><span>&nbsp;</span></h1>
    <div style="margin-top: 90px;">
      <div class="row">
        <div class="col col-lg-6">
          <h5>Envoyer un message</h5>
          <p>Vous pouvez m'envoyer un message,</p>
          <p><span style="color: red;"><?= $this->error; ?></span></p>
          <form method="POST" action="">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Nom</span>
              </div>
              <input type="text" name="name" class="form-control" placeholder="Ex: M.Aufrère">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Mail</span>
              </div>
              <input type="mail" name="mail" class="form-control" placeholder="Ex: contact@guillian-aufrere.fr">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Sujet</span>
              </div>
              <input type="text" name="subject" class="form-control" placeholder="Ex: Création site de fromage">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Sujet</span>
              </div>
              <textarea placeholder="Votre message ..." name="content" class="form-control"></textarea>
            </div>

            <input type="submit" value="Envoyer" class="btn btn-primary" />
        </div>

        <div class="col col-lg-6">
          <h5>Coordonnées</h5>
          <p>ou utiliser mes coordonnées.</p>
          <p>
            Email: contact@guillian-aufrere.fr<br/>
            
          </p>
        </div>
      </div>
    </div>
    <p></p>
  </div>
</div>