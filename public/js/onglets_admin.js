var afficherOnglet = function(a) {
    var li = a.parentNode
    var div = a.parentNode.parentNode.parentNode

    if (li.classList.contains('active')) {
        return false
    }

    // on retire la class active à l'onglet actif
    div.querySelector('.tabs .active').classList.remove('active')
    // j'ajoute la class active à l'onglet actuel
    li.classList.add('active')

    // on retire la class active du contenu actif
    div.querySelector('.tab-content.active').classList.remove('active')
    // on ajoute la classe active au contenu actif
    div.querySelector(a.getAttribute('href')).classList.add('active')
}

// ajout évènement clic sur les liens
var tabs = document.querySelectorAll('.tabs a')
// on applique une fonction sur chacun de ces liens avec une boucle
for (var i = 0; i < tabs.length; i++) {
    var link = tabs[i]
    link.addEventListener('click', function (e) {
        afficherOnglet(this);
    })
}

// quand on actualise, on reste sur l'onglet qui est présent dans l'url (hash => ex: #about)
// var hash = window.location.hash
// var a = document.querySelector('a[href="' + hash + '"]')
// if (a !== null && !a.parentNode.classList.contains('active')) {
//     afficherOnglet(a);
// }