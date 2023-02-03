import ImagePicker from "./components/ImagePicker";
import ActorRepeater from "./components/ActorRepeater";
import CommentsForm from "./components/CommentsForm";


document.querySelectorAll(".image-picker").forEach(imagePicker => {
    ImagePicker(imagePicker).init();
});

document.querySelectorAll(".actor-repeater").forEach(actorRepeater => {
    ActorRepeater(actorRepeater).init();
});
document.querySelectorAll(".add-comment-form").forEach(commentForm => {
    CommentsForm(commentForm).init();
});