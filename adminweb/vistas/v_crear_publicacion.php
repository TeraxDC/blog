<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="../imagenes/icono-informacion.png" />
		<title>MUNI HUAYTARA ADMIN-WEB</title>

		<meta name="MUNI WEB ADMINISTRACION" content="publicaciones" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
                <link rel="stylesheet" href="../assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="../assets/css/chosen.min.css" />
                <link rel="stylesheet" href="../assets/css/colorbox.min.css" />
                <!-- recursos para el editor-->
                <script src="../ckeditor/ckeditor.js"></script>
                <script src="../ckeditor/samples/js/sample.js"></script>
	<link rel="stylesheet" href="../ckeditor/samples/css/samples.css">
        <link rel="stylesheet" href="../ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
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
               if(!isset($_SESSION)) {
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
								<img class="nav-user-photo" src="<?php echo $_SESSION['mwimagen'];?>" alt="Jason's Photo" />
								<span class="user-info">
									<small>Bienvenido,</small>
									<?php echo $_SESSION['mwusuario'];?>
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
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
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
							<span class="menu-text"> INICIO </span>
						</a>

						<b class="arrow"></b>
					</li>
                                        <?php
                                           require_once '../clases/read_main.php';
                                           $list_main=new Read_main();
                                           $list_main->list_menu($_SESSION['mwusuario'],'1','../');
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
								<a href="#">Inicio</a>
							</li>

							<li>
								<a href="#">Operaciones</a>
							</li>
							<li class="active">Publicaciones</li>
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

						<div class="page-header">
							<h1>Editor de Publicaciones</h1>
						</div><!-- /.page-header -->

						<div class="row">
                                                    <div class="col-xs-12 ">
                                                        <div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Detalles de Publicación</h4>

													<div class="widget-toolbar">
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</div>
												</div>

												<div class="widget-body">
                                                                                                    <div class="widget-main">
                                                                                                        <div class="row">
                                                                                                        <div class="col-xs-6 col-lg-3">
																<input type="file" id="id-input-file-3" />
															</div>
													
														<div class="form-inline">
                                                                                                                    
															
                                                                                                                    
                                                                                                                        
                                                                                                                            <label for="idcatpublicacion" class="blue bolder">Categoría:</label>
                                                                                                                            <select class="chosen-select" id="idcatpublicacion" data-placeholder="Escoja una categoría..." >
                                                                                                                                
                                                                                                                            <option value="">  </option>
                                                                                                                            <?php require_once '../clases/crear_publicacion.php';
                                                                                                                                $dml_publicaciones->lista_categorias();
                                                                                                                            ?>
                                                                                                                            </select>
                                                                                                                       
                                                                                                                    
                                                                                                                            <label for="titulo" class="blue bolder">Título:</label>
                                                                                                                            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ingrese Título" />
                                                                                                                            <label for="idsubcategoria" class="blue bolder">Sub Categoría:</label>
                                                                                                                            <select class="chosen-select" id="idsubcategoria" data-placeholder="Escoja una categoría..." >
                                                                                                                                
                                                                                                                            <option value="">  </option>
                                                                                                                            <?php require_once '../clases/crear_publicacion.php';
                                                                                                                                $dml_publicaciones->lista_subcategorias();
                                                                                                                            ?>
                                                                                                                            </select>
                                                                                                                            <br>
                                                                                                                            <div class="checkbox">
                                                                                                                                    <label>
                                                                                                                                        <input id="comentarios" type="checkbox" class="ace" value="ON" />
                                                                                                                                            <span class="lbl">Permitir Comentarios</span>
                                                                                                                                    </label>
                                                                                                                            </div>
                                                                                                                            <br>
                                                                                                                            <div class="checkbox">
                                                                                                                                    <label>
                                                                                                                                        <input id="publicado" type="checkbox" class="ace" value="ON" />
                                                                                                                                            <span class="lbl"> Publicar</span>
                                                                                                                                    </label>
                                                                                                                            </div>
                                                                                                                            
                                                                                                                       
														</div>
														
													</div>
                                                                                                        </div>
												</div>
											</div>
                                                        
                                                    </div>
                                                    <div class="col-xs-12">
                                                                              <div class="widget-box widget-color-blue">
												<div class="widget-header">
													<h6 class="widget-title">Imagenes</h6>

													<div class="widget-toolbar">

                                                                                                            <a href="#agreimagen" ><label for="agreimagen" class="white" >
														<i class="ace-icon fa fa-plus"></i>
														</label>
														<input type="file" class="form-control-file hidden" id="agreimagen">
														</a>
                                                                                                            
                                                                                                            <a href="#" data-action="reload" >
															<i class="ace-icon fa fa-refresh"></i>
														</a>

														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

														<a href="#" data-action="fullscreen" class="orange2">
															<i class="ace-icon fa fa-expand"></i>
														</a>
													</div>
												</div>

												<div class="widget-body">
													<div class="widget-main padding-4 scrollable" data-size="320">
														<div class="content">
															<div>
                                                                                                                            <ul class="ace-thumbnails clearfix" id="list_images">
																<?php
                                                                                                                                $dml_publicaciones->list_imagenes();
                                                                                                                                ?>	
																	
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
                                                                                         <div class="progress progress-striped pos-rel hide" id="progressbar">
												
											</div>
                                                                                </div>
                                                    
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
                                                                
								<div id="editor">
                                                                        
                                                                </div>
                                                    <div class="hr hr-double dotted col-xs-12"></div>
                                                                <span class="block pull-right center">
										

										<span class="btn-toolbar inline middle no-margin col-xs-12">
											<span data-toggle="buttons" class="btn-group no-margin">
											<button class="btn btn-danger active">
													CANCELAR
												</button>	
                                                                                            <button class="btn  btn-info" id="btnguardar">
													GUARDAR
												</button>
											</span>
										</span>
									</span>
								<div class="hr hr-double dotted"></div>

								

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

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
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
                <script src="../assets/js/jquery.colorbox.min.js"></script>
                <script src="../assets/js/jquery-ui.custom.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
                <script src="../assets/js/jquery-ui.min.js"></script>
                <script src="../assets/js/jquery.dataTables.min.js"></script>
		<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../assets/js/dataTables.buttons.min.js"></script>
                <script src="../assets/js/chosen.jquery.min.js"></script>
		<script src="../assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="../assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="../assets/js/bootbox.js"></script>
                <script src="../ckeditor/config.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
                    
	initSample();

                    function validate(inputtext,labeltext){
                        if ($(inputtext).val()==="") {
                              $(labeltext).removeClass("hide");
                              $(inputtext).focus();
                              return true;
                            }else{
                             $(labeltext).addClass("hide");
                             return false;   
                            }
                    }
                    CKEDITOR.config.colorButton_enableMore=true ;
   function copyfunc(control) {
  /* Get the text copy */
  var copyText = $(control).next();
  
  /* Select the text field */
  copyText.select();
//  copyText.setSelectionRange(0, 99999); /*For mobile devices*/
copyText.value;
  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  
}
var colorbox_params;
jQuery(function($){
    $('.copy_data').click(function(e) {
        e.preventDefault();
    copyfunc(this);
});
	$('.scrollable').each(function () {
					var $this = $(this);
					$(this).ace_scroll({
						size: $this.attr('data-size') || 100,
						//styleClass: 'scroll-left scroll-margin scroll-thin scroll-dark scroll-light no-track scroll-visible'
					});
				});
	$('textarea[data-provide="markdown"]').each(function(){
        var $this = $(this);

		if ($this.data('markdown')) {
		  $this.data('markdown').showEditor();
		}
		else $this.markdown()
		
		$this.parent().find('.btn').addClass('btn-white');
    })
        function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			//console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	}


         


                        
 colorbox_params = {
		rel: 'colorbox',
		reposition:true,
		scalePhotos:true,
		scrolling:false,
		previous:'<i class="ace-icon fa fa-arrow-left"></i>',
		next:'<i class="ace-icon fa fa-arrow-right"></i>',
		close:'&times;',
		current:'{current} of {total}',
		maxWidth:'100%',
		maxHeight:'100%',
		onOpen:function(){
			$overflow = document.body.style.overflow;
			document.body.style.overflow = 'hidden';
		},
		onClosed:function(){
			document.body.style.overflow = $overflow;
		},
		onComplete:function(){
			$.colorbox.resize();
		}
	};

	$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	$("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon
	
	
	$(document).one('ajaxloadstart.page', function(e) {
		$('#colorbox, #cboxOverlay').remove();
   });



        
var idedicion="<?php if (isset($_GET['publicacion'])) {
    echo $_GET['publicacion'];}?>";
var hidden_input =
  $('<input type="hidden" name="my-html-content" />'); 
  
//console.log(editor);
  
  
  
$("#btnguardar").on('click',function() {
 
//  console.log(hidden_input.val());
    
    if ($("#id-input-file-3").val()===""){
        alert("Seleccione una Imagen");
           return;     
    }
    if ($("#idcatpublicacion").val()===""){
        alert("Seleccione una Categoria");
           return;     
    }
    if ($("#titulo").val()===""){
        alert("Ingrese un Título");
           return;     
    }
    var comentarios=0;
    var publicado=0;
    if ($("#comentarios").is(':checked')) {
    comentarios=1;
        }
    if ($("#publicado").is(':checked')) {
    publicado=1;
        }
    
    
    
    var html_content = CKEDITOR.instances.editor.getData();
//    cnosole.log(html_content);
    var subcategoria=$("#idsubcategoria").val(); 
  hidden_input.val( html_content );
     var fichero=document.getElementById("id-input-file-3");
    var formData = new FormData();
                                        formData.append("fichero", fichero.files[0]);
                                        if (idedicion!=="") {
//                                            alert("esta vacio");
                                          formData.append("idpublicaciones",idedicion);
                                          formData.append("Modificar",'modificar');
//                                          console.log( hidden_input.val());
                                          }else{
                                          var insertar='-';
                                           formData.append("Insertar",insertar);
                                          }
                                          formData.append("idcategoria",$("#idcatpublicacion").val());
                                          formData.append("titulo_publicacion",$("#titulo").val());
                                          formData.append("contenido_publicacion",html_content);
                                          formData.append("comentarios",comentarios);
                                          formData.append("estado",publicado);
                                          formData.append("idsubcatgegoria",subcategoria);
                                           $.ajax({
                                                    data: formData,
                                                    url: "../clases/crear_publicacion.php",
                                                    type: "post",
                                                    dataType: "html",
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    beforeSend: function(){
//                                                         $( "#progressbar" ).removeClass("hide");
                                                    },
                                                    xhr: function () {
                                                        var xhr = $.ajaxSettings.xhr();

                                                        xhr.upload.onprogress = function (e) {
                                                            // For uploads
                                                            if (e.lengthComputable) {

//                                                                $( "#progressbar" ).progressbar({
//                                                                value: Math.round((e.loaded / e.total)*100)
//                                                              });
                                                              //console.log(Math.round((e.loaded / e.total)*100));
                                                            }

                                                        };
                                                        return xhr;
                                                    }
                                                }).success(function(res){
//                                                    alert(res);
                                                            if (res.length>0) {
                                                            idedicion=res;
                                                        }                                                
    
                                                        
                                                    });
  

    });
    
    if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': 200});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
    
$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'Suelte la Imagen o Haga Click Aquí',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
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
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
});
var idedicion="";
 $('document').ready(function (){
     //evento para capturar imagen ya cargarlo
     $("#agreimagen").change(function() {
                                                //validamos si cargo el producto
                                                
                                                var fichero=document.getElementById("agreimagen");
                                                var formData = new FormData();
                                                 formData.append("fichero", fichero.files[0]);
                                                 formData.append("subir_imagen", '-');
                                                $.ajax({
                                                    data: formData,
                                                    url: "../clases/crear_publicacion.php",
                                                    type: "post",
                                                    dataType: "html",
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    beforeSend: function(){
                                                         $( "#progressbar" ).removeClass("hide");
                                                    },
                                                    xhr: function () {
                                                        var xhr = $.ajaxSettings.xhr();
                                                        xhr.upload.onprogress = function (e) {
                                                            // For uploads
                                                            if (e.lengthComputable) {
                                                                $( "#progressbar" ).progressbar({
                                                                value: Math.round((e.loaded / e.total)*100)
                                                              });
                                                            }

                                                        };
                                                        return xhr;
                                                    }
                                                }).success(function(res){
                                                      $("#list_images").append(res); 
                                                      $('.ace-thumbnails:last [data-rel="colorbox"]').colorbox(colorbox_params);    
                                                      $('.copy_data').click(function(e) {
                                                                e.preventDefault();
                                                            copyfunc(this);
                                                        });
                                                  }).error(function(res) {
                                                    alert(res);
                                                });
                                                
                                            });
                                            $('#mm2').addClass("active open");
                                            $('#mm13').addClass("active");
                                            idedicion="<?php if (isset($_GET['publicacion'])){
                                                echo $_GET['publicacion'];}else{echo "";}?>";
//                                                        alert(idedicion);
                                            var datos={"Obtener_data":"-","idpublicacion":idedicion};
                                            if (idedicion!=="") {
                                             $.ajax({
                                                 dataType: "json",
                                                url     : "../clases/crear_publicacion.php",
                                                type    : "post",
                                                data    : datos,
                                                
                                                success : (function (data) {
//                                                    $("#id-input-file-3").val(data[0][1]);
                                                    $("#idcatpublicacion").val(data[0][1]);
                                                    $("#idcatpublicacion").trigger("chosen:updated");
                                                    $("#titulo").val(data[0][5]);
                                                    if (data[0][6]==="1") {
                                                      $("#comentarios").prop('checked', true);
                                                    } 
                                                    if (data[0][7]==="1") {
                                                     $("#publicado").prop('checked', true);
                                                    }
                                                    $("#editor").append(data[0][4]);
                                                })
                                                });
                                                }
                                                });
		</script>
	</body>
</html>