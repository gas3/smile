
var myCroppie;
(function ($) {
    $.fn.previewimage = function (setting) {
        var setting = $.extend({
            div: "",
            imgwidth: 150,
            imgheight: 90,
            imgsize: "",
            imgdel: true,
            delname: "Delete",
            position: "after",
            ext: "jpg/bmp/jpeg/png"
        }, setting);
        var origin = $(this);
        var name = origin.prop("name");
        var inputid = origin.prop("id") ? origin.prop("id"): false;
        var parent = origin.parent();
        var container = $(setting.div);
        var counter = 0;
        if (origin.length && container.length && name !== "") {
            //AlterInputFile(origin[0]);
            parent.on("change", "input[name='" + name + "']", function (e) {
                var input = this;
                var inputfile = this.files;
                if (inputfile && inputfile[0]) {
                    if (CheckExt(inputfile[0].name, setting.ext) && CheckSize(inputfile[0].size, setting.imgsize) ) {
                        $('.avatar-preview').find('.avatar-img').remove();
                        $('.avatar').hide();
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var src   = e.target.result;
                            var img   = CreateDisplay(src, setting.imgwidth, setting.imgheight, false);
                            var img2   = CreateDisplay(src, setting.imgwidth, setting.imgheight, false);
                            container.prepend(img);


                            $('.crop_cont').empty().append(img2);
                            $('.avatar-preview').find('.close').show();
                            var opt = {
                                viewport: { 
                                    width: 75, 
                                    height: 75, 
                                    type: 'circle' 
                                },
                                boundary: {
                                    width: 300,
                                    height: 300
                                }
                            };
                            $("body").append('<div class="modal-backdrop"></div>');
                            $('.modal-crop').fadeIn(150);
                            setTimeout(function() {
                                myCroppie = $(document).find('.crop_cont').find('.avatar-img').croppie(opt);
                            }, 200);



                            counter++;
                        };
                        reader.readAsDataURL(this.files[0]);
                    }
                    else {
                        alert("Your input is not an image or file size are too big");
                    }
                } else {
                    input.select();
                    input.blur();
                    var src = document.selection.createRange().text;
                    if (CheckExt(src, setting.ext) ) {
                        $('.avatar-preview').find('.avatar-img').remove();
                        $('.avatar').hide();
                        var NewDiv = CreateDisplay(src, setting.imgwidth, setting.imgheight, true);
                        container.prepend(newDiv);
                        $('.avatar-preview').find('.close').show();


                        counter++;
                    }
                }
            });
        }
        else if (!origin.length) {
            throw "Cannot find selector or selector is not an input file type";
        }
        else if (!container.length) {
            throw "Target div cannot be found";
        }
        else if (name == "") {
            throw "Name attribute is not defined in input file type";
        }
        // attach event listen on delete
        if (setting.imgdel !== false) {
            container.on("click", ".close", function (e) {
                $('#avatar').val('');
                $('.avatar-img').remove();
                $('.avatar-preview').find('.close').hide();
                $('.avatar').show();
            });
        }

    };

    function CreateDisplay (src, width, height, ie) {
        var display = document.createElement((ie === false) ? "img" : "div");
        display.style.width = width + "px";
        display.style.height = height + "px";
        if (ie) {
            var method = "scale";
            var scale = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + src + "',sizingMethod=" + method + ")";
            display.style.filter = scale;
        }
        else {
            display.src = src;
        }
        display.className = "avatar-img";
        return display;
    }
    function CheckSize (InputSize, set_Size) {
        var set_Size = parseInt(set_Size);
        var InputToMB = InputSize / 1048576;
        return (isNaN(set_Size) || InputToMB <= set_Size) ? true : false;
    }
    function CheckExt (filename, set_ext) {
        var ext = filename.substr((~-filename.lastIndexOf(".") >>> 0) + 2);
        var set_array = set_ext.split("/");
        for (var i = set_array.length - 1; i >= 0; i--) {
            if (ext == set_array[i]) {
                return true;
            }
        }
        return false;
    }

})(jQuery);

$('#avatar').change(function(event) {

    $('.avatar').hide();
    $('.avatar-preview').find('.close').hide();
});

$('input[name=avatar]').previewimage({
    div: ".avatar-preview",
    imgwidth: 80,
    imgheight: 80
});

$('.modal-crop .modal-close').click(function() {
    $('.modal-crop').hide();
    $(document).find(".modal-backdrop").remove();
});

$(".done").click(function() {
    myCroppie.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (img) {
        // console.log(window.URL.createObjectURL(blob) );
        // $(".avatar-preview").find('.avatar-img').attr("src", window.URL.createObjectURL(blob));
        // $(".modal-close").click();
        // $("#avatar").val(window.URL.createObjectURL(blob));
        let link = $('#av_link').val();
        console.log(link);

        $.ajax({
          url: link,
          type: "POST",
          data: {
            "image":img,
            "user_id": $('#u_id').val()
          },
          success: function (data) {
            $(".avatar-preview").find('.avatar-img').attr("src", img);
            $(".modal-close").click();
            $("#avatar").val(img);
          }
        });
    });
});

