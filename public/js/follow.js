function follow_or_unfollow(btn_id) {
    var selfDom = $(btn_id),
        followerBtn = $('.followers'),
        followingBtn = $('.following')
    $.ajax({
        headers: { 'X-CSRF-TOKEN': selfDom.data('csrf') },
        type: 'POST',
        url: selfDom.data('action'),
        data: {
            following_id: selfDom.data('followingId'),
            follower_id: selfDom.data('followerId'),
        },
        dataType: 'json',
        success: function (data) {
            if(data.success = true) {
                if (selfDom.data('btn-id') == "follow") {
                    $("#follow").addClass('hide');
                    $('#unfollow').removeClass('hide');
                    followerBtn.text(data['follower_count']);
                    followingBtn.text(data['following_count']);
                } else if (selfDom.data('btn-id') == "unfollow") {
                    $("#unfollow").addClass('hide');
                    $('#follow').removeClass('hide');
                    followerBtn.text(data['follower_count']);
                    followingBtn.text(data['following_count']);
                }
            }
        }
    });
}
