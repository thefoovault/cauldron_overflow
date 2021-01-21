let $container = $('.js-vote-arrows');

$container.find('a').on('click', (e) => {
    e.preventDefault();

    let $link = $(e.currentTarget);

    $.ajax({
        url: '/comments/10/vote/' + $link.data('direction'),
        method: 'POST'
    }).then((data) => {
        $container.find('.js-vote-total').text(data.votes);
    });
});
