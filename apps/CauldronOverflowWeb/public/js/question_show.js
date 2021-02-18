let $answerVotes = $('.js-vote-arrows');

$answerVotes.find('a').on('click', (e) => {
    e.preventDefault();

    let $answerId = $(e.currentTarget).parent().data('id')
    let $link = $(e.currentTarget);

    $.ajax({
        url: '/comments/' + $answerId + '/vote/' + $link.data('direction'),
        method: 'POST'
    }).then((data) => {
        $(e.currentTarget).parent().find('.js-vote-total').text(data.votes);
    });
});


let $questionVotes = $('.vote-arrows-alt');

$questionVotes.find('a').on('click', (e) => {
    e.preventDefault();

    let $link = $(e.currentTarget);
    let slug = $questionVotes.data('slug');

    $.ajax({
        url: '/questions/' + slug +'/vote/' + $link.data('direction'),
        method: 'POST'
    }).then((data) => {
        $questionVotes.find('.js-vote-total').text(data.votes);
    });
});
