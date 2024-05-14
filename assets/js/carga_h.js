function obtenerHorariosAgregados() {
    // Hacer una solicitud AJAX para obtener los horarios de la tabla calendario_riego
    return fetch('../admin/php/optener_h.php')
      .then(response => response.json());
  }
  