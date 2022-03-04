function closeForm(idClose) {
  var close = document.getElementById(idClose);
  close.style.display = "none";

}
function openForm(idOpen) {
  var open = document.getElementById(idOpen);
  open.style.display = "block";
}

function updateForm(id) {

  var msnv = document.getElementById(id).textContent;
  var name = document.getElementById('name_' + id).textContent;
  var chucvu = document.getElementById('chucvu_' + id).textContent;
  var phone = document.getElementById('phone_' + id).textContent;
  var address = document.getElementById('address_' + id).textContent;
  var pwd = document.getElementById('pwd_' + id).textContent;

  var msnvUpdateForm = document.getElementById('msnvUpdateForm');
  msnvUpdateForm.value = msnv;
  var nameUpdateForm = document.getElementById('nameUpdateForm');
  nameUpdateForm.value = name;
  var phoneUpdateForm = document.getElementById('phoneUpdateForm');
  phoneUpdateForm.value = phone;
  var addressUpdateForm = document.getElementById('addressUpdateForm');
  addressUpdateForm.value = address;
  var pwdUpdateForm = document.getElementById('pwdUpdateForm');
  pwdUpdateForm.value = pwd;

  var msnvUpdate = document.getElementById('msnvUpdate');
  msnvUpdate.innerHTML = "Cập Nhật Thông Tin Nhân Viên [ "+id+" ]";

  switch (chucvu) {
    case 'Quản Lý': 
      document.getElementById('ql').setAttribute("selected", "");
      break;
    case 'Bán Hàng': 
      document.getElementById('bh').setAttribute("selected", "");
      break;
    case 'Tư Vấn Viên': 
      document.getElementById('tv').setAttribute("selected", "");
      break;
    case 'Thu Ngân': 
      document.getElementById('tn').setAttribute("selected", "");
      break;
  }


}