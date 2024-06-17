function createBuyInput(form, name, inputType, inputValue) {
    const input = document.createElement("input");
    input.setAttribute("name", name + "Input");
    input.setAttribute("type", inputType);
    input.setAttribute('value', inputValue);
    form.appendChild(input);
}

function createBuyButton(id) {
    const modalFooter = document.getElementById("buyModalFooter");

    const buyButton = document.createElement("button");
    buyButton.setAttribute("form", id + "Form");
    buyButton.setAttribute("id", "buyButton");
    buyButton.setAttribute("name", id + "Button");
    buyButton.setAttribute("type", "submit");

    buyButton.classList.add("btn", "btn-success");
    buyButton.textContent = "Придбати";

    if (document.getElementById("buyButton") == null) {
        modalFooter.appendChild(buyButton);
    } else {
        modalFooter.replaceChild(buyButton, document.getElementById("buyButton"));
    }
}

function setConfirmBuy(e) {
    const buyModalBody = document.getElementById("buyModalBody");

    const form = document.createElement("form");
    form.setAttribute("id", e.id + "Form");
    form.action = "index.php";
    form.method = "post";

    buyModalBody.replaceChildren(form);
    createBuyButton(e.id);
    createBuyInput(form, "id", "hidden", e.getAttribute("data-id"));
    createBuyInput(form, "stock", "hidden", e.getAttribute("data-stock"));

    buyModalBody.innerHTML += "Чи дійсно бажаєте придбати даний товар?";
}
