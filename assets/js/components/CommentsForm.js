export default function CommentsForm(element) {
    return {
        element: element,
        submitElement: element.querySelector('input[type="submit"]'),
        commentAreaElement: element.querySelector('.comments-area'),

        init() {
            this.bind();
            this.initSubmit();
            return this;
        },

        bind() {
            this.initSubmit = this.initSubmit.bind(this);
            this.handleSubmit = this.handleSubmit.bind(this);
            this.updateList = this.updateList.bind(this);
        },

        initSubmit() {
            if (!this.submitElement) return;
            this.submitElement.addEventListener('click', this.handleSubmit);
        },

        async handleSubmit(e) {
            e.preventDefault();

            const formData = new FormData();
            const input = this.element.querySelector("#comment");
            const film = this.element.querySelector("#filmID");
            const headers = new Headers();

            headers.append('X-Requested-With', 'XMLHttpRequest');
            formData.append(input.getAttribute('name'), input.value);
            formData.append(film.getAttribute('name'), film.value);

            const request = new Request("/ajax/front/comment/add", {
                method: "post",
                headers,
                body: formData,
                credentials: 'same-origin',
            });

            const data = await fetch(request);

            const response = await data.json();

            if (response.success !== 'true') {
                return console.error('Error while sending comment');
            }

            this.updateList(response);
            this.element.reset();
        },

        updateList(response) {
            if (response.content) {
                this.commentAreaElement.innerHTML = response.content;
            }
        },
    }
}