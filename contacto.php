
<?php	
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $dbhost = "localhost";
  $dbname = "evidencia";
  $dbuser = "root";
  $dbpass = "";

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
  // Verificar la conexión
  if (!$conn) {
    die('Error al conectarse a la base de datos: ' . mysqli_connect_error());
  }
  
  // Seleccionar la base de datos
  mysqli_select_db($conn, $dbname);
  
  $nombre = $_POST["nombre"];
  $email = $_POST["email"];
  $mensaje = $_POST["mensaje"];

  $destinatario = "edsonolafp@gmail.com";
  $asunto = "Mensaje enviado desde el sitio web";

  $contenido = "Nombre: " . $nombre . "\nEmail: " . $email . "\nMensaje: " . $mensaje;

  mail($destinatario, $asunto, $contenido);

  $sql = "INSERT INTO usuarios (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";
      if (mysqli_query($conn, $sql)) {
        header("Location: confirmacion.html");
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

  header("Location: confirmacion.html");
} else {
  header("Location: contacto.php");
}

?>