<body>
    <nav class="navbar navbar-inverse navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="<?=base_url()?>">Sistema Notas</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($this->session->userdata('login')): ?>
                      <li><a href="<?=base_url()?>alumno">Alumnos</a></li>
                      <li><a href="<?=base_url()?>profesor">Profesores</a></li>
                      <li><a href="<?=base_url()?>materia">Materias</a></li>
                      <li><a href="<?=base_url()?>notas">Notas</a></li>
                      <li><a href="<?=base_url()?>usuario">Usuarios</a></li>
                      <li><a href="<?= base_url()?>/usuario/logout">Cerrar Sesión (<?= $this->session->userdata('usuario') ?>)</a></li>
                    <?php else: ?>
                      <li><a href="<?=base_url()?>notas/elegir">Elegir Materias</a></li>
                      <li><a href="<?=base_url()?>notas">Consultas</a></li>
                      <li><a href="" data-toggle="modal" data-target="#miModal">Iniciar Sesión</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

  <div class="modal fade" id="miModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" aria-hidden="true" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Iniciar Sesión</h4>
        </div>
        <div class="modal-body">
          <form action="<?= base_url()?>usuario/login" method="POST" accept-charset='UTF-8' role="form">
            <div class="form-group">
              <label for="usario">Usuario</label>
              <input type="text" name="usuario" placeholder="Usuarios" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="contraseña">Contraseña</label>
              <input type="password" name="clave" placeholder="Contraseña" class="form-control" required>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Aceptar">
              <button class="btn btn-defaul" data-dismiss="modal">Cancelar</button>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>