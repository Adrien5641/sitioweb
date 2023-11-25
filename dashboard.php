<?php
session_start();
include("config.php");

if (!isset($_SESSION['idusuario'])) {
    header("location: login.php"); // redirige al inicio de sesión si no hay sesión activa
}
$idusuario = $_SESSION['idusuario'];

// Consultas para obtener información del usuario y sus asesorías
$consulta_usuario = "SELECT * FROM usuario WHERE id = $idusuario";
$resultado_usuario = $conexion->query($consulta_usuario);
$usuario_info = $resultado_usuario->fetch_assoc();

$consulta_datosestudiante = "SELECT * FROM datosestudiante WHERE idusuario = $idusuario";
$resultado_datosestudiante = $conexion->query($consulta_datosestudiante);

$consulta_asesorias = "SELECT * FROM asesoria WHERE idusuario = $idusuario";
$resultado_asesorias = $conexion->query($consulta_asesorias);

$consulta_historial = "SELECT * FROM historial WHERE idusuario = $idusuario";
$resultado_historial = $conexion->query($consulta_historial);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control - Asesorías Psicológicas</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            background-color: #e6f7ff;
            margin: 20px;
            padding: 0;
        }

        h2 {
            color: white;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #003366;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .JOotracaja2 {
    color: white;
    width: 1550px;
    height: 150px;
    top: 2%;
    right: 50%;
    transform: translate(-1%, -30%);
    left: 50%;
    background-color: #003366;
}

.JOotracaja5 {
    width: 200px;
    height: 150px;
 
    right: 50%;
    transform: translate(-12%, -130%);
    background-size: cover;
    left: 60%;
    border-radius: 5px;
    margin: 10px;
    padding: 10px 20px;
    background-image: url("https://fastly.4sqi.net/img/general/600x600/87388367_octFS9QHefEAPeDdpMbNBisgcrRgfo0QA4rDl6HXQIU.png");
}

.JOotracaja4 {
    width: 200px;
    height: 150px;
    right: 50%;
    transform: translate(-12%, 10%);
    background-size: cover;
    left: 60%;
    border-radius: 5px;
    margin: 10px;
    padding: 10px 20px;
    background-image: url("https://bienestar.cuc.edu.co/wp-content/uploads/2022/02/Rosa-y-Morado-Deportivo-Gradiente-Ejercicio-YouTube-Miniatura-1.png");
}

.JOotracaja3 {
    width: 200px;
    height: 150px;
    right: 50%;
    transform: translate(100%, -95%);
    background-size: cover;
    left: 60%;
    border-radius: 5px;
    margin: 10px;
    padding: 10px 20px;
    background-image: url("https://entrenos.eafit.edu.co/noticias/2018/abril/SiteAssets/Paginas/las-asesorias-psicologicas-online-un-tema-de-analisis-para-la-psicologia/asesoria-pisoclogica-sec1500.jpg");
}

.JOotracaja21 {
    color: black;
    width: 200px;
    height: 150px;
    right: 50%;
    transform: translate(212%, -200%);
    background-size: cover;
    left: 60%;
    border-radius: 5px;
    margin: 10px;
    padding: 10px 20px;
    background-image: url("https://estaticos-cdn.prensaiberica.es/clip/98923871-f85f-49b2-9742-0bd1fdd51643_16-9-aspect-ratio_default_0.jpg");
}

.JOotracaja1 {
    width: 200px;
    height: 150px;
    right: 50%;
    transform: translate(325%, -305%);
    background-size: cover;
    left: 60%;
    border-radius: 5px;
    margin: 10px;
    padding: 10px 20px;
    background-image: url("https://www.concebir.com/wp-content/uploads/2021/08/asesoria-psicologica-concebir.jpg");
}

.JOotracaja20 {
    color: white;
    width: 1550px;
    height: 150px;
    top: 2%;
    right: 50%;
    transform: translate(-1%, 14%);
    left: 50%;
    background-color: #003366;
}


    </style>
</head>
<body>
    <div class="JOotracaja2" style="text-align: center;"><br><h1><br>DEPARTAMENTO DE BIENESTAR</h1></div>
    <div class="JOotracaja5"></div>
    <div>
        <a href="#servicios">Ir a Servicios</a> |
        <a href="#funcionamiento">Ir a Cómo Funciona</a> |
        <a href="#videos">Ir a Videos Informativos</a> |
        <a href="#contacto">Ir a Contáctenos</a> |
        <a href="#equipo">Ir a Equipo de Trabajo</a>|
        <a href="login.php" style="text-align: center;">Cerrar sesión</a>
    </div>
    <div class="h2">
    <h3>Bienvenido, <?php echo $usuario_info['nombre']; ?>!</h3></div><br>

    <h3>Tus Datos:</h3>
    <table border="1">
        <tr>
            <th>Carrera</th>
            <th>Facultad</th>
            <th>Semestre</th>
            <th>Jornada</th>
            <th>Estado Laboral</th> 
        </tr>
        <?php while ($row = $resultado_datosestudiante->fetch_assoc()) : ?>
            <tr> 
                <td><?php echo $row['carrera']; ?></td>
                <td><?php echo $row['facultad']; ?></td>
                <td><?php echo $row['semestre']; ?></td>
                <td><?php echo $row['jornada']; ?></td>
                <td><?php echo $row['estado_laboral']; ?></td>
        <?php endwhile; ?>
    </table>
    <br>
    
    <h3>Tus Asesorías:</h3>
    <table border="1">
        <tr>
            <th>Tipo de Asesoría</th>
            <th>Resultado</th>
            <th>Observaciones</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Psicólogo</th>
        </tr>
        <?php while ($row = $resultado_asesorias->fetch_assoc()) : ?>
            <tr>    
                <td><?php echo $row['tipo_de_asesoria']; ?></td>
                <td><?php echo $row['resultado']; ?></td>
                <td><?php echo $row['observaciones']; ?></td>
                <td><?php echo $row['fecha']; ?></td>
                <td><?php echo $row['hora']; ?></td>
                <td><?php echo $row['estado']; ?></td>
                <td><?php echo $row['psicologo_que_atendio']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>


    <h3>Tu Historial:</h3>
    <table border="1">
        <tr>
            <th>Numero de sesiones</th>
            <th>Tipo de sesion</th>
            <th>Resultado de las sesiones</th>
            <th>Antecedentes</th>
            <th>Observaciones</th>
            <th>Psicologo que atendio</th>
        </tr>
        <?php while ($row = $resultado_historial->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['numero_de_sesiones']; ?></td>
                <td><?php echo $row['tipo_de_sesion']; ?></td>
                <td><?php echo $row['resultados_de_las_sesiones']; ?></td>
                <td><?php echo $row['antecedentes']; ?></td>
                <td><?php echo $row['observaciones']; ?></td>
                <td><?php echo $row['psicologo_que_atendio']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br><br>
    
    <div id="servicios">
     <div class="JOotracaja4">
        <h2><br><br><br><br><br><br>Servicios que Ofrecemos</h2>
        <p>* Asesorias (Individuales o grupales) <br> * Visualizacion de Datos <br>* Visualizacion de Asesorias <br> * Visualizacion de Historial</p>
    </div>
        </div>
    
    <div id="funcionamiento">
    <div class="JOotracaja3">
        <h2><br><br><br><br><br><br>Cómo Funciona</h2>
        <p>Los usuarios pueden logearse con usuario y contraseña para ver por ejemplo sus datos o sus asesorias en caso de ser estudiantes.</p>
    </div>
        </div>

   <div id="videos">
    <div class="JOotracaja21">
        <h2><br><br><br><br><br><br>Videos Informativos</h2>
        <p>https://www.youtube.com/watch?v=kCRJLZ6sXjI</p>
        
    </div>
        </div>

        <div id="equipo">
    <div class="JOotracaja1">
        <h2><br><br><br><br><br><br>Equipo de Trabajo</h2>
        <p>* Psicologos de bienestar <br> * Personal de bienestar<br> * Administradores</p>
    </div>
        </div>

        <div class="JOotracaja20" style="text-align: center;"><h2><br>CONTACTENOS</h2>  <br>asesoriaspsicologicas@gmail.com
               | IG: asesoriaspsicologias_bienestarCUL              | FB:asesoriaspsicologicas </div>
        <div id="contacto">
        </div>

    
</body>
</html>