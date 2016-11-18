<!DOCTYPE html>
<html lang=Share and Download!
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>#MySpecialOne</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link rel="stylesheet" href="css/crop.css">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <link rel="stylesheet" href="js/jquery-ui/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="css/edit-final.css" type="text/css">
</head>
<body>
<div id="horizontal-scroll-bg"></div>
    <div id="background-opaque"></div>
    <header>
      <nav class="navbar navbar-default navbar-fixed-top" id="main-navigation">
        <div class="container-fluid header-main-container">
          <div class="navbar-header">
             <a class="navbar-brand" href="/">
              <img alt="Brand" src="img/tecno_logo_black.png">
            </a> 
          </div>
        </div>
      </nav>
    </header>
    <div class="col-xs-12 contents-container" style="padding: 30px 0px 60px;">
        <section class="pagination-holder pagination-holder-1 col-xs-12">
            <h2>Add a Special Caption to your new photo</h2>
            <div class="top-pagination top-pagination-3"></div>
        </section>
        <section class="col-xs-12">
            <div id='edit-photoframe'>
                <div id="caption-textarea-holder">    
                </div>
                <div class="canvas-holder">
                    <textarea id="caption-textarea" 
                                placeholder="Enter Text Here (Max: 100 Characters)" 
                                style="resize: none; 
                                top: 10px !important; 
                                left: 10px !important; "></textarea>
                    <canvas width="530" height="530" id="edit-canvas"></canvas>
                </div>
            </div>

            <p style="width: 70%; text-align: center; margin: 30px auto;">Drag items on image to change their positions</p>
        </section> 
        <section class="share-download-links" style="width: 45%; margin: 30px auto;">
            <div class="share-links">
                <div class="col-xs-6">
                    <img src="img/facebook-share.jpg" class="img img-responsive" style="cursor: pointer;" id="facebook-share-btn">
                </div>
                <div class="col-xs-6">
                    <img src="img/twitter-share.jpg" class="img img-responsive" style="cursor: pointer;" id="twitter-share-btn">
                </div>
            </div>
            <div class="download-links">
                <div class="col-xs-12 download-button-holder">
                    <a href="#" class="btn" id="download-button">Download</a>
                </div>
            </div>
        </section>   
    </div>
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/crop.js"></script>
<script type="text/javascript" src="js/jcanvas/jcanvas.min.js"></script>
<script type="text/javascript" src="js/html2canvas/html2canvas.js"></script>
<script type="text/javascript" src="js/html2canvas/jquery.plugin.html2canvas.js"></script>
<script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/textcounter.min.js"></script></s>
<!-- <script type="text/javascript" src="js/index.js"></script> -->
<script type="text/javascript" src="js/edit-final.js"></script>
</body>
</html>
