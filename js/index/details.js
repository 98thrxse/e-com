function setDetails(e) {
    const detailsModalBody = document.getElementById("detailsModalBody");
    detailsModalBody.innerHTML = e.getAttribute("data-description");
}
