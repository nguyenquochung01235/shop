function addToCart(MSHH){
  var num = parseInt($('#quantity').val());
  alert('Đã thêm sản phẩm');
  if(num){
    num
  }else{
    num = 1;
  }
  $.post('./API/cookie.php', {
    'action': 'add',
    'mshh': MSHH,
    'num': num
    }, function(data){
      location.reload();
  });
}

function updateToCart(MSHH,id){
  var num = parseInt($('#'+id).val());
  // alert('Đã cập nhật');
  $.post('./API/cookie.php', {
    'action': 'update',
    'mshh': MSHH,
    'updateNum': num
    }, function(data){
      location.reload();
  });
}

function deleteToCart(MSHH){
  if (confirm("Bạn có muốn xóa sản phẩm ?")) {
    $.post('./API/cookie.php', {
      'action': 'delete',
      'mshh': MSHH,
      'updateNum': 1
      }, function(data){
        location.reload();
    });
  } else {
    return;
  }
  
  
}