'use strict';
class FormModel {
    constructor(formId){
        this.form       = formId;
        this.data       = [];
        this.response   = false;
    }
    generateData(){

    }
}

class FormController {
    constructor(form_id) {  //хочу как-то сеттинги настроить
        this.form = form_id;
        this.data = [];
        this.response = false;
        this.model = new FormModel(form_id);

    }

    getElemet() {
        let form = document.getElementById(this.form);
        let tags = form.getElementsByTagName('input');
        let req = form.getAttributeNode('data-settings');
        for (let i = 0; i < tags.length-1; i++) {
            this.data.push(tags[i].value);
        }
        this.validateData();
    }

    validateData() {
        let answer = 'default';
        for (let i = 0; i < this.data.length; i++) {
            if (5 > this.data[i].length)
            {
                answer = 'Слишком мало символов';
                console.log(i,answer);
                answer = [i,answer];
            }
            else if(this.data[i].length > 25){
                answer = 'Слишком много символов';
                console.log(i,answer);
                answer = [i,answer];
            }
        }
        return answer;
        //TODO статус бары прилепить и в них фигарить ответы + маску
    }
}