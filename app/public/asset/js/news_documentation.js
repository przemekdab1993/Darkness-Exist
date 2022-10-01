
var $container = $('.js-vote-arrows');

$container.find('a').on('click', function(e) {
    e.preventDefault();
    var $link = $(e.currentTarget);

    $.ajax({
        url: '/comments/'+$link.data('id')+'/vote/'+$link.data('direction'),
        method: 'POST'
    }).then( function(data) {
        $container.find('#vote-count-up-'+$link.data('id')).text(data.votes.goodVote);
        $container.find('#vote-count-down-'+$link.data('id')).text(data.votes.badVote);
    });
});