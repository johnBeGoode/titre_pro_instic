let afficherOnglet = function(a) {
    let li = a.parentNode
    let div = a.parentNode.parentNode.parentNode.parentNode
    // let div = document.getElementById('wrapper')

    if (li.classList.contains('active')) {
        return false
    }
    
    div.querySelector('.tabs .active').classList.remove('active')
    li.classList.add('active')

    div.querySelector('.tab-content.active').classList.remove('active')
    div.querySelector(a.getAttribute('href')).classList.add('active')
}

let tabs = document.querySelectorAll('.tabs a')

for (let i = 0; i < tabs.length; i++) {
    let link = tabs[i]
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
