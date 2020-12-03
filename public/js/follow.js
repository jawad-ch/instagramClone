$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.follow').click((e)=>{
    let userId = $(e.currentTarget).data('id');
    let url = $(e.currentTarget).children().attr('aria-label') === "follow" ? "{{ route('follow') }}" : "{{ route('unfollow') }}";
    e.preventDefault();
    $.ajax({
    type:'POST',
    url,
    data:{'id':userId},
    success:function(data){
        console.log(data)
        if (data.action === "follow") {
            $(e.currentTarget).children().replaceWith('<a href="#" aria-label="unfollow">unfollow</a>')
        }else{
            $(e.currentTarget).children().replaceWith('<a href="#" aria-label="follow">follow</a>')
        }
    }
    });
})