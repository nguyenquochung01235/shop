$(document).ready(function(){

  var quantity=1;
     $('.quantity-right-plus').click(function(e){
          var quantity = parseInt($('#quantity').val());
                
              $('#quantity').val(quantity + 1);
          
      });
  
       $('.quantity-left-minus').click(function(e){
          var quantity = parseInt($('#quantity').val());

              if(quantity>1){
                $('#quantity').val(quantity - 1);
              }
              
      });
      
  }); 


  function add(id) {
    let quantity = parseInt($('#' + id).val()) + 1;
    $('#' + id).val(quantity);

    //them ajax de cap nhat lai luc them
  }

  function remove(id) {
    let quantity = parseInt($('#' + id).val()) - 1 <= 0 ? 1 : parseInt($('#' + id).val()) - 1;
    $('#' + id).val(quantity);

    //them ajax de cap nhat lai luc xoa
  }