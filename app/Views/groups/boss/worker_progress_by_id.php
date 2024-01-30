<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<section class="h-100 d-flex flex-column overflow-auto gap-2 px-3">
  <div>
    <a href="<?= base_url('jefe/progreso') ?>" class="col-form-label-sm icon-link">
      <i data-feather="arrow-left"></i>
      Regresar
    </a>
  </div>
  <h2 class="h-5 fw-bold"><?= $user->username ?></h2>
  <hr class="m-0" />
  <h3 class="fs-4 fw-semibold mt-3 mb-1">Resumen general</h3>
  <div class="grid gap-3">
    <div class="g-col-4 border rounded p-3">
      <h3 class="fs-5 fw-semibold">Horas trabajadas totales</h3>
      <span><?= intdiv($infoGeneral->total_minutes, 60) ?> <?= intdiv($infoGeneral->total_minutes, 60) == 1 ? 'hora' : 'horas' ?> y <?= $infoGeneral->total_minutes % 60 ?> <?= $infoGeneral->total_minutes % 60 == 1 ? 'minuto' : 'minutos' ?></span>
    </div>
    <div class="g-col-4 border rounded p-3">
      <h3 class="fs-5 fw-semibold">Tareas totales</h3>
      <span><?= $infoGeneral->total_tasks ?></span>
    </div>
    <div class="g-col-4 border rounded p-3">
      <h3 class="fs-5 fw-semibold">Días totales</h3>
      <span><?= $infoGeneral->total_days ?></span>
    </div>
  </div>
  <h3 class="fs-4 fw-semibold mt-3 mb-1">Resumen diario</h3>
  <div class="grid gap-3">
    <div class="g-col-4 border rounded p-3">
      <h3 class="fs-5 fw-semibold">Horas trabajadas hoy</h3>
      <span><?= intdiv($infoToday->total_minutes, 60) ?> <?= intdiv($infoToday->total_minutes, 60) == 1 ? 'hora' : 'horas' ?> y <?= $infoToday->total_minutes % 60 ?> <?= $infoToday->total_minutes % 60 == 1 ? 'minuto' : 'minutos' ?></span>
    </div>
    <div class="g-col-4 border rounded p-3">
      <h3 class="fs-5 fw-semibold">Tareas de hoy</h3>
      <span><?= $infoToday->total_tasks ?></span>
    </div>
  </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->endSection() ?>