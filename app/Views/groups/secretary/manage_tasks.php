<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<section class="h-100 d-flex flex-column overflow-hidden gap-2">
  <div>
    <a href="<?= base_url() ?>" class="col-form-label-sm icon-link">
      <i data-feather="arrow-left"></i>
      Regresar
    </a>
  </div>
  <div class="grid gap-3 h-100 overflow-hidden">
    <div class="g-col-4 border rounded overflow-auto position-relative">
      <div class="sticky-top bg-white">
        <div class="d-flex justify-content-between align-items-center px-3 py-2">
          <h2 class="h5 fw-bolder mb-0">Procesos</h2>
          <button type="button" id="btn_add_process" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#addModal" data-bs-title="Proceso" data-bs-type="1">
            <i data-feather="plus"></i>
            Agregar
          </button>
        </div>
        <input type="hidden" name="processIdSelected" id="processIdSelected">
        <hr class="m-0" />
      </div>
      <div id="processes_area">
        <ul class="list-group list-group-flush col-form-label-sm">
          <?php foreach ($processes as $process) : ?>
            <li id="process_<?= $process->id ?>" class="process-card list-group-item d-flex align-items-start justify-content-between gap-2">
              <span class="fw-medium"><?= $process->name ?></span>
              <div class="d-flex align-items-start gap-2">
                <button type="button" class="btn btn-sm btn-outline-secondary d-flex align-items-center p-1" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-title="Proceso" data-bs-name="<?= $process->name ?>" data-bs-ref-id="<?= $process->id ?>" data-bs-type="1">
                  <i data-feather="edit"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger d-flex align-items-center p-1">
                  <i data-feather="trash-2"></i>
                </button>
                <button type="button" onclick="loadActivities(<?= $process->id ?>)" class="btn btn-sm btn-success d-flex align-items-center p-1">
                  <i data-feather="chevrons-right"></i>
                </button>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="g-col-4 border rounded overflow-auto position-relative">
      <div class="sticky-top bg-white">
        <div class="d-flex justify-content-between align-items-center px-3 py-2">
          <h2 class="h5 fw-bolder mb-0">Actividades</h2>
          <button type="button" id="btn_add_activity" disabled class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#addModal" data-bs-title="Actividad" data-bs-type="2">
            <i data-feather="plus"></i>
            Agregar
          </button>
        </div>
        <input type="hidden" name="activityIdSelected" id="activityIdSelected">
        <hr class="m-0" />
        <div id="activities_area">
          <p class="col-form-label-sm mb-0 py-2 text-center fw-semibold form-text">Elige un proceso</p>
        </div>
      </div>
    </div>
    <div class="g-col-4 border rounded overflow-auto position-relative">
      <div class="sticky-top bg-white">
        <div class="d-flex justify-content-between align-items-center px-3 py-2">
          <h2 class="h5 fw-bolder mb-0">Tareas</h2>
          <button type="button" id="btn_add_task" disabled class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#addModal" data-bs-title="Tarea" data-bs-type="3">
            <i data-feather="plus"></i>
            Agregar
          </button>
        </div>
        <hr class="m-0" />
        <div id="tasks_area">
          <p class="col-form-label-sm mb-0 py-2 text-center fw-semibold form-text">Elige una actividad</p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title fs-6" id="editModalLabel">Editar <span id="em_title"></span>
          </h2>
          <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="em_ref_id" id="em_ref_id">
          <input type="hidden" name="em_type" id="em_type">
          <div>
            <label for="em_input_name" class="col-form-label col-form-label-sm fw-semibold">Nombre</label>
            <input type="text" class="form-control form-control-sm" name="em_input_name" id="em_input_name" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" id="btn_edit" class="btn btn-sm btn-dark">Confirmar</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title fs-6" id="addModalLabel">Crear <span id="am_title"></span>
          </h2>
          <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="am_type" id="am_type">
          <div>
            <label for="am_input_name" class="col-form-label col-form-label-sm fw-semibold">Nombre</label>
            <input type="text" class="form-control form-control-sm" name="am_input_name" id="am_input_name" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" id="btn_add" class="btn btn-sm btn-dark">Confirmar</button>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  const processesAreaRef = document.getElementById("processes_area")
  const activitiesAreaRef = document.getElementById("activities_area")
  const tasksAreaRef = document.getElementById("tasks_area")
  const editModalRef = document.getElementById("editModal")
  const btnEditRef = document.getElementById("btn_edit")
  const addModalRef = document.getElementById("addModal")
  const btnAddRef = document.getElementById("btn_add")
  const btnAddProcessRef = document.getElementById("btn_add_process")
  const btnAddActivityRef = document.getElementById("btn_add_activity")
  const btnAddTaskRef = document.getElementById("btn_add_task")

  addModalRef.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget
    const title = button.getAttribute('data-bs-title')
    const type = button.getAttribute('data-bs-type')
    addModalRef.querySelector('#am_title').textContent = title
    addModalRef.querySelector('#am_type').value = type
  })

  addModalRef.addEventListener('hidden.bs.modal', event => {
    addModalRef.querySelector('#am_input_name').value = ""
  })

  editModalRef.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget
    const title = button.getAttribute('data-bs-title')
    const name = button.getAttribute('data-bs-name')
    const refId = button.getAttribute('data-bs-ref-id')
    const type = button.getAttribute('data-bs-type')
    editModalRef.querySelector('#em_title').textContent = title
    editModalRef.querySelector('#em_input_name').value = name
    editModalRef.querySelector('#em_ref_id').value = refId
    editModalRef.querySelector('#em_type').value = type
  })

  async function getProcesses() {
    btnAddActivityRef.disabled = true
    btnAddTaskRef.disabled = true
    const response = await fetch(`<?= base_url("api/procesos") ?>`)
    const data = await response.json()
    if (data) {
      let html = `<ul class="list-group list-group-flush col-form-label-sm">`;
      data.processes.map(process => {
        html += `<li id="process_${process.id}" class="process-card list-group-item d-flex align-items-start justify-content-between gap-2">
          <span class="fw-medium">${process.name}</span>
          <div class="d-flex align-items-start gap-2">
            <button type="button" class="btn btn-sm btn-outline-secondary d-flex align-items-center p-1" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-title="Proceso" data-bs-name="${process.name}" data-bs-ref-id="${process.id}" data-bs-type="1">
              <i data-feather="edit"></i>
            </button>
            <button type="button" class="btn btn-sm btn-outline-danger d-flex align-items-center p-1">
              <i data-feather="trash-2"></i>
            </button>
            <button type="button" onclick="loadActivities(${process.id})" class="btn btn-sm btn-success d-flex align-items-center p-1">
              <i data-feather="chevrons-right"></i>
            </button>
          </div>
        </li>`
      })
      html += `</ul>`
      processesAreaRef.innerHTML = html
      feather.replace({
        width: 16,
        height: 16,
      })
      activitiesAreaRef.innerHTML = `<p class="col-form-label-sm mb-0 py-2 text-center fw-semibold form-text">Elige una actividad</p>`
      tasksAreaRef.innerHTML = `<p class="col-form-label-sm mb-0 py-2 text-center fw-semibold form-text">Elige una actividad</p>`
    }
  }

  async function getActivities(processId) {
    btnAddActivityRef.disabled = true
    btnAddTaskRef.disabled = true
    const response = await fetch(`<?= base_url("api/actividades") ?>/${processId}`)
    const data = await response.json()
    if (data) {
      if (data.activities.length == 0) {
        activitiesAreaRef.innerHTML = `<p class="col-form-label-sm mb-0 py-2 text-center fw-semibold form-text">No hay actividades para mostrar, crea la primera</p>`
      } else {
        let html = `<ul class="list-group list-group-flush col-form-label-sm">`;
        data.activities.map(activity => {
          html += `<li id="activity_${activity.id}" class="activity-card list-group-item d-flex align-items-start justify-content-between gap-2">
            <span class="fw-medium">${activity.name}</span>
            <div class="d-flex align-items-start gap-2">
              <button type="button" class="btn btn-sm btn-outline-secondary d-flex align-items-center p-1" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-title="Actividad" data-bs-name="${activity.name}" data-bs-ref-id="${activity.id}" data-bs-type="2">
                <i data-feather="edit"></i>
              </button>
              <button type="button" class="btn btn-sm btn-outline-danger d-flex align-items-center p-1">
                <i data-feather="trash-2"></i>
              </button>
              <button type="button" onclick="loadTasks(${activity.id})" class="btn btn-sm btn-warning d-flex align-items-center p-1">
                <i data-feather="chevrons-right"></i>
              </button>
            </div>
          </li>`
        })
        html += `</ul>`
        activitiesAreaRef.innerHTML = html
        feather.replace({
          width: 16,
          height: 16,
        })
      }
      tasksAreaRef.innerHTML = `<p class="col-form-label-sm mb-0 py-2 text-center fw-semibold form-text">Elige una actividad</p>`
      btnAddActivityRef.disabled = false
    }
  }

  async function getTasks(activityId) {
    btnAddTaskRef.disabled = true
    const response = await fetch(`<?= base_url("api/tareas") ?>/${activityId}`)
    const data = await response.json()
    if (data) {
      if (data.tasks.length == 0) {
        tasksAreaRef.innerHTML = `<p class="col-form-label-sm mb-0 py-2 text-center fw-semibold form-text">No hay actividades para mostrar, crea la primera</p>`
      } else {
        let html = `<ul class="list-group list-group-flush col-form-label-sm">`;
        data.tasks.map(task => {
          html += `<li id="task_${task.id}" class="task-card list-group-item d-flex align-items-start justify-content-between gap-2">
            <span class="fw-medium">${task.name}</span>
            <div class="d-flex align-items-start gap-2">
              <button type="button" class="btn btn-sm btn-outline-secondary d-flex align-items-center p-1" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-title="Tarea" data-bs-name="${task.name}" data-bs-ref-id="${task.id}" data-bs-type="3">
                <i data-feather="edit"></i>
              </button>
              <button type="button" class="btn btn-sm btn-outline-danger d-flex align-items-center p-1">
                <i data-feather="trash-2"></i>
              </button>
            </div>
          </li>`
        })
        html += `</ul>`
        tasksAreaRef.innerHTML = html
        feather.replace({
          width: 16,
          height: 16,
        })
      }
      btnAddTaskRef.disabled = false
    }
  }

  async function loadActivities(processId) {
    activitiesAreaRef.innerHTML = `<div class="p-2 d-flex justify-content-center">
      <div class="col-form-label-sm">
        <div class="spinner-border spinner-border-sm" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
      </div>
    </div>`
    document.getElementById("processIdSelected").value = processId
    const processCard = document.getElementById(`process_${processId}`)
    document.querySelectorAll(".process-card").forEach(card => {
      card.classList.remove('list-group-item-success')
    })
    processCard.classList.add('list-group-item-success')
    await getActivities(processId)
  }

  async function loadTasks(activityId) {
    tasksAreaRef.innerHTML = `<div class="p-2 d-flex justify-content-center">
      <div class="col-form-label-sm">
        <div class="spinner-border spinner-border-sm" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
      </div>
    </div>`
    document.getElementById("activityIdSelected").value = activityId
    const activityCard = document.getElementById(`activity_${activityId}`)
    document.querySelectorAll(".activity-card").forEach(card => {
      card.classList.remove('list-group-item-warning')
    })
    activityCard.classList.add('list-group-item-warning')
    getTasks(activityId)
  }

  btnAddRef.addEventListener('click', async function() {
    const name = document.getElementById("am_input_name")
    const type = document.getElementById("am_type")
    const modal = bootstrap.Modal.getInstance(addModalRef)
    btnAddRef.disabled = true
    btnAddRef.innerHTML = `Cargando...`
    if (name.value != "") {
      const path = type.value == 1 ? 'proceso' : (type.value == 2 ? 'actividad' : 'tarea')
      const response = await fetch(`<?= base_url("api/") ?>${path}/add`, {
        method: 'POST',
        body: JSON.stringify({
          name: name.value,
          ...(path == 'actividad' ? {
            processId: document.getElementById("processIdSelected").value
          } : (path == 'tarea' ? {
            activityId: document.getElementById("activityIdSelected").value
          } : {}))
        }),
      })
      const data = await response.json()
      if (data.success) {
        type.value == 1 ? await getProcesses() : (type.value == 2 ? await getActivities(document.getElementById("processIdSelected").value) : await getTasks(document.getElementById("activityIdSelected").value))
        modal.hide()
      }
      btnAddRef.disabled = false
      btnAddRef.innerHTML = `Confirmar`
    } else {
      console.log("Completa porfa")
    }
  })

  btnEditRef.addEventListener('click', async function() {
    const name = document.getElementById("em_input_name")
    const refId = document.getElementById("em_ref_id")
    const type = document.getElementById("em_type")
    const modal = bootstrap.Modal.getInstance(editModalRef)
    btnEditRef.disabled = true
    btnEditRef.innerHTML = `Cargando...`
    if (name.value != "") {
      const path = type.value == 1 ? 'proceso' : (type.value == 2 ? 'actividad' : 'tarea')
      const response = await fetch(`<?= base_url("api/") ?>${path}/edit`, {
        method: 'POST',
        body: JSON.stringify({
          id: refId.value,
          name: name.value,
        }),
      })
      const data = await response.json()
      if (data.success) {
        type.value == 1 ? await getProcesses() : (type.value == 2 ? await getActivities(document.getElementById("processIdSelected").value) : await getTasks(document.getElementById("activityIdSelected").value))
        modal.hide()
      }
      btnEditRef.disabled = false
      btnEditRef.innerHTML = `Confirmar`
    } else {
      console.log("Completa porfa")
    }
  })
</script>
<?= $this->endSection() ?>