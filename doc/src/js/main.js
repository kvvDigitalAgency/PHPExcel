$(document).on('scroll', function() {
    let a = $('.headerScroll');
    let b;
    for(let i = 0; i < a.length; i++) {
        if(a[i].getBoundingClientRect().top < (document.documentElement.clientHeight / 2))
            b = a[i];
    }
    $('.hrefScroll').children('.btn').removeClass('active');
    $('a[href="#' + $(b).attr('id') + '"]').children('.btn').addClass('active');
    $(document.querySelector('a[href="#' + $(b).attr('id') + '"]').parent).children('.btn').addClass('active');
})