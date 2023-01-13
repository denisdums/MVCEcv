export default function ActorRepeater(element) {
    return {
        element: element,
        addElement: element.querySelector(".actor-repeater-add"),
        listElement: element.querySelector(".actor-repeater-list"),
        templateElement: element.querySelector(".actor-repeater-template"),

        init() {
            this.bind();
            this.initAddToggle();
            this.initDeleteToggle();
            return this;
        },

        bind() {
            this.initAddToggle = this.initAddToggle.bind(this);
            this.toggleAdd = this.toggleAdd.bind(this);
            this.addLine = this.addLine.bind(this);
            this.initDeleteToggle = this.initDeleteToggle.bind(this);
            this.toggleDelete = this.toggleDelete.bind(this);
        },

        initAddToggle() {
            this.addElement.addEventListener("click", this.toggleAdd);

            // Add the first line
            this.addLine();
        },

        toggleAdd(e) {
            e.preventDefault();
            this.addLine();
        },

        addLine() {
            let clone = this.templateElement.content.cloneNode(true);
            this.listElement.appendChild(clone);
            this.initDeleteToggle();
        },

        initDeleteToggle() {
            this.listElement.querySelectorAll(".actor-repeater-delete").forEach(element => {
                element.addEventListener("click", this.toggleDelete);
            });
        },

        toggleDelete(e) {
            e.preventDefault();
            const line = e.target.closest(".actor-repeater-line");
            line.remove();
        }
    }
}