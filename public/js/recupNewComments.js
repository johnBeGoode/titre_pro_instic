$(document).ready(function () {

    function charger() {

        setTimeout(function () {
            let firstId = $(".bloc-commentaires div:first").attr("id");

            $.ajax({
                url: "/public/ajax/newComments.php?id=" + firstId,
                type: "GET",
                success: function (html) {
                    $('.bloc-commentaires div.commentaire:first').before(html)
                }
            });

            charger();

        }, 3000)
    }

    charger()
})