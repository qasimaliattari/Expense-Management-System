       <!--**********************************
            Footer start
        ***********************************-->
        <!-- <div class="footer">        

            <div class="copyright">
                    <p>© Designed &amp; by <a href="#" target="_blank">Programmer</a> 2023</p>
                </div>
        </div> -->
        <!--**********************************
            Footer end
        ***********************************-->

		


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<!-- Dashboard 1 -->
	<script src="js/dashboard/dashboard-1.js"></script>

    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="js/demo.js"></script>
    <script>
        function change_cat() {
            var category_id = document.getElementById('category_id').value;
            window.location.href='?category_id='+category_id;
        }
    </script>
</body>

</html>