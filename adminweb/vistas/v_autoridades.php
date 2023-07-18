<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../imagenes/icono-informacion.png" />
	<title>MUNI HUAYTARA ADMIN-WEB</title>

	<meta name="MUNI WEB ADMINISTRACION" content="TRANSPARENCIA" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />


	<!-- page specific plugin styles -->
	<link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
	<link rel="stylesheet" href="../assets/css/jquery-ui.min.css" />
	<link rel="stylesheet" href="../assets/css/chosen.min.css" />
	<!-- text fonts -->
	<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

	<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
	<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
	<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

	<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
		<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<script src="../assets/js/ace-extra.min.js"></script>

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.min.js"></script>
		<script src="../assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="no-skin">
	<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	if (!isset($_SESSION['mwusuario'])) {
		header("Location: ../login.html");
	}
	?>
	<div id="navbar" class="navbar navbar-default          ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>
			</button>

			<div class="navbar-header pull-left">
				<a href="index.html" class="navbar-brand">
					<small>
						<i class="fa fa-leaf"></i>
						ADMINISTRACIÓN WEB - MUNIHUAYTARA
					</small>
				</a>
			</div>

			<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">




					<li class="light-blue dropdown-modal">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="<?php echo $_SESSION['mwimagen']; ?>" alt="Jason's Photo" />
							<span class="user-info">
								<small>Bienvenido,</small>
								<?php echo $_SESSION['mwusuario']; ?>
							</span>

							<i class="ace-icon fa fa-caret-down"></i>
						</a>

						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">


							<li>
								<a href="profile.html">
									<i class="ace-icon fa fa-user"></i>
									Perfil
								</a>
							</li>

							<li class="divider"></li>

							<li>
								<a href="../clases/cerra_session.php">
									<i class="ace-icon fa fa-power-off"></i>
									Salir
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.navbar-container -->
	</div>

	<div class="main-container ace-save-state" id="main-container">
		<script type="text/javascript">
			try {
				ace.settings.loadState('main-container')
			} catch (e) {}
		</script>

		<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
			<script type="text/javascript">
				try {
					ace.settings.loadState('sidebar')
				} catch (e) {}
			</script>

			<div class="sidebar-shortcuts" id="sidebar-shortcuts">
				<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
					<button class="btn btn-success">
						<i class="ace-icon fa fa-signal"></i>
					</button>

					<button class="btn btn-info">
						<i class="ace-icon fa fa-pencil"></i>
					</button>

					<button class="btn btn-warning">
						<i class="ace-icon fa fa-users"></i>
					</button>

					<button class="btn btn-danger">
						<i class="ace-icon fa fa-cogs"></i>
					</button>
				</div>

				<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
					<span class="btn btn-success"></span>

					<span class="btn btn-info"></span>

					<span class="btn btn-warning"></span>

					<span class="btn btn-danger"></span>
				</div>
			</div><!-- /.sidebar-shortcuts -->

			<ul class="nav nav-list">
				<li class="">
					<a href="../index.php">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Inicio </span>
					</a>

					<b class="arrow"></b>
				</li>
				<?php
				require_once '../clases/read_main.php';
				$list_main = new Read_main();
				$list_main->list_menu($_SESSION['mwusuario'], '1', '../');
				?>


			</ul><!-- /.nav-list -->

			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
		</div>

		<div class="main-content">
			<div class="main-content-inner">
				<div class="breadcrumbs ace-save-state" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="../index.php">Inicio</a>
						</li>

						<li>
							<a href="#">Operaciones</a>
						</li>
						<li class="active">Autoridades</li>
					</ul><!-- /.breadcrumb -->

					<div class="nav-search" id="nav-search">
						<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
						</form>
					</div><!-- /.nav-search -->
				</div>

				<div class="page-content">
					<div class="ace-settings-container" id="ace-settings-container">
						<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
							<i class="ace-icon fa fa-cog bigger-130"></i>
						</div>

						<div class="ace-settings-box clearfix" id="ace-settings-box">
							<div class="pull-left width-50">
								<div class="ace-settings-item">
									<div class="pull-left">
										<select id="skin-colorpicker" class="hide">
											<option data-skin="no-skin" value="#438EB9">#438EB9</option>
											<option data-skin="skin-1" value="#222A2D">#222A2D</option>
											<option data-skin="skin-2" value="#C6487E">#C6487E</option>
											<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
										</select>
									</div>
									<span>&nbsp; Choose Skin</span>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
									<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
									<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
									<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
									<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
									<label class="lbl" for="ace-settings-add-container">
										Inside
										<b>.container</b>
									</label>
								</div>
							</div><!-- /.pull-left -->

							<div class="pull-left width-50">
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
									<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
									<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
									<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
								</div>
							</div><!-- /.pull-left -->
						</div><!-- /.ace-settings-box -->
					</div><!-- /.ace-settings-container -->
					<div class="row">
						<div class="page-header col-sm-8">
							<h1>
								Autoridades
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Detalle Municipalidad
								</small>
							</h1>
						</div>
						<div class="col-sm-4">
							<h4 class="pink">
								<i class="ace-icon fa fa-hand-o-right green"></i>
								<a href="#modal-form" role="button" class="btn btn-sm btn-primary" data-toggle="modal" id="btnagregar"> Agregar </a>
							</h4>
						</div>
					</div><!-- /.page-header -->
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							<div class="row">
								<div class="col-xs-12">

									<div class="table-header">
										Lista de Auridades
									</div>
									<table id="tabla_datos2" class="table table-striped table-bordered table-hover ">
										<thead>
											<tr>
												<th>Código</th>
												<th>Nombre</th>
												<th>Correo</th>
												<th>Descripción</th>
												<th class="hide">idcargo</th>
												<th>Cargo</th>
												<th class="hide">idgestion</th>
												<th>Gestión</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php
											require_once '../clases/autoridades.php';
											$dml_autoridad->lista_tablas();
											?>
										</tbody>
									</table>


								</div>
							</div>
							<div class="space-6"></div>
							<div id="modal-form" class="modal" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">×</button>
											<h4 class="blue bigger">Por favor Ingrese los Datos Solicitados</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<form method="POST" enctype="multipart/form-data">

													<div>
														<div class="col-sm-12">
															<div class="form-group">
															<label for="idcatgestion" class="blue bolder">Gestión:</label>
																<div>
																	<select class="chosen-select form-control" id="idcatgestion" data-placeholder="Escoja la gestión...">
																		<option value=""> </option>
																		<?php
																		$dml_autoridad->lista_gestion();
																		?>
																	</select>
																	<br>
																	<label class="red bolder hide" id="idcatgestionvalidate">La gestión es Obligatoria *</label>
																</div>
																<label for="idcatcargo" class="blue bolder">Cargo:</label>
																<div>
																	<select class="chosen-select form-control" id="idcatcargo" data-placeholder="Escoja un cargo...">
																		<option value=""> </option>
																		<?php
																		$dml_autoridad->lista_cargos();
																		?>
																	</select>
																	<br>
																	<label class="red bolder hide" id="idcatcargovalidate">el cargo es Obligatorio *</label>
																</div>
																<label for="nombre_autoridad" class="blue bolder">Nombres y Apellidos:</label>
																<div>
																	<input type="text" class="form-control" id="nombre_autoridad" placeholder="Ingrese sus Datos" maxlength="800" />
																	<label class="red bolder hide" id="nombre_autoridadvalidate">El Nombre de la autoridad es Obligatorio *</label>
																</div>
																<label for="correo_autoridad" class="blue bolder">Correo:</label>
																<div>
																	<input type="text" class="form-control" id="correo_autoridad" placeholder="Ingrese sus Datos" maxlength="100" />
																	<label class="red bolder hide" id="correo_autoridadvalidate">El correo es Obligatorio *</label>
																</div>
																<label for="descripcion_breve" class="blue bolder">Descripción:</label>
																<div>
																	<textarea class="form-control" id="descripcion_breve" placeholder="Ingrese sus Datos" rows="5"></textarea>
																</div>
																<label for="archivo_adjunto" class="blue bolder">Seleccione un Archivo:</label>
																<div>
																	<div class="col-xs-12">
																		<div id="progressbar" class="hide"></div>
																		<input type="file" id="archivo_adjunto" />
																		<label class="red bolder hide" id="archivo_adjuntovalidate">Debe cargar un archivo Adjunto *</label>
																	</div>
																</div>

															</div>
														</div>
													</div>
												</form>
											</div>

										</div>
										<div class="modal-footer">
											<button class="btn btn-sm" data-dismiss="modal">
												<i class="ace-icon fa fa-times"></i>
												Cancelar
											</button>
											<button class="btn btn-sm btn-primary" id="btnguardar">
												<i class="ace-icon fa fa-check"></i>
												Guardar
											</button>
										</div>
									</div>
								</div>
							</div>

							<!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<div class="hr hr32 hr-dotted"></div>
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">MUNIHUAYTARÁ</span>
							SFL &copy; 2013-2020
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="../assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if ('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="../assets/js/jquery-ui.custom.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="../assets/js/jquery-ui.min.js"></script>
		<script src="../assets/js/jquery.dataTables.min.js"></script>
		<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../assets/js/dataTables.buttons.min.js"></script>
		<script src="../assets/js/chosen.jquery.min.js"></script>
		<script src="../assets/js/autosize.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>
		<script src="../js/envios_dml_ajax.js"></script>
		<script type="text/javascript">
			function validate(inputtext, labeltext) {
				if ($(inputtext).val() === "") {
					$(labeltext).removeClass("hide");
					$(inputtext).focus();
					return true;
				} else {
					$(labeltext).addClass("hide");
					return false;
				}
			}

			jQuery(function($) {
				//obteniendo datos para cargar la tabla


				var myTable =
					$('#tabla_datos2')
					.DataTable({
						bAutoWidth: false,
						"aoColumns": [
							null, null, null, null, null, null, null, null,
							{
								"bSortable": false
							}
						],
						"aaSorting": [],
						"sScrollX": "100%",
						"iDisplayLength": 25,



						select: {
							style: 'multi'
						},
						"language": {
							"search": "Buscar:",
							"lengthMenu": "Mostrar _MENU_ Registros por Página",
							"zeroRecords": "No hay Registros - lo sentimos",
							"info": "Página _PAGE_ de _PAGES_",
							"infoEmpty": "No existen Registros",
							"infoFiltered": "(Filtrado de _MAX_ registros)"
						}
					});
					
				//progressbar
				$("#progressbar").progressbar({

					create: function(event, ui) {
						$(this).addClass('progress progress-striped active')
							.children(0).addClass('progress-bar progress-bar-success');
					}
				});
				$("#progressbar").progressbar({
					value: 0
				});

				$('#archivo_adjunto').ace_file_input({
					style: 'well',
					btn_choose: 'Suelte los archivos aquí o haga clic para elegir su archivo',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small' //large | fit
						//,icon_remove:null//set null, to hide remove/reset button
						/**,before_change:function(files, dropped) {
							//Check an example below
							//or examples/file-upload.html
							return true;
						}*/
						/**,before_remove : function() {
							return true;
						}*/
						,
						//allowExt: ["jpeg", "jpg", "png", "gif"],
					//allowMime: ["image/jpg", "image/jpeg", "image/png", "image/gif"],
					preview_error: function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}

				}).on('change', function() {
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				if (!ace.vars['touch']) {
					$('.chosen-select').chosen({
						allow_single_deselect: true
					});
					//resize the chosen on window resize

					$(window)
						.off('resize.chosen')
						.on('resize.chosen', function() {
							$('.chosen-select').each(function() {
								var $this = $(this);
								$this.next().css({
									'width': $this.parent().width()
								});
							})
						}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if (event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							var $this = $(this);
							$this.next().css({
								'width': $this.parent().width()
							});
						})
					});


					$('#chosen-multiple-style .btn').on('click', function(e) {
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if (which == 2) $('#form-field-select-4').addClass('tag-input-style');
						else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}

				$('#modal-form').on('shown.bs.modal', function() {
					var ancho = $(".modal-body").width();
					if (!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function() {
							$(this).find('a:first-child').css('width', ancho);
							$(this).find('.chosen-drop').css('width', ancho);
							$(this).find('.chosen-search input').css('width', ancho - 10);

						});
					}
				}).on("hidden.bs.modal", function() {
					idedicion = "";
					$("#idcatgestion").chosen();
					$("#idcatgestion").val("");
					$("#idcatgestion").trigger("chosen:updated");
					$("#idcatcargo").chosen();
					$("#idcatcargo").val("");
					$("#idcatcargo").trigger("chosen:updated");
					$("#nombre_autoridad").val("");
					$("#correo_autoridad").val("");
					$("#descripcion_breve").val("");
				});

				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if (div.length == 1) div.tooltip({
							container: 'body',
							title: div.parent().text()
						});
						else $(this).tooltip({
							container: 'body',
							title: $(this).text()
						});
					});
				}, 500);
				$('[data-rel="tooltip"]').tooltip({
					placement: tooltip_placement
				});
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table');
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					//var w2 = $source.width();

					if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
					return 'left';
				}

				$("#btnguardar").on("click", function() {
					if (validate("#idcatgestion", "#idcatgestionvalidate")) return;
					if (validate("#idcatcargo", "#idcatcargovalidate")) return;
					if (validate("#nombre_autoridad", "#nombre_autoridadvalidate")) return;
					if (validate("#correo_autoridad", "#correo_autoridadvalidate")) return;
					if (validate("#archivo_adjunto", "#archivo_adjuntovalidate")) return;
					
					var idgestion = $("#idcatgestion").val();
					var idcategoria = $("#idcatcargo").val();
					var nombre = $("#nombre_autoridad").val();
					var correo = $("#correo_autoridad").val();
					var descripcion = $("#descripcion_breve").val();
					var fichero = document.getElementById("archivo_adjunto");
					var formData = new FormData();
					formData.append("fichero", fichero.files[0]);
					if (idedicion !== "") {
						formData.append("idautoridad", idedicion);
						formData.append("Modificar", 'modificar');
					} else {
						var insertar = '-';
						formData.append("Insertar", insertar);
					}
					formData.append("idcatgestion", idgestion);
					formData.append("idcatcargo", idcategoria);
					formData.append("nombre_autoridad", nombre);
					formData.append("correo_autoridad", correo);
					formData.append("descripcion_breve", descripcion);
					$.ajax({
						data: formData,
						url: "../clases/autoridades.php",
						type: "post",
						dataType: "html",
						cache: false,
						contentType: false,
						processData: false,
						beforeSend: function() {
							$("#progressbar").removeClass("hide");
						},
						xhr: function() {
							var xhr = $.ajaxSettings.xhr();

							xhr.upload.onprogress = function(e) {
								// For uploads
								if (e.lengthComputable) {

									$("#progressbar").progressbar({
										value: Math.round((e.loaded / e.total) * 100)
									});
									//console.log(Math.round((e.loaded / e.total)*100));
								}

							};
							return xhr;
						}
					}).success(function(res) {
						//        alert(res);
						location.reload();
					});

				});





			}); //fin de lo cargado
			$(".eliminar").click(function() {

				var valores = new Array();
				i = 0;

				$(this).parents("tr").find("td").each(function() {
					valores[i] = $(this).html();
					i++;
				});
				//                        alert(valores[0]);

				var respuesta = confirm("Ud. está a punto de eliminar un registro ¿Desea Continuar?");
				if (respuesta) {
					var parametros = {
						"Eliminar": "-",
						"codigoe": valores[0]
					};
					eliminar_datos(parametros, "../clases/autoridades.php", "post");
				}

			});
			var idedicion = "";
			$(".editar").click(function() {

				var valores = new Array();
				i = 0;
				$(this).parents("tr").find("td").each(function() {
					valores[i] = $(this).html();
					i++;
				});

				//subir la data a los objetos
				idedicion = valores[0];
				$("#nombre_autoridad").val(valores[1]);
				$("#correo_autoridad").val(valores[2]);
				$("#descripcion_breve").val(valores[3]);
			    $("#idcatcargo").chosen();
				$("#idcatcargo").val(valores[4]);
			    $("#idcatcargo").trigger("chosen:updated");
			    $("#idcatgestion").chosen();
				$("#idcatgestion").val(valores[6]);
			    $("#idcatgestion").trigger("chosen:updated");
				//                        alert($("#list_menus").val());
			});
			$('document').ready(function() {
				$('#mm2').addClass("active open");
				$('#mm15').addClass("active");
			});
		</script>
		<!-- inline scripts related to this page -->
</body>

</html>