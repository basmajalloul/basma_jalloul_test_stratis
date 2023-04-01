<?php

// Add Shortcode
function formulaire_test_stratis() {
	
$form = "<div class='formulaire-test'>
<form action='' method='post'>";
	
	$form .= 
	"<div class='form-line'>
		<label>Title</label>
		<input type='text' name='form_title'>
	</div>";
	
	$form .= 
	"<div class='form-line'>
		<label>Text</label>
		<input type='text' name='form_text'>
	</div>";
	
	$form .= 
	"<div class='form-line'>
		<input type='submit' name='submit_form' value='Submit'>
	</div>";
	
$form .= "</form>";
	
	if(isset($_POST["submit_form"])) {
		
		$posts = get_posts([
			'post_type'  => 'post',
			'title' => $_POST["form_title"],
		]);
		
		if($posts) {
			
			$form .= "<p class='error'>Ce titre existe, essayez une autre fois.</p>";
			
		}
		else {
			
			$message = "<h2>".$_POST["form_title"]."</h2><p>".$_POST["form_text"]."</p>";
		
			mail('admin@stratis.com', 'Test', $message);
			
			$form .= "<p class='success'>Formulaire envoyé avec succés.</p>";
		}
		
	}
	
	$form .= "</div>";
	
return $form;

}
add_shortcode( 'formulaire_test_stratis', 'formulaire_test_stratis' );

?>