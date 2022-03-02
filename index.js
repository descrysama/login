let selectInput = document.getElementById('inputcitation');
let selectButton = document.getElementById('sender');



const loadAll = () => {
    let allCitation = document.getElementById('citacontent');
    allCitation.innerHTML = '';
    let values = [];
    let keys = Object.keys(sessionStorage);
    let i = keys.length;
    while (i--) {
        values.push(sessionStorage.getItem(keys[i]));
    }

    for (i = 0; i < keys.length; i++) {
        let createEvent = document.createElement('div');
        let createP = document.createElement('p');
        createEvent.setAttribute('class','paper citation');
        let createButton = document.createElement('input');
        createButton.setAttribute('type', 'button');
        createButton.setAttribute('value', 'delete');
        createP.textContent = values[i];
        createEvent.appendChild(createP);
        createEvent.appendChild(createButton);
        allCitation.appendChild(createEvent);
    }
    selectInput.value = "";
}

const DeleteAll = () => {
    sessionStorage.clear();
    loadAll();
}

loadAll();

selectButton.addEventListener('click', ()=> {
    sessionStorage.setItem(selectInput.value, selectInput.value);
    loadAll();
})
