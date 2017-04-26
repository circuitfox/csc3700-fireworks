
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function() {
  $('#product-delete-modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var product = button.data('id');
      var modal = $(this)
      modal.find('#delete-product').attr('action', '/products/' + product);
  });
});
