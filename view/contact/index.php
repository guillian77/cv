<div class="container">
  <div id="formations" class="section" style="padding: 90px 0 120px;">
    <h1 class="text-center"><?= $this->pageName; ?><span>&nbsp;</span></h1>
    <div style="margin-top: 90px;">
      <p></p>
      <div class="row">
        <div class="col col-lg-6">
          <h5>Envoyer un message</h5>
          <form method="POST" action="">
            <input type="text" name="name" placeholder="Nom"><br>
            <input type="text" name="subject" placeholder="Sujet"><br>
            <input type="submit" value="Envoyer" />
          </form>
        </div>

        <div class="col col-lg-6">
          <h5>Coordonnées</h5>
          <p></p>
        </div>
      </div>
    </div>
    <p></p>
  </div>
</div>