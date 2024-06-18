const horas = document.getElementById('horas');
const minutos = document.getElementById('minutos');
const segundos = document.getElementById('segundos');

const relogio = setInterval(function time() {
    let dateToday = new Date();
    let hr = dateToday.getHours();
    let min = dateToday.getMinutes();
    let s = dateToday.getSeconds();

    if (hr < 10) hr = '0' + hr;

    if (min < 10) min = '0' + min;

    if (s < 10) s = '0' + s;

    horas.textContent = hr;
    minutos.textContent = min;
    segundos.textContent = s;

})

/* Carrossel */

$(document).ready(function(){
    $('.container').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: '<button type="button" class="slick-prev">Anterior</button>',
        nextArrow: '<button type="button" class="slick-next">Próximo</button>',
    });
    setInterval(function() {
        $('.container').slick('next');
    }, 5000);
});


// Carrinho
$(document).ready(function() {
    $('.add-to-cart').on('click', function() {
        $('#cart-modal').css('display', 'block');
      });    
      
      $('.close').on('click', function() {
        $('#cart-modal').css('display', 'none');
      });
    
      $(window).on('click', function(event) {
        if ($(event.target).is('#cart-modal')) {
          $('#cart-modal').css('display', 'none');
        }
      });
    $('.add-to-cart').click(function() {
      var name = $(this).siblings('.product-name').text();
      var price = $(this).siblings('.product-price').text();
      $('#cart-items').append('<div class="cart-item"><h3>' + name + '</h3><p>' + price + '</p><button class="remove-item">Remover</button></div>');
      var total = $('#total').text();
      total = total.replace('Total: R$', '');
      total = parseFloat(total);
      price = price.replace('R$', '');
      price = parseFloat(price);
      total += price;
      $('#total').text('Total: R$' + total.toFixed(2));
    });
});

$(document).on('click', '.remove-item', function() {
    var price = $(this).siblings('p').text();
    price = price.replace('R$', '');
    price = parseFloat(price);
    var total = $('#total').text();
    total = total.replace('Total: R$', '');
    total = parseFloat(total);
    total -= price;
    $('#total').text('Total: R$' + total.toFixed(2));
    $(this).parent().remove();
  });

$(document).ready(function() {
    $('#cart-button').on('click', function() {
      $('#cart-modal').css('display', 'block');
    });
  });
