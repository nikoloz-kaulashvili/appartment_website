<script src="/website/js/jquery-3.6.0.min.js"></script>
<script src="/website/js/bootstrap.min.js"></script>
<script src="/website/js/wow-animate.min.js"></script>
<script src="/website/js/isotope.pkgd.min.js"></script>
<script src="/website/js/jquery.magnific-popup.min.js"></script>
<script src="/website/js/owl.carousel.min.js"></script>
<script src="/website/js/select2.min.js"></script>
<script src="/website/js/swiper.min.js"></script>
<script src="/website/js/main.js"></script>

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
