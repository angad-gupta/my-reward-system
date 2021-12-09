$(document).ready( function () {
  $('.delete-modal').on('click', function() {
    var link = $(this).attr('link');
    $('.get_link').attr('href', link);
  });
});