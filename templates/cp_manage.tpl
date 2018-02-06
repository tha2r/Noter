
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
	
});
function change(nid, ntext)
{
    var idelem = document.getElementById("idvalue");
	var idtext = document.getElementById("idtext");
	
	idelem.value=nid;
	idtext.innerHTML=ntext;
	
}
function edchange(nid, ntitle, ncode, ninfo, nnote)
{
    var idelm = document.getElementById("edidvalue");
	var titleelm = document.getElementById("idtitle");
	var titletextelm = document.getElementById("titletext");
	var codeelm = document.getElementById("idcode");
	var noteelm =  tinymce.get('idnote').getBody();
	var infoelm = document.getElementById("idinfo");
	
	idelm.value=nid;
	titletextelm.innerHTML=ntitle;
	titleelm.value=ntitle;
	codeelm.value=ncode;
	noteelm.innerHTML=document.getElementById(nnote).value;
	infoelm.value=ninfo;
	
}
</script>
	<div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
New Notes
	  </div>

      <!-- Table -->
      <table class="table">
		<thead>
			<th width="80%">Title</th>
			<th width="10%">Edit</th>
			<th width="10%">Delete</th>
		</thead>
        <tbody>

{notes}
<tr>
<td colspan="3" align="center">
<ul class="pager ">
  <li class="previous"><a href="/user/cp/manage/{pages.first}">&larr;&larr; First</a></li>
  <li class="previous"><a href="/user/cp/manage/{pages.previous}">&larr; Previous</a></li>
  <li class="active"><a href="#">Current {pages.current}</a></li>
  <li class="next"><a href="/user/cp/manage/{pages.last}">Last &rarr;&rarr;</a></li>
  <li class="next"><a href="/user/cp/manage/{pages.next}">Next &rarr;</a></li>
</ul></td>
</tr>
        </tbody>
</table>

    </div>



<!-- Modal -->
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="/user/cp/dodelete" method="post" id="uploadfrom"> 
<input type="hidden" name="id" id="idvalue" value="0">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Note</h4>
      </div>
      <div class="modal-body">
	
		<h4>Are you sure you want to delete the note ?</h4>

		<h4>Note Title : <strong id="idtext"></strong></h4>
	  <br />
		  <div class="bg-danger bg-danger" role="warning" align="center">
		  <p class="bg-danger"><br />Warning : <strong>This Cannot be undone ...</strong><br /><br /></p>
		
		  </div>
      </div>
      <div class="modal-footer">
		<input type="submit" name="submit" value="Delete" class="btn  btn-danger">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</form>
</div>

<!-- Modal -->
<div class="modal fade " id="myEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="/user/cp/doedit" method="post" id="uploadfrom"> 
<input type="hidden" name="id" id="edidvalue" value="0">
 <div class="modal-dialog-edit">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Note : <strong id="titletext"></strong></h4>
      </div>
      <div class="modal-body">
	
	
	
	
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<div class="panel panel-default">

				<div class="panel-body">
					<textarea name="text" style="width: 100%; resize:none;" id="idnote" ></textarea>

				</div>
				<div class="input-group">
				  <span class="input-group-addon">Note Description</span>
				  <input type="text" class="form-control" placeholder="Optional - Info about the note " name="info" id="idinfo" value="">
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
						  <input type="text" class="form-control" placeholder="Code" name="code" id="idcode" autofocus>
						</div>
                    </div>
                    <div class="form-group">
						<h4>Note Title</h4>
                        <input class="form-control" placeholder="Note title - will be shown in listing" name="title" type="text" id="idtitle" value="">
                    </div>

				</div>
			</div>
		</div>
	</div>

	

      </div>
      <div class="modal-footer">
		<input type="submit" name="submit" value="Edit" class="btn btn-lg btn-success">
        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</form>
</div>
