<main id="mainApp">
  <?php
  if (isset($_GET["w"])) {
    $w = $_GET["w"];
    switch ($w) {
      case 'taskForm':
        $n = 'Nueva tarea';
        break;
      case 'dashboard':
        $n = 'Dashboard';
        break;
      case 'task':
        $n = 'Task';
        break;
      case 'taskIA':
        $n = 'Tarea con IA';
        break;
      case 'allTask':
        $n = 'Tareas de ' . $_SESSION["user"];
        break;
      case 'calendar':
        $n = 'Calendario de tareas';
        break;
    }
  }

  ?>
  <div class="ventana">
    <div class="headerVentana">
      <div>
        <?php if (isset($n)) {
          echo $n;
        } else {
          echo "Dashboard";
        } ?>
      </div>
      <div>
        <button class="maxiVentana">
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1.2em" width="1.2em" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 3v10h10V3H3zm9 9H4V4h8v8z"></path>
          </svg>
        </button>
        <button class="cerrarVentana">
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1.2em" width="1.2em" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.116 8l-4.558 4.558.884.884L8 8.884l4.558 4.558.884-.884L8.884 8l4.558-4.558-.884-.884L8 7.116 3.442 2.558l-.884.884L7.116 8z"></path>
          </svg>
        </button>
      </div>
    </div>
    <div class="containerVentana">
      <div id="menuLateralWindow">
      </div>
      <div class="bodyVentana">
        <?php
        if (isset($w)) {
          if ($w == "dashboard") {
            require_once("./dashboard.php");
          } else if ($w == "taskForm") {
            require_once("./taskForm.php");
          } else if ($w == "task") {
            require_once("./taskView.php");
          } else if ($w == "taskIA") {
            require_once("./taskIA.php");
          } else if ($w == "allTask") {
            require_once("./allTask.php");
          } else if ($w == "calendar") {
            require_once("./calendar.php");
          } else {
            require_once("./dashboard.php");
          }
        } else {
          require_once("./dashboard.php");
        }

        ?>
      </div>
    </div>
  </div>
</main>

<script src="./scripts/botonesVentanas.js"></script>