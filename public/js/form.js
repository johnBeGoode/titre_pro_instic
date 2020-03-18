let nom = document.getElementById('nom');
let aideNom = document.getElementById('aide_nom');
let mail = document.getElementById('mail');
let aideMail = document.getElementById('aide_mail');
let objet = document.getElementById('objet');
let aideObjet = document.getElementById('aide_objet');
let message = document.getElementById('message');
let aideMessage = document.getElementById('aide_message');

nom.addEventListener('blur', function (e) {
    aideNom.textContent = ''; // vide sinon le msg reste présent malgré un nom de rentré
    if (e.target.value == '') {
        aideNom.textContent = 'Veuillez saisir votre nom';
        this.style.borderColor = 'red';
    } else {
        this.style.borderColor = 'green';
    }
})

mail.addEventListener('blur', function (e) {
    let regexMail = /.+@.+\..+/;
    let msgMail = '';
    let colorMail = 'red';

    if (!regexMail.test(e.target.value) || e.target.value == '') {
        msgMail = ' Adresse invalide';
        this.style.borderColor = 'red';
    } else {
        this.style.borderColor = 'green';
    }
    aideMail.textContent = msgMail;
    aideMail.style.color = colorMail;
})

objet.addEventListener('blur', function (e) {
    aideObjet.textContent = '';
    if (e.target.value == '') {
        aideObjet.textContent = 'Veuillez saisir un objet';
        this.style.borderColor = 'red';
    } else {
        this.style.borderColor = 'green';
    }
})

message.addEventListener('blur', function (e) {
    aideMessage.textContent = '';
    if (e.target.value == '') {
        aideMessage.textContent = 'Veuillez écrire votre message';
        this.style.borderColor = 'red';
    } else {
        this.style.borderColor = 'green';
    }
})

