tinymce.init({
    selector: 'textarea.my-tinymce-editor',
    plugins: [
    // Core editing features
    'code', 'lists', 'advlist', 'preview', 'emoticons', 'charmap', 'table',
    ],
    menubar: false,
    toolbar: "forecolor backcolor | bold italic underline strikethrough | checklist numlist bullist | emoticons charmap | preview code | table",
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    uploadcare_public_key: '5a2aa4ea689d633a3246',
});