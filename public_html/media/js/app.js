'use strict';

/**
 * grazina data ir laika, kada buvo ivestas komentaras
 */
function getTime() {
    var today = new Date();
    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var Time = date + ' ' + time;
    return Time;
}

/**
 * API linkai
 * @type {{get: string, create: string}}
 */
const endpoints = {
    get: 'api/feedbacks/get.php',
    create: 'api/feedbacks/create.php',
};

/**
 * Executes API request
 * @param {type} url Endpoint URL
 * @param {type} formData instance of FormData
 * @param {type} success Success callback
 * @param {type} fail Fail callback
 * @returns {undefined}
 */
function api(url, formData, success, fail) {
    fetch(url, {
        method: 'POST',
        body: formData
    }).then(response => response.json())
        .then(obj => {
            if (obj.status === 'success') {
                success(obj.data);
            } else {
                fail(obj.errors);
            }
        })
        .catch(e => {
            console.log(e);
            fail(['Could not connect to API!']);
        });
}

/**
 * Form array
 * Contains all form-related functionality
 *
 * Object forms
 */
const forms = {
    /**
     * Create Form
     */
    create: {
        init: function () {
            console.log('Initializing create form...');
            //getElement paselektina forma, uzdedam eventListener visai formai onSubmit (nesurisam su kazkokiu konkreciu buttonu)
            this.getElement().addEventListener('submit', this.onSubmitListener);
        },
        getElement: function () {
            return document.getElementById("create-form");
        },
        onSubmitListener: function (e) {
            // e.preventDefault panaikina defaultines browserio veiksmus
            e.preventDefault();
            e.target.date.value = getTime();
            // i formData idesim inputus, ka useris iveda. E.target, e - tai akvivalentas this->getElement (siuo atveju forma)
            let formData = new FormData(e.target);
            //endpoints.create (is kur fetchinam), formData, kai response gauna is api "success" tada pasileidzia success funkcija
            api(endpoints.create, formData, forms.create.success, forms.create.fail);
        },
        success: function (data) {
            const element = forms.create.getElement();

            table.row.append(data);
            forms.ui.errors.hide(element);
            forms.ui.clear(element);
            forms.ui.flash.class(element, 'success');
        },
        fail: function (errors) {
            forms.ui.errors.show(forms.create.getElement(), errors);
        }
    },
    /**
     * Common/Universal Form UI Functions
     */
    ui: {
        init: function () {
            // Function has to exist
            // since we're calling init() for
            // all elements withing forms object
        },
        /**
         * Fills form fields with data
         * Each data index corelates with input name attribute
         *
         * @param {Element} form
         * @param {Object} data
         */
        clear: function (form) {
            var fields = form.querySelectorAll('[name]')
            fields.forEach(field => {
                field.value = '';
            });
        },
        flash: {
            class: function (element, class_name) {
                const prev = element.className;

                element.className += class_name;
                setTimeout(function () {
                    element.className = prev;
                }, 1000);
            }
        },
        /**
         * Form-error related functionality
         */
        errors: {
            /**
             * Shows errors in form
             * Each error index correlates with input name attribute
             *
             * @param {Element} form
             * @param {Object} errors
             */
            show: function (form, errors) {
                this.hide(form);
                Object.keys(errors).forEach(function (error_id) {
                    const field = form.querySelector('input[name="' + error_id + '"]');
                    const span = document.createElement("span");
                    span.className = 'field-error';
                    span.innerHTML = errors[error_id];
                    field.parentNode.append(span);

                    console.log('Form error in field: ' + error_id + ':' + errors[error_id]);
                });
            },
            /**
             * Hides (destroys) all errors in form
             * @param {type} form
             */
            hide: function (form) {
                const errors = form.querySelectorAll('.field-error');
                if (errors) {
                    Array.prototype.forEach.call(errors, function (node) {
                        node.remove();
                    });
                }
            }
        }
    }
};

/**
 * Table-related functionality
 */
const table = {
    getElement: function () {
        return document.querySelector('#person-table tbody');
    },
    init: function () {
        this.data.load();

        Object.keys(this.buttons).forEach(buttonId => {
            table.buttons[buttonId].init();
        });
    },
    /**
     * Data-Related functionality
     */
    data: {
        /**
         * //endpointu get tiesiog loadina visa informacija, formDatos nera (null), nes mes norim viska gaut
         * Loads data and populates table from API
         * @returns {undefined}
         */
        load: function () {
            api(endpoints.get, null, this.success, this.fail);
        },
        success: function (data) {
            //foreachinam ka gavom ir appendinam elute
            Object.keys(data).forEach(i => {
                table.row.append(data[i]);
            });
        },
        fail: function (errors) {
            console.log(errors);
        }
    },
    /**
     * Operations with rows
     */
    row: {
        /**
         * Builds row element from data
         *
         * @param {Object} data
         * @returns {Element}
         */
        build: function (data) {
            const row = document.createElement('tr');
            //eilutei nustatom data-id. Data-id yra tokia kokia atejo is duombazes data.id
            row.setAttribute('data-id', data.id);
            //objekta negalima foreachinti, bet galima foreachinti objekto key'us
            Object.keys(data).forEach(data_id => {
                if (data_id !== 'id') {
                    let td = document.createElement('td');
                    //issitraukiu verte is data'os per ta data-id
                    td.innerHTML = data[data_id];
                    row.append(td);
                }
            });

            return row;
        },
        /**
         * Appends row to table from data
         *
         * @param {Object} data
         */
        append: function (data) {
            //appendinam subuildinta eilute
            table.getElement().append(this.build(data));
        },
    },
};

/**
 * Core page functionality
 */
const app = {
    init: function () {
        // Initialize all forms
        Object.keys(forms).forEach(formId => {
            forms[formId].init();
        });

        table.init();
    }
};

// Launch App
app.init();