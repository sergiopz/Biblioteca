
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

  // select option
  $('select').formSelect();
  $('select').material_select();
  
          
});

var instance = M.Dropdown.getInstance(elem);
instance.open();
instance.close();
instance.recalculateDimensions();
instance.destroy();
// Select multiple

/*
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems, options);
  var instance = M.FormSelect.getInstance(elem);
  instance.getSelectedValues();
  instance.destroy();
});*/
