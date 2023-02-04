tinymce.init({
    selector: "textarea",
    height: 300,
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor table",
    ],
    toolbar:
        "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons table",
    style_formats: [
        { title: "Heading 2", format: "h2" },
        { title: "Heading 3", format: "h3" },
        { title: "Heading 4", format: "h4" },
        { title: "Heading 5", format: "h5" },
        { title: "Heading 6", format: "h6" },
        { title: "Normal", block: "div" },
        { title: "Bold text", inline: "b" },
    ],
});
