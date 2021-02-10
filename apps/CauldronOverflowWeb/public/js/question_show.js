let $answerVotes = $('.js-vote-arrows');

$answerVotes.find('a').on('click', (e) => {
    e.preventDefault();

    let $link = $(e.currentTarget);

    $.ajax({
        url: '/comments/10/vote/' + $link.data('direction'),
        method: 'POST'
    }).then((data) => {
        $answerVotes.find('.js-vote-total').text(data.votes);
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
