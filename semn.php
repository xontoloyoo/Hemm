<footer class="footer">
    <div class="container">
        <div class="footer_wrapper d-flex flex-column flex-md-row">
            <div class="copyright">Copyright © <?php echo date('Y') ?> 
                <span class="text-capitalize"><?php echo htmlspecialchars(site_path()) ?></span> | All rights reserved
            </div>
            <div class="footer_links">
                <a href="<?php echo htmlspecialchars(view_page('dmca-notice')); ?>">DMCA</a>
                <a href="<?php echo htmlspecialchars(view_page('privacy-policy')); ?>">Privacy Policy</a>
                <a href="<?php echo htmlspecialchars(view_page('contact-us')); ?>">Contact</a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var count = 11170;

        function tick() {
            count += Math.round(Math.random() * 50);
            document.getElementById('online').textContent = count;
            setTimeout(tick, Math.round(1000 + Math.random() * 2000));
        }
        tick();
    </script>
    <style type="text/css">
        #counter {
            position: fixed;
            right: 15px;
            bottom: 15px;
            padding: 7px 15px;
            background: rgba(0, 0, 0, .5);
            width: auto;
            z-index: 999;
        }
    </style>
    <div id="counter">
        <img src="https://i.imgur.com/ePsm8mf.gif" style="background-repeat: no-repeat; width:43px; z-index:999; height:11px; margin-bottom:5px;"> &nbsp;&nbsp;
        <span class="counter-value">
            <span id="online"></span>
        </span>
        <span style="color:#fff;">Users Online </span>
    </div>
</footer>
<?php echo histats_write(); ?>
</body>
</html>
