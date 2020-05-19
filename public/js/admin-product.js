let editor = new Quill('#editor', {
     theme: 'snow',
     placeholder: 'Nhập mô tả sản phẩm!',
     debug: 'info',
     modules: {
          toolbar: quillOptions
     }
});

Quill.debug(false);

function getDescriptionData() {
     document.getElementById('description').value = JSON.stringify(editor.getContents());
}