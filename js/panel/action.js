function createActionInput(form, name, inputType, inputValue, labelTextContent, helpTextContent, step) {
    if (name == "id") {
        const input = document.createElement("input");
        input.setAttribute("name", name + "Input");
        input.setAttribute("type", inputType);
        input.setAttribute('value', inputValue);
        form.appendChild(input);
        return;
    }

    const div = document.createElement("div");
    div.classList.add("mb-3");
    
    const label = document.createElement("label");
    label.setAttribute("for", name + "Input");
    label.classList.add("form-label");
    label.textContent = labelTextContent;
    
    const input = document.createElement("input");
    input.setAttribute("type", inputType);
    input.classList.add("form-control");
    input.setAttribute("id", name + "Input");
    input.setAttribute("name", name + "Input");
    input.setAttribute("aria-describedby", name + "Help");
    input.required = true;
    
    if (inputValue !== undefined && inputValue !== null) {
        input.setAttribute('value', inputValue);
    }

    if (inputType === 'number' && step !== undefined && step !== null) {
        input.setAttribute('step', step);
    }
    
    const help = document.createElement("div");
    help.setAttribute("id", name + "Help");
    help.classList.add("form-text");
    help.textContent = helpTextContent;
    
    div.appendChild(label);
    div.appendChild(input);
    div.appendChild(help);

    form.appendChild(div);
}

function createActionButton(id) {
    const modalFooter = document.getElementById("actionModalFooter");

    const actionButton = document.createElement("button");
    actionButton.setAttribute("form", id + "Form");
    actionButton.setAttribute("id", "actionButton");
    actionButton.setAttribute("name", id + "Button");
    actionButton.setAttribute("type", "submit");

    if (id == "create") {
        actionButton.classList.add("btn", "btn-success");
        actionButton.textContent = "Створити";
    } else if (id == "edit") {
        actionButton.classList.add("btn", "btn-warning");
        actionButton.textContent = "Редагувати";
    } else if (id == "delete") {
        actionButton.classList.add("btn", "btn-danger");
        actionButton.textContent = "Видалити";
    }

    if (document.getElementById("actionButton") == null) {
        modalFooter.appendChild(actionButton);
    } else {
        modalFooter.replaceChild(actionButton, document.getElementById("actionButton"));
    }
}

function setAction(e) {
    const actionModalBody = document.getElementById("actionModalBody");

    const form = document.createElement("form");
    form.setAttribute("id", e.id + "Form");
    form.action = "panel.php";
    form.method = "post";

    actionModalBody.replaceChildren(form);
    createActionButton(e.id);
    createActionInput(form, "id", "hidden", e.getAttribute("data-id"));

    if (e.id == "create" || e.id == "edit") {
        createActionInput(form, "name", "text", e.getAttribute("data-name"), "Назва", "напр. 'Beyond Good & Evil'");
        createActionInput(form, "description", "text", e.getAttribute("data-description"), "Опис", "напр. 'For centuries, the planet Hyllis has been bombarded by a relentless alien race. Skeptical of her government's inability to repel the invaders, a rebellious action reporter named Jade sets out to capture the truth. Armed with her camera, dai-jo staff, and fierce determination, she discovers shocking evidence leading to a horrific government conspiracy, and is forced to battle an evil she cannot possibly fathom.'");
        createActionInput(form, "price", "number", e.getAttribute("data-price"), "Ціна", "напр. '159.43'", 0.01);
        createActionInput(form, "stock", "number", e.getAttribute("data-stock"), "Наявність", "напр. '98'", 1);
        createActionInput(form, "image", "text", e.getAttribute("data-image"), "Зображення", "напр. 'https://images.g2a.com/300x400/1x1x1/beyond-good-evil-ubisoft-connect-key-global-i10000000247004/591274995bafe3e1610c3c0d'");

        form.onsubmit = function() {
            form.action = form.action.replace(",", ".");
        }
    } else if (e.id == "delete") {
        form.innerHTML += "Чи дійсно бажаєте видалити товар з списку?";
    }
}
