<tr class="td">
<td><a href="/{note.code}">{note.title}</a><input type="hidden" value="{note.text}" id="inputid{note.id}"></td>
<td><a class="btn btn-sm btn-success" data-toggle="modal" data-target="#myEdit" href="#" onclick="edchange({note.id},'{note.title}', '{note.code}', '{note.info}', 'inputid{note.id}');"><img src="/images/icons/edit.png" border="0"></a></td>
<td><a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal" href="#" onclick="change({note.id},'{note.title}');"><img src="/images/icons/delete.png" border="0"></a></td>
</tr>