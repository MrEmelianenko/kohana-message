How to use?
-----------

* Create message `Message::set($type, $text, array $options = NULL)`
* Render messages in own place `Message::render($profile = 'default', $clear = TRUE)`

Example of using:

### In controller
~~~
// simple set success message
Message::set(Message::SUCCESS, 'You successful logged in!');

// set error message with option
Message::set(Message::ERROR, 'Sorry, we have an error 404!', array('id' => 'error-404'));
~~~

### In view
~~~
// render messages (default profile)
Message::render();

// render messages without clean session (default profile)
Message::render(NULL, FALSE);

// render messages (bootstrap profile)
Message::render('bootstrap');
~~~