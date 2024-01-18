import { Controller } from "@hotwired/stimulus";
export default class extends Controller {
  static targets = ["collectionContainer"];
  static values = {
    index: Number,
    prototype: String,
  };
  addCollectionElement(event) {
    const item = document.createElement("li");
    item.classList.add("py-2");
    item.innerHTML = this.prototypeValue.replace(/__name__/g, this.indexValue);
    this.collectionContainerTarget.appendChild(item);
    this.indexValue++;
    
    const removeFormButton = document.createElement("button");
    removeFormButton.classList.add("delete-clothe");
    removeFormButton.innerText = "Supprimer ce vetement";
    item.append(removeFormButton);
    removeFormButton.addEventListener("click", (e) => {
      e.preventDefault();
      // remove the li for the tag form
      item.remove();
    });
  }

  //  Permet de supprimer une étape en prennant en compte la <li> la plus proche dans twig
  removeClothe(event) {
    event.preventDefault();
    let clotheElement = event.target.closest('li');
    clotheElement.remove();
  }
}