var postId = 0;
var postBodyElement = null;
var postTitleElement = null;
$('.post1').find('.interaction1').find('.edit').on('click', function (event) {
    event.preventDefault();
    postBodyElement = event.target.parentNode.parentNode.childNodes[3];
    postTitleElement = event.target.parentNode.parentNode.childNodes[1];
    var postTitle = postTitleElement.textContent;
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];

    // console.log(postBody);
    console.log(postTitle);
    $('#post-title').val(postTitle);
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});
$('#modal-save').on('click', function () {
    $.ajax({
        method: 'POST',
        url: urlEdit,
        data: {body: $('#post-title').val(), body1: $('#post-body').val(), postId: postId, _token: token}
    })
        .done(function (msg) {
            console.log(JSON.stringify(msg));
            $(postTitleElement).text(msg['new_title']);
            $(postBodyElement).text(msg['new_body']);
            $('#edit-modal').modal('hide');
        });
});

$('.like').on('click', function (event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null ? true : false;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike,postId: postId, _token: token}
    })
        .done(function () {
            //change the page view
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You liked this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You disliked this post' : 'Dislike';
            if(isLike){
                event.target.nextElementSibling.innerText = 'Dislike';
            }
            else
            {
                event.target.previousElementSibling.innerText = 'Like';
            }

        })
    console.log(isLike);
});
