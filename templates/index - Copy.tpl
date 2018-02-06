<script type="text/javascript" src="/assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
        selector: "textarea",
        plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table jbimages contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
        ],

        toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | jbimages",

        menubar: false,
        toolbar_items_size: 'small',


        style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],

        templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
        ]

});</script>


<form method="post" action="/notes/add" id="NoteForm">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<div class="panel panel-default">

				<div class="panel-body">
					<textarea name="content" style="width:100%"></textarea>
				</div>
				<div class="input-group">
				  <span class="input-group-addon">Note Description</span>
				  <input type="text" class="form-control" placeholder="Optional - Info about the note " name="info" type="text" value="">
				</div>
				<br />
				<div class="panel-heading" align="center">
					<input type="submit" value="Publish Your Note"  class="btn btn-lg btn-primary">
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
		    <div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Advanced Options</h3>
				</div>
				<div class="panel-body">
                    <div class="form-group">
                   		<h4>Custom link</h4>
						<div class="input-group">
						  <span class="input-group-addon">http://noter.ml/</span>
						  <input type="text" class="form-control" placeholder="Code" name="code" autofocus>
						</div>
                    </div>
                    <div class="form-group">
						<h4>Note Title</h4>
                        <input class="form-control" placeholder="Note title - will be shown in listing" name="title" type="text" value="">
                    </div>
                    <div class="form-group">
						<h4>Add Images</h4>
						<button type="button" class="btn btn-sm btn-success" onclick="tinyMCE.activeEditor.buttons.jbimages.onclick();">Image Uploader</button>	
					</div>
                    <div class="form-group">
						<h4>From Doc File</h4>
						
						<!-- Button trigger modal -->
						<a class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal" href="#">
						  Add From PDF , ORT ,  Doc , Docx , RTF
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<form action="/notes/import" method="post" id="uploadfrom">
<!-- Modal -->
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Import Note</h4>
      </div>
      <div class="modal-body">
	
		<h4>Please Pick your note file to be imported.</h4>

        <input type="file" name="filename" id="uploadfile">
	  <br />
		  <div class="alert alert-info" role="alert">
			<strong>Only ( PDF , ORT ,  Doc , Docx , RTF ) extensions are allowed.</strong> 
		  </div>
      </div>
      <div class="modal-footer">
		<input type="submit" name="submit" value="Upload" class="btn btn-primary">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>