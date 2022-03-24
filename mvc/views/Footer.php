<!-- footer -->
<div class="bottombar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="copyright"><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></span>
                <i><img src="public/images/credit-cards.png" alt=""></i>
            </div>
        </div>
    </div>
</div>
</div>
<!--<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>-->
<input type="hidden" id="storeIdUser" value="<?php echo $keyId; ?>">

<script type="text/javascript" src="public/js/jquery.js"></script>
<script type="text/javascript" src="public/js/main.min.js"></script>
<script type="text/javascript" src="public/js/script.js"></script>


<script type="text/javascript" src="public/js/myJs.js"></script>
<script type="text/javascript" src="public/js/like_unlike.js"></script>
<script type="text/javascript" src="public/js/realtimenotifications.js"></script>
<script type="text/javascript" src="public/js/preview.min.js"></script>

<script type="text/javascript" src="public/js/map-init.js"></script>
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>-->

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>

    $(document).ready(function(){
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('2ccdca5b017f58d508dd', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('notifications');
        channel.bind('noti', function(data) {
            if (data['message']['notifier'] === $('#storeIdUser').val()){
                var total = data['message']['count'];
                var noti = data['message']['noti'];
                $('#notification').after(noti);
                $('#count').text(total);
                $('#tbcount').text(total);
            }

        });

        // var conn = new WebSocket('ws://localhost:8080');
        // conn.onopen = function(e) {
        //     console.log("Connection established!");
        // };
        //
        // conn.onmessage = function(e) {
        //     console.log(e.data);
        // };
    })


</script>
</body>

</html>