
      <?php
      // Recuperar los valores del formulario
      $dbhost = "localhost";
      $dbname = "evidencia";
      $dbuser = "root";
      $dbpass = "";
      
      // Obtener los datos del formulario
      $nombre = $_POST['nombre'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      // Conectarse a la base de datos
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
      
      // Verificar la conexión
      if (!$conn) {
        die('Error al conectarse a la base de datos: ' . mysqli_connect_error());
      }
      
      // Seleccionar la base de datos
      mysqli_select_db($conn, $dbname);
      
      // Insertar los datos del usuario en la base de datos
      $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
      if (mysqli_query($conn, $sql)) {
        echo "Registro exitoso!";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      
      // Cerrar la conexión
      mysqli_close($conn);
      
      ?>
