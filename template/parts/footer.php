<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div><a href="/">animistology<br>intellectual inquiries</a></div>
            </div>
            <div class="col-md-3">
                <address>Bern<br>Switzerland</address>
            </div>
            <div class="col-md-3">
                <a class="show tel" href="tel:34609331754">+41 76 681 1337</a>
                <a href="mailto:hello@animistology.net">hello@animistology.net</a>
            </div>
            <div class="col-md-3">
                <ul class="list-inline social-networks text-right">
                    <!--<li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-medium"></i></a></li>-->
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- ./Footer area -->
</div>
<!-- ./main-container -->

<!-- Overlays and menu hover titles -->
<div id="fltrs-overlay"></div>
<div id="overlay"></div>
<div id="page-title">
    <span class="title"></span>
    <span class="subtitle"></span>
</div>
</div>

<!-- Main scripts -->
<script src="/template/assets/js/vendor/jquery.js"></script>
<script src="/template/assets/js/main.js"></script>
<script src="/template/assets/js/plugins.js"></script>
<script src="/template/assets/js/bootstrap.js"></script>
<script>
    jQuery(function(){
        jQuery(window).trigger('resize')
    })
    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement("style")
        msViewportStyle.appendChild(
            document.createTextNode(
                "@-ms-viewport{width:auto!important}"
            )
        )
        document.getElementsByTagName("head")[0].appendChild(msViewportStyle)
    }
</script>

</body>
</html>