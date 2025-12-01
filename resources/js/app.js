import './bootstrap';

import { ClassicEditor, Essentials, Bold, Italic, Font, Paragraph } from 'ckeditor5';

import 'ckeditor5/ckeditor5.css';

let editor = document.querySelector('#editor') ;

if (editor) {
    ClassicEditor
        .create(document.querySelector('#editor'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph],
            licenseKey: 'GPL',
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
            ]
        });
}