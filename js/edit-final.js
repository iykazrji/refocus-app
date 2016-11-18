$(document).ready(function(){
	var self = this;

	self.caption = "Caption"
	self.canvas = $('#edit-canvas');
	var final_image_data = window.localStorage.getItem('final_image_data');
	
	//Draw Image to Canvas
	self.canvas.drawImage({
		layer: true,
		source: final_image_data,
		draggable: false,
		x: 265,
		y: 265
	});
	self.canvas.drawImage({
		layer: true,
		source: 'img/opaque-filter.png',
		x: 265,
		y: 265
	});
	self.canvas.drawImage({
		layer: true,
		source: 'img/water-mark.png',
		draggable: true,
		x: 265,
		y: 265
	});

	$('#caption-textarea').focus();
	
	// $('#caption-textarea').draggable(
 //    {   
 //        containment: '.canvas_holder',
 //        scroll: false,
 //        cancel: 'text'
 //    });


	$('#download-button').click(function(){
		// downloadImage(self.canvas);
		var caption_textarea = $('#caption-textarea');
		caption_textarea.fadeOut(500);
		drawTextToCanvas(caption_textarea, self.canvas);
		downloadImage(self.canvas);
		return false;
	});

	$('#caption-textarea').textcounter({
	    max: 80,
	    stopInputAtMaximum: true
	});

	$('#caption-textarea').removeAttr('style');	


    $('#twitter-share-btn').click(function(e) {
    	$(window).location = '/';
    	e.preventDefault();
    	return false;
        // var copy = " Join the fun here ";
        // var twshare = 'http://twitter.com/intent/tweet?url=http://www.forcleanerhands.com/&text=' + copy + 'http://www.forcleanerhands.com/' + filepath;
        // $('#tw-share-link').attr('href', twshare);
    });

    $('#facebook-share-btn').click(function() {
        $(window).location = '/';
    	return false;
    });
});
function drawTextToCanvas(textArea, canvas){
	var text = textArea.val();
	console.log(textArea.width());
	var offset = textArea.offset();
    var frameOffset = $('#edit-photoframe').offset();
    var xPos = offset.left - frameOffset.left;
    var yPos = offset.top - frameOffset.top;
    console.log(yPos+20, xPos+20);
    var font = 30;
    if($(window).width() > 520){
    	font = 30;
    }else{
    	font = 25
    }

    canvas.drawText({
	  fillStyle: '#f9f9f9',
	  layer: true,
	  strokeWidth: 2,
	  x: xPos + 20, y: yPos + 20,
	  fontSize: font,
	  fontFamily: 'Playfair Display',
	  text: text,
	  fromCenter: false,
	  maxWidth: textArea.width(),
	  align: 'left',
	  lineHeight: 1.7
	});

}
function downloadImage(canvas){
	var url = canvas.getCanvasImage('png');
	url = url.replace(/^data:image\/[^;]/, 'data:application/octet-stream');
	window.open(url);
	return false;
}
function wrapText(context, text, x, y, maxWidth, lineHeight) {
        var words = text.split(' ');
        var line = '';

        for(var n = 0; n < words.length; n++) {
          var testLine = line + words[n] + ' ';
          var metrics = context.measureText(testLine);
          var testWidth = metrics.width;
          if (testWidth > maxWidth && n > 0) {
            context.fillText(line, x, y);
            line = words[n] + ' ';
            y += lineHeight;
          }
          else {
            line = testLine;
          }
        }
        context.fillText(line, x, y);
      }