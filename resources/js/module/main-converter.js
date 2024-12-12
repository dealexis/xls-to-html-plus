var convert_form_data = {
    'output': 'html',
}

const onClickOutput = function (el, type) {
    convert_form_data['output'] = type;

    const container = el.parentElement;

    Array.from(container.children).forEach(child => {
        if (child.tagName === 'BUTTON') {
            child.classList.remove('active');
        }
    });

    el.classList.add('active');
}

window.onClickOutput = onClickOutput

const dropArea = document.getElementById('dropZone');
const fileInput = document.getElementById('fileInput');
//const fileList = document.getElementById('fileNames');
const $options = $('#optionsContent');
const $file_list = $('#file-list')
const $uploaded_file_name = $('#uploaded-file-name')
const $convert_button = $('#convert-button')
const $convertBtn = $('#convertBtn')
const $result = $('#result')
const $result_content = $('#result-content')

dropArea.addEventListener('drop', (event) => {
    event.preventDefault();
    event.stopPropagation();

    const files = event.dataTransfer.files;

    handleFile(files);
});

dropArea.addEventListener('dragover', (event) => {
    event.preventDefault();
    event.stopPropagation();
    dropArea.style.backgroundColor = "#f0f9f7";
});

dropArea.addEventListener('click', () => {
    fileInput.click();
});

fileInput.addEventListener('change', (event) => {
    const files = event.target.files;
    handleFile(files[0]);
});

function handleFile(file) {
    $uploaded_file_name.text(file.name);
    convert_form_data['file'] = file
    //console.log(convert_form_data)
    $file_list.slideDown()
    $options.slideDown()
    $convert_button.css('display', 'block')
}

let convert_is_loading = false;
$convertBtn.click(() => {
    if (convert_is_loading)
        return;

    let fm = new FormData();

    fm.append('output', convert_form_data.output)
    fm.append('xls_file', convert_form_data.file)

    axios.post(routes.upload, fm, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then(r => {
        let data = r.data;
        let content = data.data

        if (convert_form_data.output === 'json') {
            content = JSON.stringify(content)
        }

        $result_content.text('')
        $result_content.text(content)
        $result.slideDown()
        convert_is_loading = false;
    })

    convert_is_loading = true;
})

// function handleFiles(files) {
//     fileList.innerHTML = '';
//
//     Array.from(files).forEach(file => {
//         const li = document.createElement('li');
//         li.textContent = file.name;
//         fileList.appendChild(li);
//     });
// }