<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<section class="h-100 d-flex flex-column overflow-auto gap-2 px-3">
  <h2 class="h-5 fw-bold">Resumen de tareas</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Tarea</th>
        <th scope="col">Total</th>
        <th scope="col">Horas totales</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tasks as $task) : ?>
        <tr>
          <td><?= $task['name'] ?></td>
          <td><?= $task['total'] ?></td>
          <td><?= intdiv($task['total_minutes'], 60) ?> <?= intdiv($task['total_minutes'], 60) == 1 ? 'hora' : 'horas' ?> y <?= $task['total_minutes'] % 60 ?> <?= $task['total_minutes'] % 60 == 1 ? 'minuto' : 'minutos' ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->endSection() ?>