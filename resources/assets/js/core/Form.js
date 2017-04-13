import Errors from './Errors'
import miniToastr from 'mini-toastr';

miniToastr.init();
miniToastr.setIcon('error', 'i', {'class': 'fa fa-exclamation-triangle'});
miniToastr.setIcon('success', 'i', {'class': 'fa fa-check'});

class Form {
	constructor(data) {
		this.originalData = data;
		for(let field in data) {
			this[field] = data[field];
		}
		this.errors = new Errors();
	}

	data(){
		let data = {};
		for (let property in this.originalData) {
			data[property] = this[property];
		}
		return data;
	}

	/**
     * Reset the form fields.
     */
    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();
    }

	/**
     * Send a POST request to the given URL.
     * .
     * @param {string} url
     */
    post(url) {
        return this.submit('post', url);
    }

    /**
     * Send a PUT request to the given URL.
     * .
     * @param {string} url
     */
    put(url) {
        return this.submit('put', url);
    }

    /**
     * Send a PATCH request to the given URL.
     * .
     * @param {string} url
     */
    patch(url) {
        return this.submit('patch', url);
    }

    /**
     * Send a DELETE request to the given URL.
     * .
     * @param {string} url
     */
    delete(url) {
        return this.submit('delete', url);
    }

	/**
	* Submit the form.
	*
	* @param {string} requestType
	* @param {string} url
	*/
	
	submit(requestType, url) {
		return new Promise((resolve, reject) => {
			axios[requestType](url, this.data())
				.then(response => {
					this.onSucces(response.data);
					resolve(response.data);
				})
				.catch(error => {
					this.onFail(error.response.data);
					reject(error.response.data);
				});
		});
	}

	/*
	 * Handle success submit
	 * @param {object} data
	 * @param {boolean} modal
	 * @param {strin} url
	 */
	onSucces(data) {
		// Sementara
		miniToastr.success(data.message, 'Success', 4500);
		this.reset();
		// location.reload();
	}

	/*
	 * Handle success submit
	 * @param {object} errors
	 */
	onFail(errors) {
		miniToastr.error('An error occured!','Error', 4500);
		this.errors.record(errors);
	}
	
}

export default Form;