<?php
if($indice){
print '
</div>
									
								</section>


						</div>
						
					</div>

';
?>

<p><a style='cursor: pointer;' onclick="muestra_oculta('contenido_a_mostrar')" title="">

<?php
print '
<div id="contenido_a_mostrar">

<p>

    <script  src="assets/menu/js/index.js"></script>
	
	</p>
	
  </div>
  
    <script  src="js/index.js"></script>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script>
			<script src="assets/js/main.js"></script>
			
<a style="display:scroll;position:fixed;bottom:5px;right:5px;" href="#" class="button big" title="Subir arriba">

<img src="img/up.png"  height="30" width="30"/></a>

	</body>
	
</html>
';
}

else{
	print '
	</div>
								</section>
	
							</div>
							
						</div>
						
	';
?>
		<p>
			<a style="cursor: pointer;"	onclick="muestra_oculta('contenido_a_mostrar')">
			<div id="contenido_a_mostrar">
				<p>
					<script  src="assets/menu/js/index.js"></script>
				</p>
			</div>
						<script src="assets/js/jquery.min.js"></script>
						<script src="assets/js/skel.min.js"></script>
						<script src="assets/js/util.js"></script>
						<script src="assets/js/main.js"></script>
			<a style="display:scroll;position:fixed;bottom:5px;right:5px;" href="#" class="button big" title="Subir arriba">
				<img src="img/up.png"  height="30" width="30"/>
			</a>
		</p>
	</body>
</html>
<?
}
?>