//? Favorite Setting

function favoriteSetting(target, id = 0, idArticle, idClient, checkPageFavorite){
    
    $.get('assets/php/getSessionUser.php',function(result){
        if(result != ''){
            var svgHeart = $(target).children('path');
            $.ajax({ 
                type: "POST",
                url: "assets/php/addRemFavorite.php",
                data: "idClient=" + idClient + "&idArticle=" + idArticle,
                cache: false,
                success: function(result) {
                    if(result == "okAdd"){
                        svgHeart.css('fill', 'var(--red-color)');
                        if(id == 1){
                            svgHeart.css('stroke', 'var(--red-color)');
                        }
                        errorModal("success", "", "Article ajouté aux favoris", "Ok", "<span style='opacity:.3' onclick=\'window.location=\"favorite\"\'>Mes favoris</span>");
                    }else if(result == "okRem"){
                        svgHeart.css('fill', '#fff');
                        if(id == 1){
                            svgHeart.css('stroke', '#4C4C4C');
                        }
                        if(checkPageFavorite == 1){
                            $(target).parent().parent().parent().remove();
                        }
                    }else{
                        errorModal("error", "Oops...", "Une erreur est survenue", "Ok", "");
                    }
                }
            });
        }else{
            window.location.replace("login")
        }
    })
}

//? Menu Nav Page

function navPage() {
    var navPage = $("#navPage"),
        buttonCard = $('#buttonShoppingCard');
    if(navPage.css('display') == 'flex'){
        navPage.fadeOut()
        .animate({top:0}, 0, () => {
            navPage.css('display', 'none');
            buttonCard.fadeIn()
            .animate({display:'flex'}, 0);
        });
        $('html, body').css({
            'overflow' : '',
            'position' : '',
            'height' : ''
        });
    } else {
        navPage
        .fadeIn()
        .css("display", "flex")
        .animate({top:0}, 0);
        buttonCard.fadeOut()
        .animate({display:'none'}, 0);
        $('html, body').css({
            'overflow' : 'hidden',
            'position' : 'relative'
        });
    }
}

//? Filter

try {
    const mixer = mixitup('#presentationContainer', {
        selectors:  {
            target: '.articleContainer'
        },
        animation: {
            duration:  400
        }
    });
} catch (error) {
    console.log(error);
}

const filterLink = document.querySelectorAll('.filter');

function activeFilter(){
    if(filterLink){
        filterLink.forEach(l => l.classList.remove('filterActive'))
        this.classList.add('filterActive')
    }
}

filterLink.forEach(l => l.addEventListener('click', activeFilter))

function currentSlide(target){
    $(target).css('background', 'var(--background-color)');
    $(target).siblings().css( "background", "" );
}

function switchSlide(id){
    let layerArticleGalery = $(".layerArticleGalery");
    $("#bar"+id).css('background', 'var(--background-color)');
    $("#bar"+id).siblings().css( "background", "" );
    layerArticleGalery.eq(id-1).css("background", "none");
    switch (id){
        case 1:
            $('.slide1').css('margin-left', '0');
            layerArticleGalery.eq(1).css("background", "rgba(0, 0, 0, 0.2)");
            layerArticleGalery.eq(2).css("background", "rgba(0, 0, 0, 0.2)");
            layerArticleGalery.eq(3).css("background", "rgba(0, 0, 0, 0.2)");
            break;
        case 2:
            $('.slide1').css('margin-left', '-20%');
            layerArticleGalery.eq(0).css("background", "rgba(0, 0, 0, 0.2)");
            layerArticleGalery.eq(2).css("background", "rgba(0, 0, 0, 0.2)");
            layerArticleGalery.eq(3).css("background", "rgba(0, 0, 0, 0.2)");
            break;
        case 3:
            $('.slide1').css('margin-left', '-40%');
            layerArticleGalery.eq(0).css("background", "rgba(0, 0, 0, 0.2)");
            layerArticleGalery.eq(1).css("background", "rgba(0, 0, 0, 0.2)");
            layerArticleGalery.eq(3).css("background", "rgba(0, 0, 0, 0.2)");
            break;
        case 4:
            $('.slide1').css('margin-left', '-60%');
            layerArticleGalery.eq(0).css("background", "rgba(0, 0, 0, 0.2)");
            layerArticleGalery.eq(1).css("background", "rgba(0, 0, 0, 0.2)");
            layerArticleGalery.eq(2).css("background", "rgba(0, 0, 0, 0.2)");
            break;
    }
}

//? Get size selected

var sizeSelected = '';
const urlParams = new URLSearchParams(window.location.search);
$(document).ready(()=>{
    $.ajax({
        type: "POST",
        url: "assets/php/getStock.php",
        data: "idArticle="+urlParams.get('id'),
        cache: false,
        success: (size)=>{
            sizeSelected = size != '' ? size.toUpperCase() : '';
        }
    })
})

//? Select Size Product
function selectSize(target, stock, price, size){
    $(target).css('border-color', 'var(--text-color)');
    $(target).siblings().css( "border-color", "var(--grey-color)" );
    // $('#quantityStock').text(stock);
    $('#quantityNumber').text(1);
    $('#priceArticle').text(price);
    $('#stock').html('<span id="quantityStock">'+ stock + '</span> en stock')
    sizeSelected = size;
}

//? Quantity Product

function quantitySetting(reach){
    const priceArticleFixe = parseFloat($('#priceArticle').attr('class')); ;
    var quantityNumber = parseInt($('#quantityNumber').text()),
        quantityStock =  parseInt($('#quantityStock').text()),
        priceArticle =  parseFloat($('#priceArticle').text());
    switch(reach){
        case 'minus':
            if(quantityNumber != 1){
                $('#quantityNumber').text(quantityNumber-=1);
                $('#priceArticle').text((priceArticle -= priceArticleFixe).toFixed(2));
            }else{
                errorModal("error", "Oops..", "Vous avez sélectionné la quantité minimum", "Ok", "");
            }
            break;
        case 'more':
            if(quantityNumber != quantityStock){
                $('#quantityNumber').text(quantityNumber+=1);
                $('#priceArticle').text((priceArticle += priceArticleFixe).toFixed(2));
            }else{
                errorModal("error", "Stock insuffisant", "Un peu de patience, ça arrive !", "Ok", "");
            }
            break;
    }
}

//? Eye password

function togglePassword(id){
    var input = $('#passwordInput'+id),
        eyeOpen = $('#eyeOpen'+id),
        eyeClose = $('#eyeClose'+id);
    if(eyeOpen.hasClass("hideElement")){
        eyeOpen.removeClass("hideElement");
        eyeClose.addClass("hideElement");
    }else {
        eyeOpen.addClass("hideElement");
        eyeClose.removeClass("hideElement");
    }
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
};

//? Check user connexion

function checkConnexion(url){
    $.get('assets/php/getSessionUser.php',function(result){
        if(result != ''){
            if(url != ''){
                window.location.replace(url);
            }
        }else{
            window.location.replace("login")
        }
    })
}

//? Add article in bag

var overStock = 0;
function addArticleBag(idClient, idArticle, size){
    if(size != ''){
        $.get('assets/php/getSessionUser.php',function(result){
            if(result != ''){
                const quantity = $('#quantityNumber').text();
                $.get('assets/php/getBagInfo.php', function(result){
                    arrArticles = JSON.parse(result);
                    if(arrArticles.length > 0){
                        for(i=0;i<arrArticles.length;i++){
                            // alert(`Stock : ${arrArticles[i]['stock']} Quantité sélectionnée : ${quantity} Quantité dans le panier : ${arrArticles[i]['quantity']} TailleBag : ${arrArticles[i]['size']} Taille sél : ${sizeSelected} Quantité totale : ${(parseInt(arrArticles[i]['quantity']) + parseInt(quantity))} idArticle : ${arrArticles[i]['idArticle']} idArticleParam : ${urlParams.get('id')}`)
                            if((arrArticles[i]['idArticle'] == urlParams.get('id') && arrArticles[i]['size'] == sizeSelected) && ((parseInt(arrArticles[i]['quantity']) + parseInt(quantity)) > arrArticles[i]['stock'])){
                                overStock = 1;
                            }
                        }
                        if(overStock == 1){
                            errorModal("error", "Oops...", "L'intégralité du stock est dans votre panier", "Ok", "");
                            overStock = 0;
                        }else{
                            $.ajax({ 
                                type: "POST",
                                url: "assets/php/addArticleBag.php",
                                data: 'idClient=' + idClient + '&idArticle=' + idArticle + '&quantity=' + parseInt(quantity) + '&size=' + sizeSelected + '&fromArticle=1',
                                cache: false,
                                success: function(result) {
                                    if(result = "ok"){
                                        errorModal("success", "Article ajouté", "Votre article est bien ajouté", "Ok", "<a style=\'opacity:.3\' href=\'bag.php\'>Voir mon panier</a>");
                                    }else{
                                        errorModal("error", "Oops...", "Une erreur est survenue", "Ok", "");
                                    }
                                }
                            });   
                        }
                    }else{
                        $.ajax({ 
                            type: "POST",
                            url: "assets/php/addArticleBag.php",
                            data: 'idClient=' + idClient + '&idArticle=' + idArticle + '&quantity=' + parseInt(quantity) + '&size=' + sizeSelected + '&fromArticle=1',
                            cache: false,
                            success: function(result) {
                                if(result = "ok"){
                                    errorModal("success", "Article ajouté", "Votre article est bien ajouté", "Ok", "<a style=\'opacity:.3\' href=\'bag.php\'>Voir mon panier</a>");
                                }else{
                                    errorModal("error", "Oops...", "Une erreur est survenue", "Ok", "");
                                }
                            }
                        });   
                    }
                }) 
            }else{
                window.location.replace("login")
            }
        })
    }else{
        errorModal("error", "Oops...", "Aucune taille sélectionnée", "Ok", "");
    }
}

//? Add or Remove article in bag

function addRemoveArticle(target, option, quantityAvailable, idBag, price, priceDelivery, priceMiniDelivery){
    var quantityActualAdd = parseInt($(target).next().text()),
        quantityActualRem = parseInt($(target).prev().text());
    if(option == "add"){
        var actualPrice = (parseFloat($('#priceSubTotal').text().slice(0, -1)) + price);
        if(quantityActualAdd >= quantityAvailable){
            errorModal("error", "Oops...", "Le stock est limité à "+quantityAvailable, "Ok", "");
        }else{
            let priceTotal = ((quantityActualAdd+1)*price).toFixed(2);
            $(target).next().text(quantityActualAdd+1);
            $.ajax({ 
                type: "POST",
                url: "assets/php/addArticleBag.php",
                data: "addRemoveArticle=add&quantity="+quantityActualAdd+"&idBag="+idBag,
                cache: false
            });
            $(target).parent().parent().children().children().children().next().next().text(priceTotal+'€');
            $('#priceSubTotal').text((actualPrice).toFixed(2)+'€');
            if(parseFloat(actualPrice) <= 50){
                $('#freeDeliveryRemaining').text('Plus que '+(priceMiniDelivery-actualPrice).toFixed(2)+'€ pour la livraison offerte');
                $('#amountTotal').text((actualPrice + 6).toFixed(2)+'€');
                $('#amountDelivery').text(priceDelivery.toFixed(2)+'€');
                $('#amountReduction').text('0.00€');
            }else{
                $('#freeDeliveryRemaining').text('Vous bénéficiez de la livraison offerte');
                $('#amountTotal').text((actualPrice).toFixed(2)+'€')
                $('#amountDelivery').text('GRATUIT');
                $('#amountReduction').text(priceDelivery.toFixed(2)+'€');
            }
        }
    }else if(option == "rem"){
        var actualPrice = (parseFloat($('#priceSubTotal').text().slice(0, -1)) - price);
        if(quantityActualRem > 1){
            let priceTotal = ((quantityActualRem-1)*price).toFixed(2);
            $(target).prev().text(quantityActualRem-1);
            $.ajax({ 
                type: "POST",
                url: "assets/php/addArticleBag.php",
                data: "addRemoveArticle=rem&quantity="+quantityActualRem+"&idBag="+idBag,
                cache: false
            });
            $(target).parent().parent().children().children().children().next().next().text(priceTotal+'€');

            $('#priceSubTotal').text((actualPrice).toFixed(2)+'€');
            if(parseFloat(actualPrice) <= 50){
                $('#freeDeliveryRemaining').text('Plus que '+(priceMiniDelivery-actualPrice).toFixed(2)+'€ pour la livraison offerte');
                $('#amountTotal').text(((actualPrice)+6).toFixed(2)+'€');
                $('#amountDelivery').text(priceDelivery.toFixed(2)+'€');
                $('#amountReduction').text('0.00€');
                console.log('Prix actuel : ' + actualPrice + ' Prix min liv : ' + priceMiniDelivery);
                console.log(priceMiniDelivery - actualPrice);
            }else{
                $('#freeDeliveryRemaining').text('Vous bénéficiez de la livraison offerte');
                $('#amountTotal').text((actualPrice).toFixed(2)+'€')
                $('#amountDelivery').text('GRATUIT');
                $('#amountReduction').text(priceDelivery.toFixed(2)+'€');
            }
        }else{
            confirmModal(target, idBag, price, actualPrice, actualPrice, priceMiniDelivery, priceDelivery);
        }
    }
}

function removeArticle(target, idBag){
    $.ajax({ 
        type: "POST",
        url: "assets/php/addArticleBag.php",
        data: "addRemoveArticle=remAll&idBag="+idBag,
        cache: false
    });
    $(target).parent().parent().remove();
}

//? Modal

function emailModal(){
    (async () => {
        const { value: email } = await Swal.fire({
        title: 'Mot de passe oublié',
        input: 'email',
        inputLabel: 'Un lien de réinitialisation vous sera envoyé',
        inputPlaceholder: 'Saisissez votre email',
        confirmButtonColor: 'var(--red-color)',
        confirmButtonText: 'Confirmer'
        })
        if(email){
            sendEmailForgetPassword(email);
        }
    })()
}

function pageNotFoundModal(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Cette page n\'est pas encore disponible, reviens plus tard :)',
        confirmButtonColor: 'var(--red-color)',
        confirmButtonText: 'Ok'
      })
}

function supportModal(){
    Swal.fire({
        title: 'Support',
        icon: 'info',
        html:
          'Contactez nous par message sur l\'un de ces supports : <br/>' +
          '<a href="https://www.instagram.com/doit4vendee/" target="_blank">Instagram</a> &nbsp&nbsp' +
          '<a href="https://www.facebook.com/doit4vendee/" target="_blank">Facebook</a> &nbsp&nbsp' +
          '<a href="mailto:contact@doit4vendee.fr" target="_blank">E-mail</a>',
        showCloseButton: true,
        focusConfirm: false,
        confirmButtonText: 'Fermer',
        confirmButtonColor: 'var(--red-color)',
      })
}

function searchModal() {
    Swal.fire({
        title: 'Recherche',
        input: 'text',
        inputPlaceholder: 'Saisissez vos mots clés',
        inputAttributes: {
        autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Chercher',
        cancelButtonText: 'Annuler',
        confirmButtonColor: '#008000',
        cancelButtonColor: 'var(--red-color)',
        preConfirm: (data) => {
            if (data != "") {
                console.log(`Data : ${data}`)
            } else {
                Swal.showValidationMessage(`Aucune recherche à effectuer`)
            }
        },
    })
}

function confirmModal(target, idBag, price, priceTotal, actualPrice, priceMiniDelivery, priceDelivery){
    Swal.fire({
        title: 'Êtes vous sûrs ?',
        text: "L'article sera supprimé de votre panier",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#008000',
        cancelButtonColor: 'var(--red-color)',
        confirmButtonText: 'Confirmer',
        cancelButtonText: 'Annuler'
        }).then((result) => {
        if (result.isConfirmed) {
            removeArticle(target, idBag);
            $('#priceSubTotal').text((actualPrice).toFixed(2)+'€')
            if(parseFloat(priceTotal) <= 50){
                $('#freeDeliveryRemaining').text('Plus que '+(priceMiniDelivery-priceTotal).toFixed(2)+'€ pour la livraison offerte');
                $('#amountTotal').text((actualPrice + 6).toFixed(2)+'€');
                $('#amountDelivery').text(priceDelivery.toFixed(2)+'€');
                $('#amountReduction').text('0.00€');
            }else{
                $('#freeDeliveryRemaining').text('Vous bénéficiez de la livraison offerte');
                $('#amountTotal').text((actualPrice).toFixed(2)+'€')
                $('#amountDelivery').text('GRATUIT');
                $('#amountReduction').text(priceDelivery.toFixed(2)+'€');
            }
            Swal.fire({
                title: 'Supprimé',
                text: "L\'article a bien été supprimé",
                icon: 'success',
                confirmButtonColor: '#008000',
            })
        }
    })
}

function emptyBagModal(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Votre panier est vide',
        confirmButtonColor: 'var(--red-color)',
        confirmButtonText: 'Ok'
      })
}

//? Delivery by hand (Delete)

function deliveryByHand(deliveryAmount, total, priceMinDelivery){
    if ($('#deliveryByHand').is(':checked')) {
        $('#amountDelivery').text("GRATUIT");
        $('#amountReduction').text(parseFloat(deliveryAmount).toFixed(2)+'€');
        if(total <= priceMinDelivery){
            $('#amountTotal').text(parseFloat(total).toFixed(2)+'€');
        }
    }else{
        if(total <= priceMinDelivery){
            $('#amountDelivery').text(parseFloat(deliveryAmount).toFixed(2)+'€');
            $('#amountReduction').text("0.00€");
            $('#amountTotal').text(parseFloat(total + deliveryAmount).toFixed(2)+'€');
        }
    }
}

//? Checkout

$('#buyButton').on('click', e => {
    let reductionPrice = (parseFloat($('#amountReduction').text().match(/-?(?:\d+(?:\.\d*)?|\.\d+)/)[0])),
        portDeliveryPrice = ($('#amountDelivery').text().trim() == '6.00€' ? 6 : 0),
        priceTotal = countArticles = checkout = 0;
    $.get('assets/php/getBagInfo.php', function(result){
        arrArticles = JSON.parse(result);
        if(arrArticles.length > 0){
            $.get('assets/php/hasAddress.php', function(result){
                arrAddress = JSON.parse(result);
                if(!jQuery.isEmptyObject(arrAddress)){
                    if(checkout != 1){
                        $('<input>').attr({type: 'hidden', id: 'reductionPrice', name: 'reductionPrice', value: reductionPrice}).appendTo('form')
                        $('<input>').attr({type: 'hidden', id: 'portDeliveryPrice', name: 'portDeliveryPrice', value: portDeliveryPrice}).appendTo('form')
                        $('<input>').attr({type: 'hidden', id: 'street', name: 'street', value: arrAddress.street}).appendTo('form')
                        $('<input>').attr({type: 'hidden', id: 'city', name: 'city', value: arrAddress.city}).appendTo('form')
                        $('<input>').attr({type: 'hidden', id: 'addressSup', name: 'addressSup', value: arrAddress.addressSup}).appendTo('form')
                        $('<input>').attr({type: 'hidden', id: 'postalCode', name: 'postalCode', value: arrAddress.postalCode}).appendTo('form')
                        for(i=0;i<arrArticles.length;i++){
                            $.each(arrArticles[i], (key, value) => {
                                $('<input>').attr({type: 'hidden', id: key+i, name: key+i, value: value}).appendTo('form');
                                priceTotal += key == 'price' ? value : 0;
                            })
                            countArticles += 1;
                        }
                        $('<input>').attr({type: 'hidden', id: 'priceTotal', name: 'priceTotal', value: ((priceTotal+6) - reductionPrice)}).appendTo('form')
                        $('<input>').attr({type: 'hidden', id: 'countArticles', name: 'countArticles', value: countArticles}).appendTo('form')
                        // alert(`Prix total : ${priceTotal} Livraison : ${portDeliveryPrice} Réduction : ${reductionPrice} Log : ${46}`)
                        console.log(arrArticles);
                        checkout = 1;
                        $('#formCheckout').submit()
                    }
                }else{
                    window.location.replace('addressBook?b=1')
                }
            })
        }else{
            emptyBagModal() 
        }
    })
})

//? CGV Switch

function switchLegal(param){
    switch(param){
        case 'cgv':
            $('#mlButton').removeClass('optionSelected');
            $('#mlContent').addClass('hiddenElement');
            $('#cgvButton').addClass('optionSelected');
            $('#cgvContent').removeClass('hiddenElement');
            break;
        case 'ml':
            $('#mlButton').addClass('optionSelected');
            $('#mlContent').removeClass('hiddenElement');
            $('#cgvButton').removeClass('optionSelected');
            $('#cgvContent').addClass('hiddenElement');
            break;
    }
}

//? Order Switch

function switchOrder(param){
    switch(param){
        case 'finish':
            $('#prButton').removeClass('optionSelected');
            $('#prContent').addClass('hiddenElement');
            $('#fiButton').addClass('optionSelected');
            $('#fiContent').removeClass('hiddenElement');
            $('.progress').hide();
            $('.finish').css('display', 'flex');
            break;
        case 'progress':
            $('#prButton').addClass('optionSelected');
            $('#prContent').removeClass('hiddenElement');
            $('#fiButton').removeClass('optionSelected');
            $('#fiContent').addClass('hiddenElement');
            $('.progress').css('display', 'flex');
            $('.finish').hide();
            break;
    }
}

//? Email

function sendEmailForgetPassword(email){
    $.ajax({ 
        type: "POST",
        url: "assets/php/generatePassTemp.php",
        data: "email="+email,
        cache: false,
        success: function(newPass){
            $.ajax({ 
                type: "POST",
                url: "assets/mail/forgetPassword.php",
                data: "email="+email+"&newPass="+newPass,
                cache: false,
                success: function(result){
                    errorModal('success', 'Email envoyé', 'Votre nouveau mot de passe vous a été envoyé par mail !', 'Ok', '');
                },
                error: function(e){
                    errorModal('error', 'Oups..', 'Une erreur est survenue', 'Ok', '');
                }
            });
        },
        error: function(e){
            errorModal('error', 'Oups..', 'Une erreur est survenue', 'Ok', '');
        }
    });
}

//? Change password

function changePassword(){
    var newPassInput = $('#newPassContainer'),
        spanChangePassword = $('#changePassword');
    if(newPassInput.css('display') == 'none'){
        newPassInput.css('display', 'block');
        spanChangePassword.css('margin-bottom', '10px');
    }else{
        newPassInput.css('display', 'none');
        spanChangePassword.css('margin-bottom', '60px');
    }
}

//? Réduction

function addReduction(codeReduction){
    var actualPrice = (parseFloat($('#priceSubTotal').text().slice(0, -1)));
    $.ajax({ 
        type: "POST",
        url: "assets/php/checkReduction.php",
        data: "codeReduction="+codeReduction,
        cache: false,
        success: function(result){
            if(result == 'used'){
                errorModal("error", "Oops...", "Le code a déjà été utilisé", "Ok", "");
                $(".reducInput").val("");
            }else if(result == 'ko'){
                errorModal("error", "Oops...", "Un problème est survenu.. Merci de réessayer ultérieurement", "Ok", "");
                $(".reducInput").val("");
            }else if(result == 'incorrectCode'){
                errorModal("error", "Oops...", "Le code saisi est invalide", "Ok", "");
                $(".reducInput").val("");
            }else{
                if($('#priceSubTotal').val() <= 50){
                    $('#freeDeliveryRemaining').text('Vous bénéficiez de la livraison offerte');
                    $('#amountTotal').text((actualPrice).toFixed(2)+'€')
                    $('#amountDelivery').text('GRATUIT');
                    $('#amountReduction').text(result+'€');
                    errorModal('success', 'Réduction ajoutée', 'Vous bénéficiez d\'une réduction de '+result+'€', 'Ok', '');
                }else{
                    errorModal("error", "Oops...", "Votre commande bénéficie déjà de la livraison gratuite", "Ok", "");
                    $(".reducInput").val("");
                }
            }
        },
        error: function(e){
            errorModal("error", "Oops...", "Un problème est survenu.. Merci de réessayer ultérieurement", "Ok", "");
            $(".reducInput").val("");
        }
    });
}

//? Validate email

function validateEmail(email){
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

//? Save user data

function saveUserData(){
    const firstName = $('#firstName').val(),
          lastName = $('#lastName').val(),
          password1 = $('#passwordInput1').val(),
          password2 = $('#passwordInput2').val();
    if(lastName == '' && lastName <= 2){
        errorModal("error", "Oops..", "Le prénom est incorrect", "Ok", "");
    }else if(firstName == '' && firstName <= 2){
        errorModal("error", "Oops..", "Le nom est incorrect", "Ok", "");
    }else{
        if($('#newPassContainer').css('display') == 'block'){
            if(password1 == '' && password1 < 8){
                errorModal("error", "Oops..", "Le mot de passe doit contenir au minimum 8 caractères", "Ok", "");
            }else if(password1 == '' && password1 < 8){
                errorModal("error", "Oops..", "Le mot de passe doit contenir au minimum 8 caractères", "Ok", "");
            }else if(password1 != password2){
                errorModal("error", "Oops..", "Les mots de passe ne sont pas identiques", "Ok", "");
            }else{
                $.ajax({ 
                    type: "POST",
                    url: "assets/php/saveUserData.php",
                    data: "firstName="+firstName+"&lastName="+lastName+"&password="+password1,
                    cache: false,
                    success: function(result){
                        errorModal("success", "Modification effectuée", "Vos informations ont été mises à jour", "Ok", "");
                    },
                    error: function(e){
                        errorModal("error", "Oops..", "Une erreur est survenue", "Ok", "");
                    }
                });
            }
        }else{
            $.ajax({ 
                type: "POST",
                url: "assets/php/saveUserData.php",
                data: "firstName="+firstName+"&lastName="+lastName+"&email="+email,
                cache: false,
                success: function(result){
                    errorModal("success", "Modification effectuée", "Vos informations ont été mises à jour", "Ok", "");
                },
                error: function(e){
                    errorModal("error", "Oops..", "Une erreur est survenue", "Ok", "");
                }
            });
        }
    }
}

//? Delete account

function deleteAccount(){
    Swal.fire({
        title: 'Êtes vous sûrs ?',
        text: "Cette action est irréversible",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#008000',
        cancelButtonColor: 'var(--red-color)',
        confirmButtonText: 'Confirmer',
        cancelButtonText: 'Annuler'
        }).then((result) => {
        if (result.isConfirmed) {
            $.get('assets/php/deleteAccount.php', function(result){
                result ? window.location='assets/php/logout.php' : errorModal("error", "Oops...", "Une erreur est survenue", "Ok", "");;
            })
        }
    })
}

//? Success toastr

function successToastr(){
    Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    }).fire({
        icon: 'success',
        title: 'Signed in successfully'
    })
}


//? Order management

function orderManagement(progress, orderId, email='', firstName=''){
    $.ajax({
        type: "POST",
        url: "/assets/php/updateOrder.php",
        data: "orderId="+orderId+"&progress="+progress,
        cache: false,
        success: (date)=>{
            if(date == 'ko'){
                alert('Une erreur est survenue..')
            }else{
                if(progress == 1){
                    $.ajax({
                        type: "POST",
                        url: "/assets/mail/shipping.php",
                        data: "email="+email+"&orderId="+orderId+"&dateShipping="+date+"&firstName="+firstName,
                        cache: false
                    })
                }
            }
        }
    })
}