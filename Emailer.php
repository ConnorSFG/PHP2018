<?php
class Emailer {
	
	private $messageLine = "";
	
	private $senderAddress = "";
	
	private $sendToAddress = "";
	
	private $subjectLine = "";
	
	public function __construct() {
		
		
	}
	
	public function setMessageLine($inMessageLine) {
		
		$this->messageLine = $inMessageLine;
	}
	
	public function getMessageLine () {
	
		return $this->messageLine;	
		
	}
		
		public function setSenderAddress($inSenderAddress) {
		
		$this->senderAddress = $inSenderAddress;
	}
		
		public function getSenderAddress () {
	
		return $this->senderAddress;	
		
		}
		
		public function setSendToAddress($inSendToAddress) {
		
		$this->sendToAddress = $inSendToAddress;
	}

		public function getSendToAddress () {
	
		return $this->sendToAddress;	
		
		}
		
		public function setSubjectLine($inSubjectLine) {
		
		$this->subjectLine = $inSubjectLine;
	}
		public function getSubjectLine () {
	
		return $this->subjectLine;	
		
		}
		
		public function sendPHPEmail() {
			
			$additionalHeaders = "From: $this->senderAddress";
			
			echo "<h1>Additional headers $additionalHeaders</h1>";
			
			$text= $this->messageLine = wordwrap($this->messageLine, 98, "\r\n");
			
			echo "<h3>Message <br> $this->messageLine</h3>";
		
		return mail ($this->sendToAddress,$this->subjectLine,$this->messageLine,$additionalHeaders);
	
		
}
		
	}

?>