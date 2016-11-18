

$(window).load(function(){
    var self = this;
    var full_image = $('#img-full');

    self.canvas = fx.canvas();
    self.final_img = "";


    try {
        self.canvas = fx.canvas();
    } catch (e) {
        alert(e);
        return;
    }

    // convert the image to a texture
    image = document.getElementById('img-full');
    self.texture = self.canvas.texture(image);

    // apply the ink filter
    self.canvas.draw(self.texture).zoomBlur(0, 0, 0.05).update();


    // replace the image with the canvas
    image.parentNode.insertBefore(self.canvas, image);
    // image.parentNode.removeChild(image);
    self.final_img = self.canvas.toDataURL('image/png');

    // image.src = self.canvas.toDataURL('image/png');

 
    $('#drag-ball-holder').draggable(
    {   
        containment: '#photoframe',
        scroll: false,

        drag: function(){
            var offset = $(this).offset();
            var frameOffset = $('#photoframe canvas').offset();
            var xPos = offset.left - frameOffset.left;
            var yPos = offset.top - frameOffset.top;
            self.canvas.draw(self.texture).zoomBlur(xPos, yPos, 0.05).update();   
            self.final_img = self.canvas.toDataURL('image/png');

        }
    });
    $('#done-button').click(function(callback){
        
        window.localStorage.setItem('final_image_data', self.final_img); 
        console.log(window.localStorage.final_image_data);
        var pathArray = window.location.pathname.split( '/' );
        var newPathname = "";
        for (i = 0; i < pathArray.length-2; i++) {
          newPathname += "/";
          newPathname += pathArray[i];
        }
        console.log(newPathname);
        window.location = 'edit-final.php';

        callback.preventDefault();
        return false;
    });
});


function b64toBlob(b64Data, contentType, sliceSize) {
  contentType = contentType || '';
  sliceSize = sliceSize || 512;

  var byteCharacters = atob(b64Data);
  var byteArrays = [];

  for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
    var slice = byteCharacters.slice(offset, offset + sliceSize);

    var byteNumbers = new Array(slice.length);
    for (var i = 0; i < slice.length; i++) {
      byteNumbers[i] = slice.charCodeAt(i);
    }

    var byteArray = new Uint8Array(byteNumbers);

    byteArrays.push(byteArray);
  }
    
  var blob = new Blob(byteArrays, {type: contentType});
  return blob;
}
