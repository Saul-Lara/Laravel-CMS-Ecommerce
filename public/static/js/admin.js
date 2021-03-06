var base = location.protocol + '//' + location.host;

document.addEventListener('DOMContentLoaded', function(){
    var btn_product_file_image = document.getElementById('btn_product_file_image');
    var product_file_image = document.getElementById('product_file_image');
    btn_product_file_image.addEventListener('click', function(){
        product_file_image.click();
    });

    product_file_image.addEventListener('change', function(){
        document.getElementById('form_product_gallery').submit();
    });

});

$(document).ready(function(){
    editor_init('editor');

    tail.select(".select-search", {
        search: true,
        locale: "es"
    });
});

function editor_init(field){
    CKEDITOR.replace( field, {
        language: 'es',
        toolbar: [
        { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
		{ name: 'document', items: [ 'Source', 'CodeSnippet', 'EmojiPanel', 'Preview' ] },
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', ,'BulletedList', 'Strike', 'Link', 'Image', '-', 'RemoveFormat' ] }
        ]
    });
}

