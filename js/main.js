tinymce.init({
    selector: 'textarea',
    plugins: [
    // Core editing features
    'code', 'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'table', 'wordcount',
    // Your account includes a free trial of TinyMCE premium features
    // Try the most popular premium features until Aug 31, 2025:
    'checklist', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'advtemplate', 'ai', 'uploadcare', 'mentions', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
    ],
    toolbar: 'forecolor backcolor undo redo | blocks fontsize | bold italic underline strikethrough | link media table | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    mergetags_list: [
    { value: 'First.Name', title: 'First Name' },
    { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    uploadcare_public_key: '5a2aa4ea689d633a3246',
});