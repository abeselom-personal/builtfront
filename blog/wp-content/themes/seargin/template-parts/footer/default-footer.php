<?php
$footer_copyright = seargin_option('footer_copyright');
?>

<footer class="site-footer default-footer">
    <div class="footer__copyright">
        <div class="container">
            <div class="footer__copyright-inner ul_li_center">
                <div class="footer__copyright-text mt-15">
                    <?php if(!empty($footer_copyright)){echo esc_html($footer_copyright);}else{ esc_html_e( '© Seargin 2023 | All Right Reserved', 'seargin' );}?>
                </div>
            </div>
        </div>
    </div>
</footer>