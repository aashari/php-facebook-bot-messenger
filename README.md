PHP Facebook Messenger
===================
This is a very simple PHP class for Facebook Messenger Bot, you can send and receive message through this simple PHP class

----------

Documentation
-------------

#### listen

This method will listen request from Messenger Webhook, this is will return null or array.

Return     | Description
-------- | ---
null | There's no request from Messenger Webhook
array     | Array data (payload) received from Messenger Webhook

> **Note:** This method is required to verify your Webhook Callback too, it will return a single string called **hub challenge** for Webhook Callback verification process.

Array data (payload) received froom Messenger Webhook can means many things such as message received or message read, you can see the complete documentation here:

https://developers.facebook.com/docs/messenger-platform/webhook-reference

#### sendMessage

This method can send a message to specific user, there's 2 parameter for this method, which is, recipientId (string) and message (array), here is example of **sendMessage** method:

    $message = array(
	    'text' => 'Hello World!'
	);
    $response = $fbMessenger->sendMessage('1234567890',$message);
above code snippets will send a very simple text message to user messenger with id **1234567890**, there's a lot of message format message to send, you can see the complete documentation here:

https://developers.facebook.com/docs/messenger-platform/send-api-reference

the method will return a response of request, you can see the complete documentation here:

https://developers.facebook.com/docs/messenger-platform/send-api-reference#response

if you have any question, feel free to contact me through this website https://www.aashari.id/, thanks