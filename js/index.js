var email;
var phone;
var filepath;
var frame = "img/template.png";
var foo;
var second = 0;

$(document).ready(function(){

    $('.doneer').hide();
    // $('#restart').hide();
    // $('#rotate').hide();
    $('.third-section').hide();
    // $('#addBlur').hide();

    $(window).resize(function(){
        // if($( window ).width() > 767 && second == 1){
        //     $('.second-section').css('display', 'flex');
        // }else if($( window ).width() <= 767 && second == 1){
        //     $('.second-section').css('display', 'block');
        // }
    });


    $('.first-section .continue').click(function (e) {

        second = 1;

        e.preventDefault();
        $('.first-section').hide();
        if($( window ).width() > 767){
            $('.second-section').css('display', 'flex');
        }else{
            $('.second-section').css('display', 'block');
        }
        $('.third-section').hide();

    });


    $('#chooseFile').click(function() {
        foo.import();
    });

    $('#frameicon1').click(function() {

        $('.overlay').attr("src", frame);

    });

    $('#rotate').click(function() {
        foo.rotate();
    });

    foo = new CROP();
    if($(window).width() > 520){
        var finalPictureWidth = $('#finalPicture').width();
        foo.init({
            container: '.default',
            image: '',
            width: finalPictureWidth,
            height: finalPictureWidth,
            mask: false,
            zoom: {
                steps: 0.01,
                min: 1,
                max: 5
            }
        });   
    }
    else{
        var window_width = $(window).width();
        var new_size = window_width - 50;
        foo.init({
            container: '.default',
            image: '',
            width:  new_size,
            height: new_size,
            mask: false,
            zoom: {
                steps: 0.01,
                min: 1,
                max: 5
            }
        })   
    }
    
    // $(window).resize(function(){

    //     foo = new CROP();
    //     if($(window).width() > 520){
    //     var finalPictureWidth = $('#finalPicture').width();
    //     foo.init({
    //         container: '.default',
    //         image: '',
    //         width: finalPictureWidth,
    //         height: finalPictureWidth,
    //         mask: false,
    //         zoom: {
    //             steps: 0.01,
    //             min: 1,
    //             max: 5
    //         }
    //     });   
    // }
    //     else{
    //         var window_width = $(window).width();
    //         var new_size = window_width - 50;
    //         foo.init({
    //             container: '.default',
    //             image: '',
    //             width:  new_size,
    //             height: new_size,
    //             mask: false,
    //             zoom: {
    //                 steps: 0.01,
    //                 min: 1,
    //                 max: 5
    //             }
    //         });   
    //     }   
    // });

    $('#addBlur').click(function(){

        var obj = foo.crop(530, 530, 'png');


        $('.obj').val(obj.string);


        window.localStorage.setItem('img_object', obj.string);
        
        $('.frame').val(frame);

        $('.passDetails').submit();

    });


    $("area").click(function(e){
        e.preventDefault();
        var thisTitle = $(this).attr("data-title");
        console.log(thisTitle);
        var thisBlurIndex = parseInt($("#" + thisTitle).attr("data-blurindex"));
        $("#photoframe .blurable").each(function(){
            var newBlurIndex = Math.abs(thisBlurIndex - parseInt($(this).attr("data-blurindex")));
            $(this).css({
                "-webkit-filter": "blur(" + newBlurIndex + "px)",
                "filter": "blur(" + newBlurIndex + "px)"
            });
        });
        return false;
    });

    $('#restart').click(function(){
        location.reload();
    });
});