<?php

class PHPFacebookMessenger {

	private $access_token;
	private $verify_token;

	private $hubMode;
	private $hubChallenge;
	private $hubVerifyToken;

	private $api_url_messenger;
    private $request;

	public function __construct($access_token, $verify_token, $request = null){
		
		$this->access_token = $access_token;
		$this->verify_token = $verify_token;
		$this->api_url_messenger = "https://graph.facebook.com/v2.6/me/messages";
		
		if(!$request){
			$this->request = $_REQUEST;
		}

	}
    
    public function listen(){
        
        if(isset($this->request['hub_mode']) && isset($this->request['hub_verify_token']) && isset($this->request['hub_challenge'])){
			$this->hubMode = trim($this->request['hub_mode']);
			$this->hubVerifyToken = trim($this->request['hub_verify_token']);
			$this->hubChallenge = trim($this->request['hub_challenge']);
			echo $this->hubChallenge;
            exit();
		}
        
        if(file_get_contents('php://input')){
            return json_decode(file_get_contents('php://input'));
        }
        
        return null;

    }
    
	public function sendMessage($recipientId, $message){
		$dataToSend = [
			'recipient' => [
				'id' => $recipientId
			],
			'message' => $message
		];
		return $this->curlRequest($dataToSend);
	}

	private function curlRequest($data){
        $data['access_token'] = $this->access_token;
    	$ch = curl_init($this->api_url_messenger);
    	$headers = [
    		'Content-Type: application/json'
    	];
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	return curl_exec($ch);
	}

}