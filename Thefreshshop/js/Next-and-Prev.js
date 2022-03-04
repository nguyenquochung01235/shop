var slider_img = document.querySelector('.img_item');
    var img_btn = document.querySelector('.img_btn_child');
    var idImages = ['img_1', 'img_2', 'img_3'];
    var i = 0;

    function prev() {
      if (i <= 0) i = idImages.length;
      i--;
      var img = document.getElementById(idImages[i]);
      var img_btn = document.getElementById(idImages[i] + '_' + (i + 1));
      for (j = 0; j < idImages.length; j++) {

        var img_temp = document.getElementById(idImages[j]);
        img_temp.classList.remove('class', 'face_index');
        var img_btn_temp = document.getElementById(idImages[j] + '_' + (j + 1));
        img_btn_temp.classList.remove('btn_border');

      }
      img_btn.classList.add('btn_border');

      return img.classList.add('face_index');
    }

    function next() {
      if (i >= idImages.length - 1) i = -1;
      i++;
      var img = document.getElementById(idImages[i]);
      var img_btn = document.getElementById(idImages[i] + '_' + (i + 1));
      for (j = 0; j < idImages.length; j++) {

        var img_temp = document.getElementById(idImages[j]);
        img_temp.classList.remove('class', 'face_index');
        var img_btn_temp = document.getElementById(idImages[j] + '_' + (j + 1));
        img_btn_temp.classList.remove('btn_border');

      }
      img_btn.classList.add('btn_border');
      return img.classList.add('face_index');    
    }

    function selectImg(i) {
      if (i <= 0) i = idImages.length;
      i--;
      var img = document.getElementById(idImages[i]);
      var img_btn = document.getElementById(idImages[i] + '_' + (i + 1));
      for (j = 0; j < idImages.length; j++) {

        var img_temp = document.getElementById(idImages[j]);
        img_temp.classList.remove('class', 'face_index');
        var img_btn_temp = document.getElementById(idImages[j] + '_' + (j + 1));
        img_btn_temp.classList.remove('btn_border');

      }
      img_btn.classList.add('btn_border');

      return img.classList.add('face_index');
    }