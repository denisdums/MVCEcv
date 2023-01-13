import ImagePicker from "./components/ImagePicker";
import ActorRepeater from "./components/ActorRepeater";


document.querySelectorAll(".image-picker").forEach(imagePicker => {
    ImagePicker(imagePicker).init();
});

document.querySelectorAll(".actor-repeater").forEach(actorRepeater => {
    ActorRepeater(actorRepeater).init();
});