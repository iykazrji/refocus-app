<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>#MySpecialOne</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/crop.css">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <div id="horizontal-scroll-bg"></div>
    <div id="background-opaque"></div>
    <header>
      <nav class="navbar navbar-default navbar-fixed-top" id="main-navigation">
        <div class="container-fluid header-main-container">
          <div class="navbar-header">
             <a class="navbar-brand" href="index.html">
              <img alt="Brand" src="img/tecno_logo_black.png">
            </a>
          <div class="top-addBlur-holder">
            <button id="addBlur" class="btn btn-blue-xs btn-block hide">Continue</button>
          </div> 
          </div>    
        </div>
      </nav>
    </header>
    <section class="second-section container-fluid">
        <section class="pagination-holder pagination-holder-1 col-xs-12">
            <h2>Select a Picture and Crop</h2>
            <div class="top-pagination top-pagination-1"></div>
        </section>
        <div id="finalPicture-holder" class="col-xs-12">

            <div class="" id="finalPicture" style="width:50%; margin:auto;">
                <div class="example">
                    <!-- cropper container element -->
                    <div class="default"></div>
                    <div style="position:absolute; top:0; bottom:0; left:0; height:100%; width:100%; ">
                        <img src="img/no-image.jpg" id="no_image_img" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%;">
                        <img src="" class="overlay" style="width:initial;height:auto;">
                    </div>
                </div>
                    <p class="tag" style="margin-top: 20px;">Drag knob to zoom</p>
                <br>
                <div class="text-center">
                    <button type="button" id="chooseFile" class="btn btn-blue-xs btn-block">UPLOAD AN IMAGE</button>
                    <div id="restart-rotate">
                        <div class="col-xs-6">
                            <button id="restart" href="" class="btn btn-blue-xs hide">RESTART</button>    
                        </div>
                        <div class="col-xs-6">
                            <button id="rotate" class="btn btn-blue-xs hide" >ROTATE</button>    
                        </div>
                    </div>
                    <form action="next.php" method="post" class="passDetails" style="visibility: hidden">
                        <input type="hidden" name="obj" class="obj">
                        <input type="hidden" name="frame" class="frame">
                    </form>
                </div>

                <br>
            </div>
            <div class="hidden">
                <img src="" width="100%" class="img img-responsive" id="frameicon1">
            </div>

            <div class="clearfix"></div>

        </div>


    </section>

    <section class="third-section container-fluid">

    </section>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/crop.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
</body>
</html>