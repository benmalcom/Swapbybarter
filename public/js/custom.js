/**
 * Created by ben on 3/29/2017.
 */

$(document).ready(function () {
    $('input[type="submit"]').click(function (e) {
        $(this).attr("disabled","disabled");
    });
    $('[data-toggle="offcanvas"]').click(function () {
        $('.row-offcanvas').toggleClass('active')
    });
    $('.alert-danger,.alert-success').delay(5000).fadeOut("slow");
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.search-panel span#search_category').text(concept);
        $('.input-group #search_category').val(param);
    });

    $('.search-form').submit(function (e) {
        var $this = $(this);
        var category = $this.find('input[name="s_c"]').val();
        var term = $this.find('input[name="s_t"]').val();
        if(!category || (!term && category.toLowerCase()=="all")) e.preventDefault();
    });

    $('.avatar-input').change(function(){
        var $this = $(this);
        var val = $this.val();
        var file = this.files[0];
        var reader = new FileReader();
        var imageUrl = null;

        reader.onload = function(event){
            imageUrl = event.target.result;
            $('.avatar').attr("src",imageUrl);
        };
        reader.readAsDataURL(file);
    });

    $('.product-image-input').change(function(){
        var $this = $(this),
            file = this.files[0],
            reader = new FileReader(),
            imageUrl = null;
        reader.onload = function(event){
            imageUrl = event.target.result;
            $this.parent('.file-upload').css('background-image','url('+imageUrl+')');
            $this.siblings('.remove-img').removeClass('hidden').show();
        };
        reader.readAsDataURL(file);
    });


    $(document).on('click','.remove-img',function(){
        var $this = $(this);
        $this.siblings('input.product-image-input').val("");
        var defaultBackgroundImage = '/img/add_image.JPG';
        var bgImage = $this.data('bg-image');
        $this.parent('.file-upload').css('background-image','url('+(bgImage || defaultBackgroundImage)+')');
        $this.hide();
    });

    $('.item-image-thumb').click(function (e) {
        var url = $(this).attr('src');
        if(url)
            $('.item-image-big').attr("src",url);
        e.preventDefault();
    });

});