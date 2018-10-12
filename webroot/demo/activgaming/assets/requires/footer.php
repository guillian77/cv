			</section>
		<!-- END #top-layer -->
		</div>
			
		<div class="clear-float"></div>
		
		<div class="wrapper">
			<!-- BEGIN .footer -->
			<div class="footer">
				<div class="footer-bottom">
					<div class="left">&copy; Copyright 2016 <strong>Activ Gaming </strong> - Version <?= $conf['web']['version']; ?> - Développé par <a href="http://guillian-aufrere.com/" target="_blank" title="Voir son CV en ligne">Aufrère Guillian</a></div>

					<div class="right">
						<ul>
							<li><a href="?page=home">Accueil</a></li>
							<li><a href="?page=blog&name=Derniers%20Articles">News</a></li>
							<li><a href="?page=event&name=Tournois">Tournois</a></li>
							<li><a href="?page=support&name=Support">Support</a></li>
						</ul>
					</div>
					<div class="clear-float"></div>
				</div>
				
			<!-- END .footer -->
			</div>
		</div>
		
		<script type='text/javascript' src='assets/jscript/jquery-1.11.2.min.js'></script>
		<script type='text/javascript' src='assets/jscript/modernizr.custom.50878.js'></script>
		<script type='text/javascript' src='assets/jscript/iscroll.js'></script>
		<script type='text/javascript' src='assets/jscript/dat-menu.js'></script>
		<script type='text/javascript'>
			var strike_featCount = 4;
			var strike_autostart = true;
			var strike_autoTime = 7000;
		</script>
		<script type='text/javascript' src='assets/jscript/theme-script.js'></script>

		<!-- ESCAPE IMAGE FROM TWITTER WIDGET -->
		<script type='text/javascript' src='assets/jscript/escape-image-twitter.js'></script>

		<!-- WYSIWYG EDITOR -->
		<script src="assets/plugins/ckeditor/ckeditor.js"></script>
		<script src="assets/plugins/ckeditor/config.js"></script>
		<script>
			CKEDITOR.replace( 'editor1', {
			  extraPlugins: 'imageuploader'
			});
			CKEDITOR.replace( 'editor2', {
			  extraPlugins: 'imageuploader'
			});
			CKEDITOR.disableAutoInline = true;
		</script>

		<!-- BOUTIQUE SPREADSHIRT -->
		<?php if($_GET['page'] == "shop"): ?>
			<script>
			    var spread_shop_config = {
			        shopName: 'activ-gaming',
			        locale: 'fr_FR',
			        prefix: '//shop.spreadshirt.fr',
			        baseId: 'myShop'
			    };
			</script>

			<script type="text/javascript"
			        src="//shop.spreadshirt.fr/shopfiles/shopclient/shopclient.nocache.js">
			</script>
		<?php endif; ?>
	</body>
</html>