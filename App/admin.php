<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">
            <a class="navbar-brand" href="admin.php">Panel de Administrador</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="clientes">Clientes</a>
                    </li>
                    <!--

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="tiendas">Tiendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="producto">Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="categoria">Categoría</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="marca">Marca</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="inventario">Inventario</a>
                    </li>
                    
                    -->

                    <li class="nav-item">
                    <a class="nav-link" href="login.php" onclick="redirectToLogin()">Salir de ADMIN</a>                                       
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div id="clientes" class="content" style="display: none;">
            <h2>Clientes</h2>
            <p>Contenido de la sección de Clientes...</p>
            <div class="container mt-4">
                <h2>Clientes Registrados</h2> 
                <?php include "connection/borrar_cliente.php"; ?>                               
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>ApellidoMaterno</th>
                            <th>ApellidoPaterno</th>
                            <th>Correo electrónico</th>
                            <th>Telefono</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>DireccionID</th>
                            <th>Acciones</th>
                            <!-- Agregar más columnas según la estructura de tu tabla de clientes -->
                        </tr>
                    </thead>
                    <tbody id="tablaClientes">
                        <!-- Aquí se insertarán las filas de la tabla mediante JavaScript -->
                    </tbody>                    
                </table>
        </div>

        <div id="tiendas" class="content" style="display: none;">
            <h2>Tiendas</h2>
            <p>Contenido de la sección de Tiendas...</p>
        </div>
        <div id="producto" class="content" style="display: none;">
            <h2>Producto</h2>
            <p>Contenido de la sección de Producto...</p>
        </div>
        <div id="categoria" class="content" style="display: none;">
            <h2>Categoría</h2>
            <p>Contenido de la sección de Categoría...</p>
        </div>
        <div id="marca" class="content" style="display: none;">
            <h2>Marca</h2>
            <p>Contenido de la sección de Marca...</p>
        </div>
        <div id="inventario" class="content" style="display: none;">
            <h2>Inventario</h2>
            <p>Contenido de la sección de Inventario...</p>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Función para manejar los clics en los elementos del menú
        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const sectionId = this.getAttribute('data-section');
                showSection(sectionId);
            });
        });

        // Función para mostrar la sección correspondiente y ocultar las demás
        function showSection(sectionId) {
            document.querySelectorAll('.content').forEach(content => {
                if (content.id === sectionId) {
                    content.style.display = 'block';
                } else {
                    content.style.display = 'none';
                }
            });
        }

        // Hacer una solicitud al backend para obtener los clientes
        fetch('connection/client-con.php')
            .then(response => response.json())
            .then(data => {
                const tablaClientes = document.getElementById('tablaClientes');
                data.forEach(cliente => {
                    const fila = document.createElement('tr');
                    fila.innerHTML = `                        
                        <td>${cliente.idCliente}</td>
                        <td>${cliente.nombre}</td>
                        <td>${cliente.apellidoPaterno}</td>
                        <td>${cliente.apellidoMaterno}</td>
                        <td>${cliente.correo}</td>
                        <td>${cliente.telefono}</td>
                        <td>${cliente.username}</td>
                        <td>${cliente.password}</td>
                        <td>${cliente.idDireccion}</td>
                        <td>                                                        
                            <button class="btn btn-warning btn-editar" data-id="${cliente.idCliente}">Editar</button>                            
                            <button class="btn btn-danger btn-borrar" data-id="${cliente.idCliente}">Borrar</button>
                        </td>
                                                
                    `;
                    tablaClientes.appendChild(fila);
                });
            })
            .catch(error => console.error('Error al obtener los clientes:', error));

            document.addEventListener('DOMContentLoaded', function() {
                    // Agregar la clase 'active' al ítem de navegación "Clientes"
                        document.querySelector('.navbar-nav .nav-item:first-child').classList.add('active');

                    // Mostrar la sección de clientes al arrancar la página
                    const sectionId = document.querySelector('.navbar-nav .nav-item:first-child .nav-link').getAttribute('data-section');
                    showSection(sectionId);

                const tablaClientes = document.getElementById('tablaClientes');

                tablaClientes.addEventListener('click', function(event) {                    

                    if (event.target.classList.contains('btn-borrar')) {
                        const idCliente = event.target.getAttribute('data-id');
                        
                        // Solicitar confirmación antes de borrar el cliente
                        if (confirm('¿Estás seguro de que deseas borrar este cliente?')) {
                            // Enviar una solicitud para borrar el cliente con el ID específico
                            window.location.href = `admin.php?id=${idCliente}`;                                                 
                        }
                    }

                    if (event.target.classList.contains('btn-editar')) {
                        const idCliente = event.target.getAttribute('data-id');
                        
                        // Solicitar confirmación antes de borrar el cliente
                        if (confirm('¿Estás seguro de que deseas editar este cliente?')) {
                            // Enviar una solicitud para borrar el cliente con el ID específico
                            window.location.href = `adminapp/edit-client.php?id=${idCliente}`;                                                 
                        }
                    }
                });
            }); 
   

            function redirectToLogin() {
            window.location.href = 'login.php';
        }
    </script>
</body>