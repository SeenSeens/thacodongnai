<?php $tp_hotline = get_option('tp_hotline'); ?>
<footer id="footer" class="footer">
	<div class="container">
	    <div class="footer__wrap">
	        <?php if( is_active_sidebar( 'sidebar-footer' )) {
	        	dynamic_sidebar( 'sidebar-footer' );
	        } ?>
	    </div>
	</div>
	<div class="footer-license">
	    <div class="container">
	        <div class="footer-license__wapper">
	            <div class="footer-license__wapper-list">
	                <ul>
	                    <li><a href="#" class="Roboto-Regular c-text-base text-white"> Chính sách bảo mật </a></li>
	                    <li><h5 class="text-white Roboto-Regular c-text-base">© 2022-2025 BẢN QUYỀN CỦA THACO AUTO</h5></li>
	                </ul>
	            </div>
	            <div class="footer-license__wapper-title">
	                <ul class="footer__wrap-social-network">
	                    <li>
	                        <a href="https://www.facebook.com/thacodongnai1">
	                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                <circle cx="20.9118" cy="20.9118" r="20.6236" stroke="white" stroke-width="0.576471"></circle>
	                                <g clip-path="url(#clip0_2294_6977)">
	                                    <path
	                                        d="M23.8331 15.1998H25.4378V12.405C25.1609 12.3669 24.2088 12.2812 23.1 12.2812C20.7864 12.2812 19.2015 13.7365 19.2015 16.4112V18.8727H16.6484V21.9971H19.2015V29.8585H22.3317V21.9978H24.7816L25.1705 18.8734H22.331V16.721C22.3317 15.8179 22.5749 15.1998 23.8331 15.1998Z"
	                                        fill="white"
	                                    ></path>
	                                </g>
	                                <defs>
	                                    <clipPath id="clip0_2294_6977"><rect width="17.5772" height="17.5772" fill="white" transform="translate(12.1172 12.2812)"></rect></clipPath>
	                                </defs>
	                            </svg>
	                        </a>
	                    </li>
	                    <li>
	                        <a href="https://www.youtube.com/@Thaco_Truck">
	                            <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                <circle cx="20.9118" cy="20.9118" r="20.6236" stroke="white" stroke-width="0.576471"></circle>
	                                <path
	                                    d="M30.968 16.297C30.8536 15.8707 30.6291 15.4819 30.3171 15.1695C30.0052 14.8571 29.6166 14.6322 29.1904 14.5172C27.6215 14.0952 21.3325 14.0952 21.3325 14.0952C21.3325 14.0952 15.0436 14.0952 13.4747 14.5149C13.0483 14.6296 12.6595 14.8544 12.3475 15.1668C12.0355 15.4792 11.8112 15.8682 11.6971 16.2948C11.2773 17.8659 11.2773 21.1428 11.2773 21.1428C11.2773 21.1428 11.2773 24.4198 11.6971 25.9886C11.9282 26.855 12.6106 27.5373 13.4747 27.7685C15.0436 28.1905 21.3325 28.1905 21.3325 28.1905C21.3325 28.1905 27.6215 28.1905 29.1904 27.7685C30.0568 27.5373 30.7369 26.855 30.968 25.9886C31.3877 24.4198 31.3877 21.1428 31.3877 21.1428C31.3877 21.1428 31.3877 17.8659 30.968 16.297ZM19.335 24.1504V18.1353L24.5421 21.1204L19.335 24.1504Z"
	                                    fill="#ffffff"
	                                ></path>
	                            </svg>
	                        </a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="action-button">
	    <div class="item-button">
	        <a href="tel:<?= $tp_hotline; ?>">
	            <div class="action-button__image"><img src="https://thacodongnai.vn/backend/storage/icon/cargo-truck.png" alt="action" /></div>
	            <span class="action-button__info c-text-base Roboto-Regular desktop">Kinh doanh xe: <?= $tp_hotline; ?> </span> <span class="action-button__info c-text-sm Roboto-Regular mobile">Kinh doanh xe</span>
	        </a>
	    </div>
	    <div class="item-button">
	        <a href="tel:0933 805 999">
	            <div class="action-button__image"><img src="https://thacodongnai.vn/backend/storage/icon/support.png" alt="action" /></div>
	            <span class="action-button__info c-text-base Roboto-Regular desktop">Dịch vụ 24/7: <?= $tp_hotline; ?> </span> <span class="action-button__info c-text-sm Roboto-Regular mobile">Dịch vụ 24/7</span>
	        </a>
	    </div>
	    <div class="item-button">
	        <a href="tel:0933 805 592">
	            <div class="action-button__image"><img src="https://thacodongnai.vn/backend/storage/icon/phone-call-1.png" alt="action" /></div>
	            <span class="action-button__info c-text-base Roboto-Regular desktop">Cung cấp phụ tùng: <?= $tp_hotline; ?> </span> <span class="action-button__info c-text-sm Roboto-Regular mobile">Cung cấp phụ tùng</span>
	        </a>
	    </div>
	</div>
	<div class="scrollToTop">
	    <a href="#" class="">
	        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="ionicon">
	            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="40" height="10" d="M112 328l144-144 144 144"></path>
	        </svg>
	    </a>
	</div>
</footer>
<?php wp_footer(); ?>


</body>
</html>
