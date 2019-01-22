
//----------------------------------------------------
//               Desplegable responsive              |
//----------------------------------------------------
$(document).ready(function(){
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
  });

  // Or with jQuery
  $('.dropdown-trigger').dropdown();
  $('.modal').modal();
});

var instance = M.Dropdown.getInstance(elem);
instance.open();
instance.close();
instance.recalculateDimensions();
instance.destroy();
