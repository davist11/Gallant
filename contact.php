<?php
/*
Template Name: Contact
*/
?>


<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
	
		//Check to make sure that the subject field is not empty
		if(trim($_POST['subject']) === '') {
			$subjectError = 'You forgot to enter your subject.';
			$hasError = true;
		} else {
			$subject = trim($_POST['subject']);
		}

		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = 'You forgot to enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = 'You forgot to enter your email address.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$commentError = 'You forgot to enter your comments.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		//If there is no error, send the email
		if(!isset($hasError)) {
			$recipient = trim($_POST['recipient']);
			if($recipient === 'all') {
				$emailTo = 'admin@thegallant.com';
			} else {
				$author = get_userdata( $recipient );
				$emailTo = $author->user_email;
			}

			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: The Gallant <us@thegallant.com>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			$emailSent = true;
		}
	}
} ?>

<?php get_header(); ?>

<div class="primary-content">
<?php if(isset($emailSent) && $emailSent == true) { ?>

	<div class="thanks">
		<h1>Thanks, <?=$name;?></h1>
		<p>Your email was successfully sent. We will be in touch soon.</p>
	</div>

<?php } else { ?>

	<?php if (have_posts()) : ?>
	
	<?php while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<div class="text">
			<?php the_content(); ?>
			<p class="required">* Denotes required field.</p>
			<?php if(isset($hasError) || isset($captchaError)) { ?>
				<p class="error">There was an error submitting the form.</p>
			<?php } ?>
		</div>
	
		<form action="<?php the_permalink(); ?>" id="contact-form" method="post">
	
			<ol class="forms contain">
				<li class="textarea"><label for="commentsText"><em class="required">*</em> Comments</label>
					<textarea name="comments" id="commentsText" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
					<?php if($commentError != '') { ?>
						<span class="error"><?=$commentError;?></span> 
					<?php } ?>
				</li>

				<li><label for="subject"><em class="required">*</em> Subject</label>
					<input type="text" name="subject" id="subject" value="<?php if(isset($_POST['subject'])) echo $_POST['subject'];?>" class="requiredField" />
					<?php if($subjectError != '') { ?>
						<span class="error"><?=$subjectError;?></span> 
					<?php } ?>
				</li>

				<li><label for="contactName"><em class="required">*</em> Name</label>
					<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" />
					<?php if($nameError != '') { ?>
						<span class="error"><?=$nameError;?></span> 
					<?php } ?>
				</li>
				
				<li><label for="email"><em class="required">*</em> Email</label>
					<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />
					<?php if($emailError != '') { ?>
						<span class="error"><?=$emailError;?></span>
					<?php } ?>
				</li>

				<li><label for="recipient">Who do you want to email?</label>
					<select name="recipient" id="recipient">
						<option value="all">Anyone</option>
					<?php 
					global $wpdb;
					$authors = $wpdb->get_results("SELECT ID, display_name from $wpdb->users WHERE user_login <> 'admin' ORDER BY display_name");

					foreach($authors AS $author): ?>
						<?php $author = get_userdata( $author->ID ); ?>
						<?php if($author->wp_user_level >= 7): ?>
							<option value="<?php echo $author->ID; ?>"><?php echo $author->display_name; ?></option>
						<?php endif; ?>

					<?php endforeach; ?>
					</select>
				</li>

				<li class="screen-reader"><label for="checking" class="screenReader">If you want to submit this form, do not enter anything in this field</label><input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" /></li>
				<li class="buttons">
					<input type="hidden" name="submitted" id="submitted" value="true" />
					<button type="submit" name="submit" id="contactSubmit" class="button">Contact Us</button>
				</li>
			</ol>
		</form>
	
		<?php endwhile; ?>
	<?php endif; ?>
<?php } ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>