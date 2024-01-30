<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="d-flex flex-column gap-1">
  <a href="<?= base_url() ?>" class="col-form-label-sm icon-link">
    <i data-feather="arrow-left"></i>
    Regresar
  </a>
  <h1 class="h4 fw-bold">Registrar horas</h1>
  <hr class="mt-0 mb-1" />
  <div class="grid gap-4">
    <form action="<?= url_to('trabajador/registrar') ?>" method="post" class="g-col-4 grid gap-2" onsubmit="return validateForm()">
      <div class="g-col-12">
        <div style="width: 150px;">
          <label for="today" id="today_label" class="col-form-label col-form-label-sm fw-semibold">Hoy</label>
          <input type="date" class="form-control form-control-sm" readonly required name="today" id="today" value="<?= $today ?>">
        </div>
      </div>
      <div class="g-col-12">
        <label for="process" id="process_label" class="col-form-label col-form-label-sm fw-semibold">Proceso</label>
        <input type="hidden" id="process_id" name="process_id">
        <select name="process" id="process" required class="form-select form-select-sm">
          <option value="">Seleccionar</option>
          <?php foreach ($processes as $process) : ?>
            <option value="<?= $process->id ?>"><?= $process->name ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="g-col-12">
        <label for="activity" id="activity_label" class="col-form-label col-form-label-sm fw-semibold">Actividad</label>
        <input type="hidden" id="activity_id" name="activity_id">
        <div id="activity_loading" class="float-end col-form-label col-form-label-sm d-none">
          <div class="spinner-border spinner-border-sm" role="status">
            <span class="visually-hidden">Cargando...</span>
          </div>
        </div>
        <select name="activity" id="activity" required class="form-select form-select-sm">
          <option value="">Seleccionar</option>
        </select>
      </div>
      <div class="g-col-12">
        <label for="task" id="task_label" class="col-form-label col-form-label-sm fw-semibold">Tarea</label>
        <input type="hidden" id="task_id" name="task_id">
        <div id="task_loading" class="float-end col-form-label col-form-label-sm d-none">
          <div class="spinner-border spinner-border-sm" role="status">
            <span class="visually-hidden">Cargando...</span>
          </div>
        </div>
        <select name="task" id="task" required class="form-select form-select-sm">
          <option value="">Seleccionar</option>
        </select>
      </div>
      <div class="g-col-12">
        <label for="time" id="time_label" class="col-form-label col-form-label-sm fw-semibold">Tiempo</label>
        <span id="time_error" class="float-end text-danger fw-semibold d-none"></span>
        <div class="input-group">
          <input type="number" placeholder="Horas" required class="form-control form-control-sm" name="hours" id="hours" min="0" max="7">
          <input type="number" placeholder="Minutos" required class="form-control form-control-sm" name="minutes" id="minutes" min="0" max="59">
        </div>
      </div>
      <div class="g-col-12">
        <label for="description" id="description_label" class="col-form-label col-form-label-sm fw-semibold">Nota</label>
        <textarea name="description" id="description" required class="form-control form-control-sm" rows="2" style="resize: none;"></textarea>
      </div>
      <div class="g-col-12 d-flex justify-content-end gap-3">
        <button type="button" id="btn_clean_selects" class="btn btn-sm btn-secondary">Limpiar</button>
        <button type="submit" id="btn_add_hour" class="btn btn-sm btn-dark">Agregar</button>
      </div>
      <div class="g-col-12">
        <?php if (session('error') !== null) : ?>
          <div class=" alert alert-danger px-3 py-2 col-form-label-sm" role="alert"><?= session('error') ?></div>
        <?php endif; ?>
      </div>
    </form>
    <div class="g-col-8 py-2">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <h2 class="h5 fw-bolder">Resumen</h2>
        <span class="col-form-label-sm">Total: <?= intdiv($totalMinutes, 60) . (intdiv($totalMinutes, 60) == 1 ? ' hora y ' : ' horas y ') . $totalMinutes % 60 . ($totalMinutes % 60 == 1 ? ' minuto' : ' minutos') ?> (<i><?= in_array(date('N'), range(1, 4)) ? 'límite de 7 horas y 15 minutos' : ' límite de 7 horas' ?></i>)</span>
      </div>
      <div class="border rounded overflow-hidden" id="tasks_area">
        <?php if (count($tasks) > 0) : ?>
          <ul class="list-group list-group-flush col-form-label-sm">
            <?php foreach ($tasks as $task) : ?>
              <li class="list-group-item d-flex justify-content-between">
                <div class="d-flex flex-column gap-1">
                  <span class="fw-bolder"><?= $task->name ?></span>
                  <span><i data-feather="clock"></i> <?= $task->hours ?> <?= $task->hours == 1 ? 'hora' : 'horas' ?> y <?= $task->minutes ?> <?= $task->minutes == 1 ? 'minuto' : 'minutos' ?></span>
                  <span><b>Nota:</b> <?= $task->description ?></span>
                </div>
                <div class="d-flex align-items-start gap-2">
                  <button type="button" id="btn_add_hour" class="btn btn-sm btn-outline-secondary d-flex align-items-center p-2">
                    <i data-feather="edit"></i>
                  </button>
                  <button type="button" id="btn_add_hour" class="btn btn-sm btn-outline-danger d-flex align-items-center p-2">
                    <i data-feather="trash-2"></i>
                  </button>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else : ?>
          <p class="p-2 mb-0 text-body-secondary text-center col-form-label col-form-label-sm">No hay tareas agregadas</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  const processRef = document.getElementById("process")
  const activityRef = document.getElementById("activity")
  const taskRef = document.getElementById("task")
  const activityLoadingRef = document.getElementById("activity_loading")
  const taskLoadingRef = document.getElementById("task_loading")
  const btnCleanRef = document.getElementById("btn_clean_selects")
  const tasksAreaRef = document.getElementById("tasks_area")
  const inputHoursRef = document.getElementById("hours")
  const inputMinutesRef = document.getElementById("minutes")
  const inputProcessIdRef = document.getElementById("process_id")
  const inputActivityIdRef = document.getElementById("activity_id")
  const inputTaskIdRef = document.getElementById("task_id")
  const timeErrorRef = document.getElementById("time_error")

  processRef.addEventListener('change', async function() {
    const processId = processRef.value
    activityLoadingRef.classList.remove("d-none")
    processRef.disabled = true
    const response = await fetch(`<?= base_url("api/actividades") ?>/${processId}`)
    const data = await response.json()
    if (data) {
      let html = `<option value="">Seleccionar</option>`
      data.activities.map(activity => {
        html += `<option value="${activity.id}">${activity.name}</option>`
      })
      activityRef.innerHTML = html
      inputProcessIdRef.value = processId
    } else {
      processRef.disabled = false
    }
    activityLoadingRef.classList.add("d-none")
  })

  activityRef.addEventListener('change', async function() {
    const activityId = activityRef.value
    taskLoadingRef.classList.remove("d-none")
    activityRef.disabled = true
    const response = await fetch(`<?= base_url("api/tareas") ?>/${activityId}`)
    const data = await response.json()
    if (data) {
      let html = `<option value="">Seleccionar</option>`
      data.tasks.map(task => {
        html += `<option value="${task.id}">${task.name}</option>`
      })
      taskRef.innerHTML = html
      inputActivityIdRef.value = activityId
    } else {
      activityRef.disabled = false
    }
    taskLoadingRef.classList.add("d-none")
  })

  taskRef.addEventListener('change', async function() {
    const taskId = taskRef.value
    taskRef.disabled = true
    inputTaskIdRef.value = taskId
  })

  btnCleanRef.addEventListener('click', function() {
    processRef.disabled = false
    for (let i = 0; i < processRef.options.length; i++) {
      processRef.options[i].selected = false
    }
    activityRef.disabled = false
    activityRef.innerHTML = `<option value="">Seleccionar</option>`
    taskRef.disabled = false
    taskRef.innerHTML = `<option value="">Seleccionar</option>`
  })

  function validateForm() {
    if (inputHoursRef.value == 0 && inputMinutesRef.value == 0) {
      timeErrorRef.classList.remove("d-none")
      timeErrorRef.textContent = '¡Inválido!'
      return false
    }

    return true
  }
</script>
<?= $this->endSection() ?>