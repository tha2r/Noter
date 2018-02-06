
<script type="text/javascript" src="/assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
		height : "280",
        selector: "textarea",
        plugins: [
                "advlist autolink autosave link image lists preview  media",
                "jbimages textcolor colorpicker textpattern directionality "
        ],

        toolbar1: " formatselect  removeformat  | bold italic underline strikethrough forecolor |  bullist numlist | alignleft aligncenter alignright alignjustify | undo redo | ltr rtl | link unlink image code | jbimages preview",
  
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
        ]
	
});</script>

<form method="post" action="/notes/doedit" id="NoteForm">
<input type="hidden" name="id" value="{note.id}">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<div class="panel panel-default">

				<div class="panel-body">
    <textarea name="text" style="width:100%">{note.text}</textarea>
				</div>
				<div class="input-group">
				  <span class="input-group-addon">Note Description</span>
				  <input type="text" class="form-control" placeholder="Optional - Info about the note " name="info" value="{note.info}">
				</div>
				<br />
				<div class="panel-heading" align="center">
					<input type="submit" value="Edit your note"  class="btn btn-lg btn-primary">
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
						  <input type="text" class="form-control" placeholder="Code" name="code" value="{note.code}" autofocus>
						</div>
                    </div>
                    <div class="form-group">
						<h4>Note Title</h4>
                        <input class="form-control" placeholder="Note title - will be shown in listing" name="title" type="text" value="{note.title}">
                    </div>
                    <div class="form-group">
						<h4>Add Images</h4>
						<button type="button" class="btn btn-sm btn-success" onclick="tinyMCE.activeEditor.buttons.jbimages.onclick();">Image Uploader</button>	
					</div>

				</div>
			</div>
		</div>
	</div>
</form>
