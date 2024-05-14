document.addEventListener("DOMContentLoaded", function() {
    // Realizar una solicitud HTTP para obtener los IDs de los usuarios
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../admin/php/id_usuario.php', true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Procesar la respuesta JSON
        var ids_usuarios = JSON.parse(xhr.responseText);
  
        // Obtener el elemento de selección
        var select = document.getElementById('id_usuario');
  
        // Agregar cada ID de usuario como una opción en el select
        ids_usuarios.forEach(function(id_usuario) {
          var option = document.createElement('option');
          option.value = id_usuario;
          option.text = id_usuario;
          select.appendChild(option);
        });
      } else {
        console.error('Error al cargar los IDs de los usuarios. Estado de la solicitud:', xhr.status);
      }
    };
    xhr.send();
  });
  