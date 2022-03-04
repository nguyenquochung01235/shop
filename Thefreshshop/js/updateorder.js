function updateOrder(id,msnv,ttdh_now){
  var SoDonDH =$('#donhang_' + id).text();
  var TTDH = $('#trangthaidonhang_' + id).val();
  $.post('../API/capnhatdonhang.php', {
    'msnv': msnv,
    'SoDonDH': SoDonDH,
    'TTDH': TTDH,
    'ttdh_now': ttdh_now
    }, function(data){      
      location.reload();
      alert(data);
  });
}
