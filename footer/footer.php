
    <!----------- Footer ------------>
    <footer class="footer-bs">
    	<div class="container-fluid">
	        <div class="row">
	        	<div class="col-md-3 footer-brand animated fadeInLeft">
	            	<h2>Le Boudoir</h2>
	                <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
	                <p>© 2018 Le Boudoir, All rights reserved</p>
	            </div>
	        	<div class="col-md-4 footer-nav animated fadeInUp">
	            	<h4>Menu-</h4>
	            	<div class="col-md-6">
	                    <ul class="pages">
	                        <li><a href="#">Home</a></li>
	                        <li><a href="#">Produits</a></li>
	                        <li><a href="#">Contact</a></li>
	                        <li><a href="#">Connexion</a></li>
	                    </ul>
	                </div>
	            	<div class="col-md-6">
	                    <ul class="list">
	                        <li><a href="#">A propos de nous</a></li>
	                        <li><a href="#">Termes & Conditions</a></li>
	                        <li><a href="#">Politique de confidentialité</a></li>
	                    </ul>
	                </div>
	            </div>
	        	<div class="col-md-2 footer-social animated fadeInDown">
	            	<h4>Follow Us</h4>
	            	<ul>
	                	<li><a href="#">Facebook</a></li>
	                	<li><a href="#">Twitter</a></li>
	                	<li><a href="#">Instagram</a></li>
	                	<li><a href="#">RSS</a></li>
	                </ul>
	            </div>
	        	<div class="col-md-3 footer-ns animated fadeInRight">
	            	<h4>Newsletter</h4>
	                <p>Pour les dernières actualités et promotions avec ... mmh .. Le Boudoir.</p>
	                <p>
	                    <div class="input-group">
	                      <input type="text" class="form-control" placeholder="e-mail">
	                      <span class="input-group-btn">
	                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
	                      </span>
	                    </div><!-- /input-group -->
	                 </p>
	            </div>
	        </div>
        </div>
    </footer>

    <?php
    $root = str_ireplace(dirname(__DIR__, 2), 'http://localhost', __DIR__);
    $root = str_ireplace('\\', '/', $root);
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= $root ?>/home.js"></script>
	</body>
</html>