<h1 align="center" class="display-4">Trash</h1>
<?php
include_once('db.php');

$id=$_SESSION['id'];
$i1=0;
$j1=0;
$l1=0;
$p =1;

$sql="SELECT * FROM trash where rec_id='$id' ORDER BY trash_id DESC";
$dd=mysqli_query($con,$sql);

echo "<div class='container-fluid'>";

	echo "<table class='table'>";
	
while(list($mid,$rid,$sid,$s,$m,$ia,$d,$sss)=mysqli_fetch_array($dd))
{
	echo "<tr class='row'>";

	echo "<form action='delete_msg.php' method='get'>";
//
	echo "<td>".$p++.".</td>";
	echo "<td id='get".$i1."' class='col-lg-2' style='cursor: pointer;'>";
	
	
	if($sss)
	{
	echo "<strong>".$sid."</strong></td>";
		echo "<td id='gett".$j1."' class='col-lg-8' style='cursor: pointer;'><strong>".substr($s,0,20)."</strong> - ";
		if(strrpos($m,"<br />"))
				{
					$a= strrpos($m,"<br />");
					echo substr($m,0,40)."&nbsp&nbsp<small>Click to see full message</small>";
				
				}else{
					echo substr($m,0,100);
					
				}
				echo "</td>";
	echo "<td>$d&nbsp;&nbsp;&nbsp;&nbsp;<button type='button' id='del".$l1."'><i class='far fa-trash-alt'></i></a></button></td>";
	echo "</tr>";
	}else
	{
		echo $sid;
				echo "<td id='gett".$j1."' class='col-lg-8' style='cursor: pointer;'>".substr($s,0,20)." - ";
				
				if(strrpos($m,"<br />"))
				{
					$a= strrpos($m,"<br />");
					echo substr($m,0,40)."&nbsp&nbsp<small>Click to see full message</small>";
					
				}else{
					echo substr($m,0,100);
				}
				
				echo "</td>";
	echo "<td>$d&nbsp;&nbsp;&nbsp;&nbsp;<button type='button' id='del".$l1."'><i class='far fa-trash-alt'></i></a></button></td>";
	echo "</tr>";
	}
	

	
	echo "
	<script>
	$('#get".$i1."').click(function() {
    //window.location = 'mail.php?contrash=".$mid."';
     post('mail.php', {contrash: '".$mid."'});
});
	$('#gett".$j1."').click(function() {
  //  window.location = 'mail.php?contrash=".$mid."';
  post('mail.php', {contrash: '".$mid."'});
});
	$('#del".$l1."').click(function() {
		post('delete_trash.php', {name: '".$mid."'});
	//window.location = 'delete_trash.php?ch%5B%5D=".$mid."&delete=Delete';
	});


function post(path, params, method) {
    method = method || 'post'; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement('form');
    form.setAttribute('method', method);
    form.setAttribute('action', path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement('input');
            hiddenField.setAttribute('type', 'hidden');
            hiddenField.setAttribute('name', key);
			hiddenField.setAttribute('name1', key);
			hiddenField.setAttribute('value', params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}
	</script>
	";	
	$i1++;
	$j1++;
	$l1++;
	
	}
	echo "</table>";
	


?>
