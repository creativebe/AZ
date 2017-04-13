class Errors {
	constructor() {
		this.errors = {};
	}

	has(field) {
		// console.log(this.errors.hasOwnProperty(field));
		return this.errors.hasOwnProperty(field);
	}

	get(field) {
		if(this.errors[field]) {
			return this.errors[field][0];
		}
	}

	any() {
		return Object.keys(this.errors).length > 0;
	}

	record(errors) {
		this.errors = errors;
	}

	clear(field){
		// console.log(field);
		this.errors[field] = '';
		delete this.errors[field];
	}
}

export default Errors;