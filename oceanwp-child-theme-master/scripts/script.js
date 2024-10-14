jQuery(document).ready(function($) {
    $('.popup-close').click(function() { // Utilisation d'une fonction classique
        $(this).closest(".popup-overlay").hide(); // Ici, 'this' fait référence à l'élément .popup-close
    });
});

//on remplace .parent par .closest(".popup-overlay")