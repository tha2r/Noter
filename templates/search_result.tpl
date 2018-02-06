
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
Search for <b>{searchkey}</b> Results
	  </div>

      <!-- Table -->
      <table class="table">
		<thead>
			<th width="60%">Title</th>
			<th width="20%">Views</th>
			<th width="20%">Date</th>
		</thead>
        <tbody>

{search_results}
<tr>
<td colspan="3" align="center">
<ul class="pager ">
  <li class="previous"><a href="/notes/dosearch?key={searchkey}&page={pages.first}">&larr;&larr; First</a></li>
  <li class="previous"><a href="/notes/dosearch?key={searchkey}&page={pages.previous}">&larr; Previous</a></li>
  <li class="active"><a href="#">Current {pages.current}</a></li>
  <li class="next"><a href="/notes/dosearch?key={searchkey}&page={pages.last}">Last &rarr;&rarr;</a></li>
  <li class="next"><a href="/notes/dosearch?key={searchkey}&page={pages.next}">Next &rarr;</a></li>
</ul></td>
</tr>
        </tbody>
</table>

    </div>

