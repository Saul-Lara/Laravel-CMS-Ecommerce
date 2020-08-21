var base = location.protocol + '//' + location.host;


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

