$(function () {
    $('#upload_logo').on('change', function () {
        readURL(input_logo);
    });
    $('#upload_video').on('change', function () {
        readURL(input_video);
    });
    $('#upload_image').on('change', function () {
      readURL(input_image);
  });

});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input_logo = document.getElementById( 'upload_logo' );
var input_video = document.getElementById( 'upload_video' );
var input_image = document.getElementById( 'upload_image' );

var infoArea_logo = document.getElementById( 'upload-label_logo' );
var infoArea_video = document.getElementById( 'upload-label_video' );
var infoArea_image = document.getElementById( 'upload-label_image' );

input_logo.addEventListener( 'change', showFileName_logo );
function showFileName_logo( event ) {
  var input_logo = event.srcElement;
  var fileName_logo = input_logo.files[0].name;
  infoArea_logo.textContent = fileName_logo;
};
input_video.addEventListener( 'change', showFileName_video );
function showFileName_video( event ) {
  var input_video = event.srcElement;
  var fileName_video = input_video.files[0].name;
  infoArea_video.textContent = fileName_video;
}
input_image.addEventListener( 'change', showFileName_image );
function showFileName_image( event ) {
  var input_image = event.srcElement;
  var fileName_image = input_image.files[0].name;
  infoArea_image.textContent = fileName_image;
}


