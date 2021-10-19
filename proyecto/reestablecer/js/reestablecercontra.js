$(document).ready(function (event) {
  // Submit form data via Ajax
  $("#form-reestablecer-contra").on('submit', function (event) {
    event.preventDefault();
    enviarcorreo();
  });
});
