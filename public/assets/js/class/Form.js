import { FormElement } from "./FormElement.js";

export class Form {

    #map;

    /**
     * Creates an instance of Form.
     * @param {array} datas
     * @memberof Form
     */
    constructor(datas, values) {
        this.#map = new Map();
        datas.forEach(e => {
            this.#map.set("#div-" + e.idElementForm, new FormElement(e));
        });
        this.updateDOM();
    }

    /**
     * @param {string} key
     * @param {string} value 
     * @return {this}
     * @memberof Form
     */
    put(key, value) {
        if(!(value instanceof FormElement))
            throw new Error("The parameter type does not match");
        this.#map.set(key, value);
        return this;
    }

    /**
     * @param {string} key
     * @return {FormElement} 
     * @memberof Form
     */
    get(key) {
        return this.#map.get(key);
    }

    updateDOM() {
        this.#map.forEach((value, key) => {
            value.updateDOM();
        });
    }

    /**
     * @param {function} callback
     * @memberof Form
     */
    forEach(callback) {
        this.#map.forEach(callback);
    }

    getMap() {
        return this.#map;
    }

}