<script>
    var x = document.getElementById("resultsubscription");
    var currentLocation1 = window.location;

    //var url_string = "http://localhost/baby/newform.html?seccess=1"; //window.location.href
    var url = new URL(currentLocation1);
    var seccess1 = url.searchParams.get("successreq");
    var error1 = url.searchParams.get("failreq");

    if (seccess1 == 1) {
        $(".seccess1").show();
        $(".error1").hide();
    } else if (error1 == 1) {
        $(".seccess1").hide();
        $(".error1").show();
    } else {
        $(".seccess1").hide();
        $(".error1").hide();
    }
</script>

<script>
    $(document).ready(function(){
        $('.add-wishlist').click(function(){
            var appartmentId = $(this).attr('data'); // Your product ID
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'get',
                url: '/add-to-cache',
                data: {
                    appartment_id: appartmentId,
                    _token: token // Include the CSRF token
                },
                success: function(response) {
                    console.log(response);
                    Swal.fire(response['message']);
                },
                error: function(xhr, status, error) {
                    console.error('Error adding product to cache');
                    Swal.fire("პროდუქტი ვერ დაემატა სურვილების სიას");
                }
            });
        });
    });
</script>
