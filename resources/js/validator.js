// funkcja, która dodaje Event Listener do każdego przycisku z klasą validator-submit
function initializeValidatorSubmit () {
    const elements = document.querySelectorAll('.validator-submit');
    for (let i = 0; i < elements.length; i++) {
        elements.item(i)
            .addEventListener('submit', validateSubmit);
    }
}

// funkcja walidująca wywoływana za każdym razem, gdy klikniemy przycisk (submit)
function validateSubmit (event) {
    const helper = document.querySelectorAll('.invalid');
    if (helper.length > 0) {
        event.preventDefault();
    }
}

// funkcja, która dodaje Event Listener do każdego pola z klasą validator-required
function initializeValidatorRequired () {
    const elements = document.querySelectorAll('.validator-required');
    for (let i = 0; i < elements.length; i++) {
        elements.item(i)
            .addEventListener('focusout', validateRequired);
        validateRequiredElement(elements.item(i));
    }
}

// funkcja wywoływana podczas uruchamiania strony i walidująca wstępnie wypełnienie pól
// chodzi o to by submit nie działał także zaraz po uruchomieniu strony
function validateRequired (event) {
    validateRequiredElement(event.target);
}

// funkcja walidująca wywoływana za każdym razem, gdy opuszczamy pole (focusout)
function validateRequiredElement (elem) {
    // warunek wyświetla alert, gdy opuszczamy input, który jest pusty
    const helper = document.querySelector(`#${elem.id}-helper`);
    if (!elem.value) {
        helper.setAttribute('data-error', 'pole wymagane');
        elem.classList.add('invalid');
    } else {
        helper.setAttribute('data-success', '✔️');
        elem.classList.add('valid');
    }
}

initializeValidatorRequired();
initializeValidatorSubmit();
