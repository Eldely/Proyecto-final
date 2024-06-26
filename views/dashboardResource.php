<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/loginForm.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Gestión de Proyectos</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Gestión de Proyectos</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Ajustes</a></li>
                    <li><a class="dropdown-item" href="#!">Registro de actividad</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="../models/Logout.php">Cerrar sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Principal</div>
                        <a class="nav-link" href="../views/dashboardUser.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Usuarios
                        </a>
                        <a class="nav-link" href="../views/dashboardProject.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-project-diagram"></i></div>
                            Proyectos
                        </a>
                        <a class="nav-link" href="../views/dashboardActivity.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                            Actividades
                        </a>
                        <a class="nav-link" href="../views/dashboardTask.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                            Tareas
                        </a>
                        <a class="nav-link" href="../views/dashboardResource.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                            Recursos
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <br>
                    <h1 class="mb-4 text-center fw-bold">Gestión de Proyectos</h1>
                    <!-- Aquí va tu contenido específico de dashboard -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h2 class="fw-bold h3">Recursos</h2>
                        </div>
                        <div class="card-body">
                            <a href="createResourceForm.php" class="btn btn-primary mb-3">Registrar Nuevo Recurso</a>
                            <div class="table-responsive" style="overflow: visible;">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID Recurso</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Valor</th>
                                            <th>Unidad de Medida</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../db_conexion.php';
                                        $stmt = $pdo->query("SELECT * FROM recursos");
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['id_recurso']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['descripcion']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['valor']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['unidad_medida']) . "</td>";
                                            echo "<td><a class='btn btn-warning' href='updateResourceForm.php?id=" . $row['id_recurso'] . "'>Actualizar</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Gestión de Proyectos 2024</div>
                        <div>
                            <a href="#">Política de Privacidad</a>
                            &middot;
                            <a href="#">Términos & Condiciones</a>
                        </div>
                    </div>
            </footer>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>