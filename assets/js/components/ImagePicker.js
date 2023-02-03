export default function ImagePicker(element) {
    return {
        element: element,
        toggleElements: element.querySelectorAll('.image-picker-toggle'),
        popinElement: element.querySelector('.image-picker-popin'),
        imageElements: element.querySelectorAll('.image-picker-item'),
        inputElement: element.querySelector('.image-picker-value'),
        validateElement: element.querySelector('.image-picker-validate'),
        currentItemElements: [],
        previewElement: element.querySelector('.image-picker-preview img'),
        isMultiple: element.classList.contains('image-picker-multiple'),
        previewElementTemplate: element.querySelector('.image-picker-preview-item'),
        previewElementsWrapper: element.querySelector('.image-picker-preview-wrapper'),
        addImageFormElement: element.querySelector('.image-picker-add-form'),

        init() {
            this.bind();
            this.initElements();
            this.initPopinToggle();
            this.initImageToggle();
            this.initValidate();
            this.initReset();
            this.initAddImageForm();
            return this;
        },

        bind() {
            this.initElements = this.initElements.bind(this);
            this.initPopinToggle = this.initPopinToggle.bind(this);
            this.handlePopinToggle = this.handlePopinToggle.bind(this);
            this.initImageToggle = this.initImageToggle.bind(this);
            this.handleImageToggle = this.handleImageToggle.bind(this);
            this.initValidate = this.initValidate.bind(this);
            this.handleValidate = this.handleValidate.bind(this);
            this.updateElements = this.updateElements.bind(this);
            this.updatePreview = this.updatePreview.bind(this);
            this.initReset = this.initReset.bind(this);
            this.handleReset = this.handleReset.bind(this);
            this.initAddImageForm = this.initAddImageForm.bind(this);
            this.handleInputAddImageChange = this.handleInputAddImageChange.bind(this);
            this.handleInputAddImageSubmit = this.handleInputAddImageSubmit.bind(this);
            this.reloadImageElements = this.reloadImageElements.bind(this);
            this.resetForm = this.resetForm.bind(this);
            this.updateImageElements = this.updateImageElements.bind(this);
        },

        initElements() {
            const activeElements = this.element.querySelectorAll('.image-picker-value');
            activeElements.forEach(element => {
                this.currentItemElements.push(this.element.querySelector(`[data-image="${element.value}"]`));
            })
            this.updateElements();
        },

        initPopinToggle() {
            if (!this.toggleElements) return;
            this.toggleElements.forEach((element) => element.addEventListener('click', this.handlePopinToggle));
        },

        handlePopinToggle(e) {
            e.preventDefault();
            const state = this.popinElement.getAttribute('aria-expanded') === 'true' ? 'false' : 'true';
            this.popinElement.setAttribute('aria-expanded', state);
            this.updateElements();
        },

        initImageToggle() {
            if (!this.imageElements) return;
            this.imageElements.forEach((element) => element.addEventListener('click', this.handleImageToggle));
        },

        handleImageToggle(e) {
            e.preventDefault();
            if (this.isMultiple) {
                if (this.currentItemElements.includes(e.currentTarget)) {
                    this.currentItemElements.splice(this.currentItemElements.indexOf(e.currentTarget), 1);
                } else {
                    this.currentItemElements.push(e.currentTarget);
                }
            } else {
                this.currentItemElements = [e.currentTarget];
            }
            this.updateElements();
        },

        initValidate() {
            if (!this.validateElement) return;
            this.validateElement.addEventListener('click', this.handleValidate);
        },

        handleValidate(e) {
            e.preventDefault();
            this.updatePreview();
            this.handlePopinToggle(e);
        },

        updateElements() {
            if (this.imageElements.length === 0) return
            this.imageElements.forEach((element) => element.setAttribute('aria-selected', 'false'));
            this.currentItemElements.forEach((element) => element.setAttribute('aria-selected', 'true'));
        },

        updatePreview() {
            this.previewElementsWrapper.innerHTML = '';
            this.currentItemElements.forEach(element => {
                const src = element.querySelector('img').getAttribute('src') ?? `${window.domain}/public/images/placeholder.png`;
                const previewElement = this.previewElementTemplate.content.cloneNode(true);
                const inputElement = previewElement.querySelector('.image-picker-value');
                const previewImageElement = previewElement.querySelector('img');

                previewImageElement.setAttribute('src', src);
                inputElement.value = element.getAttribute('data-image');

                this.previewElementsWrapper.appendChild(previewElement);
            });

            this.initReset();
        },

        initReset() {
            const resetElements = element.querySelectorAll('.image-picker-reset');
            resetElements.forEach(element => element.addEventListener('click', this.handleReset));
        },

        handleReset(e) {
            e.preventDefault();
            const parentElement = e.currentTarget.closest('.image-picker-preview');
            const inputElement = parentElement.querySelector('.image-picker-value');
            this.currentItemElements = this.currentItemElements.filter(element => element.getAttribute('data-image') !== inputElement.value);
            this.updatePreview();
        },

        initAddImageForm() {
            if (!this.addImageFormElement) return;
            const input = this.addImageFormElement.querySelector("input[type='file']");
            const submit = this.addImageFormElement.querySelector("input[type='submit']");
            input.addEventListener('change', this.handleInputAddImageChange);
            submit.addEventListener('click', this.handleInputAddImageSubmit);
        },

        handleInputAddImageChange(e) {
            const input = e.currentTarget;
            if (!input) return;
            const [file] = input.files;
            const src = URL.createObjectURL(file);
            const output = this.addImageFormElement.querySelector('img');
            output.src = src;
        },

        async handleInputAddImageSubmit(e) {
            e.preventDefault();

            const formData = new FormData();
            const input = this.addImageFormElement.querySelector("input[type='file']");
            const headers = new Headers();
            headers.append('X-Requested-With', 'XMLHttpRequest');

            formData.append(input.getAttribute('name'), input.files[0]);

            const request = new Request("/ajax/back/image/add", {
                method: "post",
                headers,
                body: formData,
                credentials: 'same-origin',
            });

            const data = await fetch(request);
            const response = await data.json();

            if (response.success !== 'true') {
                return console.error('Error while uploading image');
            }


            this.updateImageElements(response.content);
            this.reloadImageElements();
            this.resetForm();
        },

        updateImageElements(element) {
            ;
            const container = this.popinElement.querySelector('.backend-list-images');
            container.insertAdjacentHTML('beforeend', element);
        },

        resetForm() {
            const input = this.addImageFormElement.querySelector("input[type='file']").value = '';
            const output = this.addImageFormElement.querySelector('img').src = '';
        },

        reloadImageElements() {
            this.imageElements = element.querySelectorAll('.image-picker-item');
            this.initImageToggle();
        }
    }
}