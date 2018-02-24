 jQuery(document).ready(function () {
        let dropZone = jQuery('dropZone');
        let maxFilesize = 1000000;
            dropZone[0].ondragover = function () {
                dropZone.addClass('hover');
                return false;
            };
            dropZone[0].ondragleave = function(){
                dropZone.removeClass('hover');
                return false;
            };
            dropZone[0].ondrop = function (event) {
                event.preventDefault();
                dropZone.removeClass('hover');
                dropZone.addClass('drop');
            };
            let file = event.dataTransfer.files[0];
            if(file.size > maxFilesize){
                dropZone.text('Слишком большой файл!');
                dropZone.addClass('error');
                return false;
            }
            if(file.type !== 'image/jpeg' || 'image/png' || 'image/bmp'){
                dropZone.text('Только JPG PNG или BMP файлы');
                dropZone.addClass('error');
                return false;
            }

            let xhr = new XMLHttpRequest();
            xhr.upload.addEventListener('progress',uploadProgress,false);
            xhr.onreadystatechange = stateChange;
            xhr.open('POST','/account/file-upload');
            xhr.setRequestHeader('X-FILE-NAME',file.name);
            xhr.send(file);

            function uploadProgress(event) {
                let percent = parseInt(event.loaded / event.total * 100);
                dropZone.text('Загрузка: ' + percent + '%');
            }

        function stateChange(event) {
            if (event.target.readyState == 4) {
                if (event.target.status == 200) {
                    dropZone.text('Загрузка успешно завершена!');
                } else {
                    dropZone.text('Произошла ошибка!');
                    dropZone.addClass('error');
                }
            }
        }

    });
