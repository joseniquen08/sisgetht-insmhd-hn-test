<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<section class="h-100 d-flex flex-column overflow-auto gap-2 px-3">
  <div>
    <a href="<?= base_url('') ?>" class="col-form-label-sm icon-link">
      <i data-feather="arrow-left"></i>
      Regresar
    </a>
  </div>
  <h2 class="h-5 fw-bold">Trabajadores</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Usuario</th>
        <th scope="col">Tareas totales</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) : ?>
        <tr>
          <td><?= $user->username ?></td>
          <td><?= $user->total_tasks ?></td>
          <td class="d-flex">
            <a href="<?= base_url('jefe/progreso/trabajador') ?>/<?= $user->id ?>" class="btn btn-sm btn-outline-primary d-flex align-items-center p-2">
              <i data-feather="eye"></i>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->endSection() ?>