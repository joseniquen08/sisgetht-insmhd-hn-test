<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
  <?php if ($group === 'worker') : ?>
    <?= $this->include('groups/worker/home_page') ?>
  <?php elseif ($group === 'secretary') : ?>
    <?= $this->include('groups/secretary/home_page') ?>
  <?php elseif ($group === 'boss') : ?>
    <?= $this->include('groups/boss/home_page') ?>
  <?php endif; ?>
<?= $this->endSection() ?>