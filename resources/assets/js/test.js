require('./bootstrap');

class Errors {
        constructor() {
            this.errors = {};
        }

        has(field) {
            return this.errors.hasOwnProperty(field);
        }

        get(field) {
            if(this.errors[field]) {
                return this.errors[field][0];
            }
        }

        record(errors) {
            this.errors = errors;
        }

        clear(field){
            // console.log(field);
            delete this.errors[field];
        }
    }

new Vue({
    el: '#test',
    // props:['data'],
    data: {
    	errors : new Errors()
    },
    methods: {
    	gError() {
            var err = {
                name : [
                    msg = 'Ada Error'
                ]
            };

            this.errors.record(err);
            console.log(this.errors.get('name'));
        }
    }
    
});