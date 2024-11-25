<?
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/// Function takes string as an argument and returns a string. 
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/// After you include function into your code, obfuscation can be preformed like this: 
	/// echo obfuscateEmail('mymail@mail.com');
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/// And in a real life usage, you’d create an obfuscated e-mail link like this: 
	/* <a class="obfuscatedEmail" href="<?php echo obfuscateEmail('mailto:mymail@mail.com'); ?>" rel="nofollow"><?php echo obfuscateEmail('mailto:mymail@mail.com'); ?></a> */
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	function obfuscateEmail( $email ) {
		 
		//We will work with UTF8 characters, just to be safe that we won't mess up any address.
		$emailLetters = preg_split( '//u', $email, null, 1 );
		$obfuscatedEmail = '';
		 
		//Reversing the string (e-mail).
		$emailLetters = array_reverse( $emailLetters );
		 
		//Characters that are to be used when obfuscating email address.
		//If you change this, make sure you change the characters string in JavaScript as well.
		//And please note that the string must have even number of characters for this to work.
		$characters = '123456789qwertzuiopasdfghjklyxcvbnmMNBVCXYLKJHGFDSAPOIUZTREWQ';
	 
		//Get the number of characters dynamically.
		$charactersLength = strlen( $characters ) - 1;
		 
		//Obfuscate string letter by letter.
		foreach( $emailLetters as $letter ) {
			 
			//Get the current letter position in the string.
			$letterPos = strpos($characters, $letter);
			 
			//If the character is present in our string of characters,
			//we'll switch it; if not, we'll leave it as is.
			if( $letterPos !== false ) {
				 
				$letterPos += $charactersLength / 2;
				 
				//For letters that are in our characters string positioned
				//after the total number of characters, we'll start from beginning.
				//For example, "v" becomes "1", "b" becomes "2"
				$letterPos = $letterPos > $charactersLength ? $letterPos - $charactersLength - 1 : $letterPos;
				 
				//Obfuscated letter.
				$newLetter = substr($characters, $letterPos, 1);
			 
			} else {
				 
				//Characters that aren't in our list will be left unchanged.
				$newLetter = $letter;
			 
			}
			 
			//We append obfuscated letter to the result variable.
			$obfuscatedEmail .= $newLetter;
			 
		}
		 
		//Sign @ is a control letter. Since more than one @ sign is illegal
		//in email address, we're going to use two @ symbols to know when
		//the string has been obfuscated (and needs deobfuscation).
		//That way you can use obfuscated e-mail only in href attribute,
		//while the link text can be something entirely different.
		//An example: <a href="mailto:myemail@gmail.com">This is my email</a>.
		return $obfuscatedEmail . '@';
	 
	}
?>